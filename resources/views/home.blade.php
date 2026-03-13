@extends('layouts.app')
@section('title', 'الاستعجالات')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-dd:#003d8f;
    --blue-l:#dbeafe;--blue-ll:#eef5ff;--blue-lll:#f7faff;
    --cyan:#0891b2;--cyan-l:#e0f7fa;
    --green:#16a34a;--green-l:#dcfce7;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--muted:#b8cfe0;
    --border:rgba(26,128,251,0.12);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:var(--blue-lll);}

.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#f0f7ff 30%,#e0eeff 65%,#cce0ff 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.04) 1px,transparent 1px);background-size:52px 52px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.06) 1.5px,transparent 1.5px);background-size:26px 26px;}
.bg-orb1{position:absolute;width:800px;height:800px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.07),transparent 65%);top:-350px;right:-350px;}
.bg-orb2{position:absolute;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(8,145,178,0.05),transparent 65%);bottom:-250px;left:-250px;}
.bg-stripe{position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--blue-dd),var(--blue),#60a5fa,var(--cyan),var(--blue));}

@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
@keyframes popIn{from{opacity:0;transform:scale(0.93) translateY(16px)}to{opacity:1;transform:scale(1) translateY(0)}}
@keyframes spin{to{transform:rotate(360deg)}}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.8)}}
@keyframes slideDown{from{opacity:0;transform:translateY(-16px)}to{opacity:1;transform:translateY(0)}}
@keyframes slideUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}

/* TOPBAR */
.topbar{position:fixed;top:0;left:0;right:0;height:68px;background:rgba(255,255,255,0.93);backdrop-filter:blur(24px);border-bottom:1.5px solid var(--border2);display:flex;align-items:center;justify-content:space-between;padding:0 40px;z-index:1000;box-shadow:0 2px 20px rgba(26,128,251,0.08);animation:slideDown .5s ease both;position:fixed;}
.topbar::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#60a5fa);}
.tb-brand{display:flex;align-items:center;gap:14px;}
.tb-logo-wrap{position:relative;width:48px;height:48px;flex-shrink:0;}
.tb-logo-wrap::before{content:'';position:absolute;inset:-2px;border-radius:13px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 4s linear infinite;z-index:0;}
.tb-logo{position:relative;z-index:1;width:48px;height:48px;border-radius:12px;overflow:hidden;background:transparent;display:flex;align-items:center;justify-content:center;}
.tb-logo img{width:100%;height:100%;object-fit:cover;mix-blend-mode:normal;}
.tb-logo svg{width:26px;height:26px;stroke:#60a5fa;fill:none;stroke-width:1.5;}
.tb-name{font-size:15px;font-weight:800;color:var(--text);}
.tb-badge{display:inline-flex;align-items:center;gap:5px;background:var(--blue-ll);border:1px solid var(--border2);border-radius:20px;padding:2px 10px;font-size:10px;font-weight:700;color:var(--blue-d);margin-top:2px;font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.tb-badge-dot{width:5px;height:5px;border-radius:50%;background:var(--blue);animation:pulse 1.8s ease infinite;}
.tb-center{display:flex;align-items:center;gap:10px;}
.tb-clock{display:flex;align-items:center;gap:8px;background:var(--blue-ll);border:1.5px solid var(--border2);border-radius:12px;padding:7px 16px;font-size:14px;font-weight:700;color:var(--mid);font-family:'IBM Plex Mono',monospace;}
.tb-clock svg{width:15px;height:15px;stroke:var(--blue);fill:none;stroke-width:2;}
.tb-status{display:flex;align-items:center;gap:6px;background:var(--green-l);border:1.5px solid rgba(22,163,74,0.25);border-radius:12px;padding:7px 14px;font-size:11px;font-weight:700;color:var(--green);}
.tb-status-dot{width:7px;height:7px;border-radius:50%;background:var(--green);animation:pulse 1.8s ease infinite;}
.tb-logout{display:flex;align-items:center;gap:8px;background:#fff5f5;border:1.5px solid rgba(220,38,38,0.2);color:#dc2626;padding:8px 20px;border-radius:12px;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;text-decoration:none;transition:all .25s ease;}
.tb-logout:hover{background:rgba(220,38,38,0.08);border-color:rgba(220,38,38,0.4);transform:translateY(-1px);box-shadow:0 4px 14px rgba(220,38,38,0.12);}
.tb-logout svg{width:15px;height:15px;stroke:currentColor;fill:none;stroke-width:2;}

/* MAIN */
.main{position:relative;z-index:1;min-height:100vh;padding:96px 32px 72px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:26px;}

.page-hero{text-align:center;animation:fadeUp .6s ease .05s both;}
.hero-pill{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,0.95);border:1.5px solid var(--border2);border-radius:30px;padding:6px 20px;font-size:11px;font-weight:700;color:var(--blue-d);margin-bottom:14px;font-family:'IBM Plex Mono',monospace;letter-spacing:.8px;box-shadow:0 2px 16px rgba(26,128,251,0.1);}
.hero-pill-dot{width:6px;height:6px;border-radius:50%;background:var(--green);animation:pulse 1.8s ease infinite;}
.hero-pill svg{width:12px;height:12px;stroke:var(--blue);fill:none;stroke-width:2;}
.hero-title{font-size:36px;font-weight:900;color:var(--text);letter-spacing:-.5px;line-height:1.2;}
.hero-title span{background:linear-gradient(90deg,var(--blue-dd),var(--blue),#3b9eff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.hero-sub{margin-top:8px;font-size:14px;color:var(--soft);}

.stats-bar{display:flex;gap:10px;flex-wrap:wrap;justify-content:center;animation:fadeUp .6s ease .12s both;}
.stat-chip{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,0.92);border:1.5px solid var(--border);border-radius:14px;padding:9px 18px;font-size:12px;font-weight:700;color:var(--mid);backdrop-filter:blur(12px);box-shadow:0 2px 12px rgba(26,128,251,0.07);transition:all .2s ease;}
.stat-chip:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(26,128,251,0.14);}
.stat-chip svg{width:14px;height:14px;stroke:var(--blue);fill:none;stroke-width:1.8;}
.sc-dot{width:7px;height:7px;border-radius:50%;flex-shrink:0;}
.sc-dot.g{background:var(--green);animation:pulse 1.8s ease infinite;}
.sc-dot.b{background:var(--blue);animation:pulse 2s ease .4s infinite;}
.sc-dot.c{background:var(--cyan);animation:pulse 2.2s ease .8s infinite;}

/* CARDS */
.nav-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;width:100%;max-width:880px;}
.nav-grid .col-2{grid-column:span 2;}
.nav-grid .col-full{grid-column:1/-1;}

.nav-card{display:flex;flex-direction:column;background:rgba(255,255,255,0.97);border:1.5px solid var(--border);border-radius:24px;padding:30px 26px 26px;text-decoration:none;transition:all .3s cubic-bezier(0.34,1.4,0.64,1);position:relative;overflow:hidden;box-shadow:0 2px 16px rgba(26,128,251,0.06);animation:popIn .5s cubic-bezier(0.34,1.4,0.64,1) both;}
.nav-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:24px 24px 0 0;}
.nav-card:hover{transform:translateY(-6px);box-shadow:0 20px 52px rgba(26,128,251,0.18);border-color:var(--border2);}

