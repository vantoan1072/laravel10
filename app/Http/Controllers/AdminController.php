<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class AdminController extends Controller
{
    //
    public function __construct()
    {

    }

    public function login(Request $request)
    { 
        $request->validate([
            'username' => 'required|string|min:3|max:50',
            'password' => 'required|string|min:6'
        ]);
    
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->route('dashboad.index')->with('Success', '  Login Success');
            
        }
        return back()->withErrors(['username' => 'Invalid login credentials']);
        //return redirect()->route('auth.admin')->with('error', 'Invalid login credentials');
    }

    public function admin()
    {
        if(Auth::id()>0){
            return redirect()->route('dashboad.index');
        }
        return view('admin.login_admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
