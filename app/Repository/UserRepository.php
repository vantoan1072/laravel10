<?php

namespace App\Repository;

use App\Repository\Interface\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        
    }

    public function getAllPaginate()
    {
        return User::paginate(15);
    }

    public function create($data)
    {
        User::addUser($data);
    }

}