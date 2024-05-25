<?php 
namespace App\Repositories;

interface OrderRepositoryInterface{
    function store(array $attr = []);
    function listOrder(int $user_id);
    function store_details(array $attr = []);
    static function listOrderDetail(int $order_id);
    function cancel(int $order_id);
}