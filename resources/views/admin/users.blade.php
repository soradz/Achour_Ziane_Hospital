@extends('admin.layout')

@section('title', 'المستخدمين')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    :root {
        --blue:   #1a80fb;
        --blue-d: #0057c8;
        --blue-l: #dbeafe;
        --green:  #16a34a;
        --green-l:#dcfce7;
        --text:   #0a2540;
        --mid:    #3a6186;
        --soft:   #7da8cc;
        --border: rgba(26,128,251,0.15);
    }

    html, body {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* ══ BG ══ */
    .bg-scene { position:fixed;inset:0;z-index:0;overflow:hidden;background:linear-gradient(145deg,#ffffff 0%,#d6ecff 45%,#b8dcff 80%,#9aceff 100%); }
    .bg-c { position:absolute;border-radius:50%;filter:blur(70px);opacity:0.45; }
    .bc1 { width:600px;height:600px;background:radial-gradient(circle,#70b8ff,#3a8fef);top:-180px;right:-180px;animation:d1 20s ease-in-out infinite; }
    .bc2 { width:440px;height:440px;background:radial-gradient(circle,#b3d9ff,#5aaaff);bottom:-130px;left:-130px;animation:d2 25s ease-in-out infinite; }
    .bg-grid { position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px; }
    @keyframes d1{0%,100%{transform:translate(0,0)}33%{transform:translate(-40px,28px)}66%{transform:translate(20px,-38px)}}
    @keyframes d2{0%,100%{transform:translate(0,0)}40%{transform:translate(38px,-20px)}70%{transform:translate(-28px,38px)}}

    @keyframes spin{to{transform:rotate(360deg)}}
    @keyframes hb{0%,100%{transform:scale(1)}14%{transform:scale(1.1)}28%{transform:scale(1)}42%{transform:scale(1.06)}56%{transform:scale(1)}}
    @keyframes gp{0%,100%{box-shadow:0 0 0 0 rgba(22,163,74,0.4)}50%{box-shadow:0 0 0 5px rgba(22,163,74,0)}}
    @keyframes lp{0%,100%{box-shadow:0 0 0 0 rgba(26,128,251,0.4)}50%{box-shadow:0 0 0 5px rgba(26,128,251,0)}}
    @keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
    @keyframes rowIn{from{opacity:0;transform:translateX(10px)}to{opacity:1;transform:translateX(0)}}
    @keyframes bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}

    /* ══ MAIN ══ */
    .main {
        position: relative; z-index:1;
        min-height: 100vh;
        padding: 28px 20px;
        max-width: 900px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    /* ══ PAGE HEADER ══ */
    .page-header {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(20px);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        padding: 18px 24px 15px;
        display: flex; align-items:center; gap:14px;
        box-shadow: 0 5px 24px rgba(26,128,251,0.1), 0 1px 0 rgba(255,255,255,0.9) inset;
        animation: fadeUp 0.5s ease 0.05s both;
        position: relative; overflow: hidden;
    }
    .page-header::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);border-radius:20px 20px 0 0; }

    .ph-logo { position:relative;width:44px;height:44px;flex-shrink:0; }
    .ph-logo::before { content:'';position:absolute;inset:-2px;border-radius:12px;background:conic-gradient(var(--blue),#4fa8ff,#a8d4ff,var(--blue));animation:spin 3s linear infinite;z-index:0; }
    .ph-logo-in { position:relative;z-index:1;width:44px;height:44px;border-radius:11px;background:linear-gradient(135deg,#fff,#e0f0ff);display:flex;align-items:center;justify-content:center;font-size:20px;box-shadow:0 2px 10px rgba(26,128,251,0.2);animation:hb 3s ease infinite; }

    .ph-info { flex:1; }
    .ph-title { font-size:17px;font-weight:900;color:var(--text); }
    .ph-title span { background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }
    .ph-sub { font-size:11px;color:var(--soft);margin-top:2px;font-weight:600; }

    .ph-right { display:flex;align-items:center;gap:8px;flex-shrink:0; }

    .btn-create {
        display:flex;align-items:center;gap:6px;
        padding:8px 16px;border-radius:10px;
        background:linear-gradient(135deg,var(--green),#4ade80);
        color:white;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;
        text-decoration:none;border:none;
        box-shadow:0 3px 14px rgba(22,163,74,0.28);
        transition:all 0.3s cubic-bezier(0.34,1.4,0.64,1);
        position:relative;overflow:hidden;
    }
    .btn-create::after { content:'';position:absolute;top:-50%;left:-80%;width:50%;height:200%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.25),transparent);transform:skewX(-15deg);transition:left 0.5s ease; }
    .btn-create:hover::after { left:140%; }
    .btn-create:hover { transform:translateY(-2px) scale(1.03);box-shadow:0 8px 22px rgba(22,163,74,0.36); }

    /* ══ SUCCESS ALERT ══ */
    .alert-success {
        display:flex;align-items:center;gap:10px;
        background:var(--green-l);border:1.5px solid rgba(22,163,74,0.25);
        border-radius:14px;padding:12px 18px;
        font-size:13px;font-weight:700;color:var(--green);
        animation:fadeUp 0.4s ease both;
    }
    .alert-icon { font-size:18px;animation:bob 2s ease-in-out infinite; }

    /* ══ TABLE CARD ══ */
    .table-card {
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(20px);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 36px rgba(26,128,251,0.1), 0 1px 0 rgba(255,255,255,0.9) inset;
        animation: fadeUp 0.5s ease 0.15s both;
    }

    .table-top {
        display:flex;align-items:center;justify-content:space-between;
        padding:14px 20px;
        border-bottom:1.5px solid rgba(26,128,251,0.1);
        background:linear-gradient(135deg,rgba(26,128,251,0.05),rgba(26,128,251,0.02));
    }
    .table-title { display:flex;align-items:center;gap:8px;font-size:14px;font-weight:900;color:var(--text); }
    .tt-icon { font-size:16px;animation:bob 3s ease-in-out infinite; }
    .table-count {
        display:inline-flex;align-items:center;gap:5px;
        background:var(--blue-l);border:1px solid var(--border);
        border-radius:20px;padding:3px 10px;font-size:10px;font-weight:700;color:var(--blue-d);
    }
    .tc-dot { width:5px;height:5px;border-radius:50%;background:var(--blue);animation:lp 2s ease infinite; }

    .table-scroll { overflow-x:auto; }

    table { width:100%;border-collapse:collapse;min-width:500px; }

    thead tr {
        background:linear-gradient(135deg,rgba(26,128,251,0.06),rgba(26,128,251,0.03));
        border-bottom:1.5px solid rgba(26,128,251,0.1);
    }
    thead th {
        padding:13px 18px;font-size:10px;font-weight:800;
        color:var(--mid);letter-spacing:0.8px;text-align:right;
        text-transform:uppercase;white-space:nowrap;
    }

    tbody tr {
        border-bottom:1px solid rgba(26,128,251,0.07);
        transition:background 0.2s ease;
        animation:rowIn 0.35s ease both;
    }
    tbody tr:last-child { border-bottom:none; }
    tbody tr:hover { background:rgba(26,128,251,0.03); }

    tbody tr:nth-child(1){animation-delay:0.18s}
    tbody tr:nth-child(2){animation-delay:0.23s}
    tbody tr:nth-child(3){animation-delay:0.28s}
    tbody tr:nth-child(4){animation-delay:0.33s}
    tbody tr:nth-child(5){animation-delay:0.38s}

    td { padding:13px 18px;font-size:13px;color:var(--text);font-weight:500; }

    /* Name cell */
    .td-user { display:flex;align-items:center;gap:10px; }
    .td-av { width:32px;height:32px;border-radius:10px;background:var(--blue-l);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;animation:bob 3s ease-in-out infinite; }
    .td-name { font-size:13px;font-weight:700;color:var(--text); }

    /* Email */
    .td-email { font-size:12px;color:var(--mid);font-weight:500; }

    /* Role badge */
    .role-badge {
        display:inline-flex;align-items:center;gap:4px;
        padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;border:1px solid;
    }
    .rb-dot { width:5px;height:5px;border-radius:50%; }

    .role-admin   { background:var(--blue-l);color:var(--blue-d);border-color:var(--border); }
    .role-admin   .rb-dot { background:var(--blue);animation:lp 2s ease infinite; }
    .role-doctor  { background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2); }
    .role-doctor  .rb-dot { background:var(--green);animation:gp 2s ease infinite; }
    .role-default { background:rgba(100,116,139,0.08);color:var(--mid);border-color:rgba(100,116,139,0.15); }

    /* Empty */
    .empty { text-align:center;padding:52px 20px; }
    .e-ic  { font-size:46px;display:block;margin-bottom:12px;opacity:0.4;animation:bob 3s ease-in-out infinite; }
    .e-t   { font-size:14px;font-weight:800;color:var(--mid);margin-bottom:5px; }
    .e-s   { font-size:12px;color:var(--soft); }

    @media(max-width:600px){
        .main { padding:16px 12px; }
        .ph-right { flex-direction:column;align-items:flex-end; }
    }
</style>

<!-- BG -->
<div class="bg-scene">
    <div class="bg-c bc1"></div>
    <div class="bg-c bc2"></div>
    <div class="bg-grid"></div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- Header -->
    <div class="page-header">
        <div class="ph-logo"><div class="ph-logo-in">👥</div></div>
        <div class="ph-info">
            <div class="ph-title">إدارة <span>المستخدمين</span></div>
            <div class="ph-sub">لوحة التحكم — نظام الاستعجالات</div>
        </div>
        <div class="ph-right">
            <a href="{{ route('admin.users.create') }}" class="btn-create">
                ＋ إنشاء مستخدم جديد
            </a>
        </div>
    </div>

    <!-- Success -->
    @if(session('success'))
    <div class="alert-success">
        <span class="alert-icon">✅</span>
        {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="table-card">

        <div class="table-top">
            <div class="table-title">
                <span class="tt-icon">📋</span>
                قائمة المستخدمين
            </div>
            <span class="table-count">
                <div class="tc-dot"></div>
                {{ count($users) }} مستخدم
            </span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الدور</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            <div class="td-user">
                                <div class="td-av">👤</div>
                                <div class="td-name">{{ $user->name }}</div>
                            </div>
                        </td>
                        <td>
                            <span class="td-email">📧 {{ $user->email }}</span>
                        </td>
                        <td>
                            @php $r = $user->role; @endphp
                            @if($r === 'admin')
                                <span class="role-badge role-admin"><div class="rb-dot"></div>⚙️ أدمن</span>
                            @elseif($r === 'doctor' || $r === 'طبيب')
                                <span class="role-badge role-doctor"><div class="rb-dot"></div>🩺 طبيب</span>
                            @else
                                <span class="role-badge role-default">👤 {{ $r }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty">
                                <span class="e-ic">👥</span>
                                <div class="e-t">لا يوجد مستخدمون</div>
                                <div class="e-s">أنشئ أول مستخدم بالضغط على الزر أعلاه</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection