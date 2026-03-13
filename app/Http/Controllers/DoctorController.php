<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\LabRequest;

class DoctorController extends Controller
{
    public function showPatient(Patient $patient)
    {
        return view('doctor.patient', compact('patient'));
    }

    public function sendToLab(Request $request, Patient $patient)
    {
        $request->validate([
            'tests'   => 'required|array|min:1',
            'urgency' => 'required|string',
        ]);

        LabRequest::create([
            'patient_id'      => $patient->id,
            'doctor_name'     => session('name', 'غير محدد'),
            'requested_tests' => json_encode($request->tests, JSON_UNESCAPED_UNICODE),
            'urgency'         => $request->urgency,
            'notes'           => $request->notes,
            'status'          => 'pending',
            'type'            => 'lab',
        ]);

        return back()->with('success', 'تم إرسال طلب التحاليل إلى المخبر بنجاح ✅');
    }

    public function showResults(LabRequest $labRequest)
    {
        $labRequest->load('patient');

        // نقرأ النتائج مباشرة من JSON
        $results = json_decode($labRequest->results, true) ?? [];

        $requestedTests = is_array($labRequest->requested_tests)
            ? $labRequest->requested_tests
            : json_decode($labRequest->requested_tests, true) ?? [];

        return view('doctor.results', compact('labRequest', 'results', 'requestedTests'));

    }
    public function resultsList()
{
    return view('doctor.results_list');
}
}
