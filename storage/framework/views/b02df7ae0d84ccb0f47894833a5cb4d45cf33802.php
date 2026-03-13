

<?php $__env->startSection('title', 'تسجيل مريض - القسم الطبي'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    :root {
        --blue:   #1a80fb;
        --blue-d: #0057c8;
        --blue-l: #dbeafe;
        --green:  #16a34a;
        --green-l:#dcfce7;
        --cyan:   #0891b2;
        --cyan-l: #cffafe;
        --text:   #0a2540;
        --mid:    #3a6186;
        --soft:   #7da8cc;
        --border: rgba(26,128,251,0.15);
    }

    html, body { font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden; }

    /* BG */
    .bg-scene { position:fixed;inset:0;z-index:0;overflow:hidden;background:linear-gradient(145deg,#ffffff 0%,#d6ecff 45%,#b8dcff 80%,#9aceff 100%); }
    .bg-c { position:absolute;border-radius:50%;filter:blur(70px);opacity:0.45; }
    .bc1 { width:600px;height:600px;background:radial-gradient(circle,#70b8ff,#3a8fef);top:-180px;right:-180px;animation:d1 20s ease-in-out infinite; }
    .bc2 { width:440px;height:440px;background:radial-gradient(circle,#b3d9ff,#5aaaff);bottom:-130px;left:-130px;animation:d2 25s ease-in-out infinite; }
    .bg-grid { position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px; }
    .fi { position:absolute;opacity:0.09;animation:fiF ease-in-out infinite; }
    .float-icons { position:absolute;inset:0;pointer-events:none; }
    @keyframes  fiF{0%,100%{transform:translateY(0) rotate(0deg);opacity:0.09}30%{transform:translateY(-14px) rotate(5deg) scale(1.05);opacity:0.15}65%{transform:translateY(-6px) rotate(-3deg);opacity:0.11}}
    @keyframes  d1{0%,100%{transform:translate(0,0)}33%{transform:translate(-40px,28px)}66%{transform:translate(20px,-38px)}}
    @keyframes  d2{0%,100%{transform:translate(0,0)}40%{transform:translate(38px,-20px)}70%{transform:translate(-28px,38px)}}
    @keyframes  spin{to{transform:rotate(360deg)}}
    @keyframes  hb{0%,100%{transform:scale(1)}14%{transform:scale(1.1)}28%{transform:scale(1)}42%{transform:scale(1.06)}56%{transform:scale(1)}}
    @keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
    @keyframes  bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}

    /* MAIN */
    .main {
        position:relative;z-index:1;
        min-height:100vh;
        padding:28px 18px;
        max-width:640px;
        margin:0 auto;
        display:flex;flex-direction:column;gap:14px;
        justify-content:center;
    }

    /* PAGE HEADER */
    .page-header {
        background:rgba(255,255,255,0.82);backdrop-filter:blur(20px);
        border:1.5px solid var(--border);border-radius:20px;
        padding:16px 22px 13px;
        display:flex;align-items:center;gap:13px;
        box-shadow:0 5px 24px rgba(26,128,251,0.1),0 1px 0 rgba(255,255,255,0.9) inset;
        animation:fadeUp 0.5s ease 0.05s both;
        position:relative;overflow:hidden;
    }
    .page-header::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);border-radius:20px 20px 0 0; }

    .ph-logo { position:relative;width:42px;height:42px;flex-shrink:0; }
    .ph-logo::before { content:'';position:absolute;inset:-2px;border-radius:12px;background:conic-gradient(var(--blue),#4fa8ff,#a8d4ff,var(--blue));animation:spin 3s linear infinite;z-index:0; }
    .ph-logo-in { position:relative;z-index:1;width:42px;height:42px;border-radius:11px;background:linear-gradient(135deg,#fff,#e0f0ff);display:flex;align-items:center;justify-content:center;font-size:20px;box-shadow:0 2px 10px rgba(26,128,251,0.2);animation:hb 3s ease infinite; }
    .ph-info { flex:1; }
    .ph-title { font-size:15px;font-weight:900;color:var(--text); }
    .ph-title span { background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }
    .ph-sub { font-size:10px;color:var(--soft);margin-top:2px;font-weight:600; }

    .ph-btns { display:flex;gap:7px;flex-shrink:0; }
    .btn-teal {
        display:flex;align-items:center;gap:5px;padding:6px 12px;border-radius:8px;
        background:linear-gradient(135deg,var(--cyan),#22d3ee);
        color:white;font-family:'Tajawal',sans-serif;font-size:11px;font-weight:700;
        text-decoration:none;transition:all 0.25s ease;
        box-shadow:0 3px 10px rgba(8,145,178,0.22);white-space:nowrap;
    }
    .btn-teal:hover { transform:translateY(-1px);box-shadow:0 6px 18px rgba(8,145,178,0.3); }
    .btn-grey {
        display:flex;align-items:center;gap:5px;padding:6px 12px;border-radius:8px;
        background:rgba(26,128,251,0.07);border:1.5px solid var(--border);
        color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:11px;font-weight:700;
        text-decoration:none;transition:all 0.25s ease;white-space:nowrap;
    }
    .btn-grey:hover { background:rgba(26,128,251,0.14);border-color:rgba(26,128,251,0.35);transform:translateY(-1px); }

    /* FORM CARD */
    .form-card {
        background:rgba(255,255,255,0.85);backdrop-filter:blur(20px);
        border:1.5px solid var(--border);border-radius:22px;
        padding:22px;
        box-shadow:0 8px 36px rgba(26,128,251,0.1),0 1px 0 rgba(255,255,255,0.9) inset;
        animation:fadeUp 0.5s ease 0.12s both;
        position:relative;overflow:hidden;
    }
    .form-card::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);border-radius:22px 22px 0 0; }

    /* GRID */
    .row { display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px; }
    .row.single { grid-template-columns:1fr; }

    .field { display:flex;flex-direction:column;gap:5px; }
    .field-label {
        display:flex;align-items:center;gap:5px;
        font-size:10px;font-weight:800;color:var(--mid);
        letter-spacing:0.6px;text-transform:uppercase;
    }
    .fl-ic { font-size:12px; }

    .field-input {
        padding:10px 13px;border-radius:10px;
        border:1.5px solid rgba(26,128,251,0.18);
        background:rgba(255,255,255,0.9);
        font-family:'Tajawal',sans-serif;font-size:13px;font-weight:500;
        color:var(--text);outline:none;
        transition:all 0.25s ease;
        -webkit-appearance:none;
    }
    .field-input:focus { border-color:var(--blue);box-shadow:0 0 0 3px rgba(26,128,251,0.1);background:#fff; }
    .field-input::placeholder { color:var(--soft); }
    select.field-input { cursor:pointer; }

    /* divider */
    .fdiv { height:1px;background:rgba(26,128,251,0.1);margin:14px 0; }

    /* SUBMIT */
    .btn-submit {
        width:100%;display:flex;align-items:center;justify-content:center;gap:8px;
        padding:13px;border-radius:13px;
        background:linear-gradient(135deg,var(--blue-d),var(--blue));
        color:white;border:none;cursor:pointer;
        font-family:'Tajawal',sans-serif;font-size:15px;font-weight:800;
        box-shadow:0 4px 18px rgba(26,128,251,0.3);
        transition:all 0.3s cubic-bezier(0.34,1.4,0.64,1);
        position:relative;overflow:hidden;margin-top:4px;
    }
    .btn-submit::after { content:'';position:absolute;top:-50%;left:-80%;width:50%;height:200%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.2),transparent);transform:skewX(-15deg);transition:left 0.5s ease; }
    .btn-submit:hover::after { left:140%; }
    .btn-submit:hover { transform:translateY(-2px) scale(1.02);box-shadow:0 10px 28px rgba(26,128,251,0.38); }

    /* BACK LINK */
    .back-link {
        display:flex;align-items:center;justify-content:center;gap:6px;
        padding:10px;border-radius:11px;
        background:rgba(26,128,251,0.06);border:1.5px solid var(--border);
        color:var(--mid);font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;
        text-decoration:none;margin-top:8px;
        transition:all 0.25s ease;
    }
    .back-link:hover { background:rgba(26,128,251,0.12);border-color:rgba(26,128,251,0.3);color:var(--blue-d);transform:translateY(-1px); }

    @media(max-width:480px){
        .main { padding:16px 12px; }
        .row { grid-template-columns:1fr; }
        .ph-btns { display:none; }
    }
</style>

<!-- BG -->
<div class="bg-scene">
    <div class="bg-c bc1"></div>
    <div class="bg-c bc2"></div>
    <div class="bg-grid"></div>
    <div class="float-icons" id="fi"></div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- Header -->
    <div class="page-header">
        <div class="ph-logo"><div class="ph-logo-in">🏥</div></div>
        <div class="ph-info">
            <div class="ph-title">تسجيل مريض — <span>القسم الطبي</span></div>
            <div class="ph-sub">مستشفى عاشور زيان — أولاد جلال</div>
        </div>
        <div class="ph-btns">
            <a href="<?php echo e(route('patients.today', ['section'=>'medical'])); ?>" class="btn-teal">📋 مرضى اليوم</a>
            <a href="<?php echo e(route('triage')); ?>" class="btn-grey">↩ الفرز</a>
        </div>
    </div>

    <!-- Form -->
    <div class="form-card">
        <form action="<?php echo e(route('patients.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="department" value="medical">

            <!-- الاسم واللقب -->
            <div class="row">
                <div class="field">
                    <div class="field-label"><span class="fl-ic">👤</span> الاسم</div>
                    <input type="text" name="first_name" class="field-input" placeholder="الاسم الأول" value="<?php echo e(old('first_name')); ?>" required>
                </div>
                <div class="field">
                    <div class="field-label"><span class="fl-ic">👤</span> اللقب</div>
                    <input type="text" name="last_name" class="field-input" placeholder="اللقب" value="<?php echo e(old('last_name')); ?>" required>
                </div>
            </div>

            <!-- العمر والجنس -->
            <div class="row">
                <div class="field">
                    <div class="field-label"><span class="fl-ic">🔢</span> العمر</div>
                    <input type="number" name="age" class="field-input" placeholder="السن" value="<?php echo e(old('age')); ?>" required>
                </div>
                <div class="field">
                    <div class="field-label"><span class="fl-ic">⚥</span> الجنس</div>
                    <select name="gender" class="field-input" required>
                        <option value="">— اختر —</option>
                        <option value="ذكر"  <?php echo e(old('gender')=='ذكر'  ? 'selected':''); ?>>👨 ذكر</option>
                        <option value="أنثى" <?php echo e(old('gender')=='أنثى' ? 'selected':''); ?>>👩 أنثى</option>
                    </select>
                </div>
            </div>

            <div class="fdiv"></div>

            <!-- الحالة والطبيب -->
            <div class="row">
                <div class="field">
                    <div class="field-label"><span class="fl-ic">🩺</span> الحالة</div>
                    <select name="status" class="field-input" required>
                        <option value="">— اختر الحالة —</option>
                        <?php $__currentLoopData = ['حرق','تسمم','حمّى','إلتهاب','نزلة برد','صداع','سكري','ضغط دم','ربو','كسر','نزيف','حساسية','مشكلة عين','مشكلة أذن','ألم معدة','غثيان','إسهال','إصابة برد','ميغرين','أخرى']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($s); ?>" <?php echo e(old('status')==$s ? 'selected':''); ?>><?php echo e($s); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="field">
                    <div class="field-label"><span class="fl-ic">👨‍⚕️</span> الطبيب</div>
                    <input type="text" name="doctor" class="field-input" placeholder="الطبيب المعالج..." value="<?php echo e(old('doctor')); ?>">
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-submit">💾 حفظ المريض</button>

        </form>

        <!-- Back -->
        <a href="<?php echo e(route('triage')); ?>" class="back-link">↩ رجوع لمكتب الفرز والتوجيه</a>
    </div>

</div>

<script>
    const ics=['💉','🩺','🩻','💊','🩹','🧬','🔬','⚕️','🩸','🏥','🌡️'];
    const fw=document.getElementById('fi');
    ics.forEach((ic,i)=>{
        const el=document.createElement('div');el.className='fi';el.textContent=ic;
        el.style.cssText=`left:${6+i*9}%;top:${12+Math.sin(i*0.9)*40+16}%;font-size:${20+(i%3)*9}px;animation-duration:${7+(i%5)*2.2}s;animation-delay:${i*0.4}s;`;
        fw.appendChild(el);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/patients/create_medical.blade.php ENDPATH**/ ?>