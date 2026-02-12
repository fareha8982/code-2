@extends('Admin.layout');


@section('content')

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">

                        <div>
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                    {{ session()->get('message')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif  
                        </div>  

                        <h1 class="mb-4">Add Author</h1>
                            <form method="POST" action="/add_author" enctype="multipart/form-data">
                          @csrf
                    <div class="mb-3">
                            <label class="form-label"> Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" name="name">
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter your email" name="email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password">
                        </div>

                        <!-- phone -->
                         <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Enter phone number" name="phone">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" placeholder="Enter your address" name="address">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" placeholder="Enter password" name="image">
                        </div>

                                
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
            <!-- Form End -->

            
@endsection