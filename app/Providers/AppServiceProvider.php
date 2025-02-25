<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public  $Bindings =[
        'app\Service\Interface\UserServiceInterface' => 'app\Service\UserService',
        'app\Repository\Interface\UserRepositoryInterface' => 'app\Repository\UserRepository',
        'app\Service\Interface\EmployeeServiceInterface' => 'app\Service\EmployeeService',
        'app\Repository\Interface\EmployeeRepositoryInterface' => 'app\Repository\EmployeeRepository',
    ];  

    public function register(): void
    {
        //
        foreach($this->Bindings as $k => $v)
        {
            $this->app->bind($k,$v);
        }
        //$this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);
    }
}