.card-icon{width:60px;height:60px;border-radius:18px;display:flex;align-items:center;justify-content:center;margin-bottom:18px;flex-shrink:0;border:1.5px solid transparent;transition:transform .3s cubic-bezier(0.34,1.8,0.64,1);}
.card-icon svg{width:28px;height:28px;fill:none;stroke-width:1.6;}
.nav-card:hover .card-icon{transform:scale(1.12) rotate(-4deg);}

.card-label{font-size:18px;font-weight:900;color:var(--text);margin-bottom:5px;letter-spacing:-.2px;}
.card-sub{font-size:12px;color:var(--soft);font-weight:500;line-height:1.6;}
.card-tag{display:inline-flex;align-items:center;margin-top:14px;padding:4px 11px;border-radius:20px;font-size:10px;font-weight:700;font-family:'IBM Plex Mono',monospace;letter-spacing:.8px;border:1px solid;}

.card-arrow{position:absolute;bottom:24px;left:22px;width:34px;height:34px;border-radius:11px;display:flex;align-items:center;justify-content:center;transition:all .25s ease;}
.card-arrow svg{width:15px;height:15px;fill:none;stroke-width:2.5;transition:transform .25s ease;}
.nav-card:hover .card-arrow{transform:translateX(-4px);}

/* ألوان */
.c-triage::before{background:linear-gradient(90deg,var(--blue-d),var(--blue));}
.c-triage .card-icon{background:var(--blue-ll);border-color:rgba(26,128,251,0.18);} .c-triage .card-icon svg{stroke:var(--blue-d);}
.c-triage .card-tag{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.18);}
.c-triage .card-arrow{background:var(--blue-ll);} .c-triage .card-arrow svg{stroke:var(--blue);}

