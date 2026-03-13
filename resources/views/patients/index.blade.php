@extends('layouts.app')

@section('title', 'قائمة المرضى اليوم')

@section('content')
<div style="min-height:80vh; display:flex; flex-direction:column; align-items:center; padding:20px; gap:20px;">

    <!-- Header ثابت -->
    <header style="width:100%; background:#0066cc; color:white; padding:25px; text-align:center; font-size:28px; font-weight:bold;">
        مستشفى عاشور زيان - {{ $department == 'medical' ? 'القسم الطبي' : 'القسم الجراحي' }}
    </header>

    <!-- أزرار متسلسلة -->
    <div style="display:flex; gap:12px; flex-wrap:wrap; justify-content:center; margin-top:15px;">
        <a href="{{ route('triage') }}" style="background:#6c757d; color:white; padding:12px 25px; border-radius:8px; text-decoration:none; font-weight:bold;">
            رجوع لمكتب الفرز والتوجيه
        </a>
        <a href="{{ route('patients.create', $department) }}" style="background:#17a2b8; color:white; padding:12px 25px; border-radius:8px; text-decoration:none; font-weight:bold;">
            تسجيل مريض جديد
        </a>
        <a href="{{ route('home') }}" style="background:#28a745; color:white; padding:12px 25px; border-radius:8px; text-decoration:none; font-weight:bold;">
            الصفحة الرئيسية
        </a>
    </div>

    <div style="width:100%; max-width:1000px; overflow-x:auto; margin-top:20px;">
        <table style="width:100%; border-collapse:collapse; background:white; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background:#0066cc; color:white; font-weight:bold; text-align:center;">
                    <th style="padding:12px;">الاسم الكامل</th>
                    <th style="padding:12px;">العمر</th>
                    <th style="padding:12px;">الجنس</th>
                    <th style="padding:12px;">الحالة</th>
                    <th style="padding:12px;">الطبيب</th>
                    <th style="padding:12px;">وقت التسجيل</th>
                    <th style="padding:12px;">استلام</th>
                    <th style="padding:12px;">إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr style="text-align:center;">
                    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->status }}</td>
                    <td>{{ $patient->doctor }}</td>
                    <td>{{ $patient->created_at->format('H:i') }}</td>
                    <td>
                        @if($patient->received == 0)
                        <form method="POST" action="{{ route('patients.receive', $patient->id) }}">
                            @csrf
                            <button type="submit" style="padding:6px 12px; background:#28a745; color:white; border:none; border-radius:6px; cursor:pointer;">إرسال لمكتب الفحوصات</button>
                        </form>
                        @else
                        <button disabled style="padding:6px 12px; background:#999; color:white; border:none; border-radius:6px; cursor:not-allowed;">تم الإرسال</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('patients.edit',$patient->id) }}" style="padding:6px 12px; background:#ff9800; color:white; border-radius:6px; text-decoration:none; margin-right:3px;">تعديل</a>
                        <form method="POST" action="{{ route('patients.destroy',$patient->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding:6px 12px; background:#d32f2f; color:white; border:none; border-radius:6px; cursor:pointer;">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer ثابت -->
    <footer style="width:100%; background:#0066cc; color:white; padding:20px; text-align:center; font-size:18px; margin-top:20px;">
        جميع الحقوق محفوظة - مستشفى عاشور زيان
    </footer>

</div>
@endsection
