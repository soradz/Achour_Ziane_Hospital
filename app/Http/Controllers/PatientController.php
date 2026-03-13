<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | مكتب الفرز والتوجيه
    |--------------------------------------------------------------------------
    */

    public function triage1()
    {
        $patients = Patient::where('section', 'medical')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('patients.triage', compact('patients'));
    }

    public function triage2()
    {
        return redirect()->route('patients.today', ['section' => 'surgical']);
    }

    /*
    |--------------------------------------------------------------------------
    | قوائم المرضى
    |--------------------------------------------------------------------------
    */

    public function today(Request $request)
    {
        $section = $request->section ?? 'medical';

        $patients = Patient::where('section', $section)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('patients.today', compact('patients', 'section'));
    }

    public function patientsRemaining1()
    {
        $patients = Patient::where('section', 'medical')
            ->orderBy('created_at', 'desc')
            ->get();
return view('patients_remaining', [
    'patients' => $patients
]);
    }

    public function patientsRemaining2()
    {
        $patients = Patient::where('section', 'surgical')
            ->orderBy('created_at', 'desc')
            ->get();

       return view('patients_remaining2', compact('patients'));
    }

    /*
    |--------------------------------------------------------------------------
    | اختيار مريض للمكاتب
    |--------------------------------------------------------------------------
    */

    public function select1(Patient $patient)
    {
        session(['selected_patient1' => $patient->id]);

        return redirect()->route('triage')
            ->with('success', 'تم اختيار المريض لمكتب الفحوصات 1!');
    }

    public function select2(Patient $patient)
    {
        session(['selected_patient2' => $patient->id]);

        return redirect()->route('patients.today', ['section' => 'surgical'])
            ->with('success', 'تم اختيار المريض لمكتب الفحوصات 2!');
    }

    public function receive(Patient $patient)
    {
        $patient->received = 1;
        $patient->save();

        return redirect()->back()
            ->with('success', 'تم إرسال المريض للمكتب!');
    }

    /*
    |--------------------------------------------------------------------------
    | إدارة المرضى
    |--------------------------------------------------------------------------
    */

    // صفحة إنشاء مريض
    public function create(Request $request)
    {
        $department = $request->department ?? 'medical';

        if ($department === 'surgical') {
            return view('patients.create_surgical');
        }

        return view('patients.create_medical');
    }

    // حفظ مريض جديد
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'age'        => 'nullable|integer',
            'gender'     => 'nullable|string|max:50',
            'status'     => 'nullable|string|max:255',
            'doctor'     => 'nullable|string|max:255',
            'department' => 'required|in:medical,surgical',
        ]);

        Patient::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'age'        => $request->age,
            'gender'     => $request->gender,
            'status'     => $request->status,
            'doctor'     => $request->doctor,
            'section'    => $request->department,
        ]);

        return redirect()->route('patients.today', [
            'section' => $request->department
        ])->with('success', 'تم حفظ المريض بنجاح!');
    }

    // صفحة تعديل مريض
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // تحديث بيانات المريض
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'age'            => 'nullable|integer',
            'gender'         => 'nullable|string|max:50',
            'status_select'  => 'nullable|string|max:255',
            'status'         => 'nullable|string|max:255',
            'doctor'         => 'required|string|max:255',
            'section'        => 'required|in:medical,surgical',
        ]);

        // إذا اخترت "أخرى" نستخدم القيمة من الحقل النصي، وإلا نستخدم القيمة من القائمة
        $status_final = $request->status_select === 'أخرى' ? $request->status : $request->status_select;

        $patient->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'age'        => $request->age,
            'gender'     => $request->gender,
            'status'     => $status_final,
            'doctor'     => $request->doctor,
            'section'    => $request->section,
        ]);

        return redirect()->route('patients.today', ['section' => $patient->section])
                         ->with('success', 'تم تعديل بيانات المريض بنجاح!');
    }

    // حذف مريض
    public function destroy(Patient $patient)
    {
        $section = $patient->section;
        $patient->delete();

        return redirect()->route('patients.today', [
            'section' => $section
        ])->with('success', 'تم حذف المريض بنجاح!');
    }
}