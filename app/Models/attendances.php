<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'employee_id',
        'check_in ',
        'check_out',
        'total_hours',
    ];
}
