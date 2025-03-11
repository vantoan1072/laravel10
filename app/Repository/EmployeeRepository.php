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

    public function findById($id)
    {
        $employee = Employees::find($id);
        return $employee;
    }

    public function update($data, $id)
    {
        $employee = Employees::find($id);
        $employee->update(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'position' => $data['position'],
                'department' => $data['department'],
                'salary' => $data['salary'],
                'status' => $data['status'],
            ]
        );
        
    }

    public function searchByKeyword($key)
    {
        $employee = Employees::where('first_name', 'like', '%' . $key . '%')
            ->orWhere('last_name', 'like', '%' . $key . '%')
            ->orWhere('email', 'like', '%' . $key . '%')
            ->orWhere('phone', 'like', '%' . $key . '%')
            ->orWhere('position', 'like', '%' . $key . '%')
            ->orWhere('department', 'like', '%' . $key . '%')
            ->get();

        return $employee;
    }
}