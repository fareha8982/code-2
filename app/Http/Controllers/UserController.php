<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\bookmodel;
use App\Models\Essay;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view("User.index");
    }
    public function about(){
        return view("User.about");
    }
    public function book(){
        return view("User.book");
    }
    public function blog(){
        return view("User.blog");
    }
    
    public function contact(){
        return view("User.contact");
    }
    

    public function search_book(Request $request)
    {
        $search = $request->search;
        $book = bookmodel::where('name', 'LIKE', '%'.$search.'%')->get();
        return view('User.book', compact('book'));
    }

    public function order($id)
    {
        $book = bookmodel::find($id);
        return view("User.order" , compact('book'));
    }

    public function add_order(Request $request , $id)
    {

        $order = new order();
        $book = bookmodel::find($id);
        $order->user_name = Auth::user()->name;
        $order->user_address = Auth::user()->address;
        $order->user_phone = Auth::user()->phone;
        $order->book_name = $book->name;
        $order->payment_method = $request->payment_method;
        $order->payment_status = "pending";
        $order->save();
        return redirect('/dashboard');


    }
    public function competition()
{
    return view('User.competition');
}

public function submitEssay(Request $request)
{
    $request->validate([
        'essayTitle'    => 'required',
        'selectedTopic' => 'required',
        'essayContent'  => 'required',
    ]);

    Essay::create([
        'title'   => $request->essayTitle,
        'topic'   => $request->selectedTopic,
        'content' => $request->essayContent,
    ]);

    return redirect()->route('competition')
        ->with('success', 'Essay Submitted Successfully!');
}


    public function book_history(){
        if(Auth::id()){
            $user=Auth::user();
            $order=order::where('user_name',$user->name)->get();
        }
        return view('User.read-books', compact('order'));
    }

    public function cancelOrder($id){
        $order = order::find($id);
        $order->delete();
    
        return redirect()->back()->with('message', 'Order Cancelled Successfully');
    }
}


