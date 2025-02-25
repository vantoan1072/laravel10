<?php

namespace App\Repository;

use App\Repository\Interface\EmployeeRepositoryInterface;
use App\Models\Employees;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function __construct()
    {
        
    }
    public function getAllPaginate()
    {
        return Employees::paginate(15);
    }

    public function addUser($data)
    {
     Employees::addUser($data);
    }

    public function find($id)
    {
        $employee = Employees::find($id);
        return $employee;
    }
}