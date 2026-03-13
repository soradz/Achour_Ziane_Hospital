

<?php $__env->startSection('title', 'مكتب الفرز والتوجيه'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    :root {
        --blue:    #1a80fb;
        --blue-d:  #0057c8;
        --blue-l:  #dbeafe;
        --green:   #16a34a;
        --green-l: #dcfce7;
        --red:     #dc2626;
        --red-l:   #fee2e2;
        --text:    #0a2540;
        --mid:     #3a6186;
        --soft:    #7da8cc;
        --border:  rgba(26,128,251,0.15);
    }

    html, body {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* ══ BACKGROUND ══ */
    .bg-scene {
        position: fixed; inset:0; z-index:0; overflow:hidden;
        background: linear-gradient(145deg,#ffffff 0%,#d6ecff 45%,#b8dcff 80%,#9aceff 100%);
    }
    .bg-c { position:absolute;border-radius:50%;filter:blur(70px);opacity:0.45; }
    .bc1 { width:600px;height:600px;background:radial-gradient(circle,#70b8ff,#3a8fef);top:-180px;right:-180px;animation:d1 20s ease-in-out infinite; }
    .bc2 { width:440px;height:440px;background:radial-gradient(circle,#b3d9ff,#5aaaff);bottom:-130px;left:-130px;animation:d2 25s ease-in-out infinite; }
    .bc3 { width:260px;height:260px;background:radial-gradient(circle,#fff,#c9e8ff);top:35%;left:25%;opacity:0.6;animation:d3 18s ease-in-out infinite; }
    @keyframes  d1{0%,100%{transform:translate(0,0) scale(1)}33%{transform:translate(-40px,28px) scale(1.04)}66%{transform:translate(20px,-38px) scale(0.96)}}
    @keyframes  d2{0%,100%{transform:translate(0,0) scale(1)}40%{transform:translate(38px,-20px) scale(1.06)}70%{transform:translate(-28px,38px) scale(0.97)}}
    @keyframes  d3{0%,100%{transform:translate(0,0)}50%{transform:translate(20px,20px)}}
    .bg-grid { position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px; }
    .float-icons { position:absolute;inset:0;pointer-events:none; }
    .fi { position:absolute;opacity:0.1;animation:fiF ease-in-out infinite; }
    @keyframes  fiF{0%,100%{transform:translateY(0) rotate(0deg);opacity:0.1}30%{transform:translateY(-14px) rotate(5deg) scale(1.05);opacity:0.17}65%{transform:translateY(-6px) rotate(-3deg);opacity:0.13}}
    .particles { position:absolute;inset:0; }
    .pt { position:absolute;border-radius:50%;background:var(--blue);animation:ptR linear infinite; }
    @keyframes  ptR{0%{transform:translateY(105vh);opacity:0}8%{opacity:1}90%{opacity:0.4}100%{transform:translateY(-5vh);opacity:0}}

    @keyframes  lp{0%,100%{box-shadow:0 0 0 0 rgba(26,128,251,0.4)}50%{box-shadow:0 0 0 5px rgba(26,128,251,0)}}
    @keyframes  gp{0%,100%{box-shadow:0 0 0 0 rgba(22,163,74,0.4)}50%{box-shadow:0 0 0 5px rgba(22,163,74,0)}}
    @keyframes  spin{to{transform:rotate(360deg)}}
    @keyframes  hb{0%,100%{transform:scale(1)}14%{transform:scale(1.1)}28%{transform:scale(1)}42%{transform:scale(1.06)}56%{transform:scale(1)}}
    @keyframes  fadeUp{from{opacity:0;transform:translateY(18px) scale(0.97)}to{opacity:1;transform:translateY(0) scale(1)}}
    @keyframes  popIn{from{opacity:0;transform:scale(0.8) translateY(20px)}to{opacity:1;transform:scale(1) translateY(0)}}
    @keyframes  bob{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-5px) rotate(-5deg)}}
    @keyframes  waveH{0%,100%{transform:rotate(0)}20%{transform:rotate(-20deg)}40%{transform:rotate(15deg)}60%{transform:rotate(-10deg)}80%{transform:rotate(5deg)}}

    /* ══ MAIN ══ */
    .main {
        position: relative; z-index:1;
        min-height: 100vh;
        padding: 30px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0;
    }

    /* ══ TITLE CARD ══ */
    .title-card {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(20px);
        border: 1.5px solid var(--border);
        border-radius: 22px;
        padding: 22px 36px 18px;
        width: 100%; max-width: 600px;
        text-align: center;
        margin-bottom: 20px;
        box-shadow: 0 6px 30px rgba(26,128,251,0.1), 0 1px 0 rgba(255,255,255,0.9) inset;
        animation: fadeUp 0.6s cubic-bezier(0.34,1.3,0.64,1) 0.05s both;
        position: relative; overflow: hidden;
    }
    .title-card::before {
        content:''; position:absolute; top:0; left:0; right:0; height:3px;
        background: linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);
        border-radius: 22px 22px 0 0;
    }

    .title-icon-wrap { position:relative;width:58px;height:58px;margin:0 auto 10px; }
    .title-icon-wrap::before { content:'';position:absolute;inset:-3px;border-radius:50%;background:conic-gradient(var(--blue),#4fa8ff,#a8d4ff,var(--blue));animation:spin 3s linear infinite;z-index:0; }
    .title-icon-inner { position:relative;z-index:1;width:58px;height:58px;border-radius:50%;background:linear-gradient(135deg,#fff,#e0f0ff);display:flex;align-items:center;justify-content:center;font-size:26px;box-shadow:0 4px 14px rgba(26,128,251,0.2);animation:hb 3s ease infinite; }

    .title-pill { display:inline-flex;align-items:center;gap:6px;background:rgba(26,128,251,0.1);border:1.5px solid var(--border);border-radius:30px;padding:3px 12px;font-size:11px;font-weight:700;color:var(--blue-d);margin-bottom:7px; }
    .pill-w { animation:waveH 2.5s ease infinite;display:inline-block; }

    .title-card h1 { font-size:20px;font-weight:900;color:var(--text);letter-spacing:-0.3px; }
    .title-card h1 span { background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }
    .title-card p { font-size:11px;color:var(--soft);margin-top:3px; }

    /* ══ DIVIDER ══ */
    .divider {
        display:flex;align-items:center;gap:8px;
        width:100%;max-width:600px;margin-bottom:16px;
        animation:fadeUp 0.5s ease 0.15s both;
    }
    .div-line { flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(26,128,251,0.2),transparent); }
    .div-text { font-size:9px;font-weight:800;color:var(--soft);letter-spacing:2px;white-space:nowrap; }
    .div-cross { font-size:10px;color:rgba(26,128,251,0.4); }

    /* ══ ACTION BUTTONS ══ */
    .actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        width: 100%; max-width: 600px;
        margin-bottom: 16px;
    }

    .action-btn {
        position: relative;
        display: flex; flex-direction:column; align-items:center; justify-content:center;
        gap: 9px;
        padding: 26px 18px 18px;
        border-radius: 20px;
        text-decoration: none;
        border: 1.5px solid transparent;
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(20px);
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.34,1.5,0.64,1);
        box-shadow: 0 4px 20px rgba(26,128,251,0.09), 0 1px 0 rgba(255,255,255,0.9) inset;
        animation: popIn 0.6s cubic-bezier(0.34,1.7,0.64,1) both;
    }
    .action-btn::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:20px 20px 0 0; }
    .action-btn::after { content:'';position:absolute;top:-50%;left:-80%;width:50%;height:200%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.5),transparent);transform:skewX(-15deg);transition:left 0.6s ease; }
    .action-btn:hover::after { left:140%; }
    .action-btn:hover { transform:translateY(-6px) scale(1.02); }

    /* Green */
    .btn-medical { border-color:rgba(22,163,74,0.18); animation-delay:0.2s; }
    .btn-medical::before { background:linear-gradient(90deg,var(--green),#4ade80); }
    .btn-medical:hover { border-color:rgba(22,163,74,0.45);box-shadow:0 18px 50px rgba(22,163,74,0.2),0 1px 0 rgba(255,255,255,0.9) inset; }
    .btn-medical .ab-icon { background:linear-gradient(135deg,var(--green-l),#bbf7d0);box-shadow:0 5px 16px rgba(22,163,74,0.25); }
    .btn-medical .ab-title { color:var(--green); }
    .btn-medical .ab-tag { background:rgba(22,163,74,0.1);color:var(--green);border-color:rgba(22,163,74,0.2); }
    .btn-medical .ab-arrow { background:rgba(22,163,74,0.1);color:var(--green); }

    /* Red */
    .btn-surgical { border-color:rgba(220,38,38,0.16); animation-delay:0.28s; }
    .btn-surgical::before { background:linear-gradient(90deg,var(--red),#f87171); }
    .btn-surgical:hover { border-color:rgba(220,38,38,0.42);box-shadow:0 18px 50px rgba(220,38,38,0.18),0 1px 0 rgba(255,255,255,0.9) inset; }
    .btn-surgical .ab-icon { background:linear-gradient(135deg,var(--red-l),#fecaca);box-shadow:0 5px 16px rgba(220,38,38,0.22); }
    .btn-surgical .ab-title { color:var(--red); }
    .btn-surgical .ab-tag { background:rgba(220,38,38,0.08);color:var(--red);border-color:rgba(220,38,38,0.2); }
    .btn-surgical .ab-arrow { background:rgba(220,38,38,0.08);color:var(--red); }

    .ab-icon {
        width:56px;height:56px;border-radius:16px;
        display:flex;align-items:center;justify-content:center;
        font-size:26px;
        transition:transform 0.4s cubic-bezier(0.34,1.8,0.64,1);
        animation:bob 3s ease-in-out infinite;
    }
    .btn-surgical .ab-icon { animation-delay:0.4s; }
    .action-btn:hover .ab-icon { transform:scale(1.18) rotate(-10deg);animation:none; }

    .ab-title { font-size:17px;font-weight:900;letter-spacing:-0.2px; }
    .ab-sub   { font-size:11px;color:var(--soft);font-weight:400;text-align:center;line-height:1.4; }

    .ab-footer { display:flex;align-items:center;justify-content:space-between;width:100%;margin-top:2px; }
    .ab-tag { font-size:9px;font-weight:800;letter-spacing:0.8px;padding:3px 9px;border-radius:20px;border:1px solid; }
    .ab-arrow { width:26px;height:26px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;transition:all 0.3s ease; }
    .action-btn:hover .ab-arrow { transform:translateX(-3px) scale(1.1); }

    /* ══ BACK BUTTON ══ */
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 24px;
        border-radius: 12px;
        background: rgba(255,255,255,0.72);
        backdrop-filter: blur(14px);
        border: 1.5px solid var(--border);
        color: var(--mid);
        font-family: 'Tajawal', sans-serif;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.34,1.4,0.64,1);
        box-shadow: 0 3px 12px rgba(26,128,251,0.08);
        animation: fadeUp 0.5s ease 0.36s both;
    }
    .back-btn:hover { background:rgba(255,255,255,0.92);border-color:rgba(26,128,251,0.3);color:var(--blue-d);transform:translateY(-2px);box-shadow:0 8px 24px rgba(26,128,251,0.15); }
    .back-icon { display:inline-block;transition:transform 0.3s ease; }
    .back-btn:hover .back-icon { transform:translateX(3px); }

    @media(max-width:480px){
        .actions { grid-template-columns:1fr; }
        .main { padding:20px 12px; }
        .title-card { padding:18px 20px 14px; }
    }
</style>

<!-- ════ BG ════ -->
<div class="bg-scene">
    <div class="bg-c bc1"></div>
    <div class="bg-c bc2"></div>
    <div class="bg-c bc3"></div>
    <div class="bg-grid"></div>
    <div class="float-icons" id="floatIcons"></div>
    <div class="particles" id="particles"></div>
</div>

<!-- ════ MAIN ════ -->
<div class="main">

    <!-- Title card -->
    <div class="title-card">
        <div class="title-icon-wrap">
            <div class="title-icon-inner">🔍</div>
        </div>
        <div class="title-pill">
            <span class="pill-w">👋</span>
            مرحباً بك
        </div>
        <h1>مكتب الفرز <span>والتوجيه</span></h1>
        <p>اختر القسم المناسب لتسجيل المريض</p>
    </div>

    <!-- Divider -->
    <div class="divider">
        <div class="div-line"></div>
        <span class="div-cross">✚</span>
        <span class="div-text">اختر القسم</span>
        <span class="div-cross">✚</span>
        <div class="div-line"></div>
    </div>

    <!-- Action buttons -->
    <div class="actions">

        <a href="<?php echo e(route('patients.create.medical')); ?>" class="action-btn btn-medical">
            <div class="ab-icon">🏥</div>
            <div class="ab-title">القسم الطبي</div>
            <div class="ab-sub">الأمراض الداخلية والمزمنة</div>
            <div class="ab-footer">
                <span class="ab-tag">MEDICAL</span>
                <div class="ab-arrow">←</div>
            </div>
        </a>

        <a href="<?php echo e(route('patients.create.surgical')); ?>" class="action-btn btn-surgical">
            <div class="ab-icon">🔪</div>
            <div class="ab-title">القسم الجراحي</div>
            <div class="ab-sub">العمليات والحالات الجراحية</div>
            <div class="ab-footer">
                <span class="ab-tag">SURGICAL</span>
                <div class="ab-arrow">←</div>
            </div>
        </a>

    </div>

    <!-- Back button -->
    <a href="<?php echo e(route('home')); ?>" class="back-btn">
        <span class="back-icon">↩</span>
        رجوع للصفحة الرئيسية
    </a>

</div>

<script>
    const ics=['💉','🩺','🩻','💊','🩹','🫀','🧬','🔬','⚕️','🩸','🏥','🌡️'];
    const fw=document.getElementById('floatIcons');
    ics.forEach((ic,i)=>{
        const el=document.createElement('div');el.className='fi';el.textContent=ic;
        el.style.cssText=`left:${6+i*8.2}%;top:${12+Math.sin(i*0.9)*40+16}%;font-size:${20+(i%3)*9}px;animation-duration:${7+(i%5)*2.2}s;animation-delay:${i*0.35}s;`;
        fw.appendChild(el);
    });
    const pw=document.getElementById('particles');
    for(let i=0;i<14;i++){
        const p=document.createElement('div');p.className='pt';
        const sz=Math.random()*3+1.5;
        p.style.cssText=`left:${Math.random()*100}%;width:${sz}px;height:${sz}px;opacity:${Math.random()*0.2+0.05};animation-duration:${Math.random()*14+10}s;animation-delay:${Math.random()*12}s;`;
        pw.appendChild(p);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/patients/triage.blade.php ENDPATH**/ ?>