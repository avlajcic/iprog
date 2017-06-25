<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Http\Requests\StoreProduct;
use Auth;

class ProductController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth' , ['except' => array('show', 'category')]);
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
    $product->owner_id = Auth::user()->id;

    $product->save();
    return redirect(route('home'));
  }
  public function show($id)
  {
    $product = Product::find($id);
    return view('product')->with('product', $product);
  }
  public function category($category)
  {
    $categoryModel = Category::where('title', ucfirst($category))->first();
    $categories = Category::all();

    return view('category')->with('categories', $categories)->with('products', $categoryModel->products);
  }
}
