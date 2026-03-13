
<?php $__env->startSection('title', 'قائمة المرضى'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-dd:#003d8f;
    --blue-l:#dbeafe;--blue-ll:#eef5ff;
    --red:#dc2626;--red-d:#991b1b;--red-l:#fee2e2;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --cyan:#0891b2;--cyan-l:#cffafe;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--muted:#b8cfe0;
    --border:rgba(26,128,251,0.13);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f7faff;}

.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#f0f7ff 30%,#e0eeff 65%,#cce0ff 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.04) 1px,transparent 1px);background-size:52px 52px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.055) 1.5px,transparent 1.5px);background-size:26px 26px;}
.bg-orb1{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.07),transparent 65%);top:-300px;right:-300px;}
.bg-orb2{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(8,145,178,0.05),transparent 65%);bottom:-200px;left:-200px;}

@keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes  rowIn{from{opacity:0;transform:translateX(8px)}to{opacity:1;transform:translateX(0)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  pulse{0%,100%{opacity:1}50%{opacity:.4}}

.main{position:relative;z-index:1;min-height:100vh;padding:28px 22px;max-width:1200px;margin:0 auto;display:flex;flex-direction:column;gap:16px;}

/* PAGE HEADER */
.page-header{background:rgba(255,255,255,0.95);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:20px;padding:18px 24px;display:flex;align-items:center;gap:14px;box-shadow:0 4px 24px rgba(26,128,251,0.09);animation:fadeUp .5s ease both;position:relative;overflow:hidden;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:20px 20px 0 0;}
.ph-medical::before{background:linear-gradient(90deg,var(--blue-dd),var(--blue),#60a5fa);}
.ph-surgical::before{background:linear-gradient(90deg,var(--red-d),var(--red),#f87171);}

.ph-logo-wrap{position:relative;width:46px;height:46px;flex-shrink:0;}
.ph-logo-wrap::before{content:'';position:absolute;inset:-2px;border-radius:13px;animation:spin 4s linear infinite;z-index:0;}
.ph-medical .ph-logo-wrap::before{background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));}
.ph-surgical .ph-logo-wrap::before{background:conic-gradient(var(--red-d),var(--red),#fca5a5,var(--red-d));}
.ph-logo{position:relative;z-index:1;width:46px;height:46px;border-radius:12px;background:#fff;display:flex;align-items:center;justify-content:center;}
.ph-logo svg{width:22px;height:22px;fill:none;stroke-width:1.6;}
.ph-medical .ph-logo svg{stroke:var(--blue-d);}
.ph-surgical .ph-logo svg{stroke:var(--red-d);}

.ph-info{flex:1;}
.ph-title{font-size:17px;font-weight:900;color:var(--text);}
.ph-title .sp-med{background:linear-gradient(90deg,var(--blue-dd),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-title .sp-surg{background:linear-gradient(90deg,var(--red-d),var(--red));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:10px;color:var(--soft);margin-top:3px;font-family:'IBM Plex Mono',monospace;letter-spacing:.5px;}

.ph-btns{display:flex;gap:8px;flex-shrink:0;}
.btn-primary{display:flex;align-items:center;gap:7px;padding:9px 18px;border-radius:11px;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;text-decoration:none;transition:all .25s ease;box-shadow:0 3px 12px rgba(26,128,251,0.25);white-space:nowrap;}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(26,128,251,0.35);}
.btn-primary svg{width:15px;height:15px;stroke:#fff;fill:none;stroke-width:2.2;}
.btn-secondary{display:flex;align-items:center;gap:7px;padding:9px 18px;border-radius:11px;background:rgba(255,255,255,0.8);border:1.5px solid var(--border2);color:var(--mid);font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;text-decoration:none;transition:all .25s ease;white-space:nowrap;}
.btn-secondary:hover{background:var(--blue-ll);color:var(--blue-d);transform:translateY(-2px);}
.btn-secondary svg{width:15px;height:15px;stroke:currentColor;fill:none;stroke-width:2;}

/* ALERT */
.alert-ok{display:flex;align-items:center;gap:10px;background:var(--green-l);border:1.5px solid rgba(22,163,74,0.25);border-radius:14px;padding:12px 18px;font-size:13px;font-weight:700;color:var(--green);animation:fadeUp .4s ease both;}
.alert-ok svg{width:18px;height:18px;stroke:var(--green);fill:none;stroke-width:2.5;flex-shrink:0;}

/* TABLE CARD */
.table-card{background:rgba(255,255,255,0.97);border:1.5px solid var(--border);border-radius:20px;overflow:hidden;box-shadow:0 6px 32px rgba(26,128,251,0.09);animation:fadeUp .5s ease .1s both;}

.table-top{display:flex;align-items:center;justify-content:space-between;padding:14px 22px;border-bottom:1.5px solid rgba(26,128,251,0.09);background:linear-gradient(135deg,rgba(26,128,251,0.04),transparent);}
.table-title{display:flex;align-items:center;gap:9px;font-size:13px;font-weight:900;color:var(--text);}
.table-title svg{width:16px;height:16px;stroke:var(--blue);fill:none;stroke-width:2;}
.table-count{display:inline-flex;align-items:center;gap:5px;background:var(--blue-ll);border:1px solid var(--border2);border-radius:20px;padding:4px 12px;font-size:11px;font-weight:700;color:var(--blue-d);font-family:'IBM Plex Mono',monospace;}
.tc-dot{width:5px;height:5px;border-radius:50%;background:var(--blue);animation:pulse 1.8s ease infinite;}

.table-scroll{overflow-x:auto;}
table{width:100%;border-collapse:collapse;min-width:860px;}

thead tr{background:linear-gradient(135deg,rgba(26,128,251,0.06),rgba(26,128,251,0.02));border-bottom:1.5px solid rgba(26,128,251,0.09);}
thead th{padding:13px 18px;font-size:10px;font-weight:800;color:var(--mid);letter-spacing:1px;text-align:right;white-space:nowrap;font-family:'IBM Plex Mono',monospace;}

tbody tr{border-bottom:1px solid rgba(26,128,251,0.06);transition:background .2s;animation:rowIn .35s ease both;}
tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:rgba(26,128,251,0.025);}
<?php for($i=1;$i<=15;$i++): ?>
tbody tr:nth-child(<?php echo e($i); ?>){animation-delay:<?php echo e(0.1+$i*0.04); ?>s}
<?php endfor; ?>

td{padding:13px 18px;font-size:13px;color:var(--text);font-weight:500;vertical-align:middle;}

/* خلية الاسم */
.td-name{display:flex;align-items:center;gap:10px;}
.td-avatar{width:34px;height:34px;border-radius:10px;background:var(--blue-ll);border:1.5px solid var(--border2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.td-avatar svg{width:16px;height:16px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.td-avatar.female{background:#fce7f3;border-color:rgba(219,39,119,0.2);}
.td-avatar.female svg{stroke:#be185d;}
.td-fullname{font-size:13px;font-weight:700;color:var(--text);}

.td-age{font-size:13px;font-weight:800;color:var(--mid);font-family:'IBM Plex Mono',monospace;}

/* جنس */
.gender-badge{display:inline-flex;align-items:center;gap:5px;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;border:1px solid;}
.gb-m{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.2);}
.gb-f{background:#fce7f3;color:#be185d;border-color:rgba(219,39,119,0.2);}
.gender-badge svg{width:11px;height:11px;fill:none;stroke:currentColor;stroke-width:2;}

/* status pill */
.s-pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;border:1px solid;}
.sp-d{width:5px;height:5px;border-radius:50%;}
.sp-blue{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.2);}
.sp-blue .sp-d{background:var(--blue);animation:pulse 1.8s ease infinite;}
.sp-red{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.sp-red .sp-d{background:var(--red);animation:pulse 1.8s ease infinite;}

/* doctor */
.td-doctor{display:flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:var(--mid);}
.td-doctor svg{width:13px;height:13px;stroke:var(--soft);fill:none;stroke-width:1.8;}

/* send btn */
.btn-send{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:10px;border:none;cursor:pointer;background:linear-gradient(135deg,var(--green),#22c55e);color:#fff;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;box-shadow:0 3px 10px rgba(22,163,74,0.22);transition:all .25s ease;}
.btn-send:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(22,163,74,0.32);}
.btn-send svg{width:13px;height:13px;stroke:#fff;fill:none;stroke-width:2.5;}
.sent-badge{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:var(--green);background:var(--green-l);border:1px solid rgba(22,163,74,0.2);border-radius:20px;padding:4px 10px;}
.sent-badge svg{width:13px;height:13px;stroke:var(--green);fill:none;stroke-width:2.5;}

/* action btns */
.act-row{display:flex;gap:6px;align-items:center;}
.btn-edit{display:inline-flex;align-items:center;gap:5px;padding:7px 13px;border-radius:9px;background:var(--amber-l);border:1.5px solid rgba(217,119,6,0.2);color:var(--amber);font-family:'Tajawal',sans-serif;font-size:11px;font-weight:700;text-decoration:none;transition:all .25s ease;}
.btn-edit:hover{background:rgba(217,119,6,0.16);transform:translateY(-1px);}
.btn-edit svg{width:12px;height:12px;stroke:currentColor;fill:none;stroke-width:2;}
.btn-del{display:inline-flex;align-items:center;gap:5px;padding:7px 13px;border-radius:9px;border:1.5px solid rgba(220,38,38,0.2);cursor:pointer;background:var(--red-l);color:var(--red);font-family:'Tajawal',sans-serif;font-size:11px;font-weight:700;transition:all .25s ease;}
.btn-del:hover{background:rgba(220,38,38,0.15);transform:translateY(-1px);}
.btn-del svg{width:12px;height:12px;stroke:currentColor;fill:none;stroke-width:2;}

/* empty */
.empty{text-align:center;padding:60px 20px;}
.empty-icon{width:64px;height:64px;border-radius:20px;background:var(--blue-ll);border:1.5px solid var(--border2);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;}
.empty-icon svg{width:28px;height:28px;stroke:var(--soft);fill:none;stroke-width:1.5;}
.empty-t{font-size:15px;font-weight:800;color:var(--mid);margin-bottom:6px;}
.empty-s{font-size:12px;color:var(--muted);}

@media(max-width:700px){.main{padding:14px 12px;}.ph-btns{display:none;}}
</style>

<?php $isSurgical = $section !== 'medical'; ?>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-orb1"></div><div class="bg-orb2"></div></div>

<div class="main">

    <!-- Header -->
    <div class="page-header <?php echo e($isSurgical ? 'ph-surgical' : 'ph-medical'); ?>">
        <div class="ph-logo-wrap">
            <div class="ph-logo">
                <?php if($isSurgical): ?>
                <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <?php else: ?>
                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                <?php endif; ?>
            </div>
        </div>
        <div class="ph-info">
            <div class="ph-title">
                مرضى اليوم —
                <?php if($isSurgical): ?>
                    <span class="sp-surg">القسم الجراحي</span>
                <?php else: ?>
                    <span class="sp-med">القسم الطبي</span>
                <?php endif; ?>
            </div>
            <div class="ph-sub">PATIENT LIST — TODAY</div>
        </div>
        <div class="ph-btns">
            <a href="<?php echo e(route('patients.create.' . $section)); ?>" class="btn-primary">
                <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                تسجيل مريض جديد
            </a>
            <a href="<?php echo e(route('triage')); ?>" class="btn-secondary">
                <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                الفرز
            </a>
        </div>
    </div>

    <?php if(session('success')): ?>
    <div class="alert-ok">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <!-- Table -->
    <div class="table-card">
        <div class="table-top">
            <div class="table-title">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                قائمة المرضى المسجلين اليوم
            </div>
            <span class="table-count">
                <div class="tc-dot"></div>
                <?php echo e(count($patients)); ?> مريض
            </span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>الاسم الكامل</th>
                        <th>العمر</th>
                        <th>الجنس</th>
                        <th>الحالة</th>
                        <th>الطبيب</th>
                        <th>الإرسال</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="td-name">
                                <div class="td-avatar <?php echo e($patient->gender === 'أنثى' ? 'female' : ''); ?>">
                                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                <span class="td-fullname"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></span>
                            </div>
                        </td>
                        <td><span class="td-age"><?php echo e($patient->age); ?></span></td>
                        <td>
                            <?php if($patient->gender === 'ذكر'): ?>
                            <span class="gender-badge gb-m">
                                <svg viewBox="0 0 24 24"><circle cx="10" cy="14" r="5"/><line x1="19" y1="5" x2="14.14" y2="9.86"/><polyline points="19 5 19 9 15 9"/></svg>
                                ذكر
                            </span>
                            <?php elseif($patient->gender === 'أنثى'): ?>
                            <span class="gender-badge gb-f">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="9" r="5"/><line x1="12" y1="14" x2="12" y2="21"/><line x1="9" y1="18" x2="15" y2="18"/></svg>
                                أنثى
                            </span>
                            <?php else: ?>
                            <span style="color:var(--soft)"><?php echo e($patient->gender); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($patient->status)): ?>
                            <span class="s-pill <?php echo e($isSurgical ? 'sp-red' : 'sp-blue'); ?>">
                                <div class="sp-d"></div><?php echo e($patient->status); ?>

                            </span>
                            <?php else: ?>
                            <span style="color:var(--muted)">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="td-doctor">
                                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <?php echo e($patient->doctor ?? '—'); ?>

                            </div>
                        </td>
                        <td>
                            <?php if(!$patient->received): ?>
                            <form method="POST" action="<?php echo e(route('patients.receive', $patient->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn-send">
                                    <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                                    إرسال للفحوصات
                                </button>
                            </form>
                            <?php else: ?>
                            <span class="sent-badge">
                                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                تم الإرسال
                            </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="act-row">
                                <a href="<?php echo e(route('patients.edit', $patient->id)); ?>" class="btn-edit">
                                    <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    تعديل
                                </a>
                                <form method="POST" action="<?php echo e(route('patients.destroy', $patient->id)); ?>">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-del" onclick="return confirm('هل أنت متأكد من حذف هذا المريض؟')">
                                        <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/></svg>
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty">
                                <div class="empty-icon">
                                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                </div>
                                <div class="empty-t">لا يوجد مرضى مسجلون اليوم</div>
                                <div class="empty-s">سجّل أول مريض بالضغط على "تسجيل مريض جديد"</div>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/patients/today.blade.php ENDPATH**/ ?>