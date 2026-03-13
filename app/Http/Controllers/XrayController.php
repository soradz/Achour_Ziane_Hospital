<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XrayRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class XrayController extends Controller
{
    public function xray(Patient $patient)
    {
        return view('xray.request', compact('patient'));
    }

    public function sendRequest(Request $request, Patient $patient)
    {
        $request->validate([
            'body_part' => 'required|string',
            'urgency'   => 'required|string',
        ]);

        XrayRequest::create([
            'patient_id'  => $patient->id,
            'doctor_name' => $request->input('doctor_name') ?: session('name') ?: 'غير محدد',
            'body_part'   => $request->body_part,
            'side'        => $request->side,
            'notes'       => $request->notes,
            'urgency'     => $request->urgency,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'تم إرسال طلب الأشعة');
    }

    public function dashboard()
    {
        $requests = XrayRequest::with('patient')
            ->orderByRaw("CASE urgency WHEN 'حرج' THEN 1 WHEN 'مستعجل' THEN 2 WHEN 'عادي' THEN 3 ELSE 4 END")
            ->orderBy('created_at','asc')
            ->get();

        $pending = $requests->where('status','pending')->count();
        $done    = $requests->where('status','done')->count();

        return view('xray.dashboard', compact('requests','pending','done'));
    }

    public function storeResults(Request $request, $id)
    {
        $xray = XrayRequest::findOrFail($id);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('xrays', 'public');
        }

        DB::table('xray_requests')->where('id', $id)->update([
            'report'     => $request->report,
            'image_path' => $imagePath ?? $xray->image_path,
            'status'     => 'done',
            'updated_at' => now(),
        ]);

        return back()->with('success', 'تم إرسال نتيجة الأشعة للطبيب');
    }

    public function resultsList(Request $request)
    {
        if ($request->has('back')) { session(['xray_results_back' => $request->back]); }
        return view('xray.results_list');
    }

    public function showResults(XrayRequest $xrayRequest)
    {
        $xrayRequest->load('patient');
        return view('xray.results_show', compact('xrayRequest'));
    }
}