<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;

Route::get('/', [UserController::class, 'index'])->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
       if(Auth::id()){
        if(Auth::user()->user_role == '0'){
            return view('User.dashboard');
       }
       elseif(Auth::user()->user_role == '1'){
        return view('author.index');
       }
       else{
        return view('Admin.index');
       }
    }
    })->name('dashboard');
});



///admin routes///




Route::get('/category', [AuthorController::class, 'Add_Category']);

Route::post('/add_category', [AuthorController::class, 'Add_Category_data']);



Route::get('/add_author', [AuthorController::class, 'Add_Author']);

Route::post('/add_author', [AuthorController::class, 'Add_Author_data']);

Route::get('/all_auth', [AuthorController::class, 'All_Author']);

Route::get('/delete_author/{id}', [AuthorController::class, 'Delete_Author']);

Route::get('/edit_author/{id}', [AuthorController::class, 'edit_author']);

Route::post('/update_author/{id}', [AuthorController::class, 'update_author']);

Route::get('/show_order' , [AuthorController::class, 'Show_oders']);

Route::get('/order_app/{id}' , [AuthorController::class, 'order_app']);

Route::get('/order_can/{id}' , [AuthorController::class, 'order_can']);

Route::get('/order_ret/{id}' , [AuthorController::class, 'order_ret']);

Route::get('/order_apl/{id}' , [AuthorController::class, 'order_apl']);

Route::get('/show_competition' , [AuthorController::class, 'show_competition']);

Route::get('/admin/competition', [AuthorController::class, 'show_competition'])->name('admin.competition');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});









//// author routes //


Route::get('/add_book', [BookController::class, 'Add_Author_Book']);

Route::post('/add_book' , [BookController::class, 'Add_Book_Data']);

Route::get('/all_book', [BookController::class, 'Show_Book']);

Route::get('/user-book', [BookController::class, 'userBooks']);

Route::get('/delete_book/{id}' , [BookController::class, 'Delete_Book']);

Route::get('/edit_book/{id}' , [BookController::class, 'Edit_Book']);

Route::post('/update_book/{id}' , [BookController::class, 'Update_Book']);

Route::get('/book_pdf/{pdf}', [BookController::class, 'readPdf']);






//// userr routes ///


Route::get('/index', [UserController::class, 'index']);

Route::get('/about', [UserController::class, 'about']);

Route::get('/book', [UserController::class, 'book']);

Route::get('/blog', [UserController::class, 'blog']);

Route::get('/competition', [UserController::class, 'competition'])->name('competition');

Route::post('/competition/submit', [UserController::class, 'submitEssay'])->name('competition.submit');

Route::get('/contact', [UserController::class, 'contact']);

Route::get('/order/{id}' , [UserController::class, 'order']);

Route::post('/add_order/{id}', [UserController::class, 'add_order']);

Route::get('/search_book', [UserController::class, 'search_book']);

Route::get('/book_history', [UserController::class, 'book_history']);

Route::get('/cancel.order/{id}', [UserController::class, 'cancelOrder']);


Route::get('/read-books', [UserController::class, 'book_history'])->name('read-books');


Route::get('/verify-otp', [OtpController::class, 'show'])->name('otp.verify');
Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify.submit');