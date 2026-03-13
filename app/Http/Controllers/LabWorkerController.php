<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabRequest;
use Illuminate\Support\Facades\DB;

class LabWorkerController extends Controller
{
    public function dashboard()
    {
        $requests = LabRequest::with('patient')
            ->whereDate('created_at', today())
            ->orderByRaw("CASE urgency WHEN 'حرج' THEN 1 WHEN 'مستعجل' THEN 2 WHEN 'عادي' THEN 3 ELSE 4 END")
            ->orderBy('created_at', 'asc')
            ->get();

        $pending = $requests->where('status', 'pending')->count();
        $done    = $requests->where('status', 'done')->count();

        return view('lab_dashboard', compact('requests', 'pending', 'done'));
    }

    public function storeResults(Request $request, $id)
    {
        $rawResults = $request->results ?? [];
        $flatResults = [];

        foreach ($rawResults as $testName => $value) {
            if (is_array($value)) {
                foreach ($value as $indicatorName => $indicatorValue) {
                    $flatResults[$testName . ' — ' . $indicatorName] = $indicatorValue;
                }
            } else {
                $flatResults[$testName] = $value;
            }
        }

        // نستخدم DB::table مباشرة لتجنب مشكلة الـ cast
        DB::table('lab_requests')->where('id', $id)->update([
            'results'    => json_encode($flatResults, JSON_UNESCAPED_UNICODE),
            'lab_notes'  => $request->lab_notes,
            'status'     => 'done',
            'updated_at' => now(),
        ]);

        return back()->with('success', 'تم إرسال النتائج للطبيب ✅');
    }
}