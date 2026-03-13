@extends('layouts.app')

@section('title','تسجيل الدخول')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    :root {
        --blue-deep:   #0057c8;
        --blue-main:   #1a80fb;
        --blue-mid:    #4fa8ff;
        --blue-light:  #a8d4ff;
        --blue-pale:   #dceeff;
        --blue-bg:     #eaf4ff;
        --white:       #ffffff;
        --text-dark:   #0a2540;
        --text-mid:    #3a6186;
        --text-soft:   #7da8cc;
    }

    html, body {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        min-height: 100vh;
        overflow: hidden;
        background: var(--blue-bg);
    }

    /* ══════════════════════════════
       BACKGROUND SCENE
    ══════════════════════════════ */
    .bg-scene {
        position: fixed;
        inset: 0;
        z-index: 0;
        overflow: hidden;
        background: linear-gradient(145deg, #ffffff 0%, #d6ecff 40%, #b8dcff 80%, #9aceff 100%);
    }

    /* Large soft circles */
    .bg-circle {
        position: absolute;
        border-radius: 50%;
        filter: blur(70px);
        opacity: 0.55;
    }
    .bc-1 {
        width: 700px; height: 700px;
        background: radial-gradient(circle, #70b8ff, #3a8fef);
        top: -200px; right: -200px;
        animation: drift1 20s ease-in-out infinite;
    }
    .bc-2 {
        width: 500px; height: 500px;
        background: radial-gradient(circle, #b3d9ff, #5aaaff);
        bottom: -150px; left: -150px;
        animation: drift2 25s ease-in-out infinite;
    }
    .bc-3 {
        width: 350px; height: 350px;
        background: radial-gradient(circle, #ffffff, #c9e8ff);
        top: 35%; left: 25%;
        opacity: 0.7;
        animation: drift3 18s ease-in-out infinite;
    }

    @keyframes drift1 {
        0%,100% { transform: translate(0,0) scale(1); }
        33%      { transform: translate(-60px, 40px) scale(1.05); }
        66%      { transform: translate(30px,-50px) scale(0.95); }
    }
    @keyframes drift2 {
        0%,100% { transform: translate(0,0) scale(1); }
        40%      { transform: translate(50px,-30px) scale(1.08); }
        70%      { transform: translate(-40px, 50px) scale(0.97); }
    }
    @keyframes drift3 {
        0%,100% { transform: translate(0,0); }
        50%      { transform: translate(30px,30px); }
    }

    /* Subtle grid */
    .bg-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(26,128,251,0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(26,128,251,0.06) 1px, transparent 1px);
        background-size: 45px 45px;
    }

    /* Floating medical icons */
    .med-icons { position: absolute; inset: 0; pointer-events: none; }

    .med-icon {
        position: absolute;
        font-size: 28px;
        opacity: 0.18;
        animation: floatIcon ease-in-out infinite;
        filter: drop-shadow(0 4px 8px rgba(26,128,251,0.3));
    }

    @keyframes floatIcon {
        0%,100% { transform: translateY(0px) rotate(0deg) scale(1); opacity:0.18; }
        25%      { transform: translateY(-18px) rotate(6deg) scale(1.05); opacity:0.28; }
        50%      { transform: translateY(-8px) rotate(-4deg) scale(0.98); opacity:0.22; }
        75%      { transform: translateY(-22px) rotate(3deg) scale(1.03); opacity:0.26; }
    }



    /* Particle dots */
    .particles { position: absolute; inset: 0; }
    .dot-p {
        position: absolute;
        border-radius: 50%;
        background: var(--blue-main);
        animation: riseUp linear infinite;
    }
    @keyframes riseUp {
        0%   { transform: translateY(105vh); opacity:0; }
        8%   { opacity:1; }
        92%  { opacity:0.5; }
        100% { transform: translateY(-5vh); opacity:0; }
    }

    /* ══════════════════════════════
       LAYOUT
    ══════════════════════════════ */
    .page-wrap {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }

    /* ══════════════════════════════
       CARD
    ══════════════════════════════ */
    .card {
        position: relative;
        width: 100%;
        max-width: 440px;
        background: rgba(255,255,255,0.78);
        backdrop-filter: blur(28px);
        -webkit-backdrop-filter: blur(28px);
        border: 1.5px solid rgba(255,255,255,0.95);
        border-radius: 32px;
        padding: 48px 44px 42px;
        box-shadow:
            0 2px 0 rgba(255,255,255,0.9) inset,
            0 30px 80px rgba(0,87,200,0.18),
            0 8px 24px rgba(0,87,200,0.1);
        animation: cardBounceIn 0.9s cubic-bezier(0.34, 1.4, 0.64, 1) both;
    }

    @keyframes cardBounceIn {
        from { opacity:0; transform: translateY(50px) scale(0.92); }
        to   { opacity:1; transform: translateY(0)    scale(1); }
    }

    /* Top rainbow bar */
    .card-bar {
        position: absolute;
        top: 0; left: 50%;
        transform: translateX(-50%);
        width: 55%;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--blue-main), var(--blue-mid), transparent);
        border-radius: 3px;
    }

    /* Corner decorations */
    .card::before {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 120px; height: 120px;
        background: radial-gradient(circle at 0% 100%, rgba(26,128,251,0.08), transparent 70%);
        border-radius: 0 0 0 32px;
        pointer-events: none;
    }

    /* ══════════════════════════════
       LOGO AREA
    ══════════════════════════════ */
    .logo-area {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 38px;
        animation: fadeUp 0.6s ease 0.25s both;
    }

    .logo-wrap {
        position: relative;
        width: 88px; height: 88px;
        margin-bottom: 18px;
    }

    /* Outer spinning ring */
    .logo-wrap::before {
        content: '';
        position: absolute;
        inset: -5px;
        border-radius: 50%;
        background: conic-gradient(var(--blue-main) 0%, var(--blue-mid) 35%, var(--blue-light) 60%, var(--blue-main) 100%);
        animation: ringSpinFast 2.5s linear infinite;
        z-index: 0;
    }

    /* Pulsing glow ring */
    .logo-wrap::after {
        content: '';
        position: absolute;
        inset: -12px;
        border-radius: 50%;
        background: transparent;
        border: 2px solid rgba(26,128,251,0.25);
        animation: pulseRing 2s ease infinite;
    }

    @keyframes ringSpinFast { to { transform: rotate(360deg); } }
    @keyframes pulseRing {
        0%,100% { transform: scale(1);   opacity:0.6; }
        50%      { transform: scale(1.12); opacity:0; }
    }

    .logo-inner {
        position: relative;
        z-index: 1;
        width: 88px; height: 88px;
        border-radius: 50%;
        background: linear-gradient(135deg, #fff, #e8f4ff);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        box-shadow: 0 4px 20px rgba(26,128,251,0.2);
        animation: heartbeat 3s ease infinite;
    }

    @keyframes heartbeat {
        0%,100% { transform: scale(1); }
        14%      { transform: scale(1.08); }
        28%      { transform: scale(1); }
        42%      { transform: scale(1.05); }
        56%      { transform: scale(1); }
    }

    .logo-name {
        font-size: 23px;
        font-weight: 900;
        color: var(--text-dark);
        letter-spacing: -0.4px;
    }

    .logo-name span {
        background: linear-gradient(90deg, var(--blue-deep), var(--blue-mid));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .logo-sub {
        font-size: 13px;
        color: var(--text-soft);
        margin-top: 5px;
        font-weight: 400;
        letter-spacing: 0.4px;
    }

    /* ══════════════════════════════
       ALERTS
    ══════════════════════════════ */
    .alert {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        border-radius: 14px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 22px;
        animation: alertSlide 0.4s ease both;
    }
    @keyframes alertSlide {
        from { opacity:0; transform: translateY(-10px) scale(0.97); }
        to   { opacity:1; transform: translateY(0)     scale(1); }
    }
    .alert-error {
        background: rgba(255,59,59,0.08);
        border: 1.5px solid rgba(255,59,59,0.25);
        color: #c0392b;
    }
    .alert-success {
        background: rgba(39,174,96,0.09);
        border: 1.5px solid rgba(39,174,96,0.3);
        color: #1e8449;
    }

    /* ══════════════════════════════
       FORM FIELDS
    ══════════════════════════════ */
    .form-group {
        margin-bottom: 22px;
        animation: fadeUp 0.5s ease both;
    }
    .form-group:nth-child(1) { animation-delay:0.35s; }
    .form-group:nth-child(2) { animation-delay:0.45s; }

    .f-label {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 13px;
        font-weight: 700;
        color: var(--text-mid);
        margin-bottom: 9px;
        letter-spacing: 0.2px;
    }

    .f-label-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 22px; height: 22px;
        background: rgba(26,128,251,0.12);
        border-radius: 6px;
        font-size: 12px;
        animation: wiggle 4s ease infinite;
    }

    @keyframes wiggle {
        0%,90%,100% { transform: rotate(0deg); }
        92%          { transform: rotate(-12deg); }
        96%          { transform: rotate(10deg); }
    }

    .f-wrap { position: relative; }

    .f-input {
        width: 100%;
        background: rgba(255,255,255,0.9);
        border: 1.5px solid rgba(26,128,251,0.18);
        border-radius: 14px;
        padding: 14px 52px 14px 48px;
        font-family: 'Tajawal', sans-serif;
        font-size: 15px;
        font-weight: 500;
        color: var(--text-dark);
        outline: none;
        direction: rtl;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(26,128,251,0.06);
    }

    .f-input::placeholder { color: var(--blue-light); }

    .f-input:focus {
        background: #fff;
        border-color: var(--blue-main);
        box-shadow: 0 0 0 4px rgba(26,128,251,0.12), 0 4px 16px rgba(26,128,251,0.12);
        transform: translateY(-1px);
    }

    /* Right icon */
    .f-icon-r {
        position: absolute;
        right: 15px; top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        transition: transform 0.35s cubic-bezier(0.34,1.5,0.64,1), filter 0.3s;
        pointer-events: none;
        z-index: 2;
        filter: drop-shadow(0 2px 4px rgba(26,128,251,0.15));
    }

    .f-input:focus ~ .f-icon-r {
        transform: translateY(-50%) scale(1.25) rotate(-8deg);
        filter: drop-shadow(0 4px 8px rgba(26,128,251,0.4));
    }

    /* Left toggle */
    .f-toggle {
        position: absolute;
        left: 12px; top: 50%;
        transform: translateY(-50%);
        background: none; border: none;
        cursor: pointer; font-size: 17px;
        padding: 4px;
        transition: transform 0.3s ease, filter 0.3s;
        z-index: 2;
    }
    .f-toggle:hover {
        transform: translateY(-50%) scale(1.3);
        filter: drop-shadow(0 2px 6px rgba(26,128,251,0.5));
    }

    /* Underline sweep */
    .f-line {
        position: absolute;
        bottom: 0; left: 50%;
        width: 0; height: 2px;
        background: linear-gradient(90deg, var(--blue-main), var(--blue-mid));
        border-radius: 2px;
        transition: width 0.4s ease, left 0.4s ease;
    }
    .f-input:focus ~ .f-line { width: 100%; left: 0; }

    /* ══════════════════════════════
       SUBMIT BUTTON
    ══════════════════════════════ */
    .btn-submit {
        position: relative;
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, var(--blue-deep), var(--blue-main), var(--blue-mid));
        background-size: 200% 100%;
        color: white;
        border: none;
        border-radius: 16px;
        font-family: 'Tajawal', sans-serif;
        font-size: 17px;
        font-weight: 800;
        cursor: pointer;
        margin-top: 8px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.34, 1.4, 0.64, 1);
        letter-spacing: 0.3px;
        animation: fadeUp 0.5s ease 0.55s both;
        box-shadow:
            0 8px 30px rgba(26,128,251,0.4),
            0 2px 0 rgba(255,255,255,0.2) inset;
    }

    /* Animated gradient shift */
    .btn-submit { animation: fadeUp 0.5s ease 0.55s both, gradShift 3s ease infinite 1s; }
    @keyframes gradShift {
        0%,100% { background-position: 0% 50%; }
        50%      { background-position: 100% 50%; }
    }

    /* Shine sweep */
    .btn-submit::after {
        content: '';
        position: absolute;
        top: -50%; left: -80%;
        width: 50%; height: 200%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
        transform: skewX(-15deg);
        transition: left 0.6s ease;
    }

    .btn-submit:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 18px 50px rgba(26,128,251,0.5), 0 4px 0 rgba(255,255,255,0.15) inset;
    }
    .btn-submit:hover::after { left: 140%; }
    .btn-submit:active { transform: translateY(-1px) scale(0.99); }

    .btn-inner {
        position: relative; z-index: 1;
        display: flex; align-items: center;
        justify-content: center; gap: 12px;
    }

    .btn-icon-wrap {
        display: flex; align-items: center;
        gap: 8px;
        transition: transform 0.3s ease;
    }

    .btn-submit:hover .btn-icon-wrap {
        transform: translateX(-6px);
    }

    .btn-label-icon {
        font-size: 20px;
        animation: rocketPulse 2s ease infinite;
    }
    @keyframes rocketPulse {
        0%,100% { transform: rotate(0deg); }
        50%      { transform: rotate(-15deg) scale(1.1); }
    }

    .btn-arrow {
        font-size: 20px;
        animation: arrowBounce 1.4s ease infinite;
    }
    @keyframes arrowBounce {
        0%,100% { transform: translateX(0); }
        50%      { transform: translateX(-5px); }
    }

    /* Loading */
    .spinner {
        display: none;
        width: 22px; height: 22px;
        border: 2.5px solid rgba(255,255,255,0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.65s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    .btn-submit.loading .btn-label  { display:none; }
    .btn-submit.loading .btn-icon-wrap { display:none; }
    .btn-submit.loading .spinner   { display:block; }

    /* ══════════════════════════════
       FOOTER
    ══════════════════════════════ */
    .divider {
        display: flex; align-items: center; gap: 12px;
        margin: 28px 0 18px;
        animation: fadeUp 0.5s ease 0.65s both;
    }
    .div-line { flex:1; height:1px; background: rgba(26,128,251,0.12); }
    .div-txt  { font-size:12px; color: var(--text-soft); font-weight:500; white-space:nowrap; }

    .badges-row {
        display: flex; align-items: center;
        justify-content: center; gap: 10px;
        animation: fadeUp 0.5s ease 0.75s both;
    }

    .badge {
        display: flex; align-items: center; gap: 7px;
        background: rgba(26,128,251,0.07);
        border: 1.5px solid rgba(26,128,251,0.15);
        border-radius: 20px;
        padding: 7px 16px;
        font-size: 12px;
        font-weight: 600;
        color: var(--text-mid);
        transition: all 0.3s ease;
    }
    .badge:hover {
        background: rgba(26,128,251,0.13);
        border-color: rgba(26,128,251,0.35);
        transform: translateY(-2px);
    }

    .live-dot {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: #22c55e;
        animation: livePulse 1.8s ease infinite;
        flex-shrink: 0;
    }
    @keyframes livePulse {
        0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
        50%      { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
    }

    /* Badge icons animated */
    .badge-icon { animation: badgeWave 3s ease infinite; display:inline-block; }
    @keyframes badgeWave {
        0%,100% { transform: rotate(0deg); }
        25%      { transform: rotate(-10deg) scale(1.15); }
        75%      { transform: rotate(8deg)  scale(1.1); }
    }

    @keyframes fadeUp {
        from { opacity:0; transform: translateY(18px); }
        to   { opacity:1; transform: translateY(0); }
    }

    /* ══════════════════════════════
       RESPONSIVE
    ══════════════════════════════ */
    @media (max-width:480px) {
        .card { padding: 36px 26px 32px; }
        .logo-name { font-size:19px; }
        .btn-submit { font-size:16px; }
    }
</style>

<!-- ════ BACKGROUND ════ -->
<div class="bg-scene">
    <div class="bg-circle bc-1"></div>
    <div class="bg-circle bc-2"></div>
    <div class="bg-circle bc-3"></div>
    <div class="bg-grid"></div>

    <!-- Floating medical icons -->
    <div class="med-icons" id="medIcons"></div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>


</div>

<!-- ════ PAGE ════ -->
<div class="page-wrap">
    <div class="card">
        <div class="card-bar"></div>

        <!-- Logo -->
        <div class="logo-area">
            <div class="logo-wrap">
                <div class="logo-inner">🏥</div>
            </div>
            <div class="logo-name">نظام <span>الاستعجالات</span></div>
            <div class="logo-sub">مرحباً بك — قسم الطوارئ الطبية</div>
        </div>

        <!-- Alerts -->
        @if(session('error'))
        <div class="alert alert-error">
            <span style="font-size:18px;animation:wiggle 1s ease infinite">⚠️</span>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            <span style="font-size:18px">✅</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label class="f-label" for="email">
                    <span class="f-label-icon">📧</span>
                    البريد الإلكتروني
                </label>
                <div class="f-wrap">
                    <input type="email" id="email" name="email" class="f-input"
                           placeholder="example@hospital.dz"
                           autocomplete="email" required>
                    <span class="f-icon-r">✉️</span>
                    <div class="f-line"></div>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="f-label" for="password">
                    <span class="f-label-icon" style="animation-delay:0.5s">🔐</span>
                    كلمة المرور
                </label>
                <div class="f-wrap">
                    <input type="password" id="password" name="password" class="f-input"
                           placeholder="••••••••"
                           autocomplete="current-password" required>
                    <span class="f-icon-r">🔒</span>
                    <button type="button" class="f-toggle" id="togglePass">👁️</button>
                    <div class="f-line"></div>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-submit" id="submitBtn">
                <div class="btn-inner">
                    <div class="spinner"></div>
                    <span class="btn-label">الدخول إلى النظام</span>
                    <div class="btn-icon-wrap">
                        <span class="btn-label-icon">🚀</span>
                        <span class="btn-arrow">←</span>
                    </div>
                </div>
            </button>
        </form>

        <div class="divider">
            <div class="div-line"></div>
            <span class="div-txt">🔒 نظام آمن ومحمي بالكامل</span>
            <div class="div-line"></div>
        </div>

        <div class="badges-row">
            <div class="badge">
                <div class="live-dot"></div>
                النظام متاح 24/7
            </div>
            <div class="badge">
                <span class="badge-icon">🛡️</span>
                SSL مشفّر
            </div>
            <div class="badge">
                <span class="badge-icon" style="animation-delay:0.8s">💊</span>
                طوارئ
            </div>
        </div>
    </div>
</div>

<script>
    // ── Medical floating icons ──
    const iconPool = ['💉','🩺','🩻','💊','🩹','🫀','🧬','🔬','⚕️','🩸','🏥','⚡'];
    const iconContainer = document.getElementById('medIcons');
    iconPool.forEach((icon, i) => {
        const el = document.createElement('div');
        el.className = 'med-icon';
        el.textContent = icon;
        el.style.cssText = `
            left: ${8 + (i * 8)}%;
            top:  ${10 + Math.sin(i) * 40 + 20}%;
            font-size: ${22 + (i % 3) * 8}px;
            animation-duration: ${7 + (i % 5) * 2}s;
            animation-delay: ${i * 0.4}s;
        `;
        iconContainer.appendChild(el);
    });

    // ── Floating particles ──
    const pContainer = document.getElementById('particles');
    for (let i = 0; i < 20; i++) {
        const p = document.createElement('div');
        p.className = 'dot-p';
        const size = Math.random() * 4 + 2;
        p.style.cssText = `
            left: ${Math.random() * 100}%;
            width: ${size}px; height: ${size}px;
            opacity: ${Math.random() * 0.35 + 0.1};
            animation-duration: ${Math.random() * 14 + 10}s;
            animation-delay: ${Math.random() * 12}s;
        `;
        pContainer.appendChild(p);
    }

    // ── Toggle password ──
    const toggleBtn = document.getElementById('togglePass');
    const passField = document.getElementById('password');
    let shown = false;
    toggleBtn.addEventListener('click', () => {
        shown = !shown;
        passField.type = shown ? 'text' : 'password';
        toggleBtn.textContent = shown ? '🙈' : '👁️';
    });

    // ── Loading on submit ──
    document.getElementById('loginForm').addEventListener('submit', () => {
        const btn = document.getElementById('submitBtn');
        btn.classList.add('loading');
        btn.disabled = true;
    });
</script>
@endsection