.c-lab1::before{background:linear-gradient(90deg,#0369a1,var(--cyan));}
.c-lab1 .card-icon{background:var(--cyan-l);border-color:rgba(8,145,178,0.18);} .c-lab1 .card-icon svg{stroke:#0369a1;}
.c-lab1 .card-tag{background:var(--cyan-l);color:#0369a1;border-color:rgba(8,145,178,0.18);}
.c-lab1 .card-arrow{background:var(--cyan-l);} .c-lab1 .card-arrow svg{stroke:var(--cyan);}

.c-lab2::before{background:linear-gradient(90deg,#0f766e,#14b8a6);}
.c-lab2 .card-icon{background:#ccfbf1;border-color:rgba(20,184,166,0.18);} .c-lab2 .card-icon svg{stroke:#0f766e;}
.c-lab2 .card-tag{background:#ccfbf1;color:#0f766e;border-color:rgba(20,184,166,0.18);}
.c-lab2 .card-arrow{background:#ccfbf1;} .c-lab2 .card-arrow svg{stroke:#14b8a6;}

.c-rx::before{background:linear-gradient(90deg,#15803d,#22c55e);}
.c-rx .card-icon{background:var(--green-l);border-color:rgba(22,163,74,0.18);} .c-rx .card-icon svg{stroke:#15803d;}
.c-rx .card-tag{background:var(--green-l);color:#15803d;border-color:rgba(22,163,74,0.18);}
.c-rx .card-arrow{background:var(--green-l);} .c-rx .card-arrow svg{stroke:var(--green);}

.c-admin::before{background:linear-gradient(90deg,#1e3a5f,var(--blue-d));}
.c-admin .card-icon{background:#e8f0fe;border-color:rgba(30,58,95,0.15);} .c-admin .card-icon svg{stroke:#1e3a5f;}
.c-admin .card-tag{background:#e8f0fe;color:#1e3a5f;border-color:rgba(30,58,95,0.15);}
.c-admin .card-arrow{background:#e8f0fe;} .c-admin .card-arrow svg{stroke:#1e3a5f;}

/* بطاقة أفقية */
.card-wide{flex-direction:row;align-items:center;gap:22px;padding:26px 32px 26px 70px;}
.card-wide .card-icon{margin-bottom:0;width:68px;height:68px;border-radius:20px;flex-shrink:0;}
.card-wide .card-icon svg{width:32px;height:32px;}
.card-wide .card-label{font-size:20px;}
.card-wide .card-arrow{bottom:auto;top:50%;transform:translateY(-50%);}
.card-wide:hover .card-arrow{transform:translateY(-50%) translateX(-4px);}

.nav-card:nth-child(1){animation-delay:.08s}
.nav-card:nth-child(2){animation-delay:.14s}
.nav-card:nth-child(3){animation-delay:.20s}
.nav-card:nth-child(4){animation-delay:.26s}
.nav-card:nth-child(5){animation-delay:.32s}

/* BOTTOM BAR */
.bottom-bar{position:fixed;bottom:0;left:0;right:0;height:48px;background:rgba(255,255,255,0.93);backdrop-filter:blur(20px);border-top:1.5px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 40px;z-index:1000;animation:slideUp .5s ease .3s both;}
.bb-left,.bb-right{display:flex;align-items:center;gap:16px;}
.bb-item{display:flex;align-items:center;gap:6px;font-size:11px;font-weight:600;color:var(--muted);}
.bb-item svg{width:12px;height:12px;stroke:var(--soft);fill:none;stroke-width:2;}
.bb-sep{width:1px;height:16px;background:var(--border);}
.bb-dot-g{width:6px;height:6px;border-radius:50%;background:var(--green);animation:pulse 1.8s ease infinite;}
.bb-ver{font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:600;background:var(--blue-ll);border:1px solid var(--border2);border-radius:6px;padding:2px 8px;color:var(--blue-d);}

@media(max-width:640px){
    .topbar{padding:0 18px;}.tb-center{display:none;}
    .main{padding:86px 16px 64px;gap:18px;}
    .nav-grid{grid-template-columns:1fr 1fr;gap:12px;max-width:400px;}
    .nav-grid .col-2,.nav-grid .col-full{grid-column:1/-1;}
    .nav-card{padding:20px 18px 18px;}
    .card-wide{flex-direction:column;align-items:flex-start;padding:20px 18px 18px;}
    .card-wide .card-arrow{bottom:18px;left:18px;top:auto;transform:none;}
    .card-wide:hover .card-arrow{transform:translateX(-4px);}
    .hero-title{font-size:26px;}
    .bottom-bar{padding:0 18px;}
}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-orb1"></div><div class="bg-orb2"></div><div class="bg-stripe"></div></div>

<div class="topbar" style="position:fixed;">
    <div class="tb-brand">
        <div class="tb-logo-wrap">
            <div class="tb-logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
        </div>
        <div>
            <div class="tb-name">أهلاً، {{ session('name') }}</div>
            <div class="tb-badge">
                <div class="tb-badge-dot"></div>
                @if(session('role')==='admin') ADMIN — مدير النظام @else DOCTOR — طبيب @endif
            </div>
        </div>
    </div>

    <div class="tb-center">
        <div class="tb-status"><div class="tb-status-dot"></div> النظام نشط</div>
        <div class="tb-clock">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <span id="liveClock">--:--:--</span>
        </div>
    </div>

    <a href="{{ route('logout') }}" class="tb-logout">
        <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        تسجيل الخروج
    </a>
</div>

<div class="main">

    <div class="page-hero">
        <div class="hero-pill">
            <div class="hero-pill-dot"></div>
            <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            EMERGENCY SYSTEM — نظام الاستعجالات
        </div>
<h1 class="hero-title">نظام <span>الاستعجالات</span> — مستشفى عاشور زيان — أولاد جلال</h1>
        <p class="hero-sub">اختر القسم المطلوب للمتابعة</p>
    </div>

    <div class="stats-bar">
        <div class="stat-chip"><div class="sc-dot g"></div><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg> النظام متاح</div>
        <div class="stat-chip"><div class="sc-dot b"></div><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> قسم الطوارئ</div>
        <div class="stat-chip"><div class="sc-dot c"></div><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> آمن ومشفّر</div>
        <div class="stat-chip"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> متاح 24 / 7</div>
    </div>

    <div class="nav-grid">

        <a href="{{ route('triage') }}" class="nav-card c-triage">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div class="card-label">مكتب الفرز</div>
            <div class="card-sub">تسجيل وتوجيه المرضى الجدد عند الوصول</div>
            <div class="card-tag">TRIAGE</div>
            <div class="card-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

        <a href="{{ route('lab.one') }}" class="nav-card c-lab1">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
            </div>
            <div class="card-label">فحوصات 1</div>
            <div class="card-sub">غرفة الفحوصات الأولى — المرضى الداخليين</div>
            <div class="card-tag">LAB — ROOM 01</div>
            <div class="card-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

        <a href="{{ route('lab.two') }}" class="nav-card c-lab2">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
            </div>
            <div class="card-label">فحوصات 2</div>
            <div class="card-sub">غرفة الفحوصات الثانية — الجراحة والتخصصات</div>
            <div class="card-tag">LAB — ROOM 02</div>
            <div class="card-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

        @if(session('role') === 'admin')

        <a href="{{ route('prescription.create') }}" class="nav-card c-rx">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <div class="card-label">وصفة طبية</div>
            <div class="card-sub">إنشاء وطباعة الوصفات الطبية</div>
            <div class="card-tag">PRESCRIPTION</div>
            <div class="card-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="nav-card c-admin col-2">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div class="card-label">لوحة التحكم</div>
            <div class="card-sub">إدارة المستخدمين، المرضى، والإعلانات — صلاحيات كاملة</div>
            <div class="card-tag">ADMIN PANEL</div>
            <div class="card-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

        @else

        <a href="{{ route('prescription.create') }}" class="nav-card c-rx card-wide col-full">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <div>
                <div class="card-label">وصفة طبية</div>
                <div class="card-sub">إنشاء وإدارة وطباعة الوصفات الطبية للمرضى</div>
                <div class="card-tag">PRESCRIPTION</div>
            </div>
            <div class="card-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

        @endif

    </div>
</div>

<div class="bottom-bar">
    <div class="bb-left">
        <div class="bb-item"><div class="bb-dot-g"></div> النظام متاح</div>
        <div class="bb-sep"></div>
        <div class="bb-item"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg> طوارئ طبية</div>
        <div class="bb-sep"></div>
        <div class="bb-item"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> SSL مشفّر</div>
    </div>
    <div class="bb-right">
        <div class="bb-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span id="footerClock">--:--</span></div>
        <div class="bb-sep"></div>
        <div class="bb-ver">v2.0</div>
    </div>
</div>

<script>
function tick(){
    const n=new Date();
    const pad=v=>String(v).padStart(2,'0');
    document.getElementById('liveClock').textContent=`${pad(n.getHours())}:${pad(n.getMinutes())}:${pad(n.getSeconds())}`;
    document.getElementById('footerClock').textContent=`${pad(n.getHours())}:${pad(n.getMinutes())}`;
}
tick(); setInterval(tick,1000);
</script>
@endsection