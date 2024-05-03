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
       return view('custom.components.home',[
        'books' => $books,
        'title' => 'Phổ biến',
        'popular' => true
       ]);
    }
    public function store(Request $request){}

}
