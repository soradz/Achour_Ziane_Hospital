
<?php $__env->startSection('title', 'المرضى المتبقين - مكتب الفحوصات 2'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;--blue-ll:#eef5ff;
    --cyan:#0891b2;--cyan-l:#cffafe;
    --green:#16a34a;--green-l:#dcfce7;
    --gray:#64748b;--gray-l:#f1f5f9;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--muted:#b8cfe0;
    --border:rgba(26,128,251,0.13);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f7faff;}
.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#f0f7ff 30%,#e0eeff 65%,#cce0ff 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.04) 1px,transparent 1px);background-size:52px 52px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.055) 1.5px,transparent 1.5px);background-size:26px 26px;}
.bg-orb1{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(8,145,178,0.07),transparent 65%);top:-300px;right:-300px;}
.bg-orb2{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.05),transparent 65%);bottom:-200px;left:-200px;}

@keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes  rowIn{from{opacity:0;transform:translateX(8px)}to{opacity:1;transform:translateX(0)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  pulse{0%,100%{opacity:1}50%{opacity:.35}}
@keyframes  bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}

.main{position:relative;z-index:1;min-height:100vh;padding:26px 18px;max-width:1200px;margin:0 auto;display:flex;flex-direction:column;gap:14px;}

/* PAGE HEADER */
.page-header{background:rgba(255,255,255,0.93);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:20px;padding:16px 22px 13px;display:flex;align-items:center;gap:13px;box-shadow:0 4px 24px rgba(26,128,251,0.09);animation:fadeUp .5s ease .05s both;position:relative;overflow:hidden;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--cyan),var(--blue),#60a5fa);border-radius:20px 20px 0 0;}
.ph-logo-wrap{position:relative;width:42px;height:42px;flex-shrink:0;}
.ph-logo-wrap::before{content:'';position:absolute;inset:-2px;border-radius:12px;background:conic-gradient(var(--cyan),#22d3ee,#a5f3fc,var(--cyan));animation:spin 4s linear infinite;z-index:0;}
.ph-logo{position:relative;z-index:1;width:42px;height:42px;border-radius:11px;background:#fff;display:flex;align-items:center;justify-content:center;}
.ph-logo svg{width:18px;height:18px;stroke:var(--cyan);fill:none;stroke-width:1.8;}
.ph-info{flex:1;}
.ph-title{font-size:16px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--cyan),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:10px;color:var(--soft);margin-top:2px;font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.btn-back{display:flex;align-items:center;gap:6px;padding:7px 14px;border-radius:9px;background:rgba(8,145,178,0.07);border:1.5px solid rgba(8,145,178,0.2);color:var(--cyan);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .22s ease;white-space:nowrap;}
.btn-back:hover{background:rgba(8,145,178,0.13);transform:translateY(-1px);}
.btn-back svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2;}

/* TABLE CARD */
.table-card{background:rgba(255,255,255,0.97);border:1.5px solid var(--border);border-radius:20px;overflow:hidden;box-shadow:0 6px 32px rgba(26,128,251,0.09);animation:fadeUp .5s ease .1s both;}
.table-top{display:flex;align-items:center;justify-content:space-between;padding:13px 20px;border-bottom:1.5px solid rgba(8,145,178,0.1);background:linear-gradient(135deg,rgba(8,145,178,0.05),transparent);}
.table-title{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:900;color:var(--text);}
.table-title svg{width:15px;height:15px;stroke:var(--cyan);fill:none;stroke-width:2;}
.table-count{display:inline-flex;align-items:center;gap:5px;background:var(--cyan-l);border:1px solid rgba(8,145,178,0.2);border-radius:20px;padding:3px 11px;font-size:10px;font-weight:700;color:var(--cyan);font-family:'IBM Plex Mono',monospace;}
.tc-dot{width:5px;height:5px;border-radius:50%;background:var(--cyan);animation:pulse 1.8s ease infinite;}

.table-scroll{overflow-x:auto;}
table{width:100%;border-collapse:collapse;min-width:1020px;}
thead tr{background:linear-gradient(135deg,rgba(8,145,178,0.07),rgba(8,145,178,0.02));border-bottom:1.5px solid rgba(8,145,178,0.1);}
thead th{padding:12px 14px;font-size:10px;font-weight:800;color:var(--mid);letter-spacing:.8px;text-align:right;white-space:nowrap;font-family:'IBM Plex Mono',monospace;}
tbody tr{border-bottom:1px solid rgba(26,128,251,0.06);transition:background .18s;animation:rowIn .35s ease both;}
tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:rgba(8,145,178,0.025);}
<?php for($i=1;$i<=15;$i++): ?>
tbody tr:nth-child(<?php echo e($i); ?>){animation-delay:<?php echo e(0.12+$i*0.04); ?>s}
<?php endfor; ?>
td{padding:11px 14px;font-size:12.5px;color:var(--text);font-weight:500;vertical-align:middle;}

.num-badge{display:inline-flex;align-items:center;justify-content:center;width:24px;height:24px;border-radius:7px;background:var(--cyan-l);color:var(--cyan);font-size:10px;font-weight:800;font-family:'IBM Plex Mono',monospace;}
.td-n{display:flex;align-items:center;gap:8px;}
.td-av{width:30px;height:30px;border-radius:9px;background:var(--cyan-l);border:1px solid rgba(8,145,178,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.td-av svg{width:14px;height:14px;stroke:var(--cyan);fill:none;stroke-width:1.8;}
.td-nm{font-size:13px;font-weight:700;color:var(--text);}
.td-age{font-size:13px;font-weight:800;color:var(--mid);font-family:'IBM Plex Mono',monospace;}

.gender-badge{display:inline-flex;align-items:center;gap:4px;padding:2px 8px;border-radius:20px;font-size:10px;font-weight:700;border:1px solid;}
.gb-m{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.18);}
.gb-f{background:#fce7f3;color:#be185d;border-color:rgba(219,39,119,0.18);}

.sec-pill{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:10px;font-weight:700;border:1px solid;}
.sec-pill svg{width:10px;height:10px;fill:none;stroke:currentColor;stroke-width:2;}
.sp-med{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.18);}
.sp-surg{background:#fee2e2;color:#dc2626;border-color:rgba(220,38,38,0.18);}

.st-pill{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:10px;font-weight:700;background:var(--cyan-l);color:var(--cyan);border:1px solid rgba(8,145,178,0.2);}

.doctor-cell{display:flex;align-items:center;gap:5px;font-size:12px;color:var(--mid);font-weight:600;}
.doctor-cell svg{width:12px;height:12px;stroke:var(--soft);fill:none;stroke-width:1.8;}

.td-dt{font-size:11px;color:var(--soft);font-weight:600;font-family:'IBM Plex Mono',monospace;}
.td-dt svg{width:10px;height:10px;stroke:var(--muted);fill:none;stroke-width:2;vertical-align:middle;margin-left:2px;}

.btn-send{display:inline-flex;align-items:center;gap:5px;padding:7px 14px;border-radius:9px;border:none;cursor:pointer;background:linear-gradient(135deg,var(--green),#22c55e);color:#fff;font-family:'Tajawal',sans-serif;font-size:11px;font-weight:700;box-shadow:0 3px 10px rgba(22,163,74,0.22);transition:all .22s ease;}
.btn-send:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(22,163,74,0.3);}
.btn-send svg{width:13px;height:13px;stroke:#fff;fill:none;stroke-width:2.5;}
.done-badge{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:var(--gray);background:var(--gray-l);border:1px solid rgba(100,116,139,0.18);border-radius:20px;padding:4px 10px;}
.done-badge svg{width:13px;height:13px;stroke:var(--green);fill:none;stroke-width:2.5;}

.empty-state{text-align:center;padding:52px 20px;}
.empty-icon{width:64px;height:64px;background:var(--cyan-l);border:1.5px solid rgba(8,145,178,0.2);border-radius:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;}
.empty-icon svg{width:28px;height:28px;stroke:rgba(8,145,178,0.4);fill:none;stroke-width:1.4;}
.es-t{font-size:14px;font-weight:800;color:var(--mid);}
.es-s{font-size:12px;color:var(--muted);margin-top:4px;}

@media(max-width:700px){.main{padding:14px 10px;}}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-orb1"></div><div class="bg-orb2"></div></div>

<div class="main">

    <div class="page-header">
        <div class="ph-logo-wrap">
            <div class="ph-logo">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M2 12h4M18 12h4M12 2v4M12 18v4"/></svg>
            </div>
        </div>
        <div class="ph-info">
            <div class="ph-title">المرضى المتبقين — <span>مكتب الفحوصات 2</span></div>
            <div class="ph-sub">REMAINING PATIENTS — LAB OFFICE 02</div>
        </div>
        <a href="<?php echo e(route('lab.two')); ?>" class="btn-back">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            مكتب الفحوصات 2
        </a>
    </div>

    <div class="table-card">
        <div class="table-top">
            <div class="table-title">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>
                قائمة المرضى المتبقين
            </div>
            <span class="table-count">
                <div class="tc-dot"></div>
                <?php echo e($patients->count()); ?> مريض
            </span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>العمر</th>
                        <th>الجنس</th>
                        <th>القسم</th>
                        <th>الحالة</th>
                        <th>الطبيب</th>
                        <th>تاريخ التسجيل</th>
                        <th>الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php $isSent = $patient->sent_to_lab2 == 1; ?>
                    <tr>
                        <td><span class="num-badge"><?php echo e($index + 1); ?></span></td>
                        <td>
                            <div class="td-n">
                                <div class="td-av">
                                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                <span class="td-nm"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></span>
                            </div>
                        </td>
                        <td><span class="td-age"><?php echo e($patient->age ?? '—'); ?></span></td>
                        <td>
                            <?php if($patient->gender === 'ذكر'): ?>
                            <span class="gender-badge gb-m">ذكر</span>
                            <?php elseif($patient->gender === 'أنثى'): ?>
                            <span class="gender-badge gb-f">أنثى</span>
                            <?php else: ?>
                            <span style="color:var(--muted)">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="sec-pill <?php echo e($patient->section === 'medical' ? 'sp-med' : 'sp-surg'); ?>">
                                <?php if($patient->section === 'medical'): ?>
                                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                طبي
                                <?php else: ?>
                                <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                جراحي
                                <?php endif; ?>
                            </span>
                        </td>
                        <td>
                            <?php if($patient->status): ?>
                            <span class="st-pill"><?php echo e($patient->status); ?></span>
                            <?php else: ?>
                            <span style="color:var(--muted)">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="doctor-cell">
                                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <?php echo e($patient->doctor ?? '—'); ?>

                            </div>
                        </td>
                        <td>
                            <div class="td-dt">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <?php echo e($patient->created_at->format('Y-m-d H:i')); ?>

                            </div>
                        </td>
                        <td>
                            <?php if($isSent): ?>
                            <span class="done-badge">
                                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                تم المعالجة
                            </span>
                            <?php else: ?>
                            <form method="POST" action="<?php echo e(route('lab.two.sendPatient', $patient->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn-send">
                                    <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                                    إرسال
                                </button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M2 12h4M18 12h4M12 2v4M12 18v4"/></svg>
                                </div>
                                <div class="es-t">لا يوجد مرضى متبقين</div>
                                <div class="es-s">كل المرضى تمت معالجتهم</div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/patients_remaining2.blade.php ENDPATH**/ ?>