<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index(Request $request){
        return view('home', [
            "cat"=>Category::where("parent_id",0)->get(),
            "pro"=>Item::paginate(20)
        ]);

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
    return redirect()->route('home');
    }

}
