<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate(['text' => 'required|string|max:300']);

        Announcement::create([
            'text'      => $request->text,
            'category'  => $request->category ?? 'gen',
            'is_active' => true,
        ]);

        return back()->with('success', 'تم إضافة الإعلان بنجاح ✅');
    }

    public function toggle($id)
    {
        $ann = Announcement::findOrFail($id);
        $ann->update(['is_active' => !$ann->is_active]);
        return back()->with('success', $ann->is_active ? 'تم تفعيل الإعلان' : 'تم إيقاف الإعلان');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['text' => 'required|string|max:300']);
        Announcement::findOrFail($id)->update(['text' => $request->text]);
        return back()->with('success', 'تم تعديل الإعلان ✅');
    }

    public function destroy($id)
    {
        Announcement::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الإعلان 🗑');
    }
}