<?php

namespace App\Http\Controllers;

use App\Models\bookmodel;
use Illuminate\Http\Request;
use Laravel\Prompts\FormBuilder;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function Add_Author_Book(){
        $book = bookmodel::all();
        return view("author.add_book" , compact('book'));
    }

///dashborad book ///
    public function Show_Book(){
        $book = bookmodel::all();
        return view('author.all_book' , compact('book'));
    }



    ///user book ///

    public function userBooks()
    {
        $book = bookmodel::all(); // dashboard se saved data fetch
        return view('User.book', compact('book'));
    }



   public function Add_Book_Data(Request $request ){
    
        $book = new bookmodel();
        $book->name = $request->name;
        $book->description = $request->description;
        $book->price = $request->price;
        /// cover image ////
        $image = $request->image;
        if($image){
        $imagename = time() .".". $image->getClientOriginalExtension();
        $image->move("book_upload" ,  $imagename);
        $book->image = $imagename;

    
        }       
        /// pdf cover ///
        $pdf = $request->pdf;
        if($pdf){
        $imagename_pdf = time() .".". $pdf->getClientOriginalExtension();
        $pdf->move("book_upload" ,  $imagename_pdf);
        $book->pdf = $imagename_pdf;
        }
        $book->author = Auth::user()->name;
        $book->save();
        return redirect()->back()->with('message' , 'Book Added Successfully');
    }

        public function delete_Book($id){
            $book = bookmodel::find($id);
            $book->delete();
            return redirect()->back()->with('message' , 'Book Deleted Successfully');
        }

        public function Edit_Book($id){
            $book = bookmodel::find($id);
            return view('author.edit_book' , compact('book'));
        }
        public function Update_Book(Request $request , $id){
            $book = bookmodel::find($id);
            $book->name = $request->name;
            $book->description = $request->description;
            $book->price = $request->price;
            /// cover image ////
            $image = $request->image;
            if($image){
            $imagename = time() .".". $image->getClientOriginalExtension();
            $image->move("book_upload" ,  $imagename);
            $book->image = $imagename;  
            }
            /// pdf cover ///
            $pdf = $request->pdf;
            if($pdf){
            $imagename_pdf = time() .".". $pdf->getClientOriginalExtension();
            $pdf->move("book_upload" ,  $imagename_pdf);
            $book->pdf = $imagename_pdf;
            
            }
    
            $book->save();
            return redirect('/all_book')->with('message' , 'Book Updated Successfully');
        }

        public function readPdf($pdf)
{
    $path = public_path('user/pdf/' . $pdf);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
}

}
    
        