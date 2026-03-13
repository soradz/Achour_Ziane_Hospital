<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Announcement;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        if (!$request->session()->has('user_id') || session('role') !== 'admin') {
            return redirect('/login');
        }

        $today = date('Y-m-d');
        $todayMedicalCount  = Patient::where('section', 'medical')->whereDate('created_at', $today)->count();
        $todaySurgicalCount = Patient::where('section', 'surgical')->whereDate('created_at', $today)->count();
        $totalMedicalCount  = Patient::where('section', 'medical')->count();
        $totalSurgicalCount = Patient::where('section', 'surgical')->count();
        $latestPatients     = Patient::orderBy('created_at', 'desc')->take(5)->get();
        $announcements      = Announcement::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact(
            'todayMedicalCount', 'todaySurgicalCount',
            'totalMedicalCount', 'totalSurgicalCount',
            'latestPatients', 'announcements'
        ));
    }

    public function createUser(Request $request)
    {
        if (!$request->session()->has('user_id') || session('role') !== 'admin') {
            return redirect('/login');
        }
        return view('admin.create_user');
    }

    public function storeUser(Request $request)
    {
        if (!$request->session()->has('user_id') || session('role') !== 'admin') {
            return redirect('/login');
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
            'role'     => 'required|in:admin,doctor,lab_worker,xray_worker',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        $roleNames = [
            'admin'       => 'أدمن',
            'doctor'      => 'طبيب',
            'lab_worker'  => 'عامل مخبر',
            'xray_worker' => 'عامل أشعة',
        ];

        return redirect()->route('admin.dashboard')
            ->with('success', 'تم إنشاء حساب ' . ($roleNames[$request->role] ?? '') . ' بنجاح!');
    }

    public function users(Request $request)
    {
        if (!$request->session()->has('user_id') || session('role') !== 'admin') {
            return redirect('/login');
        }
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }
}