<?php

namespace App\Service;

use App\Service\Interface\UserServiceInterface;
use App\Repository\UserRepository;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepositorys)
    {
        $this->userRepository= $userRepositorys;
    }

    public function paginate()
    {
        $user=$this->userRepository->getAllPaginate();

        return  $user;
    }

    public function create($data)
    {
        
        $this->userRepository->create($data);
    }
}