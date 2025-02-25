<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use app\Models\Employees;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'employee_id',
        'username',
        'password',
        'role',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public static function addUser($data)
    {

        $employee = Employees::where('email', $data['email'])->first();

        // Assuming you have a User model and it has a relationship with Employees
        $username = strtolower($data['first_name'].''.$data['last_name']);
        $password = bcrypt($username); // You can change 'default_password' to any default password you prefer

        return self::create([
            'employee_id' => $employee['id'], // Set this to the appropriate value if needed
            'username' => $username,
            'password' => $password,
            'role' => 'Employee', // Set this to the appropriate role if needed
        ]);
    }
}
