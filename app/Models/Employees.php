<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'last_name ',
        'email',
        'phone',
        'hire_date',
        'department_id',
        'position_id',
        'salary',
        'status',
    ];


    public static function addUser($value)
    {
         self::insert(
            [
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'hire_date' => $value['hire_date'],
                'department_id' => $value['department_id'],
                'position_id' => $value['position_id'],
                'salary' => $value['salary'],
                'status' => $value['status'],
                'created_at' => now(),
            ]
         );
    }
}
