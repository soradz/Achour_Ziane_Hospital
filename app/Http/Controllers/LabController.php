<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\LabRequest;

class LabController extends Controller
{
    // مكتب الفحوصات 1 (تابع للقسم الطبي)
    public function one()
    {
        $patients = Patient::where('section', 'medical')->get();
        return view('lab.one', compact('patients'));
    }
// مكتب الفحوصات 2 (تابع للقسم الجراحي)
public function two()
{
    $patients = Patient::where('section', 'surgical')->get();

    return view('lab.two', compact('patients'));
}

    // صفحة المخبر لكل مريض
   public function lab(Patient $patient)
{
    $requests = LabRequest::where('patient_id', $patient->id)
                          ->with('patient')
                          ->get();

    return view('lab.lab_index', compact('patient', 'requests'));
}
    // 🌟 صفحة المخبر العامة لكل العاملين (قائمة الانتظار)
    public function labIndex()
    {
        $requests = LabRequest::where('type', 'lab')
                              ->whereIn('status', ['pending', 'processing', 'completed'])
                              ->with('patient')
                              ->get();

        return view('lab.lab_index_all', compact('requests'));
    }

    // بدء التحليل
    public function startAnalysis(LabRequest $labRequest)
    {
        $labRequest->status = 'processing';
        $labRequest->save();

        return back()->with('success','تم بدء التحليل');
    }

    // حفظ نتائج التحاليل
    public function saveResults(Request $request, LabRequest $labRequest)
    {
        $labRequest->results = $request->results;
        $labRequest->status = 'completed';
        $labRequest->save();

        return back()->with('success','تم حفظ النتائج');
    }

    // إرسال النتائج للطبيب
    public function sendToDoctor(LabRequest $labRequest)
    {
        $labRequest->status = 'sent';
        $labRequest->save();

        return back()->with('success','تم إرسال النتائج للطبيب');
    }

    // صفحة الأشعة لكل مريض
   public function xray(Patient $patient)
{
    return view('lab.xray_index', compact('patient'));
}

    // 🌟 الغرف المختلفة لكل مريض (مكتب الفحوصات 1)
    public function treatmentRoom(Patient $patient)
    {
        return view('rooms.room', ['patient' => $patient, 'roomName' => 'غرفة العلاج']);
    }

    public function childrenRoom(Patient $patient)
    {
        return view('rooms.room', ['patient' => $patient, 'roomName' => 'غرفة الأطفال']);
    }

    public function traumaRoom(Patient $patient)
    {
        return view('rooms.room', ['patient' => $patient, 'roomName' => 'قاعة الرضوض والصدمات']);
    }

    public function dentalRoom(Patient $patient)
    {
        return view('rooms.room', ['patient' => $patient, 'roomName' => 'جراحة الأسنان']);
    }

    public function isolationRoom(Patient $patient)
    {
        return view('rooms.room', ['patient' => $patient, 'roomName' => 'غرفة العزل']);
    }

    public function hospitalRoom(Patient $patient)
    {
        return view('rooms.room', ['patient' => $patient, 'roomName' => 'القاعة الاستشفائية']);
    }

    // استلام طلب المريض
    public function receive(Patient $patient)
    {
        $patient->received_at = now();
        $patient->save();

        return redirect()->back()->with('success', 'تم استلام المريض بنجاح!');
    }

// 🌟

// قائمة المرضى المتبقين لمكتب الفحوصات 2
// قائمة المرضى المتبقين لمكتب الفحوصات 2
public function remainingTwo()
{
    $patients = Patient::where('section', 'surgical')
                       ->where(function($q) {
                           $q->where('sent_to_lab2', 0)
                             ->orWhereNull('sent_to_lab2');
                       })
                       ->orderBy('created_at')
                       ->get();

    return view('patients_remaining2', compact('patients'));
}
// إرسال المريض لمكتب الفحوصات 2
public function sendPatientTwo($id)
{
    // نحي المريض الحالي
    Patient::where('current_lab2', 1)
           ->update(['current_lab2' => 0]);

    $patient = Patient::findOrFail($id);

    $patient->lab_office = 2;
    $patient->current_lab2 = 1;
    $patient->sent_to_lab2 = 1; // 🔥 هذا هو السطر اللي ناقصك
    $patient->received_at = null;
    $patient->save();

    return redirect()->route('lab.two')
                     ->with('success', 'تم إرسال المريض إلى مكتب الفحوصات 2 بنجاح!');
}

// 🌟 إرسال المريض لمكتب الفحوصات 1 مباشرة من قائمة المرضى المتبقين 
 public function sendPatient($id) { // نحي أي مريض كان حالي في المكتب 
 Patient::where('lab_office', 1) ->update(['current_lab1' => 0]); $patient = Patient::findOrFail($id); $patient->lab_office = 1; $patient->current_lab1 = 1; // هذا هو المهم 
 $patient->received_at = null; // خليها null حتى يتم الاستلام 
 $patient->save(); return redirect()->route('lab.one') ->with('success', 'تم إرسال المريض إلى مكتب الفحوصات 1 بنجاح!'); } // Controller: قائمة المرضى المتبقين 
// Controller: قائمة المرضى المتبقين
public function remaining() 
{ 
    // جلب كل المرضى المتبقين (اللي لم يتم إرسالهم)
    $patients = Patient::where('section', 'medical')
                       ->where('current_lab1', 0) // فقط المرضى المتبقين
                       ->get(); 

    return view('lab.remaining', compact('patients')); 
}
}