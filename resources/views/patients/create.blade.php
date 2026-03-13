@extends('layouts.app')

@section('title', 'تسجيل مريض')

@section('content')
<div style="min-height:80vh; display:flex; flex-direction:column; justify-content:flex-start; align-items:center; padding:20px; gap:20px;">

    <!-- Header -->
    <header style="width:100%; background:#0066cc; color:white; padding:20px; text-align:center; font-size:24px;">
        مستشفى عاشور زيان - تسجيل مريض ({{ $department == 'medical' ? 'القسم الطبي' : 'القسم الجراحي' }})
    </header>

    <!-- أزرار رجوع -->
    <div style="display:flex; gap:15px; flex-wrap:wrap; justify-content:center; margin-top:15px;">
        <a href="{{ route('triage') }}" style="background:#6c757d; color:white; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:bold;">
            رجوع لمكتب الفرز والتوجيه
        </a>
        <a href="{{ route('patients.today', $department) }}" style="background:#17a2b8; color:white; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:bold;">
            قائمة المرضى اليوم
        </a>
    </div>

    <!-- رسالة نجاح -->
    @if(session('success'))
        <div style="background:#28a745; color:white; padding:10px; border-radius:8px; width:100%; max-width:700px; text-align:center;">
            {{ session('success') }}
        </div>
    @endif

    <!-- نموذج التسجيل -->
    <form method="POST" action="{{ route('patients.store') }}" style="width:100%; max-width:700px; background:white; padding:20px; border-radius:10px; display:flex; flex-direction:column; gap:15px;">
        @csrf

        <!-- الاسم الأول واللقب -->
        <div style="display:flex; gap:15px;">
            <input type="text" name="first_name" placeholder="الاسم" required style="flex:1; padding:10px; border-radius:6px; border:1px solid #ccc;">
            <input type="text" name="last_name" placeholder="اللقب" required style="flex:1; padding:10px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <!-- العمر والجنس -->
        <div style="display:flex; gap:15px;">
            <input type="number" name="age" placeholder="العمر" style="flex:1; padding:10px; border-radius:6px; border:1px solid #ccc;">
            <select name="gender" style="flex:1; padding:10px; border-radius:6px; border:1px solid #ccc;">
                <option value="">-- اختر الجنس --</option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
        </div>

        <!-- الحالة والطبيب -->
        <div style="display:flex; gap:15px; flex-direction:column;">
            <label>الحالة:</label>
            <select id="status_select" style="padding:10px; border-radius:6px; border:1px solid #ccc;">
                <option value="">-- اختر الحالة --</option>
                @if($department == 'medical')
                    <option value="حمّى">حمّى</option>
                    <option value="تسمم">تسمم</option>
                    <option value="نزلة برد">نزلة برد</option>
                    <option value="صداع">صداع</option>
                    <option value="سكري">سكري</option>
                    <option value="ضغط دم">ضغط دم</option>
                    <option value="ربو">ربو</option>
                    <option value="إسهال">إسهال</option>
                    <option value="غثيان">غثيان</option>
                    <option value="إلتهاب">إلتهاب</option>
                    <option value="حساسية">حساسية</option>
                @else
                    <option value="كسر">كسر</option>
                    <option value="جرح">جرح</option>
                    <option value="حرق">حرق</option>
                    <option value="بتر">بتر</option>
                    <option value="نزيف داخلي">نزيف داخلي</option>
                    <option value="التهاب الزائدة">التهاب الزائدة</option>
                    <option value="فتق">فتق</option>
                    <option value="صدمة / إصابة">صدمة / إصابة</option>
                    <option value="متابعة بعد عملية">متابعة بعد عملية</option>
                    <option value="عملية عاجلة">عملية عاجلة</option>
                    <option value="عدوى جراحية">عدوى جراحية</option>
                    <option value="جسم غريب">جسم غريب</option>
                @endif
                <option value="أخرى">أخرى</option>
            </select>

            <!-- هذا الحقل المرسل دائمًا -->
            <input type="text" name="status" id="status_input" placeholder="اكتب الحالة" style="padding:10px; border-radius:6px; border:1px solid #ccc; margin-top:5px;">
        </div>

        <div style="display:flex; flex-direction:column; gap:5px;">
            <label>الطبيب الحالي:</label>
            <input type="text" name="doctor" required style="padding:10px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <input type="hidden" name="section" value="{{ $department }}">

        <button type="submit" style="background:#0066cc; color:white; padding:12px; font-size:16px; font-weight:bold; border:none; border-radius:8px; cursor:pointer;">
            حفظ المريض
        </button>
    </form>

</div>

<script>
    const statusSelect = document.getElementById('status_select');
    const statusInput = document.getElementById('status_input');

    statusSelect.addEventListener('change', function() {
        if(this.value === 'أخرى') {
            statusInput.value = '';
            statusInput.focus();
        } else {
            statusInput.value = this.value; // أي حالة جاهزة تُنسخ مباشرة
        }
    });
</script>
@endsection
