<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    public function index(){
        $books = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->paginate(10);
        return view('custom.pages.home',[
            'books' => $books
        ]);
    }

    public function search(Request $request){
        $keyword = $request->query('q');
        $books = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->where('books.name','LIKE','%'.$keyword.'%')
                    ->paginate(10);
                    config(['app.title' => $keyword]);
        return view('custom.pages.home',[
                'books' => $books
        ]);
    }

    public function popular(){
       $books = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->orderBy('books.view','DESC')->paginate(10);;
       config(['app.title' => 'Phổ biến']);
       return view('custom.pages.home',[
        'books' => $books,
       
        'popular' => true
       ]);
    }

    public function new(){
        $books = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->orderBy('books.created_at','DESC')
                    ->paginate(10);;
        config(['app.title' => 'Mới nhất']);
        return view('custom.pages.home',[
        'books' => $books,
        'title' => 'Mới nhất',
        'new' => true
       ]);
    }

    public function low_to_high_price(){
        $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->orderBy('books.price','ASC')->paginate(10);;
        config(['app.title' => 'Giá thấp đến cao']);
        return view('custom.pages.home',[
        'books' => $books,
        'title' => 'Mới nhất',
        
       ]);
    }
    public function high_to_low_price(){
        $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->orderBy('books.price','DESC')->paginate(10);;
        config(['app.title' => 'Giá cao đến thấp']);
        return view('custom.pages.home',[
        'books' => $books,
        'title' => 'Mới nhất',
       
       ]);
    }

    public function details(string $name,int $id){
        $book = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->where('books.id','=', $id)->first();

        config(['app.title' => $name.' | '. $book->category]);

        $comments = DB::table('comments')
                        ->join('users','comments.user_id','=','users.id')
                        ->select('comments.*','users.name as user_name')
                        ->where('comments.book_id','=', $id)
                        ->orderBy('comments.created_at','DESC')
                        ->paginate(10)
                        ;
       
    
        $top10 = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->orderBy('books.view','DESC')
                    ->where('categories.id','=', $book->category_id)
                    ->paginate(10);
        return view('custom.pages.book',[
            'book'=> $book,
            'comments' => $comments,
            'top10' => $top10
        ]);
    }

    public function books_by_section(string $name){
        $books = DB::table('books')
                    ->join('categories','books.category_id','=','categories.id')
                    ->select('books.*','categories.name as category')
                    ->orderBy('books.view','DESC')
                    ->where('categories.name','=', $name)
                    ->paginate(10);
        config(['app.title' => $name]);
        return view('custom.pages.home',[
            'books' => $books,        
            'category_name' => $name
        ]);
    }

    
}
