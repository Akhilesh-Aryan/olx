@extends('base')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                    <div class="col-3 mb-2">
                        <div class="card">
                            <div class="card-header bg-info text-white">Seller Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">Seller Name</div>
                                    <div class="col">{{ $item->seller_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Contect</div>
                                    <div class="col">{{ $item->seller_contact }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-muted mt-3 py-1 rounded">
                            <p class="lead mb-2">{{ $item->address }} ({{ $item->city }})</p>
                        </div>
                    </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('images/'.$item->image) }}" class="card-img-top" style="object-fit: cover; height:250px;" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="h6">
                                                ₹ : {{ $item->price }}/-
                                            </h4>
                                            <h6 class="small text-capatalized font-bolder text-truncate">{{ $item->pro_title }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">Seller Details</div>
                                <div class="card-body">
                                    <p class="text-muted">{{$item->description}}</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h6 class="small"> Releted Products({{ $pro->count()}})</h6>
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach($pro as $item)
                        <div class="col-3 mb-2">
                            <div class="card">
                                <img src="{{ asset('images/'.$item->image) }}" class="card-img-top" style="object-fit: cover; height:200px;" alt="">
                                <div class="card-body">
                                    <h5 class="">
                                        ₹: {{ $item->price }}/-
                                    </h5>
                                    <h6 class="small text-capatalized font-bolder text-truncate">{{ $item->pro_title }}</h6>
                                    <a href="{{ route('view', ['itemId'=>$item->id, "catId"=>$item->category_id]) }}" class="nav-link stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection