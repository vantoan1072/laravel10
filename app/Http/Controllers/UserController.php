<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
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
        $Employee = $this->EmployeeServices->findById($id);
        $employeeData = json_encode($Employee);

        $template = 'user.crud.form_edit';
        return view('dashboad.layout',compact('template','config','employeeData'));
    }

    public function update(request $request,$id)
    {
        
        \Log::info('Request data:', $request->all());
        //  $request->validate([
        //                 'first_name' => 'required|string|max:255',
        //                 'last_name' => 'required|string|max:255',
        //                 'email' => 'required|email',
        //                 'phone' => 'nullable|numeric',
        //                 'status' => 'required|in:1,2',
        //                 'department_id' => 'required|integer',
        //                 'position_id' => 'required|integer',
        //                 'salary' => 'nullable|numeric',
        //                 ]);
        $employee = $this->EmployeeServices->findById($id);
        
        if (!$employee) {
        return back()->with('error', 'User not found.');
        }
        $this->EmployeeServices->update($request, $id);
        return response()->json(['message' => 'Employee updated successfully']);
        // Nếu không có thay đổi thì thông báo rồi trả lại trang trước
    }

    public function searchByKeyword(Request $request)
    {
        
        $query = $request->query('query');
        $employees = Employees::where('first_name', 'like', "%$query%")
                        ->orWhere('last_name', 'like', "%$query%")
                        ->orWhere('email', 'like', "%$query%")
                        ->get();
        //dd($employees);
        return response()->json($employees);
        // $keyword = $request->get('keyword');
        // dd($keyword);
        // $Employees = $this->EmployeeServices->searchByKeyword($keyword);
        // $config = $this->config();
        // $template = 'user.index';
        // return view('dashboad.layout',compact('template','config','Employees'));
    }

    public function delete($id)
    {
        $this->EmployeeServices->delete($id);
        $template = 'user.index';
        return view('dashboad.layout',compact('template'));
    }


}
