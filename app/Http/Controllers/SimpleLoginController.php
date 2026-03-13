<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SimpleLoginController extends Controller
{
    public function showLogin()
    {
        if (Session::get('user_id')) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'الإيميل أو كلمة السر غير صحيحة');
        }

        Session::put('user_id', $user->id);
        Session::put('role',    $user->role);
        Session::put('name',    $user->name);
        Session::put('show_splash', true);

        // توجيه حسب الدور
        if ($user->role === 'lab_worker') {
            return redirect()->route('lab.worker.dashboard');
        }

        if ($user->role === 'xray_worker') {
            return redirect()->route('xray.dashboard');
        }

        return redirect()->route('home')
                         ->with('success', 'تم تسجيل الدخول كـ ' . $user->role . ' | ' . $user->name);
    }

    public function home()
    {
        if (!Session::get('user_id')) {
            return redirect()->route('login');
        }

        return view('home');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}