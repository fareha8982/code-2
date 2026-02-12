<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Essay;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Catergory;


class AuthorController extends Controller
{

    public function Add_Author(){
        return view("Admin.add_auth");
    }

    public function All_Author()
    {
        $authors = User::all();
        return view('Admin.all_auth' , compact("authors"));
    }


public function Add_Author_data(Request $request)
{
    $author = new User();

    $image = $request->image;
    $imagename = time().".".$image->getClientOriginalExtension();
    
    $image->move(public_path('authors/img'), $imagename);
    $author->image = $imagename;

    $author->name = $request->name;
    $author->email = $request->email;
    $author->phone = $request->phone; // ⭐ REQUIRED
    $author->password = bcrypt($request->password);
    $author->address = $request->address;
    $author->user_role = 1;

    $author->save();

    return redirect()->back()->with('message','Author Added successfully');
}

    public function Show_oders(){
        $order = order::all();
        return view('Admin.show_order' , compact('order'));
    }


    public function order_app($id){
        $order = order::find($id);
        $order->payment_status = "Approved";
        $order->save();
        return redirect()->back();

    }

    public function order_can($id){
        $order = order::find($id);
        $order->delete();
    
        return redirect()->back();

    }

    public function order_ret($id){
        $order = order::find($id);
        $order->payment_status = "Returned";
        $order->save();
        return redirect()->back();

    }
    public function order_apl($id){
        $order = order::find($id);
        $order->payment_status = "Applied";
        $order->save();
        return redirect()->back();
    }

     // Delete Author


  
    public function Delete_Author($id){
        $author = User::find($id);
        $author->delete();
        return redirect()->back()->with('message','Author Deleted Successfully');
    } 

     // Edit Author
    public function edit_author($id)
    {
        $author = User::find($id);
        return view('Admin.edit_author', compact('author'));
    }

    // Update Author
    public function update_author(Request $request, $id)
    {
        $author = User::find($id);

        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('author_image', $imagename);
            $author->image = $imagename;
        }

        $author->save();

        return redirect('/all_auth')->with('message', 'Author Updated Successfully');
    }

    public function show_competition(){
        $essays = Essay::all();
        return view('Admin.show_competition', compact('essays'));
    }




}

