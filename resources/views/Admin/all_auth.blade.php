@extends('Admin.layout')


@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<table class="table">
    <div>
        <div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <thead>
        <tr>
            <th scope="col">Author_Id</th>
            <th scope="col">Author_Name</th>
            <th scope="col">Author_Email</th>
            <th scope="col">Author_Address</th>
            <th scope="col">Author_Image</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $a)

        @if ($a->user_role == "1")


        <tr>
            <th scope="row">{{$a->id}}</th>
            <td>{{ $a->name }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->address }}</td>
            <td><img height="100" width="100" src="{{ asset('author_image/' . $a->image) }}" alt="Image"></td>
            <td><a class="btn btn-info" href="{{url('edit_author', $a->id)}}">Edit</a></td>
            <td><a onclick="confirmation(event)" class="btn btn-danger"
                    href="{{url('delete_author', $a->id) }}">Delete</a></td>
        </tr>
        @endif
        @endforeach

        <script>
        function confirmation(e) {
            e.preventDefault();
            var link = e.currentTarget.getAttribute('href');
            swal({
                    title: "Are you sure you want to delete this author?",
                    text: "Once deleted, you will not be able to recover this author!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Your author is safe!");
                    }
                });
        }
        </script>

    </tbody>
</table>

@endsection