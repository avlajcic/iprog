<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Message;
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

	if ($request->product_id){
		$product = Product::find($request->product_id);
		if ($request->image != null) {
			unlink('images/' . $product->image_link);
			$imageName = time().'.'.$request->image->getClientOriginalExtension();
			$request->image->move(public_path('images'), $imageName);
			$product->image_link = $imageName;
		}
	}else{
		$product = new Product;
		$imageName = time().'.'.$request->image->getClientOriginalExtension();
		$request->image->move(public_path('images'), $imageName);
		$product->image_link = $imageName;
    }
	$product->title = $request->title;
    $product->about = $request->about;
    $product->per_hour = $request->per_hour;
    $product->per_day = $request->per_day;
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
    $categoryModel = Category::find($category);
    $categories = Category::all();

    return view('category')->with('categories', $categories)->with('products', $categoryModel->products);
  }

  public function rent(Request $request)
  {
    $message = new Message;
    $message->sender = Auth::user()->id;
    $message->receiver = $request->owner_id;
    $message->product_id = $request->product_id;
    if ($request->type == 'hour'){
      $message->per_hour = true;
      $message->per_day = false;
    } else {
      $message->per_hour = false;
      $message->per_day = true;
    }
    $message->amount = $request->amount;
    $message->amount = $request->amount;
    $message->amount = $request->amount;

    $from = new \DateTime($request->from);
    $to =  new \DateTime($request->to);
    if ($to < $from){
      $temp = $from;
      $from = $to;
      $to = $temp;
    }
    $message->from = $from;
    $message->to = $to;

    $message->save();
    return redirect(route('home'));
  }

  public function products($id)
  {
    $products = Product::where('owner_id', $id)->paginate(10);
	$categories = Category::all();

    return view('products')->with('categories', $categories)->with('products', $products);
  }


  public function edit($id)
  {
    $product = Product::find($id);
	$categories = Category::all();

	if ($product->user != Auth::user()){
	    return redirect(route('home'));
	}
    return view('edit')->with('product', $product)->with('categories', $categories);
  }
}
