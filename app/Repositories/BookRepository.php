<?php 
namespace App\Repositories;

use App\Models\Book;
class  BookRepository implements BookRepositoryInterface{
    
    public function getOne(int $id){
        $book = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->where('books.id','=', $id)->first();
        return $book;
    }

    public function get10(int $id,int $category_id){
        $books = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->orderBy('books.view','DESC')
        ->where('categories.id','=', $category_id)
        ->paginate(10);
        return $books;
    }

    public function paginate(int $limit){
        $books = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->paginate($limit);
        return $books;
    }


    public function search(string $keyword = '', int $limit = 10){
        $books = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->where('books.name','LIKE','%'.$keyword.'%')
        ->paginate($limit);

        return $books;
    }

    public function getBySection(string $name,int $id,int $limit = 10){
        $books = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->orderBy('books.view','DESC')
        ->where('categories.name','=', $name)
        ->where('categories.id','=',$id)
        ->paginate(10);
        return $books;
    }

    public function newBook(int $limit = 10){
        $books = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->orderBy('books.created_at','DESC')
        ->paginate($limit);
        return $books;
    }

    public function orderBy(string $field, string $direction = 'desc',int $limit = 10){
        $books = Book::join('categories','books.category_id','=','categories.id')
        ->select('books.*','categories.name as category')
        ->orderBy($field,$direction)->paginate($limit);
        return $books;
    }
}