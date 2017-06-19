@extends('layouts.app')
@section('style')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-9 col-md-offset-2">
                <div class="row">
                    <div class="thumbnail">
                        <img src="{{$product->image_link}}" alt="" class="img-responsive">
                        <div class="caption" style="height:auto">
                            <h4><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a></h4>
                            <small><p><a href="/{{strtolower($product->category->title)}}">{{$product->category->title}}</a></p></small>
                            <h4>{{$product->per_hour}}$ per hour</h4>
                            <h4>{{$product->per_day}}$ per day</h4>
                            <p>{{$product->about}}</p>
                        </div>
                      <button class="btn btn-primary rent-btn">Rent</button>

                    </div>
                </div>

          </div>

        </div>

    </div>

    <!-- /.container -->

@endsection
