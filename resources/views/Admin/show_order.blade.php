@extends('admin.layout');



@section('content')


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">


 <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">All Orders</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">User Name </th>
                                            <th scope="col">Book Name</th>
                                            <th scope="col">User Address</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $order as $o)



     <tr>
        <th scope="row">{{$o->id}}</th>
        <td>{{$o->user_name}}</td>
        <td>{{$o->book_name}}</td>
        <td>{{$o->user_address}}</td>
        <td>{{$o->payment_method}}</td>
        <td>{{$o->payment_status}}</td>
        <td><a href="{{url('/order_app' ,$o->id)}}" class="text-light"><button class="btn btn-success">Approved</button></a></td>
        <td><a href="{{url('/order_ret' ,$o->id)}}" class="text-light"><button class="btn btn-warning">Returned</button></a></td>
        <td><a href="{{url('/order_apl' ,$o->id)}}" class="text-light"><button class="btn btn-info">Applied</button></a></td>
        <td><a href="{{url('/order_can' ,$o->id)}}" class="text-light"><button class="btn btn-danger">Cancel</button></a></td>

    </tr>

@endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                   </div>
                   </div>


@endsection