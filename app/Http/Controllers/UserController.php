<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Service\UserService; 
use App\Service\EmployeeService;

class UserController extends Controller
{
    //
    protected $EmployeeServices;

    public function __construct(EmployeeService $EmployeeService)
    {
        $this->EmployeeServices = $EmployeeService;
    }

    public function index()
    {
        $Employees = $this->EmployeeServices->paginate();

        $config = $this->config();
        $template = 'user.index';
        return view('dashboad.layout',compact('template','config','Employees'));
    }

    public function config()
    {
        return[
            'js'=>['admin/js/plugins/switchery/switchery.js'],
            'css'=>['admin/css/plugins/switchery/switchery.css'],
        ];
       

    }

    public function form_add()
    {
        $config = $this->config();

        $template = 'user.crud.form_add';
        return view('dashboad.layout',compact('template','config'));
    }

    public function addUsers(request $request)
    {

        // $datas = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
        
        $data = $request->all();
        $this->EmployeeServices->create($data);
        // Khởi tạo dịch vụ người dùng
        $userService = app(UserService::class);
        $userService->create($data);
        $template = 'user.index';
        return view('dashboad.layout',compact('template'));
    }

    public function edit($id)
    {
        $config = $this->config();
        $Employee = $this->EmployeeServices->find($id);
        $template = 'user.crud.form_edit';
        return view('dashboad.layout',compact('template','config','Employee'));
    }

    public function update(request $request,$id)
    {
        $data = $request->all();
        $this->EmployeeServices->update($data,$id);
        $template = 'user.index';
        return view('dashboad.layout',compact('template'));
    }

    public function delete($id)
    {
        $this->EmployeeServices->delete($id);
        $template = 'user.index';
        return view('dashboad.layout',compact('template'));
    }

}
