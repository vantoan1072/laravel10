<?php

namespace App\Service;

use App\Service\Interface\EmployeeServiceInterface;
use App\Repository\EmployeeRepository;

class EmployeeService implements EmployeeServiceInterface
{
    protected $EmployeesRepository;

    public function __construct(EmployeeRepository $EmployeesRepository)
    {
        $this->EmployeesRepository= $EmployeesRepository;
    }

    public function create($data)
    {
        
        $this->EmployeesRepository->addUser($data);
    }

    public function paginate()
    {
        $user=$this->EmployeesRepository->getAllPaginate();

        return  $user;
    }

    public function findById($id)
    {
        return $this->EmployeesRepository->findById($id);
         
    }

    public function update($data, $id)
    {
        $this->EmployeesRepository->update($data, $id);
    }

    public function searchByKeyword($key)
    {
        $this->EmployeesRepository->searchByKeyword($key);
    }
}