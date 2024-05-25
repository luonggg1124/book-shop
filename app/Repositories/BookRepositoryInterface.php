<?php
namespace App\Repositories;

interface BookRepositoryInterface{
    public function paginate(int $limit);
    public function getOne(int $id);

    public function search(string $keyword = '', int $limit = 10);

    public function get10(int $id,int $category_id);

    public function getBySection(string $name,int $id,int $limit = 10);

    public function newBook(int $limit = 10);

    public function orderBy(string $field,string $direction = 'desc',int $litmit = 10);
    
}
