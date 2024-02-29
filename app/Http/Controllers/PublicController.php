<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request){
        $category = Category::all();

        if ($request->category || $request->title) {
            $book = Book::where('title' ,'like' ,'%'.$request->title.'%')
            ->orwhereHas('categories', function($q) use($request) {
            $q->where('categories.id', $request->category);
            })
            ->get();
        }
        else {
            $book = Book::all();
        }

        return view('book-list',['book'=>$book , 'category'=>$category ]);
    }
}
