<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>قسم الاستعجالات الطبية - التسجيل</title>
<style>
body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f0f2f5; direction:rtl; }
header, footer { position: fixed; left:0; right:0; background:#0066cc; color:white; padding:15px 20px; text-align:center; font-size:18px; z-index:1000; }
footer { bottom:0; }
header { top:0; }
.container { margin:120px 20px 70px 20px; }
h1 { color:#004080; margin-bottom:20px; }
form { background:white; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); margin-bottom:30px; }
form label { display:block; margin:10px 0 5px; font-weight:bold; }
form input, form select { width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; }
form button { margin-top:15px; padding:10px 15px; background:#0066cc; color:white; border:none; border-radius:5px; cursor:pointer; }
.back-btn { background-color:#6c757d; color:white; padding:12px 25px; font-size:18px; font-weight:bold; border-radius:12px; text-decoration:none; display:inline-block; margin-bottom:20px; }
table { width:100%; border-collapse:collapse; margin-top:20px; background:white; }
th, td { padding:12px; border:1px solid #ccc; text-align:center; }
th { background:#0066cc; color:white; }
</style>
</head>

<body>
<header>مستشفى عاشور زيان - تسجيل المرضى</header>

<div class="container">

<a href="{{ route('triage.index') }}" class="back-btn">رجوع إلى مكتب الفرز</a>
<a href="{{ route('home') }}" class="back-btn">الرئيسية</a>

<h1>تسجيل مريض جديد (قسم طبي)</h1>

<form method="POST" action="{{ route('triage.store') }}">
@csrf
<input type="hidden" name="section" value="medical">

<label>الاسم:</label>
<input type="text" name="first_name" required>

<label>اللقب:</label>
<input type="text" name="last_name" required>

<label>العمر:</label>
<input type="number" name="age" min="0" required>

<label>الحالة المستعجلة:</label>
<select name="condition" required>
<option value="">-- اختر الحالة --</option>
<option value="تسمم">تسمم</option>
<option value="كومة">كومة</option>
<option value="حالة متوسطة">حالة متوسطة</option>
<option value="إصابة خطيرة">إصابة خطيرة</option>
<option value="نزيف حاد">نزيف حاد</option>
<option value="كسور متعددة">كسور متعددة</option>
<option value="حروق شديدة">حروق شديدة</option>
</select>

<label>الطبيب الحالي:</label>
<input type="text" name="doctor" required>

<button type="submit">حفظ المريض في قاعدة البيانات</button>
</form>

@if(session('success'))
<p style="color:green;font-weight:bold">{{ session('success') }}</p>
@endif

<h2>قائمة مرضى القسم الطبي</h2>

<table>
<thead>
<tr>
<th>الاسم الكامل</th>
<th>العمر</th>
<th>الحالة</th>
<th>تاريخ التسجيل</th>
</tr>
</thead>
<tbody>
@foreach($medicalPatients ?? [] as $patient)
<tr>
<td>{{ $patient->full_name }}</td>
<td>{{ $patient->age }}</td>
<td>{{ $patient->condition }}</td>
<td>{{ $patient->created_at }}</td>
</tr>
@endforeach
</tbody>
</table>

</div>

<footer>جميع الحقوق محفوظة - مستشفى عاشور زيان</footer>
</body>
</html>
