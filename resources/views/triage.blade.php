@extends('layouts.app')

@section('title', 'مكتب الفرز والتوجيه')

@section('content')
<div style="min-height:80vh; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; gap:60px;">

    <!-- العنوان -->
    <h1 style="font-size:50px;">مكتب الفرز والتوجيه</h1>

    <!-- أزرار الأقسام -->
    <div style="display:flex; flex-direction:column; gap:40px; width:100%; max-width:800px;">

        <!-- القسم الطبي -->
        <a href="{{ route('patients.create.medical') }}" 
           style="width:100%; background-color:#0d6efd; padding:30px; font-size:28px; border-radius:20px; text-decoration:none; color:white; font-weight:bold; display:block; text-align:center;">
            القسم الطبي
        </a>

        <!-- القسم الجراحي -->
        <a href="{{ route('patients.create.surgical') }}" 
           style="width:100%; background-color:#0d6efd; padding:30px; font-size:28px; border-radius:20px; text-decoration:none; color:white; font-weight:bold; display:block; text-align:center;">
            القسم الجراحي
        </a>

    </div>

    <!-- زر الرجوع -->
    <a href="{{ route('home') }}" 
       style="background-color:#6c757d; padding:15px 50px; font-size:20px; border-radius:15px; text-decoration:none; color:white; font-weight:bold; margin-top:40px;">
        رجوع للصفحة الرئيسية
    </a>

</div>
@endsection