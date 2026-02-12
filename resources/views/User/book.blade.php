@extends('User.Layout');




@section('content')

    
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('User/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Book Store <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Book Store</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-4">
          <div class="col-md-10">
          	<!-- <div class="row mb-4">
							<div class="col-md-12 d-flex justify-content-between align-items-center">
								<h4 class="product-select">Select Types of Products</h4>
								<select class="selectpicker" multiple>
				          <option>Audio Books</option>
				          <option>Business Books</option>
				          <option>Children Books</option>
				          <option>Cooking</option>
				          <option>Lifestyles</option>
				          <option>Mystery</option>
				          <option>Romance</option>
				          <option>Science Fiction</option>
				          <option>History</option>
				        </select>
							</div>
						</div> -->
          </div>
        </div>
			</div>
              <div class="container mb-5">
                <form action="{{ url('search_book') }}" method="GET">
                  @csrf
              <div class="row">
                  <div class="col-md-8">
                    <input type="search" class="form-control" placeholder="Search Book Name,Author Name" name="search">
                  </div>
                  <div class="col-md-4">
                    <input type="submit" value="Search" class="btn btn-secondary">
                  </div>
              </div>
              </form>
              </div>


			<div class="container-fluid px-md-5">
    <div class="row">

        @foreach ($book as $b)
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="book-wrap d-lg-flex">

                <div class="img d-flex justify-content-end"
                     style="background-image: url('{{ asset('book_upload/'.$b->image) }}');">
                </div>

                <div class="text p-4">
                    <p class="mb-2">
                        <span class="price">{{ $b->desciption }}</span>
                    </p>

                    <h2>{{ $b->description }}</h2>
                    <span class="position">By {{ $b->author }}</span>


					@if (Auth::id())

					@if ($b->price == 'free')
					<a target="_blank" href="{{ url('public/User/pdfs', $b->pdf) }}" class="btn btn-secondary text-light" >Read / Download</a>
					@else
          <a href="{{ url('/order' , $b->id) }}" class="btn btn-secondary text-light" >Buy Now</a>
					@endif
					@else
          <a href="/login" class="btn btn-secondary " >Continue to login😊</a>
					@endif
                </div>

            </div>
        </div>
        @endforeach

    </div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>


@endsection
