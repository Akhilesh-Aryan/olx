@extends('base')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Create an account</h5>
                    <hr>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" id="post"  value="Register" class="btn btn-outline-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection