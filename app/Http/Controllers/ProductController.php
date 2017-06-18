<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function create()
  {
      $categories = Category::all();
      return view('create')->with('categories', $categories);
  }

  public function store(StoreProduct $request)
  {
    $product = new Product;
    $product->title = $request->title;
    $product->about = $request->about;
    $product->per_hour = $request->per_hour;
    $product->per_day = $request->per_day;
    $product->image_link = $request->image_link;
    $product->category_id = $request->category;

    $product->save();
    return redirect(route('home'));
  }
}
