@extends('author.layout');


@section('content')

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
            
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                    {{ session()->get('message')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif  
                          

            <h1 class="mb-4">Add_Book</h1>
                <form method="POST" action="/add_book" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"> Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" name="name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" placeholder="Enter your Description" name="description">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" placeholder="Enter your price" name="price">
                    </div>



                    <div class="mb-3">
                        <label class="form-label">image</label>
                        <input type="file" class="form-control" placeholder="Enter  your image" name="image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pdf</label>
                        <input type="file" class="form-control" placeholder="Enter your pdf" name="pdf">
                    </div>


                    <button type="submit" class="btn btn-primary">Add_Book</button>
                </form>
            </div>
        </div>
        <!-- Form End -->


        @endsection