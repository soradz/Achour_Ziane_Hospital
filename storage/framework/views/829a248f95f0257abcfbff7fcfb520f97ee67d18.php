
<?php $__env->startSection('title', 'ملف المريض'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-dd:#003d8f;
    --blue-l:#dbeafe;--blue-ll:#eef5ff;
    --green:#16a34a;--green-l:#dcfce7;
    --red:#dc2626;--red-l:#fee2e2;
    --amber:#d97706;--amber-l:#fef3c7;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--muted:#b8cfe0;
    --border:rgba(26,128,251,0.13);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;background:#f0f7ff;color:var(--text);min-height:100vh;}

@keyframes  slideDown{from{opacity:0;transform:translateY(-18px)}to{opacity:1;transform:translateY(0)}}
@keyframes  fadeUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  pulse{0%,100%{opacity:1}50%{opacity:.4}}
@keyframes  sendBob{from{transform:translateX(0)}to{transform:translateX(-5px)}}

.pg{max-width:800px;margin:0 auto;padding:28px 18px 110px;}

/* HEADER */
.pg-header{background:linear-gradient(135deg,var(--blue-dd),var(--blue-d),var(--blue));border-radius:20px;padding:26px 28px 22px;color:#fff;margin-bottom:20px;box-shadow:0 8px 30px rgba(26,128,251,0.3);animation:slideDown .5s cubic-bezier(.34,1.4,.64,1) both;position:relative;overflow:hidden;}
.pg-header::before{content:'';position:absolute;left:-60px;top:-60px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,0.05);}
.pg-header::after{content:'';position:absolute;right:-40px;bottom:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,0.04);}
.hdr-top{display:flex;align-items:center;gap:14px;margin-bottom:16px;position:relative;z-index:1;}
.back-btn{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);color:#fff;text-decoration:none;border-radius:10px;padding:8px 16px;font-size:13px;font-weight:700;font-family:'Tajawal',sans-serif;transition:all .22s ease;}
.back-btn:hover{background:rgba(255,255,255,0.25);}
.back-btn svg{width:14px;height:14px;stroke:#fff;fill:none;stroke-width:2.5;}
.hdr-title{font-size:clamp(17px,3vw,22px);font-weight:900;letter-spacing:.2px;}
.hdr-sub{font-size:12px;opacity:.75;margin-top:3px;font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.patient-info{display:flex;flex-wrap:wrap;gap:9px;position:relative;z-index:1;}
.pi-badge{display:inline-flex;align-items:center;gap:7px;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.22);border-radius:10px;padding:6px 14px;font-size:13px;font-weight:600;}
.pi-badge svg{width:13px;height:13px;stroke:rgba(255,255,255,0.8);fill:none;stroke-width:2;}

/* ALERTS */
.alert{display:flex;align-items:center;gap:10px;padding:13px 18px;border-radius:14px;font-size:13px;font-weight:700;margin-bottom:16px;animation:fadeUp .4s ease both;}
.alert svg{width:18px;height:18px;fill:none;stroke-width:2.5;flex-shrink:0;}
.alert-ok{background:var(--green-l);border:1.5px solid rgba(22,163,74,0.25);color:var(--green);}
.alert-ok svg{stroke:var(--green);}
.alert-err{background:var(--red-l);border:1.5px solid rgba(220,38,38,0.25);color:var(--red);}
.alert-err svg{stroke:var(--red);}

/* SECTIONS */
.sec{background:#fff;border:1.5px solid var(--border);border-radius:18px;padding:22px;margin-bottom:16px;box-shadow:0 2px 12px rgba(26,128,251,0.06);animation:fadeUp .5s ease both;}
.sec:nth-child(2){animation-delay:.06s}.sec:nth-child(3){animation-delay:.12s}.sec:nth-child(4){animation-delay:.18s}
.sec-title{display:flex;align-items:center;gap:10px;font-size:15px;font-weight:800;color:var(--blue-d);margin-bottom:16px;padding-bottom:12px;border-bottom:1.5px solid var(--border);}
.sec-ic{width:34px;height:34px;border-radius:10px;background:var(--blue-ll);border:1.5px solid var(--border2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.sec-ic svg{width:17px;height:17px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}

/* TEST ITEMS */
.tests-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:10px;}
.test-item{position:relative;display:flex;align-items:center;gap:11px;background:#f8faff;border:1.5px solid var(--border);border-radius:13px;padding:12px 14px;cursor:pointer;transition:all .25s cubic-bezier(.34,1.4,.64,1);user-select:none;}
.test-item:hover{border-color:var(--blue);background:var(--blue-ll);transform:translateY(-2px);}
.test-item.checked{border-color:var(--blue);background:linear-gradient(135deg,#dbeafe,#eff6ff);box-shadow:0 4px 14px rgba(26,128,251,0.14);}
.test-item input[type=checkbox]{position:absolute;opacity:0;width:0;height:0;}
.test-check{width:22px;height:22px;border-radius:7px;border:2px solid rgba(26,128,251,0.25);background:#fff;flex-shrink:0;display:flex;align-items:center;justify-content:center;transition:all .2s ease;}
.test-check svg{width:12px;height:12px;stroke:#fff;fill:none;stroke-width:3;display:none;}
.test-item.checked .test-check{background:var(--blue);border-color:var(--blue);}
.test-item.checked .test-check svg{display:block;}
.test-ic{width:36px;height:36px;border-radius:10px;background:var(--blue-ll);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.test-ic svg{width:16px;height:16px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.test-item.checked .test-ic{background:var(--blue-l);}
.test-name{font-size:13px;font-weight:700;color:var(--text);line-height:1.3;}
.test-cat{font-size:11px;color:var(--soft);margin-top:2px;font-family:'IBM Plex Mono',monospace;}

/* URGENCY */
.urgency-row{display:flex;gap:10px;flex-wrap:wrap;}
.urg-btn{flex:1;min-width:100px;display:flex;flex-direction:column;align-items:center;gap:8px;padding:16px 10px;border-radius:14px;border:2px solid rgba(100,116,139,0.2);cursor:pointer;font-family:'Tajawal',sans-serif;font-size:14px;font-weight:700;transition:all .25s cubic-bezier(.34,1.4,.64,1);background:#f8faff;color:var(--mid);}
.urg-btn:hover{transform:translateY(-3px);}
.urg-btn.sel-normal{background:var(--green-l);border-color:var(--green);color:var(--green);}
.urg-btn.sel-urgent{background:var(--amber-l);border-color:var(--amber);color:var(--amber);}
.urg-btn.sel-critical{background:var(--red-l);border-color:var(--red);color:var(--red);}
.urg-btn input{display:none;}
.urg-dot{width:18px;height:18px;border-radius:50%;border:2px solid currentColor;display:flex;align-items:center;justify-content:center;}
.urg-dot-in{width:8px;height:8px;border-radius:50%;background:currentColor;animation:pulse 1.8s ease infinite;}
.sel-normal .urg-dot-in{background:var(--green);}
.sel-urgent .urg-dot-in{background:var(--amber);}
.sel-critical .urg-dot-in{background:var(--red);}

/* NOTES */
.notes-input{width:100%;background:#f8faff;border:1.5px solid var(--border);border-radius:13px;padding:13px 15px;font-family:'Tajawal',sans-serif;font-size:14px;color:var(--text);resize:vertical;min-height:90px;outline:none;transition:all .25s ease;direction:rtl;}
.notes-input:focus{border-color:var(--blue);background:#fff;box-shadow:0 0 0 3px rgba(26,128,251,0.08);}
.notes-input::placeholder{color:var(--muted);}

/* SUBMIT BAR */
.submit-bar{position:fixed;bottom:42px;left:0;right:0;background:rgba(255,255,255,0.95);backdrop-filter:blur(18px);border-top:1.5px solid var(--border);padding:12px 28px;display:flex;align-items:center;justify-content:space-between;gap:14px;z-index:1000;box-shadow:0 -4px 20px rgba(26,128,251,0.08);}
.sel-count{font-size:13px;font-weight:700;color:var(--mid);display:flex;align-items:center;gap:8px;}
.sel-count svg{width:15px;height:15px;stroke:var(--soft);fill:none;stroke-width:2;}
.count-badge{background:var(--blue);color:#fff;border-radius:20px;padding:3px 12px;font-size:12px;font-weight:800;font-family:'IBM Plex Mono',monospace;}
.submit-btn{display:flex;align-items:center;gap:9px;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;border:none;border-radius:14px;padding:13px 28px;font-family:'Tajawal',sans-serif;font-size:15px;font-weight:800;cursor:pointer;transition:all .3s cubic-bezier(.34,1.4,.64,1);box-shadow:0 6px 20px rgba(26,128,251,0.32);}
.submit-btn:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(26,128,251,0.42);}
.submit-btn:disabled{opacity:.45;cursor:not-allowed;transform:none;box-shadow:none;}
.submit-btn svg{width:18px;height:18px;stroke:#fff;fill:none;stroke-width:2;animation:sendBob 1.5s ease-in-out infinite alternate;}
</style>

<div class="pg">

    <!-- HEADER -->
    <div class="pg-header">
        <div class="hdr-top">
            <a href="<?php echo e($patient->section === 'surgical' ? route('lab.two') : route('lab.one')); ?>" class="back-btn">
                <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                رجوع
            </a>
            <div>
                <div class="hdr-title">ملف المريض — طلب تحاليل</div>
                <div class="hdr-sub">LAB REQUEST — اختر التحاليل وأرسلها للمخبر</div>
            </div>
        </div>
        <div class="patient-info">
            <div class="pi-badge">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?>

            </div>
            <?php if($patient->age): ?>
            <div class="pi-badge">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <?php echo e($patient->age); ?> سنة
            </div>
            <?php endif; ?>
            <?php if($patient->gender): ?>
            <div class="pi-badge">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <?php echo e($patient->gender === 'male' ? 'ذكر' : 'أنثى'); ?>

            </div>
            <?php endif; ?>
            <div class="pi-badge">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
                <?php echo e($patient->id); ?>#
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
    <div class="alert alert-ok">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="alert alert-err">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('doctor.send.to.lab', $patient->id)); ?>" id="labForm">
        <?php echo csrf_field(); ?>

        <!-- تحاليل -->
        <div class="sec">
            <div class="sec-title">
                <div class="sec-ic"><svg viewBox="0 0 24 24"><path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/></svg></div>
                التحاليل المطلوبة
            </div>
            <div class="tests-grid">
                <?php
                $tests = [
                    ['name'=>'تحليل دم كامل',         'cat'=>'دم',        'icon'=>'blood'],
                    ['name'=>'سكر الدم',               'cat'=>'دم',        'icon'=>'drop'],
                    ['name'=>'وظائف الكلى',            'cat'=>'دم',        'icon'=>'kidney'],
                    ['name'=>'وظائف الكبد',            'cat'=>'دم',        'icon'=>'liver'],
                    ['name'=>'الدهون والكوليسترول',    'cat'=>'دم',        'icon'=>'drop'],
                    ['name'=>'هرمونات الغدة الدرقية', 'cat'=>'هرمونات',   'icon'=>'thyroid'],
                    ['name'=>'تحليل بول كامل',         'cat'=>'بول',       'icon'=>'flask'],
                    ['name'=>'تحليل البراز',           'cat'=>'براز',      'icon'=>'microscope'],
                    ['name'=>'صورة الدم الكاملة',      'cat'=>'دم',        'icon'=>'activity'],
                    ['name'=>'فصيلة الدم',             'cat'=>'دم',        'icon'=>'blood'],
                    ['name'=>'سرعة الترسيب',           'cat'=>'دم',        'icon'=>'timer'],
                    ['name'=>'بروتين سي التفاعلي',     'cat'=>'التهاب',    'icon'=>'alert'],
                ];
                $svgs = [
                    'blood'     => '<path d="M12 2C6.5 2 2 8 2 12a10 10 0 0 0 20 0c0-5-4-10-10-10z"/>',
                    'drop'      => '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>',
                    'kidney'    => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
                    'liver'     => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>',
                    'thyroid'   => '<circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/>',
                    'flask'     => '<path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/>',
                    'microscope'=> '<circle cx="12" cy="12" r="4"/><path d="M2 12h4M18 12h4M12 2v4M12 18v4"/>',
                    'activity'  => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>',
                    'timer'     => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
                    'alert'     => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
                ];
                ?>
                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="test-item" onclick="toggleTest(this)">
                    <input type="checkbox" name="tests[]" value="<?php echo e($t['name']); ?>">
                    <div class="test-check">
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <div class="test-ic">
                        <svg viewBox="0 0 24 24"><?php echo $svgs[$t['icon']] ?? $svgs['activity']; ?></svg>
                    </div>
                    <div>
                        <div class="test-name"><?php echo e($t['name']); ?></div>
                        <div class="test-cat"><?php echo e($t['cat']); ?></div>
                    </div>
                </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- الاستعجال -->
        <div class="sec">
            <div class="sec-title">
                <div class="sec-ic"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
                درجة الاستعجال
            </div>
            <div class="urgency-row">
                <label class="urg-btn" onclick="selectUrg(this,'sel-normal')">
                    <input type="radio" name="urgency" value="عادي" checked>
                    <div class="urg-dot"><div class="urg-dot-in"></div></div>
                    عادي
                </label>
                <label class="urg-btn" onclick="selectUrg(this,'sel-urgent')">
                    <input type="radio" name="urgency" value="مستعجل">
                    <div class="urg-dot"><div class="urg-dot-in"></div></div>
                    مستعجل
                </label>
                <label class="urg-btn" onclick="selectUrg(this,'sel-critical')">
                    <input type="radio" name="urgency" value="حرج">
                    <div class="urg-dot"><div class="urg-dot-in"></div></div>
                    حرج
                </label>
            </div>
        </div>

        <!-- ملاحظات -->
        <div class="sec">
            <div class="sec-title">
                <div class="sec-ic"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
                ملاحظات للمخبر
            </div>
            <textarea class="notes-input" name="notes" placeholder="اكتب أي ملاحظات أو تعليمات خاصة للمخبر..."></textarea>
        </div>

    </form>
</div>

<!-- SUBMIT BAR -->
<div class="submit-bar">
    <div class="sel-count">
        <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        التحاليل المختارة: <span class="count-badge" id="countBadge">0</span>
    </div>
    <button class="submit-btn" id="submitBtn" onclick="document.getElementById('labForm').submit()" disabled>
        <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        إرسال إلى المخبر
    </button>
</div>

<script>
function toggleTest(el){
    const cb=el.querySelector('input[type=checkbox]');
    cb.checked=!cb.checked;
    el.classList.toggle('checked',cb.checked);
    updateCount();
}
function selectUrg(el,cls){
    document.querySelectorAll('.urg-btn').forEach(b=>b.classList.remove('sel-normal','sel-urgent','sel-critical'));
    el.classList.add(cls);
    el.querySelector('input[type=radio]').checked=true;
}
function updateCount(){
    const n=document.querySelectorAll('.test-item input:checked').length;
    document.getElementById('countBadge').textContent=n;
    document.getElementById('submitBtn').disabled=n===0;
}
document.querySelector('.urg-btn').classList.add('sel-normal');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/doctor/patient.blade.php ENDPATH**/ ?>