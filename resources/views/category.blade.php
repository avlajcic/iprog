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
                      <a href="{{route('product.category',strtolower($category->title))}}" class="list-group-item">{{$category->title}}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">

                  @for ($i = 0; $i < count($products); $i++)
                    @if ($i % 2 == 0)
                      @if ($i != 0)
                        </div>
                      @endif
                      <div class="row">
                    @endif
                    <div class="col-xs-6">
                        <div class="thumbnail">
                            <img src="{{$products[$i]->image_link}}" alt="{{$products[$i]->title}}" class="img-responsive" style="max-height:165px">
                            <div class="caption">
                                <h4><a href="{{route('product.show', $products[$i]->id)}}">{{$products[$i]->title}}</a></h4>
                                <h4>{{$products[$i]->per_hour}}$/h</h4>
                                <p>{{substr($products[$i]->about,0,50)}}...</p>
                                <p><a href="/{{strtolower($products[$i]->category->title)}}">{{$products[$i]->category->title}}</a></p>
                            </div>
                        </div>
                    </div>
                  @endfor
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

@endsection
