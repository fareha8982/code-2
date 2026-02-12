@extends('author.layout')


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<table class="table">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             {{ session()->get('message')}}
    </div>
        @endif
  
    <thead>


        <tr>
            <th scope="col">Book_Id</th>
            <th scope="col">Author_Name</th>
            <th scope="col">Book_Title</th>
            <th scope="col">Book_Price</th>
            <th scope="col">Book_Images</th>
            <th scope="col">Book_Pdf</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($book as $b )
        @if ($b->author == Auth::user()->name)


        <tr>
            <th scope="row">{{$b->id}}</th>
            <td>{{ $b->name }}</td>
            <td>{{ $b->description}}</td>
            <td>{{ $b->price }}</td>
            <td><img height="100" width="100" src="{{ asset('book_upload/' . $b->image) }}" alt="Image"></td>
            <td>{{ $b->pdf }}</td>
            <td><a class="btn btn-info" href="{{url('edit_book', $b->id)}}">Edit</a></td>
            <td><a onclick="confirmation(event)" class="btn btn-danger"href="{{url('delete_book', $b->id) }}">Delete</a></td>
        </tr>
       @endif
    @endforeach

    <script>
        function confirmation(e){
            e.preventDefault();
            var link = e.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure you want to delete this book?",
                text: "Once deleted, you will not be able to recover this book!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Your book is safe!");
                }
            });
        }
    </script>
 
  </tbody>
</table>

@endsection