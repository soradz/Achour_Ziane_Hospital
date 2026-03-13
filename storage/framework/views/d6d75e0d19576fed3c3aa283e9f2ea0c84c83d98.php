
<?php $__env->startSection('title', 'نتائج التحاليل'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --red:#dc2626;--red-l:#fee2e2;
    --purple:#7c3aed;--purple-l:#ede9fe;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;
    --border:rgba(26,128,251,0.15);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;}
.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(145deg,#fff 0%,#d6ecff 45%,#b8dcff 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px;}
@keyframes  fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.94) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
@keyframes  bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
@keyframes  gp{0%,100%{box-shadow:0 0 0 0 rgba(22,163,74,0.4)}50%{box-shadow:0 0 0 5px rgba(22,163,74,0)}}
@keyframes  spin{to{transform:rotate(360deg)}}

.main{position:relative;z-index:1;max-width:820px;margin:0 auto;padding:26px 18px 80px;}

.page-header{background:rgba(255,255,255,0.88);backdrop-filter:blur(20px);border:1.5px solid var(--border);border-radius:20px;padding:18px 24px;display:flex;align-items:center;gap:13px;margin-bottom:20px;box-shadow:0 5px 24px rgba(26,128,251,0.1);position:relative;overflow:hidden;animation:fadeUp .4s ease both;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--purple),#a78bfa);border-radius:20px 20px 0 0;}
.ph-logo{position:relative;width:44px;height:44px;flex-shrink:0;}
.ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:13px;background:conic-gradient(var(--purple),#a78bfa,#ede9fe,var(--purple));animation:spin 3s linear infinite;z-index:0;}
.ph-logo-in{position:relative;z-index:1;width:44px;height:44px;border-radius:12px;background:var(--purple-l);display:flex;align-items:center;justify-content:center;font-size:22px;}
.ph-info{flex:1;}
.ph-title{font-size:17px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--purple),#a78bfa);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:11px;color:var(--soft);margin-top:2px;font-weight:600;}
.back-btn{display:flex;align-items:center;gap:5px;padding:6px 13px;border-radius:8px;background:rgba(26,128,251,0.07);border:1.5px solid var(--border);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;}

/* فلتر */
.filter-row{display:flex;gap:8px;margin-bottom:18px;flex-wrap:wrap;}
.filter-btn{padding:6px 16px;border-radius:20px;font-size:12px;font-weight:700;border:1.5px solid var(--border);background:rgba(255,255,255,0.8);color:var(--mid);cursor:pointer;font-family:'Tajawal',sans-serif;transition:all .2s ease;}
.filter-btn.active,.filter-btn:hover{background:var(--purple-l);border-color:rgba(124,58,237,0.3);color:var(--purple);}

/* بطاقات النتائج */
.results-grid{display:flex;flex-direction:column;gap:10px;}

.result-card{background:rgba(255,255,255,0.92);backdrop-filter:blur(16px);border:1.5px solid var(--border);border-radius:16px;padding:16px 18px;display:flex;align-items:center;gap:14px;box-shadow:0 3px 14px rgba(26,128,251,0.07);animation:popIn .4s ease both;transition:all .25s ease;text-decoration:none;color:inherit;}
.result-card:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(124,58,237,0.15);border-color:rgba(124,58,237,0.3);}
.result-card.urg-حرج{border-right:5px solid var(--red);}
.result-card.urg-مستعجل{border-right:5px solid var(--amber);}
.result-card.urg-عادي{border-right:5px solid var(--green);}

.rc-avatar{width:46px;height:46px;border-radius:14px;background:var(--purple-l);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;animation:bob 3s ease-in-out infinite;}
.rc-info{flex:1;}
.rc-name{font-size:15px;font-weight:900;color:var(--text);}
.rc-meta{font-size:11px;color:var(--soft);margin-top:3px;}
.rc-right{display:flex;flex-direction:column;align-items:flex-end;gap:6px;}

