<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض لوحة التحكم Admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // حفظ مستخدم جديد من Admin
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'role'=>'required|in:admin,user'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);

        return back()->with('success','تم إنشاء المستخدم بنجاح');
    }
}
