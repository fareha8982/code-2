@extends('Admin.layout')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h1>Edit Author</h1>

            <form method="POST" action="{{ url('update_author', $author->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $author->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $author->email }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $author->phone }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ $author->address }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <img src="{{ asset('author_image/'.$author->image) }}" width="100">
                </div>

                <button class="btn btn-primary">Update Author</button>
            </form>
        </div>
    </div>
</div>

@endsection