.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:800;border:1px solid;}
.badge-red{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.badge-amber{background:var(--amber-l);color:var(--amber);border-color:rgba(217,119,6,0.2);}
.badge-green{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.badge-purple{background:var(--purple-l);color:var(--purple);border-color:rgba(124,58,237,0.2);}

.tests-count{font-size:11px;font-weight:800;color:var(--soft);}
.arrow{font-size:16px;color:var(--purple);opacity:0.6;}

.empty-state{background:rgba(255,255,255,0.85);border:1.5px solid var(--border);border-radius:18px;padding:52px 30px;text-align:center;}
.empty-icon{font-size:48px;display:block;margin-bottom:12px;opacity:.4;animation:bob 3s ease-in-out infinite;}
.empty-title{font-size:15px;font-weight:900;color:var(--mid);margin-bottom:5px;}
.empty-sub{font-size:12px;color:var(--soft);}

.section-label{font-size:12px;font-weight:800;color:var(--mid);margin-bottom:10px;margin-top:4px;display:flex;align-items:center;gap:7px;}
.section-label .ln{height:2px;flex:1;border-radius:2px;background:linear-gradient(90deg,var(--border),transparent);}
</style>

<div class="bg-scene"><div class="bg-grid"></div></div>

<div class="main">
    <div class="page-header">
        <div class="ph-logo"><div class="ph-logo-in">📋</div></div>
        <div class="ph-info">
            <div class="ph-title">نتائج <span>التحاليل</span></div>
            <div class="ph-sub">قائمة المرضى اللي عندهم نتائج جاهزة — اختر مريض لعرض نتائجو</div>
        </div>
        <a href="<?php echo e(url()->previous()); ?>" class="back-btn">↩ رجوع</a>
    </div>

    <?php
        // نجيب كل النتائج المكتملة مع بيانات المريض
        $doneRequests = \App\Models\LabRequest::where('status', 'done')
            ->with('patient')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->filter(fn($r) => $r->patient !== null);

        $todayRequests  = $doneRequests->filter(fn($r) => $r->updated_at->isToday());
        $otherRequests  = $doneRequests->filter(fn($r) => !$r->updated_at->isToday());
    ?>

    <?php if($doneRequests->isEmpty()): ?>
    <div class="empty-state">
        <span class="empty-icon">🔬</span>
        <div class="empty-title">لا توجد نتائج جاهزة بعد</div>
        <div class="empty-sub">ستظهر النتائج هنا بعد إرسالها من المخبر</div>
    </div>
    <?php else: ?>

    <?php if($todayRequests->isNotEmpty()): ?>
    <div class="section-label">⚡ نتائج اليوم (<?php echo e($todayRequests->count()); ?>)<div class="ln"></div></div>
    <div class="results-grid" style="margin-bottom:20px;">
        <?php $__currentLoopData = $todayRequests->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $tests = is_array($req->requested_tests) ? $req->requested_tests : json_decode($req->requested_tests, true) ?? [];
            $urgCls = 'urg-' . ($req->urgency ?? 'عادي');
            $badgeCls = $req->urgency === 'حرج' ? 'badge-red' : ($req->urgency === 'مستعجل' ? 'badge-amber' : 'badge-green');
        ?>
        <a href="<?php echo e(route('doctor.results.show', $req->id)); ?>" class="result-card <?php echo e($urgCls); ?>" style="animation-delay:<?php echo e($i * 0.05); ?>s">
            <div class="rc-avatar">🧑‍⚕️</div>
            <div class="rc-info">
                <div class="rc-name"><?php echo e($req->patient->first_name); ?> <?php echo e($req->patient->last_name); ?></div>
                <div class="rc-meta">
                    👨‍⚕️ <?php echo e($req->doctor_name); ?> &nbsp;|&nbsp;
                    🕐 <?php echo e($req->updated_at->format('H:i')); ?> &nbsp;|&nbsp;
                    🧪 <?php echo e(count($tests)); ?> تحليل
                </div>
            </div>
            <div class="rc-right">
                <span class="badge <?php echo e($badgeCls); ?>"><?php echo e($req->urgency); ?></span>
                <span class="badge badge-purple">✅ جاهز</span>
                <span class="arrow">←</span>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

    <?php if($otherRequests->isNotEmpty()): ?>
    <div class="section-label">📁 نتائج سابقة (<?php echo e($otherRequests->count()); ?>)<div class="ln"></div></div>
    <div class="results-grid">
        <?php $__currentLoopData = $otherRequests->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $tests = is_array($req->requested_tests) ? $req->requested_tests : json_decode($req->requested_tests, true) ?? [];
            $urgCls = 'urg-' . ($req->urgency ?? 'عادي');
            $badgeCls = $req->urgency === 'حرج' ? 'badge-red' : ($req->urgency === 'مستعجل' ? 'badge-amber' : 'badge-green');
        ?>
        <a href="<?php echo e(route('doctor.results.show', $req->id)); ?>" class="result-card <?php echo e($urgCls); ?>" style="animation-delay:<?php echo e($i * 0.04); ?>s;opacity:0.85">
            <div class="rc-avatar" style="opacity:0.7">🧑‍⚕️</div>
            <div class="rc-info">
                <div class="rc-name"><?php echo e($req->patient->first_name); ?> <?php echo e($req->patient->last_name); ?></div>
                <div class="rc-meta">
                    👨‍⚕️ <?php echo e($req->doctor_name); ?> &nbsp;|&nbsp;
                    📅 <?php echo e($req->updated_at->format('Y-m-d H:i')); ?> &nbsp;|&nbsp;
                    🧪 <?php echo e(count($tests)); ?> تحليل
                </div>
            </div>
            <div class="rc-right">
                <span class="badge <?php echo e($badgeCls); ?>"><?php echo e($req->urgency); ?></span>
                <span class="arrow">←</span>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/doctor/results_list.blade.php ENDPATH**/ ?>