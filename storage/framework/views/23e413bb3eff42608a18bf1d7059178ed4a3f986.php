

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
    --border:rgba(26,128,251,0.15);--bg:#f0f7ff;
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;background:var(--bg);color:var(--text);min-height:100vh;}
.pg{max-width:820px;margin:0 auto;padding:28px 18px 80px;}
.pg-header{background:linear-gradient(135deg,#0057c8,#1a80fb,#38bdf8);border-radius:20px;padding:24px 28px;color:#fff;margin-bottom:22px;box-shadow:0 8px 30px rgba(26,128,251,0.3);position:relative;overflow:hidden;}
.pg-header::after{content:'🔬';font-size:100px;opacity:.07;position:absolute;left:-10px;top:-10px;}
.hdr-top{display:flex;align-items:center;gap:10px;margin-bottom:14px;flex-wrap:wrap;}
.back-btn{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.3);color:#fff;text-decoration:none;border-radius:10px;padding:7px 14px;font-size:13px;font-weight:700;}
.print-btn{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.22);border:1px solid rgba(255,255,255,.4);color:#fff;border-radius:10px;padding:7px 14px;font-size:13px;font-weight:700;cursor:pointer;font-family:'Tajawal',sans-serif;}
.hdr-titles{flex:1;}
.hdr-title{font-size:20px;font-weight:900;}
.hdr-sub{font-size:13px;opacity:.75;margin-top:3px;}
.pi-badges{display:flex;flex-wrap:wrap;gap:8px;}
.pi-badge{display:inline-flex;align-items:center;gap:7px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);border-radius:10px;padding:6px 14px;font-size:13px;font-weight:600;}
.status-bar{display:flex;align-items:center;gap:10px;margin-bottom:20px;padding:14px 18px;border-radius:14px;font-size:14px;font-weight:700;}
.status-done{background:var(--green-l);border:1.5px solid rgba(22,163,74,0.3);color:var(--green);}
.status-pending{background:var(--amber-l);border:1.5px solid rgba(217,119,6,0.3);color:var(--amber);}
.card{background:#fff;border:1.5px solid var(--border);border-radius:18px;padding:22px;margin-bottom:18px;box-shadow:0 2px 12px rgba(26,128,251,.06);}
.card-title{display:flex;align-items:center;gap:9px;font-size:15px;font-weight:800;color:var(--blue-d);margin-bottom:14px;padding-bottom:10px;border-bottom:1.5px solid var(--border);}
.card-title .ic{width:30px;height:30px;border-radius:8px;background:var(--blue-l);display:flex;align-items:center;justify-content:center;font-size:15px;}
.urg-badge{display:inline-flex;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:800;}
.urg-حرج{background:var(--red-l);color:var(--red);}
.urg-مستعجل{background:var(--amber-l);color:var(--amber);}
.urg-عادي{background:var(--green-l);color:var(--green);}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;}
.info-item{background:rgba(26,128,251,0.04);border:1px solid rgba(26,128,251,0.1);border-radius:11px;padding:10px 13px;}
.info-label{font-size:9px;font-weight:800;color:var(--soft);letter-spacing:0.8px;text-transform:uppercase;margin-bottom:3px;}
.info-value{font-size:13px;font-weight:700;color:var(--text);}
.no-results{text-align:center;padding:30px;color:var(--soft);font-size:14px;font-weight:700;}
.notes-box{background:#f8faff;border:1.5px solid var(--border);border-radius:12px;padding:14px 16px;font-size:14px;color:var(--mid);line-height:1.7;}

/* بلوكات التحاليل */
.analysis-block{border:1.5px solid var(--border);border-radius:14px;overflow:hidden;margin-bottom:14px;}
.ab-header{display:flex;align-items:center;gap:10px;padding:11px 16px;background:var(--blue-l);}
.ab-name{font-size:13px;font-weight:900;color:var(--blue-d);flex:1;}
.ind-table{width:100%;border-collapse:collapse;}
.ind-table th{background:rgba(26,128,251,0.06);padding:8px 14px;font-size:11px;font-weight:800;color:var(--mid);text-align:right;border-bottom:1px solid var(--border);}
.ind-table td{padding:9px 14px;font-size:12px;border-bottom:1px solid rgba(26,128,251,0.06);}
.ind-table tr:last-child td{border-bottom:none;}
.ind-name{color:var(--text);font-weight:600;}
.ind-val{font-weight:900;color:var(--blue-d);font-size:13px;}
.ind-ref{color:var(--soft);font-size:11px;}

/* PRINT */
.print-sheet{display:none;}
@media  print{
    .no-print{display:none!important;}
    body *{visibility:hidden;}
    .print-sheet,.print-sheet *{visibility:visible;}
    .print-sheet{display:block!important;position:fixed;top:0;left:0;width:100%;height:100%;background:#fff;z-index:99999;}
    @page{size:A4 portrait;margin:0;}
    .print-page{width:210mm;min-height:297mm;padding:14mm 16mm;box-sizing:border-box;font-family:'Tajawal',sans-serif;direction:rtl;color:#000;font-size:12px;border:4px double #0057c8;position:relative;}
    .ps-header{display:flex;justify-content:space-between;align-items:center;border-bottom:3px solid #0057c8;padding-bottom:10px;margin-bottom:12px;}
    .ps-hospital{font-size:17px;font-weight:900;color:#0057c8;}
    .ps-dept{font-size:11px;color:#555;margin-top:2px;}
    .ps-title{font-size:19px;font-weight:900;color:#0057c8;}
    .ps-date{font-size:10px;color:#777;margin-top:2px;}
    .ps-patient-box{border:1.5px solid #b8d4f8;border-radius:6px;padding:10px 14px;margin-bottom:14px;display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;background:#f0f7ff;-webkit-print-color-adjust:exact;print-color-adjust:exact;}
    .ps-pf-label{font-size:8px;font-weight:800;color:#7da8cc;letter-spacing:0.5px;text-transform:uppercase;margin-bottom:2px;}
    .ps-pf-val{font-size:12px;font-weight:800;color:#0a2540;}
    .ps-section-title{font-size:13px;font-weight:900;color:#0057c8;border-right:4px solid #1a80fb;padding-right:8px;margin-bottom:8px;margin-top:14px;-webkit-print-color-adjust:exact;print-color-adjust:exact;}
    .ps-table{width:100%;border-collapse:collapse;margin-bottom:12px;}
    .ps-table thead tr{background:#0057c8;color:#fff;-webkit-print-color-adjust:exact;print-color-adjust:exact;}
    .ps-table th{padding:7px 11px;font-size:11px;font-weight:800;text-align:right;}
    .ps-table td{padding:6px 11px;font-size:11px;font-weight:600;border-bottom:1px solid #e2ecfa;}
    .ps-table tr:nth-child(even) td{background:#f4f9ff;-webkit-print-color-adjust:exact;print-color-adjust:exact;}
    .val-cell{font-weight:900;color:#0057c8;}
    .ps-footer{display:flex;justify-content:space-between;align-items:flex-end;border-top:1.5px solid #0057c8;padding-top:12px;margin-top:20px;}
    .ps-sign-box{text-align:center;}
    .ps-sign-line{width:140px;border-bottom:1px solid #999;margin:0 auto 5px;height:28px;}
    .ps-sign-label{font-size:10px;color:#555;font-weight:700;}
    .ps-stamp{width:65px;height:65px;border:2px dashed #0057c8;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#0057c8;font-size:9px;font-weight:800;text-align:center;line-height:1.3;-webkit-print-color-adjust:exact;print-color-adjust:exact;}
    .ps-page-footer{position:absolute;bottom:8mm;left:16mm;right:16mm;display:flex;justify-content:space-between;font-size:9px;color:#aaa;border-top:1px solid #eee;padding-top:4px;}
}
</style>


<div class="pg no-print">
    <div class="pg-header">
        <div class="hdr-top">
            <a href="<?php echo e($labRequest->patient->section === 'surgical' ? route('lab.two') : route('lab.one')); ?>" class="back-btn">← رجوع</a>
            <?php if($labRequest->status === 'done'): ?>
            <button onclick="window.print()" class="print-btn">🖨️ طباعة</button>
            <?php endif; ?>
            <div class="hdr-titles">
                <div class="hdr-title">نتائج التحاليل</div>
                <div class="hdr-sub"><?php echo e($labRequest->patient->first_name); ?> <?php echo e($labRequest->patient->last_name); ?></div>
            </div>
        </div>
        <div class="pi-badges">
            <div class="pi-badge">👤 <?php echo e($labRequest->patient->first_name); ?> <?php echo e($labRequest->patient->last_name); ?></div>
            <div class="pi-badge">🆔 <?php echo e($labRequest->patient->id); ?></div>
            <div class="pi-badge">👨‍⚕️ <?php echo e($labRequest->doctor_name); ?></div>
            <div class="pi-badge">🕐 <?php echo e($labRequest->created_at->format('H:i')); ?></div>
        </div>
    </div>

    <?php if($labRequest->status === 'done'): ?>
    <div class="status-bar status-done">✅ تم إرسال النتائج من المخبر</div>
    <?php else: ?>
    <div class="status-bar status-pending">⏳ في انتظار نتائج المخبر</div>
    <?php endif; ?>

    <div class="card">
        <div class="card-title"><div class="ic">📋</div> معلومات الطلب</div>
        <div class="info-grid">
            <div class="info-item"><div class="info-label">درجة الاستعجال</div><div class="info-value"><span class="urg-badge urg-<?php echo e($labRequest->urgency); ?>"><?php echo e($labRequest->urgency); ?></span></div></div>
            <div class="info-item"><div class="info-label">الحالة</div><div class="info-value"><?php echo e($labRequest->status === 'done' ? '✅ مكتمل' : '⏳ في الانتظار'); ?></div></div>
            <div class="info-item"><div class="info-label">تاريخ الطلب</div><div class="info-value">📅 <?php echo e($labRequest->created_at->format('Y-m-d H:i')); ?></div></div>
            <div class="info-item"><div class="info-label">عدد التحاليل</div><div class="info-value">🧪 <?php echo e(count($requestedTests)); ?> تحليل</div></div>
        </div>
    </div>

    
    <?php if($labRequest->status === 'done' && !empty($results)): ?>
    <?php
        // نجمع المؤشرات حسب اسم التحليل
        $grouped = [];
        foreach($results as $key => $val) {
            if(str_contains($key, ' — ')) {
                [$testName, $indicator] = explode(' — ', $key, 2);
                $grouped[$testName][$indicator] = $val;
            } else {
                $grouped[$key]['النتيجة'] = $val;
            }
        }
    ?>

    <div class="card">
        <div class="card-title"><div class="ic">🔬</div> نتائج التحاليل</div>
        <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testName => $indicators): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="analysis-block">
            <div class="ab-header">
                <span style="font-size:18px;">🧬</span>
                <span class="ab-name"><?php echo e($testName); ?></span>
                <span style="font-size:10px;color:var(--soft);"><?php echo e(count($indicators)); ?> مؤشر</span>
            </div>
            <table class="ind-table">
                <thead><tr>
                    <th>المؤشر</th>
                    <th>النتيجة</th>
                </tr></thead>
                <tbody>
                    <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indName => $indVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="ind-name"><?php echo e($indName); ?></td>
                        <td class="ind-val"><?php echo e($indVal ?: '—'); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php else: ?>
    <div class="card">
        <div class="card-title"><div class="ic">🔬</div> نتائج التحاليل</div>
        <div class="no-results">
            <?php if($labRequest->status === 'done'): ?> ⚠️ لا توجد نتائج مسجلة
            <?php else: ?> ⏳ لم يتم إرسال النتائج بعد <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if($labRequest->lab_notes): ?>
    <div class="card"><div class="card-title"><div class="ic">📝</div> ملاحظات المخبر</div><div class="notes-box"><?php echo e($labRequest->lab_notes); ?></div></div>
    <?php endif; ?>
    <?php if($labRequest->notes): ?>
    <div class="card"><div class="card-title"><div class="ic">💬</div> ملاحظات الطبيب</div><div class="notes-box"><?php echo e($labRequest->notes); ?></div></div>
    <?php endif; ?>
</div>


<div class="print-sheet">
<div class="print-page">
    <div class="ps-header">
        <div>
            <div class="ps-hospital">🏥 مستشفى الاستعجالات</div>
            <div class="ps-dept">مصلحة المخبر — قسم التحاليل السريرية</div>
        </div>
        <div style="text-align:left;">
            <div class="ps-title">نتيجة التحاليل المخبرية</div>
            <div class="ps-date"><?php echo e($labRequest->created_at->format('Y/m/d')); ?> — <?php echo e($labRequest->created_at->format('H:i')); ?></div>
        </div>
    </div>

    <div class="ps-patient-box">
        <div class="ps-pf"><div class="ps-pf-label">اسم المريض</div><div class="ps-pf-val"><?php echo e($labRequest->patient->first_name); ?> <?php echo e($labRequest->patient->last_name); ?></div></div>
        <div class="ps-pf"><div class="ps-pf-label">رقم الملف</div><div class="ps-pf-val"><?php echo e(str_pad($labRequest->patient->id, 6, '0', STR_PAD_LEFT)); ?></div></div>
        <div class="ps-pf"><div class="ps-pf-label">العمر / الجنس</div><div class="ps-pf-val"><?php echo e($labRequest->patient->age ?? '—'); ?> / <?php echo e($labRequest->patient->gender ?? '—'); ?></div></div>
        <div class="ps-pf"><div class="ps-pf-label">الطبيب المحوِّل</div><div class="ps-pf-val">د. <?php echo e($labRequest->doctor_name); ?></div></div>
        <div class="ps-pf"><div class="ps-pf-label">درجة الاستعجال</div><div class="ps-pf-val"><?php echo e($labRequest->urgency); ?></div></div>
        <div class="ps-pf"><div class="ps-pf-label">رقم الطلب</div><div class="ps-pf-val">LB-<?php echo e(str_pad($labRequest->id, 5, '0', STR_PAD_LEFT)); ?></div></div>
    </div>

    <?php
        $grouped = [];
        foreach($results as $key => $val) {
            if(str_contains($key, ' — ')) {
                [$testName, $indicator] = explode(' — ', $key, 2);
                $grouped[$testName][$indicator] = $val;
            } else {
                $grouped[$key]['النتيجة'] = $val;
            }
        }
        $refRanges = [
            'كريات الدم الحمراء (RBC)' => '4.5–5.5 10⁶/µL',
            'الهيموغلوبين (HGB)'        => '13–17 g/dL',
            'الهيماتوكريت (HCT)'        => '40–52 %',
            'كريات الدم البيضاء (WBC)'  => '4–11 10³/µL',
            'الصفائح الدموية (PLT)'     => '150–400 10³/µL',
            'متوسط حجم الكريات (MCV)'   => '80–100 fL',
            'جلوكوز صائم'               => '70–100 mg/dL',
            'جلوكوز عشوائي'             => '< 140 mg/dL',
            'كرياتينين'                 => '0.6–1.2 mg/dL',
            'يوريا'                     => '15–45 mg/dL',
            'SGPT (ALT)'                => '7–56 U/L',
            'SGOT (AST)'                => '10–40 U/L',
            'كوليسترول كلي'             => '< 200 mg/dL',
            'LDL'                       => '< 130 mg/dL',
            'HDL'                       => '> 40 mg/dL',
            'الدهون الثلاثية'           => '< 150 mg/dL',
            'TSH'                       => '0.4–4.0 µIU/mL',
            'T3 حر'                     => '2.3–4.2 pg/mL',
            'T4 حر'                     => '0.8–1.8 ng/dL',
            'سرعة الترسيب (ESR)'        => '0–20 mm/hr',
            'CRP'                       => '< 10 mg/L',
        ];
    ?>

    <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testName => $indicators): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="ps-section-title"><?php echo e($testName); ?></div>
    <table class="ps-table">
        <thead><tr><th style="width:40%">المؤشر</th><th style="width:20%">النتيجة</th><th style="width:40%">المعدل الطبيعي</th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indName => $indVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($indName); ?></td>
                <td class="val-cell"><?php echo e($indVal ?: '—'); ?></td>
                <td style="color:#666;font-size:10px;"><?php echo e($refRanges[$indName] ?? '—'); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($labRequest->lab_notes): ?>
    <div style="background:#fffbeb;border:1px solid #fcd34d;border-radius:5px;padding:8px 12px;font-size:11px;color:#555;margin-bottom:14px;">
        <div style="font-weight:800;color:#92400e;margin-bottom:3px;">ملاحظات المخبر:</div>
        <?php echo e($labRequest->lab_notes); ?>

    </div>
    <?php endif; ?>

    <div class="ps-footer">
        <div class="ps-sign-box"><div class="ps-sign-line"></div><div class="ps-sign-label">توقيع عامل المخبر</div></div>
        <div class="ps-sign-box"><div class="ps-stamp">ختم<br>المصلحة</div></div>
        <div class="ps-sign-box"><div class="ps-sign-line"></div><div class="ps-sign-label">توقيع الطبيب المسؤول</div></div>
    </div>

    <div class="ps-page-footer">
        <span>نظام الاستعجالات — سري طبي</span>
        <span>LB-<?php echo e(str_pad($labRequest->id, 5, '0', STR_PAD_LEFT)); ?> | <?php echo e($labRequest->created_at->format('Y/m/d')); ?></span>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/doctor/results.blade.php ENDPATH**/ ?>