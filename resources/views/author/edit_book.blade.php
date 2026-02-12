@extends('author.layout');


@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h1>Edit Book</h1>

            <form method="POST" action="{{ url('update_book', $book->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $book->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" value="{{ $book->description }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Price</label>
                    <input type="text" name="price" value="{{ $book->price }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <br>
                    <img src="{{ asset('book_upload/'.$book->image) }}" width="100">
                </div>

                <div class="mb-3">
                    <label>Pdf</label>
                    <input type="file" name="pdf" class="form-control">
                    <br>
                    <span>{{ $book->pdf }}</span>
                </div>

                <button class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>
</div>



@endsection