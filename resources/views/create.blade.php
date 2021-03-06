@extends('layouts.app')
@section('style')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-10  col-md-offset-1">

              <h1>New product</h1>
      				<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
      					 	{{ csrf_field() }}
      						<div class="form-group">
      							<label for="title">Title:</label>
      							<input type="text" class="form-control" name ="title" required>
      						</div>

      						<div class="form-group">
      							<label for="about">About:</label>
      							<textarea class="form-control" rows="5" name="about" required></textarea>
      						</div>

                  <div class="form-group">
      							<label for="per_hour">Price per hour:</label>
      							<input type="number" step="0.01" class="form-control" name="per_hour" placeholder="0.00" required></input>
      						</div>

                  <div class="form-group">
                    <label for="per_day">Price per day:</label>
                    <input type="number" step="0.01" class="form-control" name="per_day" placeholder="0.00" required></input>
                  </div>

                  <div class="form-group">
                    <label for="per_day">Product image:</label>
                    <input type="file" name="image" class="form-control" required></input>
                  </div>

                  <div class="form-group">
                    <label for="category">Select product caregory:</label>
                    <select class="form-control" name="category" required>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</a>
                      @endforeach
                    </select>
                  </div>

      						<br>
      						<input type="submit" class="btn btn-info" value="Publish">
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
