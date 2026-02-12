@extends('User.userlayouts.app')

@section('content')
<div class="container-fluid">
        <h2 class="mb-4">My Book History</h2>
            @if(session()->has('message'))
                <div class="alert alert-success">{{ session()->get('message') }}
                    <button type="button" class="btn_close" data-bs-dismiss="alert" aria-hidden="true"></button>
                </div> 
            @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Book Name</th>
                    <th>Purchase Date</th>
                    <th>Status</th>
                    <th>Cancel Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $orders)
                <tr>
                    <td>{{ $orders->id }}</td>
                    <td>{{ $orders->book_name }}</td>
                    <td>{{ $orders->created_at->format('d M Y') }}</td>
                    <td>{{ $orders->payment_status }}</td>
                    <td>
                        @if($orders->payment_status == 'Applied')
                        <a href="{{ url('cancel.order', $orders->id) }}" class="btn btn-warning">Cancel</a>
                        @else
                             <p>No Cancel Option</p>
                        @endif
                    
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
