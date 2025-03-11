<?php

namespace App\Repository\Interface;


interface EmployeeRepositoryInterface
{
    public function AddUser($value);
    public function searchByKeyword($key);
    
}