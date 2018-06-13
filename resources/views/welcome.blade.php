@extends('layouts.app')
@section('style')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    @foreach ($categories as $category)
                      <a href="{{route('product.category',$category->id)}}" class="list-group-item">{{$category->title}}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @for ($i = 0; $i < (count($products) < 3 ? count($products) : 3); $i++)							
                                  <div class="item {!! ($i == 0) ? 'active': '' !!}">
                                    <div class="crop">
                                      <a href="{{route('product.show', $products[$i]->id)}}">
                                        <img class="slide-image" src="images/{{$products[$i]->image_link}}" alt="{{$products[$i]->title}}">
                                      </a>
                                    </div>
                                  </div>
                                @endfor
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                  @for ($i = 0; $i < count($products); $i++)
                    @if ($i % 4 == 0)
                      @if ($i != 0)
                        </div>
                      @endif
                      <div class="row">
                    @endif
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="thumbnail">
                            <img src="images/{{$products[$i]->image_link}}" alt="{{$products[$i]->title}}" class="img-responsive" style="max-height:165px">
                            <div class="caption">
                                <h4><a href="{{route('product.show', $products[$i]->id)}}">{{$products[$i]->title}}</a></h4>
                                <h4>{{$products[$i]->per_hour}}$/h</h4>
                                <p>{{substr($products[$i]->about,0,50)}}...</p>
                                <p><a href="{{route('product.category',strtolower($products[$i]->category->title))}}">{{$products[$i]->category->title}}</a></p>
                            </div>
                        </div>
                    </div>
                  @endfor
                </div>		
				{{$products->render()}}
            </div>
			
        </div>

    </div>
    <!-- /.container -->

@endsection
