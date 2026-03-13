@extends('layouts.app')

@section('title', 'إنشاء مستخدم جديد')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    :root {
        --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;
        --green:#16a34a;--green-l:#dcfce7;--red:#dc2626;--red-l:#fee2e2;
        --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--border:rgba(26,128,251,0.15);
    }
    html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;}
    .bg-scene{position:fixed;inset:0;z-index:0;overflow:hidden;background:linear-gradient(145deg,#ffffff 0%,#d6ecff 45%,#b8dcff 80%,#9aceff 100%);}
    .bg-c{position:absolute;border-radius:50%;filter:blur(70px);opacity:0.45;}
    .bc1{width:600px;height:600px;background:radial-gradient(circle,#70b8ff,#3a8fef);top:-180px;right:-180px;animation:d1 20s ease-in-out infinite;}
    .bc2{width:440px;height:440px;background:radial-gradient(circle,#b3d9ff,#5aaaff);bottom:-130px;left:-130px;animation:d2 25s ease-in-out infinite;}
    .bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px;}
    @keyframes d1{0%,100%{transform:translate(0,0)}33%{transform:translate(-40px,28px)}66%{transform:translate(20px,-38px)}}
    @keyframes d2{0%,100%{transform:translate(0,0)}40%{transform:translate(38px,-20px)}70%{transform:translate(-28px,38px)}}
    @keyframes spin{to{transform:rotate(360deg)}}
    @keyframes hb{0%,100%{transform:scale(1)}14%{transform:scale(1.1)}28%{transform:scale(1)}42%{transform:scale(1.06)}56%{transform:scale(1)}}
    @keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
    .main{position:relative;z-index:1;min-height:100vh;padding:28px 18px;max-width:620px;margin:0 auto;display:flex;flex-direction:column;gap:16px;justify-content:center;}
    .page-header{background:rgba(255,255,255,0.82);backdrop-filter:blur(20px);border:1.5px solid var(--border);border-radius:20px;padding:16px 22px 13px;display:flex;align-items:center;gap:13px;box-shadow:0 5px 24px rgba(26,128,251,0.1),0 1px 0 rgba(255,255,255,0.9) inset;animation:fadeUp 0.5s ease 0.05s both;position:relative;overflow:hidden;}
    .page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);border-radius:20px 20px 0 0;}
    .ph-logo{position:relative;width:42px;height:42px;flex-shrink:0;}
    .ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:12px;background:conic-gradient(var(--blue),#4fa8ff,#a8d4ff,var(--blue));animation:spin 3s linear infinite;z-index:0;}
    .ph-logo-in{position:relative;z-index:1;width:42px;height:42px;border-radius:11px;background:linear-gradient(135deg,#fff,#e0f0ff);display:flex;align-items:center;justify-content:center;font-size:20px;box-shadow:0 2px 10px rgba(26,128,251,0.2);animation:hb 3s ease infinite;}
    .ph-info{flex:1;}
    .ph-title{font-size:16px;font-weight:900;color:var(--text);}
    .ph-title span{background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
    .ph-sub{font-size:10px;color:var(--soft);margin-top:2px;font-weight:600;}
    .back-btn{display:flex;align-items:center;gap:5px;padding:6px 13px;border-radius:8px;background:rgba(26,128,251,0.07);border:1.5px solid var(--border);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all 0.25s ease;white-space:nowrap;}
    .back-btn:hover{background:rgba(26,128,251,0.14);border-color:rgba(26,128,251,0.35);transform:translateY(-1px);}
    .errors-box{background:var(--red-l);border:1.5px solid rgba(220,38,38,0.25);border-radius:14px;padding:14px 18px;animation:fadeUp 0.4s ease both;}
    .errors-title{display:flex;align-items:center;gap:7px;font-size:13px;font-weight:800;color:var(--red);margin-bottom:8px;}
    .errors-box ul{padding-right:18px;}
    .errors-box li{font-size:12px;color:var(--red);font-weight:600;margin-bottom:3px;}
    .form-card{background:rgba(255,255,255,0.85);backdrop-filter:blur(20px);border:1.5px solid var(--border);border-radius:22px;padding:24px;box-shadow:0 8px 36px rgba(26,128,251,0.1),0 1px 0 rgba(255,255,255,0.9) inset;animation:fadeUp 0.5s ease 0.12s both;position:relative;overflow:hidden;}
    .form-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--green),#4ade80);border-radius:22px 22px 0 0;}
    .field{margin-bottom:16px;}
    .field:last-of-type{margin-bottom:0;}
    .field-label{display:flex;align-items:center;gap:6px;font-size:11px;font-weight:800;color:var(--mid);letter-spacing:0.6px;text-transform:uppercase;margin-bottom:6px;}
    .fl-icon{font-size:13px;}
    .field-input{width:100%;padding:11px 14px;border-radius:11px;border:1.5px solid rgba(26,128,251,0.18);background:rgba(255,255,255,0.9);font-family:'Tajawal',sans-serif;font-size:14px;font-weight:500;color:var(--text);transition:all 0.25s ease;outline:none;-webkit-appearance:none;}
    .field-input:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(26,128,251,0.12);background:#fff;}
    .field-input::placeholder{color:var(--soft);}
    select.field-input{cursor:pointer;}
    .form-divider{height:1px;background:rgba(26,128,251,0.1);margin:18px 0;}
    .btn-submit{width:100%;display:flex;align-items:center;justify-content:center;gap:8px;padding:13px;border-radius:13px;background:linear-gradient(135deg,var(--green),#4ade80);color:white;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:15px;font-weight:800;box-shadow:0 4px 18px rgba(22,163,74,0.3);transition:all 0.3s cubic-bezier(0.34,1.4,0.64,1);position:relative;overflow:hidden;margin-top:20px;}
    .btn-submit:hover{transform:translateY(-2px) scale(1.02);box-shadow:0 10px 28px rgba(22,163,74,0.38);}
    @media(max-width:480px){.main{padding:16px 12px;}}
</style>

<div class="bg-scene">
    <div class="bg-c bc1"></div><div class="bg-c bc2"></div>
    <div class="bg-grid"></div>
</div>

<div class="main">
    <div class="page-header">
        <div class="ph-logo"><div class="ph-logo-in">➕</div></div>
        <div class="ph-info">
            <div class="ph-title">إنشاء <span>مستخدم جديد</span></div>
            <div class="ph-sub">لوحة التحكم — نظام الاستعجالات</div>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="back-btn">↩ لوحة التحكم</a>
    </div>

    @if($errors->any())
    <div class="errors-box">
        <div class="errors-title">⚠️ يرجى تصحيح الأخطاء التالية</div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-card">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="field">
                <div class="field-label"><span class="fl-icon">👤</span> الاسم</div>
                <input type="text" name="name" class="field-input" placeholder="أدخل الاسم الكامل" value="{{ old('name') }}" required>
            </div>

            <div class="field">
                <div class="field-label"><span class="fl-icon">📧</span> البريد الإلكتروني</div>
                <input type="email" name="email" class="field-input" placeholder="example@hospital.com" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <div class="field-label"><span class="fl-icon">🔒</span> كلمة المرور</div>
                <input type="password" name="password" class="field-input" placeholder="••••••••" required>
            </div>

            <div class="form-divider"></div>

            <div class="field">
                <div class="field-label"><span class="fl-icon">🎭</span> الدور</div>
                <select name="role" class="field-input" required>
                    <option value="">— اختر الدور —</option>
                    <option value="doctor"     {{ old('role') == 'doctor'     ? 'selected' : '' }}>🩺 دكتور</option>
                    <option value="admin"      {{ old('role') == 'admin'      ? 'selected' : '' }}>⚙️ أدمن</option>
                    <option value="lab_worker" {{ old('role') == 'lab_worker' ? 'selected' : '' }}>🧪 عامل مخبر</option>
                    <option value="lab_worker" {{ old('role') == 'lab_worker' ? 'selected' : '' }}>🧪 عامل مخبر</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">✅ إنشاء الحساب</button>
        </form>
    </div>
</div>
@endsection