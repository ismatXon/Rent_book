<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index(){

        $book = Book::all();
        $users = User::where('id','!=','1')->where('status','!=','inactive')->get();
        return view('book-rent',['users' => $users , 'book'=>$book]);
    }

    public function store(Request $request){

        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        // dd($request->all());
        $book = Book::findOrFail($request->book_id)->only('status');
        
        if ($book['status'] != 'in stock') {
            Session::flash('message','Cannot rent book, the book is available');
            Session::flash('alert-class','alert-danger');
            return redirect('book-rent');
        }
        else{

            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if($count >=2 ){
                Session::flash('message','Cannot Rent, User has reach limit of book');
                Session::flash('alert-class','alert-danger');
                return redirect('book-rent');
            }else{
                    try {
                    DB::beginTransaction();
                    //proses update book table
                    RentLogs::create($request->all());
                    //proses insert to rent book table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
        
                    Session::flash('message','Rent Book Success!!');
                    Session::flash('alert-class','alert-success');
                    return redirect('book-rent');
        
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook(){
        $users = User::where('id','!=','1')->where('status','!=','inactive')->get();
        $books = Book::all();
        return view('return-book',['users'=>$users,'books'=>$books]);
    }

    public function saveReturnBook(Request $request) {

        //user & book yang dipilih untuk return benar, maka berhasil return book

        //user & book yang dipilih untuk return salah, maka akan muncul error
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)
        ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            Session::flash('message','The book is returned successfully');
            Session::flash('alert-class','alert-success');
            return redirect('book-return');
        }else{
            Session::flash('message','This is error is process');
            Session::flash('alert-class','alert-danger');
            return redirect('book-return');
            
        }

    }
}