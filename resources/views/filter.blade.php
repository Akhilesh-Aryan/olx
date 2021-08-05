@extends('base')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($pro as $item)
                    <div class="col-3 mb-2">
                        <div class="card">
                            <img src="{{ asset('images/'.$item->image) }}" class="card-img-top" style="object-fit: cover; height:200px;" alt="">
                            <div class="card-body">
                                <h5 class="text-bolder">
                                    ₹ : {{ $item->price }}/-
                                </h5>
                                <h6 class="small text-capatalized font-bolder text-truncate">{{ $item->pro_title }}</h6>
                                <a href="{{ route('view', ['itemId'=>$item->id, "catId"=>$item->category_id])}}" class="nav-link stretched-link"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-10 mt-4 mx-auto">
                    {{ $pro->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection