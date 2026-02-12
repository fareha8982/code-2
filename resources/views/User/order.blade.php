@extends('user.layout');

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-7">

      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h4 class="mb-3">Purchase Form</h4>
          <p class="text-muted small mb-4"></p>
          You are ordering: <strong>{{ $book->name }}</strong><br>
            Price: Rs. <strong>{{ $book->price }}</strong>
          </p>
          <form action="{{ url('/add_order' , $book->id) }}" method="POST">
            @csrf



            <!-- Name -->
            <div class="mb-3">
              <label>Your Name</label>
              <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
            </div>

             <!-- Name -->
            <div class="mb-3">
              <label>Phone Number</label>
              <input name="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}">
            </div>

            <!-- Address -->
            <div class="mb-3">
              <label>Address</label>
              <textarea name="address" class="form-control">{{ Auth::user()->address }}</textarea>
            </div>

            <!-- Payment -->
            <div class="mb-3">
              <label>Payment Method</label>
              <select name="payment_method" class="form-select form-control">

                <option value="EasyPaisa">Easypaisa / JazzCash</option>
                <option value="Card">Credit / Debit Card</option>
              </select>
            </div>

            <button type="submit" class="btn btn-secondary w-100">Confirm Order</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection



