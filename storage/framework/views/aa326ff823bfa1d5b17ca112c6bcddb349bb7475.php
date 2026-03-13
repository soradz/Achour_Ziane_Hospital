
<?php $__env->startSection('title', 'لوحة المخبر'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;
    --cyan:#0891b2;--cyan-l:#cffafe;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --red:#dc2626;--red-l:#fee2e2;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;
    --border:rgba(26,128,251,0.15);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;}
.bg-scene{position:fixed;inset:0;z-index:0;overflow:hidden;background:linear-gradient(145deg,#fff 0%,#d6ecff 45%,#b8dcff 80%,#9aceff 100%);}
.bg-c{position:absolute;border-radius:50%;filter:blur(70px);opacity:0.45;}
.bc1{width:600px;height:600px;background:radial-gradient(circle,#70b8ff,#3a8fef);top:-180px;right:-180px;animation:d1 20s ease-in-out infinite;}
.bc2{width:440px;height:440px;background:radial-gradient(circle,#b3d9ff,#5aaaff);bottom:-130px;left:-130px;animation:d2 25s ease-in-out infinite;}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px;}
@keyframes  d1{0%,100%{transform:translate(0,0)}33%{transform:translate(-40px,28px)}66%{transform:translate(20px,-38px)}}
@keyframes  d2{0%,100%{transform:translate(0,0)}40%{transform:translate(38px,-20px)}70%{transform:translate(-28px,38px)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  hb{0%,100%{transform:scale(1)}14%{transform:scale(1.1)}28%{transform:scale(1)}42%{transform:scale(1.06)}56%{transform:scale(1)}}
@keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.92) translateY(12px)}to{opacity:1;transform:scale(1) translateY(0)}}
@keyframes  bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
@keyframes  gp{0%,100%{box-shadow:0 0 0 0 rgba(22,163,74,0.4)}50%{box-shadow:0 0 0 5px rgba(22,163,74,0)}}

.main{position:relative;z-index:1;min-height:100vh;padding:24px 18px 80px;max-width:900px;margin:0 auto;}

.page-header{background:rgba(255,255,255,0.88);backdrop-filter:blur(20px);border:1.5px solid var(--border);border-radius:20px;padding:16px 22px;display:flex;align-items:center;gap:13px;margin-bottom:20px;box-shadow:0 5px 24px rgba(26,128,251,0.1);position:relative;overflow:hidden;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--cyan),#22d3ee);border-radius:20px 20px 0 0;}
.ph-logo{position:relative;width:44px;height:44px;flex-shrink:0;}
.ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:13px;background:conic-gradient(var(--cyan),#22d3ee,#a5f3fc,var(--cyan));animation:spin 3s linear infinite;z-index:0;}
.ph-logo-in{position:relative;z-index:1;width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#fff,#cffafe);display:flex;align-items:center;justify-content:center;font-size:22px;animation:hb 3s ease infinite;}
.ph-info{flex:1;}
.ph-title{font-size:17px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--cyan),#0ea5e9);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:11px;color:var(--soft);margin-top:2px;font-weight:600;}
.ph-right{display:flex;align-items:center;gap:8px;}
.ph-chip{display:flex;align-items:center;gap:5px;padding:5px 11px;border-radius:8px;font-size:11px;font-weight:700;background:var(--green-l);color:var(--green);border:1px solid rgba(22,163,74,0.2);}
.live-d{width:6px;height:6px;border-radius:50%;background:var(--green);animation:gp 1.8s ease infinite;}
.back-btn{display:flex;align-items:center;gap:5px;padding:6px 13px;border-radius:8px;background:rgba(26,128,251,0.07);border:1.5px solid var(--border);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;}

.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:20px;}
.stat-card{background:rgba(255,255,255,0.88);backdrop-filter:blur(16px);border:1.5px solid var(--border);border-radius:16px;padding:16px 18px;text-align:center;box-shadow:0 4px 16px rgba(26,128,251,0.08);animation:popIn 0.5s ease both;}
.stat-num{font-size:28px;font-weight:900;line-height:1;}
.stat-lbl{font-size:11px;font-weight:700;color:var(--soft);margin-top:4px;}
.sn-blue{color:var(--blue);}.sn-amber{color:var(--amber);}.sn-green{color:var(--green);}

.alert-ok{display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:13px;font-size:13px;font-weight:700;margin-bottom:16px;background:var(--green-l);border:1.5px solid rgba(22,163,74,0.3);color:var(--green);}

.empty-state{background:rgba(255,255,255,0.85);backdrop-filter:blur(20px);border:1.5px solid var(--border);border-radius:22px;padding:52px 30px;text-align:center;}
.empty-icon{font-size:52px;display:block;margin-bottom:14px;opacity:0.5;animation:bob 3s ease-in-out infinite;}
.empty-title{font-size:16px;font-weight:900;color:var(--mid);margin-bottom:6px;}
.empty-sub{font-size:12px;color:var(--soft);}

.queue-list{display:flex;flex-direction:column;gap:10px;}

.req-row{background:rgba(255,255,255,0.92);backdrop-filter:blur(16px);border:1.5px solid var(--border);border-radius:16px;overflow:hidden;box-shadow:0 3px 14px rgba(26,128,251,0.07);transition:box-shadow 0.25s ease;animation:popIn 0.4s ease both;}
.req-row:hover{box-shadow:0 6px 24px rgba(26,128,251,0.14);}
.req-row.open{border-color:rgba(8,145,178,0.4);}
.req-row.urg-حرج .req-header{border-right:5px solid var(--red);}
.req-row.urg-مستعجل .req-header{border-right:5px solid var(--amber);}
.req-row.urg-عادي .req-header{border-right:5px solid var(--green);}

.req-header{display:flex;align-items:center;gap:12px;padding:14px 18px;cursor:pointer;transition:background 0.2s ease;user-select:none;}
.req-header:hover{background:rgba(26,128,251,0.03);}
.req-num{width:32px;height:32px;border-radius:10px;background:var(--blue-l);color:var(--blue-d);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:900;flex-shrink:0;}
.req-info{flex:1;}
.req-name{font-size:15px;font-weight:900;color:var(--text);}
.req-meta{font-size:11px;color:var(--soft);margin-top:2px;}
.req-right{display:flex;align-items:center;gap:8px;}
.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:800;border:1px solid;}
.badge-red{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.badge-amber{background:var(--amber-l);color:var(--amber);border-color:rgba(217,119,6,0.2);}
.badge-green{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.chevron{font-size:12px;color:var(--soft);transition:transform 0.3s ease;}
.req-row.open .chevron{transform:rotate(180deg);}

.req-panel{display:none;padding:20px 20px 20px 24px;border-top:1px solid rgba(26,128,251,0.1);background:rgba(248,252,255,0.9);}
.req-row.open .req-panel{display:block;}

/* تحاليل مطلوبة */
.tests-chips{display:flex;flex-wrap:wrap;gap:7px;margin-bottom:18px;}
.test-chip{display:inline-flex;align-items:center;gap:5px;padding:5px 12px;border-radius:10px;font-size:12px;font-weight:700;background:var(--blue-l);color:var(--blue-d);border:1px solid var(--border);}

/* بلوكات التحاليل */
.analysis-blocks{display:flex;flex-direction:column;gap:14px;margin-bottom:16px;}

.analysis-block{border:1.5px solid var(--border);border-radius:14px;overflow:hidden;background:#fff;}
.analysis-block-header{display:flex;align-items:center;gap:10px;padding:11px 16px;background:var(--blue-l);border-bottom:1px solid var(--border);}
.ab-icon{font-size:18px;}
.ab-name{font-size:13px;font-weight:900;color:var(--blue-d);flex:1;}
.ab-count{font-size:10px;font-weight:700;color:var(--soft);}

.indicators-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:1px;background:var(--border);}
.indicator-cell{background:#fff;padding:11px 14px;display:flex;flex-direction:column;gap:5px;}
.ind-top{display:flex;align-items:center;justify-content:space-between;gap:6px;}
.ind-name{font-size:11px;font-weight:800;color:var(--text);flex:1;}
.ind-ref{font-size:9px;color:var(--soft);white-space:nowrap;}
.ind-input{width:100%;padding:7px 10px;border-radius:8px;border:1.5px solid rgba(26,128,251,0.18);background:#f8faff;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;color:var(--blue-d);outline:none;transition:all .2s ease;}
.ind-input:focus{border-color:var(--cyan);background:#fff;box-shadow:0 0 0 3px rgba(8,145,178,.08);}
.ind-unit{font-size:9px;color:var(--soft);text-align:left;}

.notes-area{width:100%;padding:10px 13px;border-radius:10px;border:1.5px solid rgba(26,128,251,0.18);background:#fff;font-family:'Tajawal',sans-serif;font-size:13px;color:var(--text);resize:vertical;min-height:65px;outline:none;direction:rtl;margin-bottom:14px;transition:border-color .2s ease;}
.notes-area:focus{border-color:var(--cyan);}
.btn-send{display:inline-flex;align-items:center;gap:8px;padding:12px 28px;border-radius:12px;background:linear-gradient(135deg,var(--cyan),#0ea5e9);color:#fff;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:14px;font-weight:800;box-shadow:0 4px 14px rgba(8,145,178,0.3);transition:all .3s ease;}
.btn-send:hover{transform:translateY(-2px);box-shadow:0 8px 22px rgba(8,145,178,0.4);}

@media(max-width:600px){.stats-row{grid-template-columns:1fr 1fr;}.indicators-grid{grid-template-columns:1fr 1fr;}}
</style>

<div class="bg-scene"><div class="bg-c bc1"></div><div class="bg-c bc2"></div><div class="bg-grid"></div></div>

<div class="main">
    <div class="page-header">
        <div class="ph-logo"><div class="ph-logo-in">🧪</div></div>
        <div class="ph-info">
            <div class="ph-title">لوحة <span>المخبر</span></div>
            <div class="ph-sub">أهلاً، <?php echo e(session('name')); ?>! — قائمة طلبات التحاليل</div>
        </div>
        <div class="ph-right">
            <div class="ph-chip"><div class="live-d"></div> نشط</div>
            <a href="<?php echo e(route('logout')); ?>" class="back-btn">↩ خروج</a>
        </div>
    </div>

    <?php if(session('success')): ?>
    <div class="alert-ok">✅ <?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="stats-row">
        <div class="stat-card" style="animation-delay:.05s"><div class="stat-num sn-blue"><?php echo e($requests->count()); ?></div><div class="stat-lbl">إجمالي اليوم</div></div>
        <div class="stat-card" style="animation-delay:.1s"><div class="stat-num sn-amber"><?php echo e($pending); ?></div><div class="stat-lbl">في الانتظار</div></div>
        <div class="stat-card" style="animation-delay:.15s"><div class="stat-num sn-green"><?php echo e($done); ?></div><div class="stat-lbl">مكتملة</div></div>
    </div>

    <?php
    // مؤشرات كل تحليل
    $indicators = [
        'تحليل دم كامل' => [
            ['name'=>'كريات الدم الحمراء (RBC)',  'unit'=>'10⁶/µL', 'ref'=>'4.5–5.5'],
            ['name'=>'الهيموغلوبين (HGB)',          'unit'=>'g/dL',   'ref'=>'13–17'],
            ['name'=>'الهيماتوكريت (HCT)',          'unit'=>'%',      'ref'=>'40–52'],
            ['name'=>'كريات الدم البيضاء (WBC)',    'unit'=>'10³/µL', 'ref'=>'4–11'],
            ['name'=>'الصفائح الدموية (PLT)',       'unit'=>'10³/µL', 'ref'=>'150–400'],
            ['name'=>'متوسط حجم الكريات (MCV)',     'unit'=>'fL',     'ref'=>'80–100'],
        ],
        'سكر الدم' => [
            ['name'=>'جلوكوز صائم',   'unit'=>'mg/dL', 'ref'=>'70–100'],
            ['name'=>'جلوكوز عشوائي', 'unit'=>'mg/dL', 'ref'=>'< 140'],
        ],
        'وظائف الكلى' => [
            ['name'=>'كرياتينين',        'unit'=>'mg/dL',  'ref'=>'0.6–1.2'],
            ['name'=>'يوريا',            'unit'=>'mg/dL',  'ref'=>'15–45'],
            ['name'=>'حمض البوليك',      'unit'=>'mg/dL',  'ref'=>'3.5–7.2'],
            ['name'=>'صوديوم (Na)',      'unit'=>'mEq/L',  'ref'=>'136–145'],
            ['name'=>'بوتاسيوم (K)',     'unit'=>'mEq/L',  'ref'=>'3.5–5.0'],
        ],
        'وظائف الكبد' => [
            ['name'=>'SGPT (ALT)',  'unit'=>'U/L', 'ref'=>'7–56'],
            ['name'=>'SGOT (AST)',  'unit'=>'U/L', 'ref'=>'10–40'],
            ['name'=>'بيليروبين كلي', 'unit'=>'mg/dL', 'ref'=>'0.2–1.2'],
            ['name'=>'ألبومين',     'unit'=>'g/dL', 'ref'=>'3.5–5.0'],
            ['name'=>'GGT',         'unit'=>'U/L', 'ref'=>'9–48'],
        ],
        'الدهون والكوليسترول' => [
            ['name'=>'كوليسترول كلي',   'unit'=>'mg/dL', 'ref'=>'< 200'],
            ['name'=>'LDL',             'unit'=>'mg/dL', 'ref'=>'< 130'],
            ['name'=>'HDL',             'unit'=>'mg/dL', 'ref'=>'> 40'],
            ['name'=>'الدهون الثلاثية', 'unit'=>'mg/dL', 'ref'=>'< 150'],
        ],
        'هرمونات الغدة الدرقية' => [
            ['name'=>'TSH',  'unit'=>'µIU/mL', 'ref'=>'0.4–4.0'],
            ['name'=>'T3 حر','unit'=>'pg/mL',  'ref'=>'2.3–4.2'],
            ['name'=>'T4 حر','unit'=>'ng/dL',  'ref'=>'0.8–1.8'],
        ],
        'تحليل بول كامل' => [
            ['name'=>'اللون',          'unit'=>'',      'ref'=>'أصفر فاتح'],
            ['name'=>'الوضوح',         'unit'=>'',      'ref'=>'شفاف'],
            ['name'=>'pH',             'unit'=>'',      'ref'=>'5.0–8.0'],
            ['name'=>'الكثافة',        'unit'=>'',      'ref'=>'1.005–1.030'],
            ['name'=>'البروتين',       'unit'=>'',      'ref'=>'سالب'],
            ['name'=>'الجلوكوز',       'unit'=>'',      'ref'=>'سالب'],
            ['name'=>'كريات دم حمراء', 'unit'=>'/HPF',  'ref'=>'0–2'],
            ['name'=>'كريات دم بيضاء', 'unit'=>'/HPF',  'ref'=>'0–5'],
        ],
        'تحليل البراز' => [
            ['name'=>'القوام',           'unit'=>'', 'ref'=>'متماسك'],
            ['name'=>'اللون',            'unit'=>'', 'ref'=>'بني'],
            ['name'=>'دم خفي',          'unit'=>'', 'ref'=>'سالب'],
            ['name'=>'طفيليات',         'unit'=>'', 'ref'=>'غائبة'],
            ['name'=>'بكتيريا مرضية',   'unit'=>'', 'ref'=>'غائبة'],
        ],
        'صورة الدم الكاملة' => [
            ['name'=>'كريات الدم الحمراء (RBC)',  'unit'=>'10⁶/µL', 'ref'=>'4.5–5.5'],
            ['name'=>'الهيموغلوبين (HGB)',         'unit'=>'g/dL',   'ref'=>'13–17'],
            ['name'=>'الهيماتوكريت (HCT)',         'unit'=>'%',      'ref'=>'40–52'],
            ['name'=>'كريات الدم البيضاء (WBC)',   'unit'=>'10³/µL', 'ref'=>'4–11'],
            ['name'=>'الصفائح الدموية (PLT)',      'unit'=>'10³/µL', 'ref'=>'150–400'],
            ['name'=>'النيتروفيل',                 'unit'=>'%',      'ref'=>'50–70'],
            ['name'=>'اللمفاوي',                   'unit'=>'%',      'ref'=>'20–40'],
        ],
        'فصيلة الدم' => [
            ['name'=>'فصيلة ABO',  'unit'=>'', 'ref'=>'A/B/AB/O'],
            ['name'=>'عامل Rh',    'unit'=>'', 'ref'=>'موجب/سالب'],
        ],
        'سرعة الترسيب' => [
            ['name'=>'سرعة الترسيب (ESR)', 'unit'=>'mm/hr', 'ref'=>'0–20'],
        ],
        'بروتين سي التفاعلي' => [
            ['name'=>'CRP', 'unit'=>'mg/L', 'ref'=>'< 10'],
        ],
    ];

    $pendingRequests = $requests->where('status', 'pending');
    ?>

    <?php if($pendingRequests->isEmpty()): ?>
    <div class="empty-state">
        <span class="empty-icon">✅</span>
        <div class="empty-title">لا توجد طلبات في الانتظار</div>
        <div class="empty-sub">تم إنجاز كل طلبات اليوم</div>
    </div>
    <?php else: ?>
    <div class="queue-list">
        <?php $__currentLoopData = $pendingRequests->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $tests     = is_array($req->requested_tests) ? $req->requested_tests : json_decode($req->requested_tests, true) ?? [];
            $urgClass  = 'urg-' . ($req->urgency ?? 'عادي');
            $badgeCls  = $req->urgency === 'حرج' ? 'badge-red' : ($req->urgency === 'مستعجل' ? 'badge-amber' : 'badge-green');
        ?>
        <div class="req-row <?php echo e($urgClass); ?>" id="row-<?php echo e($req->id); ?>">
            <div class="req-header" onclick="toggleRow(<?php echo e($req->id); ?>)">
                <div class="req-num"><?php echo e($i + 1); ?></div>
                <div class="req-info">
                    <div class="req-name"><?php echo e($req->patient->first_name ?? '—'); ?> <?php echo e($req->patient->last_name ?? ''); ?></div>
                    <div class="req-meta">👨‍⚕️ <?php echo e($req->doctor_name); ?> &nbsp;|&nbsp; 🕐 <?php echo e($req->created_at->format('H:i')); ?> &nbsp;|&nbsp; 🧪 <?php echo e(count($tests)); ?> تحليل</div>
                </div>
                <div class="req-right">
                    <span class="badge <?php echo e($badgeCls); ?>"><?php echo e($req->urgency); ?></span>
                    <span class="chevron">▼</span>
                </div>
            </div>

            <div class="req-panel">
                
                <div style="font-size:12px;font-weight:800;color:var(--mid);margin-bottom:10px;">🔬 التحاليل المطلوبة</div>
                <div class="tests-chips">
                    <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="test-chip">🧬 <?php echo e($test); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php if($req->notes): ?>
                <div style="background:#fffbeb;border:1px solid #fcd34d;border-radius:10px;padding:9px 13px;font-size:12px;color:#92400e;margin-bottom:16px;">📝 <?php echo e($req->notes); ?></div>
                <?php endif; ?>

                
                <form method="POST" action="<?php echo e(route('lab.results.store', $req->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="analysis-blocks">
                        <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $inds = $indicators[$test] ?? []; ?>
                        <div class="analysis-block">
                            <div class="analysis-block-header">
                                <span class="ab-icon">🧬</span>
                                <span class="ab-name"><?php echo e($test); ?></span>
                                <?php if(count($inds) > 0): ?>
                                <span class="ab-count"><?php echo e(count($inds)); ?> مؤشر</span>
                                <?php endif; ?>
                            </div>
                            <?php if(count($inds) > 0): ?>
                            <div class="indicators-grid">
                                <?php $__currentLoopData = $inds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="indicator-cell">
                                    <div class="ind-top">
                                        <div class="ind-name"><?php echo e($ind['name']); ?></div>
                                        <div class="ind-ref"><?php echo e($ind['ref']); ?></div>
                                    </div>
                                    <input
                                        type="text"
                                        name="results[<?php echo e($test); ?>][<?php echo e($ind['name']); ?>]"
                                        class="ind-input"
                                        placeholder="أدخل النتيجة"
                                    >
                                    <?php if($ind['unit']): ?>
                                    <div class="ind-unit"><?php echo e($ind['unit']); ?></div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php else: ?>
                            <div style="padding:12px 16px;">
                                <input type="text" name="results[<?php echo e($test); ?>]" class="ind-input" style="width:100%" placeholder="النتيجة...">
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <textarea name="lab_notes" class="notes-area" placeholder="ملاحظات المخبر (اختياري)..."></textarea>
                    <button type="submit" class="btn-send">📤 إرسال النتائج للطبيب</button>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>

<script>
function toggleRow(id){
    const row=document.getElementById('row-'+id);
    document.querySelectorAll('.req-row.open').forEach(r=>{if(r.id!=='row-'+id)r.classList.remove('open');});
    row.classList.toggle('open');
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/lab_dashboard.blade.php ENDPATH**/ ?>