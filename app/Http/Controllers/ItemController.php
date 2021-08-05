<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ItemController extends Controller
{
    public function index(Request $request){
        $data = ["cat"=>Category::all()];
        return view('home', $data);

    }
    public function insert(Request $req){
        if($req->method()=="POST"){
            $req->validate([
                'title'=>'required',
        ]);
        //Insertion work-------------
        $filename =$req->image->getClientOriginalName();
        $req->image->move(public_path("images"),$filename);

        $i = new Item();
        $i->pro_title = $req->title;
        $i->price = $req->price;
        $i->seller_name = $req->seller_name;
        $i->seller_contact = $req->seller_contact;
        $i->address = $req->address;
        $i->category_id = $req->category;
        $i->city = $req->city;
        $i->description = $req->description;
        $i->image = $filename;
        $i->save();
        return redirect()->route('homepage');
        }

        return view("insertItem",[
            'cat'=>Category::all(),
            'main'=>Category::where("parent_id", 0)->get()
    ]);
    }

    public function insertCat(Request $req){
        $req->validate([
            'title'=>'required',
    ]);
    $c = new Category();
    $c->title = $req->title;
    $c->parent_id = $req->parent;
    $c->save();
    return redirect()->back();
    }

    public function filter(Request $req, $id){
        return view("filter",["pro"=>Item::where("category_id",$id)->paginate(25)]);
    }

    public function search(Request $req){
        if ($req->search != ""):
        return view("filter", ["pro"=>Item::where("pro_title", "LIKE", "%$req->search%")->paginate(25)]);
    else: 
    return redirect()->route('homepage');
    endif;
    }

    public function view($itemId, $catId){
        return view('single', ["item"=>Item::find($itemId),
        "pro"=>Item::where("id", "!=", $itemId)->where("category_id", $catId)->get()]);
    }

    public function register(Request $request){
        if($request->method() == "POST"){
            $u = new user();
            $u->name = $request->name;
            $u->email = $request->email;
            $u->password = Hash::make($request->password);
            $u->save();
            return redirect()->route('login');
        }
        return view("register");
    }

    public function login(Request $request){
        if($request->method() == "POST"){
            $user = User::where("email", $request->email)->first();
           
                if(!$user ||  !Hash::check($request->password, $user->password)){
                    return "Error::email or password is invalid!!";
                }
                else{
                $request->session()->put("login" , $request->email);
                return redirect()->route('homepage');
                 }
            }
            return view("login");

        }

        public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('homepage');
      }

    }
   