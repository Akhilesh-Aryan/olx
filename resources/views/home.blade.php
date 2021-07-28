@extends('base')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($cat as $c)
                @php
                if($c->child->count() < 1 ){
                    continue;
                }
                @endphp
               <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">{{ $c->title }}</div>
                    <div class="card-body">
                       <ul>
                        @foreach($c->child as $p)
                            <li><a href="">{{ $p->title }}</a></li>
                        @endforeach
                       </ul>
                    </div>
                </div>
               </div>
               {{-- @endif --}}
                @endforeach
            </div>
        </div>
        {{-- <div class="col-9">
            <div class="row">
              @foreach($pro as $item)
              <div class="col-3">
                <div class="card">
                    <img src="{{ asset('images/'.$item->image) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h4>Rs:{{ $item->price }}/-</h4>
                        <h6>{{ $item->pro_title }}</h6>
                    </div>
                </div>
            </div>
              @endforeach
              <div class="col-12">   
                  {{ $pro->links() }}
              </div>
               <style>
                .w-5{
                    display: none;
                }	
            </style>
            </div>
        </div> --}}
    </div>
</div>

@endsection