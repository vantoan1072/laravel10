<?php
namespace App\Service\Interface;

interface UserServiceInterface
{

    public function paginate();
    
    public function create($data);
}