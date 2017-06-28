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
                          <h4 class="pull-right"><a href="#">{{ucfirst($product->user->name)}}</a></h4>
                            <h4><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a></h4>
                            <small><p><a href="{{route('product.category',strtolower($product->category->title))}}">{{$product->category->title}}</a></p></small>
                            <h4>{{$product->per_hour}}$ per hour</h4>
                            <h4>{{$product->per_day}}$ per day</h4>
                            <p>{{$product->about}}</p>
                        </div>
                        <br>
                      @if (Auth::user() == $product->user)
                        <button class="btn btn-primary rent-btn">Update</button>
                      @else
                        <button class="btn btn-primary rent-btn" id="rentButton">Rent</button>
                      @endif

                      <div class="form-div">
                        @if (Auth::check())
                          <form method = 'post' action="{{route('product.rent')}}" id='rentForm'>
                            {{ csrf_field() }}
                            <div class="radio-inline">
                              <label><input type="radio" name="type" value="hour" checked>Per hour</label>
                            </div>
                            <div class="radio-inline">
                              <label><input type="radio" name="type" value="day">Per day</label>
                            </div>
                            <div>
                                <label for="amount">For how long would you like to rent?</label>
                                <input id="amountID" type='number' class='form-control' name='amount' min='1' max='100' placeholder='Amount of time' required/>
                            </div><br>
                            <input type="hidden" value="{{$product->user->id}}" name="owner_id">
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <button type='submit' name ='orderButton' class='btn btn-default'>Order</button><br><br>
                            </form>
                          @else
                            <p>You have to be logged in to rent items. Go to <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a>.</p>
                          @endif
                    </div>
                  </div>
                </div>

          </div>

        </div>

    </div>

    <!-- /.container -->

@endsection

@section('scripts')
<script>
$( document ).ready( function() {
  $("#rentForm" ).hide();
	$("#rentButton").click(function(event){
		 	$("#rentForm").toggle(1000);
      if ($("#rentForm").is(':visible')) {
         $("html, body").animate({scrollTop: $("#rentForm").offset().top});
      }
	 });

});
</script>
@endsection
