<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
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
}
