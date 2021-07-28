@extends('base')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Seller Name</label>
                            <input type="text" name="seller_name" class="form-control" value="{{ old('seller_name') }}">
                            @error('seller_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Seller Contact</label>
                            <input type="text" name="seller_contact" class="form-control" value="{{ old('seller_contact') }}">
                            @error('seller_contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Select Category</label>
                            <a href="#model" class="nav-link"  data-bs-toggle="modal"> Create New Category</a>
                            <select name="category" id="category" class="form-select">
                                <option value="" hidden selected>Select Category</option>
                                @foreach($cat as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                            @error('city')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea type="text-area" rows="4" cols="16" name="description" class="form-control" value="">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <input type="submit" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- =========================Modal============================= --}}
<div class="modal fade" id="model">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('insertCat') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Main Category</label>
                        <select name="parent" class="form-select">
                            <option value="0">Select main Category</option>
                            @foreach($main as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="">Cat Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="post" class="btn btn-success">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection