<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Message;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc')
                 ->take(10)
                 ->get();
        return view('welcome')->with('categories', $categories)->with('products', $products);
    }

    public function messages()
    {
        $user = Auth::user();
        $messagesReceived = $user->messagesReceived;
        $messagesSent = $user->messagesSent;

        return view('messages')->with('messagesReceived', $messagesReceived)->with('messagesSent', $messagesSent);
    }

    public function messagesUpdate(Request $request)
    {
        $message = Message::find($request->message_id);
        if ($request->type == 'approve'){
          $message->is_aproved = true;
          $message->is_denied = false;
          $message->save();
        }else if($request->type == 'deny'){
          $message->is_aproved = false;
          $message->is_denied = true;
          $message->save();
        }
        else if($request->type == 'cancel'){
          $message->delete();
        }


        return redirect(route('messages'));
    }
}
