@extends('layouts.app')

@section('title', 'صفحة المخبر')

@section('content')
<h2>طلبات التحاليل - قائمة الانتظار</h2>

@if(session('success'))
<div style="color:green; font-weight:bold; margin-bottom:15px;">{{ session('success') }}</div>
@endif

@foreach($requests as $req)
<div style="border:1px solid #ccc; padding:15px; margin-bottom:10px; border-radius:10px; background:#f9f9f9;">
    <strong>المريض:</strong> {{ $req->patient->first_name }} {{ $req->patient->last_name }} <br>
    <strong>التحاليل المطلوبة:</strong> {{ $req->tests }} <br>
    <strong>الحالة:</strong> {{ $req->status }} <br><br>

    @if($req->status == 'pending')
        <form method="POST" action="{{ route('lab.start', $req->id) }}">
            @csrf
            <button type="submit" style="padding:8px 15px; background:#17a2b8; color:white; border:none; border-radius:5px;">بدء التحليل</button>
        </form>
    @endif

    @if($req->status == 'processing' || $req->status == 'completed')
        <form method="POST" action="{{ route('lab.save', $req->id) }}" style="margin-top:10px;">
            @csrf
            <textarea name="results" placeholder="أدخل نتائج التحليل" style="width:100%; height:80px;">{{ $req->results }}</textarea><br>
            <button type="submit" style="padding:8px 15px; background:#28a745; color:white; border:none; border-radius:5px; margin-top:5px;">حفظ النتائج</button>
        </form>

        @if($req->status == 'completed')
            <form method="POST" action="{{ route('lab.send', $req->id) }}" style="margin-top:5px;">
                @csrf
                <button type="submit" style="padding:8px 15px; background:#ffc107; color:white; border:none; border-radius:5px;">إرسال النتائج للطبيب</button>
            </form>
        @endif
    @endif
</div>
@endforeach

@endsection