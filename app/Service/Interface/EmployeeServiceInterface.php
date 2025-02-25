<?php
namespace App\Service\Interface;

interface EmployeeServiceInterface
{
    public function paginate();
    public function create($data);
    public function find($id);
    
}