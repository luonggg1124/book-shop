<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){

    }

    public function popular(){
       $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->orderBy('books.view','DESC')->paginate(10);;
       config(['app.title' => 'Phổ biến']);
       return view('custom.components.home',[
        'books' => $books,
       
        'popular' => true
       ]);
    }

    public function new(){
        $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->orderBy('books.created_at','DESC')->paginate(10);;
        config(['app.title' => 'Mới nhất']);
        return view('custom.components.home',[
        'books' => $books,
        'title' => 'Mới nhất',
        'new' => true
       ]);
    }

    public function low_to_high_price(){
        $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->orderBy('books.price','ASC')->paginate(10);;
        config(['app.title' => 'Giá thấp đến cao']);
        return view('custom.components.home',[
        'books' => $books,
        'title' => 'Mới nhất',
        
       ]);
    }
    public function high_to_low_price(){
        $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->orderBy('books.price','DESC')->paginate(10);;
        config(['app.title' => 'Giá cao đến thấp']);
        return view('custom.components.home',[
        'books' => $books,
        'title' => 'Mới nhất',
       
       ]);
    }

}
