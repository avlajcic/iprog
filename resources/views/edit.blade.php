@extends('layouts.app')
@section('style')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-10  col-md-offset-1">

              <h1>Edit product</h1>
      				<form action="{{ route('product.store') }}" method="post"  enctype="multipart/form-data">
      					 	{{ csrf_field() }}
      						<div class="form-group">
      							<label for="title">Title:</label>
      							<input type="text" class="form-control" name ="title" required value="{{$product->title}}">
      						</div>

      						<div class="form-group">
      							<label for="about">About:</label>
      							<textarea class="form-control" rows="5" name="about" required>{{$product->about}}</textarea>
      						</div>

                  <div class="form-group">
      							<label for="per_hour">Price per hour:</label>
      							<input type="number" step="0.01" class="form-control" name="per_hour" placeholder="0.00" required value="{{$product->per_hour}}"></input>
      						</div>

                  <div class="form-group">
                    <label for="per_day">Price per day:</label>
                    <input type="number" step="0.01" class="form-control" name="per_day" placeholder="0.00" required value="{{$product->per_day}}"></input>
                  </div>

                  <div class="form-group">
                    <label for="image">Product image:</label>
                    <input type="file" name="image" class="form-control"></input>
                  </div>

                  <div class="form-group">
                    <label for="category">Select product caregory:</label>
                    <select class="form-control" name="category" required>
                      @foreach ($categories as $category)
                        <option
						@if ($category == $product->category)
						selected="selected"
						@endif
						value="{{$category->id}}">{{$category->title}}</a>
                      @endforeach
                    </select>
                  </div>
				  <input type="hidden" name="product_id" value="{{ $product->id}}">
      						<br>
      						<input type="submit" class="btn btn-info" value="Update">
      				</form>
      				@if (count($errors) > 0)
                  <br>
      				    <div class="alert alert-danger">
      				        <ul>
      				            @foreach ($errors->all() as $error)
      				                <li>{{ $error }}</li>
      				            @endforeach
      				        </ul>
      				    </div>
      				@endif

            </div>

        </div>

    </div>
    <!-- /.container -->

@endsection
