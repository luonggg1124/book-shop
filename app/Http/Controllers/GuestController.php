<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Comment;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Http\Request;



class GuestController extends Controller
{
    protected $bookRepository;
    public function __construct(BookRepositoryInterface $bookRepository){
        $this->bookRepository = $bookRepository;
    }
    public function index(){
        $books = $this->bookRepository->paginate(10);            
        return view('custom.pages.home',[
            'books' => $books
        ]);
    }

    public function search(Request $request){
        $keyword = $request->query('q');
        $books = $this->bookRepository->search($keyword);
                    config(['app.title' => $keyword]);
        return view('custom.pages.home',[
                'books' => $books
        ]);
    }

    public function popular(){
       $books = $this->bookRepository->orderBy('books.view');
       config(['app.title' => 'Phổ biến']);
       return view('custom.pages.home',[
        'books' => $books,
       
        'popular' => true
       ]);
    }

    public function new(){
        $books = $this->bookRepository->newBook();
        config(['app.title' => 'Mới nhất']);
        return view('custom.pages.home',[
        'books' => $books,
        'title' => 'Mới nhất',
        'new' => true
       ]);
    }

    public function low_to_high_price(){
        $books = $this->bookRepository->orderBy('books.promotional_price','asc');
        config(['app.title' => 'Giá thấp đến cao']);
        return view('custom.pages.home',[
        'books' => $books,
        'title' => 'Mới nhất',
        
       ]);
    }
    public function high_to_low_price(){
        $books = $this->bookRepository->orderBy('books.promotional_price');
        config(['app.title' => 'Giá cao đến thấp']);
        return view('custom.pages.home',[
        'books' => $books,
        'title' => 'Mới nhất',
       
       ]);
    }

    public function details(string $name,int $id){
        if(isset(auth()->user()->id)){
            $bookModel = Book::find($id);
            $bookModel->view = $bookModel->view+1;
            $bookModel->save();
        }
        
        $book = $this->bookRepository->getOne($id);    
        config(['app.title' => $name.' | '. $book->category]);
        $comments = Comment::getComments($id);
        $top10 = $this->bookRepository->get10($id,$book->category_id);
        return view('custom.pages.book',[
            'book'=> $book,
            'comments' => $comments,
            'top10' => $top10
        ]);
    }

    public function books_by_section(string $name,int $id){
        $books = $this->bookRepository->getBySection($name,$id);
        config(['app.title' => $name]);
        return view('custom.pages.home',[
            'books' => $books,        
            'category_name' => $name
        ]);
    }

    
}
