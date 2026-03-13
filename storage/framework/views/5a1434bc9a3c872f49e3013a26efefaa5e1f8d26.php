
<?php $__env->startSection('title', 'مكتب الفحوصات 2'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-dd:#003d8f;
    --blue-l:#dbeafe;--blue-ll:#eef5ff;
    --cyan:#0891b2;--cyan-l:#cffafe;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --purple:#7c3aed;--purple-l:#ede9fe;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--muted:#b8cfe0;
    --border:rgba(26,128,251,0.13);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f7faff;}
.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#f0f7ff 30%,#e0eeff 65%,#cce0ff 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.04) 1px,transparent 1px);background-size:52px 52px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.055) 1.5px,transparent 1.5px);background-size:26px 26px;}
.bg-orb1{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.07),transparent 65%);top:-300px;right:-300px;}
.bg-orb2{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(8,145,178,0.05),transparent 65%);bottom:-200px;left:-200px;}

@keyframes  fadeUp{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.93) translateY(14px)}to{opacity:1;transform:scale(1) translateY(0)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  pulse{0%,100%{opacity:1}50%{opacity:.35}}
@keyframes  bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
@keyframes  ap{0%,100%{box-shadow:0 0 0 0 rgba(217,119,6,0.5)}50%{box-shadow:0 0 0 8px rgba(217,119,6,0)}}

.main{position:relative;z-index:1;min-height:100vh;padding:28px 18px;display:flex;flex-direction:column;align-items:center;justify-content:center;}

/* PAGE HEADER */
.page-header{background:rgba(255,255,255,0.93);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:20px;padding:16px 22px 14px;width:100%;max-width:580px;display:flex;align-items:center;gap:14px;margin-bottom:18px;box-shadow:0 4px 24px rgba(26,128,251,0.09);animation:fadeUp .5s ease .05s both;position:relative;overflow:hidden;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-dd),var(--blue),#60a5fa);border-radius:20px 20px 0 0;}
.ph-logo-wrap{position:relative;width:44px;height:44px;flex-shrink:0;}
.ph-logo-wrap::before{content:'';position:absolute;inset:-2px;border-radius:13px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 4s linear infinite;z-index:0;}
.ph-logo{position:relative;z-index:1;width:44px;height:44px;border-radius:11px;background:#fff;display:flex;align-items:center;justify-content:center;}
.ph-logo svg{width:20px;height:20px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.ph-info{flex:1;}
.ph-title{font-size:16px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:10px;color:var(--soft);margin-top:2px;font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.ph-right{display:flex;align-items:center;gap:8px;flex-shrink:0;}
.ph-chip{display:flex;align-items:center;gap:5px;padding:5px 11px;border-radius:8px;font-size:11px;font-weight:700;}
.pc-live{background:var(--green-l);color:var(--green);border:1px solid rgba(22,163,74,0.22);}
.live-d{width:6px;height:6px;border-radius:50%;background:var(--green);animation:pulse 1.8s ease infinite;}
.alert-badge{display:flex;align-items:center;gap:6px;background:var(--amber-l);border:1.5px solid rgba(217,119,6,0.28);border-radius:10px;padding:5px 12px;font-size:11px;font-weight:800;color:var(--amber);text-decoration:none;transition:all .25s ease;}
.alert-badge:hover{background:rgba(217,119,6,0.15);transform:translateY(-1px);}
.alert-badge svg{width:12px;height:12px;stroke:var(--amber);fill:none;stroke-width:2;}
.alert-dot{width:7px;height:7px;border-radius:50%;background:var(--amber);animation:ap 1.5s ease infinite;}
.back-btn{display:flex;align-items:center;gap:5px;padding:6px 13px;border-radius:8px;background:rgba(255,255,255,0.8);border:1.5px solid var(--border2);color:var(--mid);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .22s ease;}
.back-btn:hover{background:var(--blue-ll);color:var(--blue-d);transform:translateY(-1px);}
.back-btn svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2;}

/* PATIENT CARD */
.patient-card{background:rgba(255,255,255,0.97);border:1.5px solid var(--border);border-radius:22px;padding:24px;width:100%;max-width:580px;box-shadow:0 8px 36px rgba(26,128,251,0.10);animation:popIn .6s cubic-bezier(0.34,1.4,0.64,1) .12s both;position:relative;overflow:hidden;}
.patient-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--cyan),#22d3ee);border-radius:22px 22px 0 0;}

.card-top{display:flex;align-items:center;gap:14px;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid rgba(26,128,251,0.08);}
.patient-avatar{width:52px;height:52px;border-radius:16px;background:var(--cyan-l);border:1.5px solid rgba(8,145,178,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 4px 14px rgba(8,145,178,0.15);animation:bob 3s ease-in-out infinite;}
.patient-avatar svg{width:24px;height:24px;stroke:var(--cyan);fill:none;stroke-width:1.6;}
.patient-name{font-size:18px;font-weight:900;color:var(--text);letter-spacing:-.2px;}
.patient-tags{display:flex;gap:6px;margin-top:5px;flex-wrap:wrap;}
.ptag{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:10px;font-weight:700;border:1px solid;}
.pt-cyan{background:var(--cyan-l);color:var(--cyan);border-color:rgba(8,145,178,0.2);}
.pt-blue{background:var(--blue-ll);color:var(--blue-d);border-color:var(--border2);}
.pt-dot{width:5px;height:5px;border-radius:50%;background:var(--cyan);animation:pulse 1.8s ease infinite;}
.ptag svg{width:10px;height:10px;stroke:currentColor;fill:none;stroke-width:2;}

/* INFO GRID */
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:18px;}
.info-item{background:rgba(26,128,251,0.04);border:1px solid rgba(26,128,251,0.09);border-radius:12px;padding:10px 13px;transition:all .2s ease;}
.info-item:hover{background:rgba(26,128,251,0.07);border-color:rgba(26,128,251,0.18);}
.info-item.full{grid-column:1/-1;}
.info-label{font-size:9px;font-weight:800;color:var(--soft);letter-spacing:.8px;text-transform:uppercase;margin-bottom:3px;font-family:'IBM Plex Mono',monospace;}
.info-value{font-size:13px;font-weight:700;color:var(--text);display:flex;align-items:center;gap:6px;}
.info-value svg{width:13px;height:13px;stroke:var(--soft);fill:none;stroke-width:1.8;flex-shrink:0;}

/* RECEIVE */
.receive-wrap{margin-bottom:16px;}
.btn-receive{width:100%;display:flex;align-items:center;justify-content:center;gap:9px;padding:14px;border-radius:14px;background:linear-gradient(135deg,var(--green),#4ade80);color:#fff;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:15px;font-weight:800;box-shadow:0 4px 18px rgba(22,163,74,0.28);transition:all .3s cubic-bezier(0.34,1.4,0.64,1);}
.btn-receive:hover{transform:translateY(-2px) scale(1.02);box-shadow:0 10px 28px rgba(22,163,74,0.36);}
.btn-receive svg{width:18px;height:18px;stroke:#fff;fill:none;stroke-width:2.5;}
.received-badge{width:100%;display:flex;align-items:center;justify-content:center;gap:8px;padding:13px;border-radius:14px;background:var(--green-l);border:1.5px solid rgba(22,163,74,0.25);color:var(--green);font-size:14px;font-weight:800;}
.received-badge svg{width:18px;height:18px;stroke:var(--green);fill:none;stroke-width:2.5;}

/* ACTION ROW */
.action-row{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:10px;}
.act-btn{position:relative;display:flex;flex-direction:column;align-items:center;gap:8px;padding:20px 14px;border-radius:16px;text-decoration:none;border:1.5px solid transparent;background:rgba(255,255,255,0.9);overflow:hidden;transition:all .3s cubic-bezier(0.34,1.5,0.64,1);box-shadow:0 3px 14px rgba(26,128,251,0.07);}
.act-btn::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:16px 16px 0 0;}
.act-btn:hover{transform:translateY(-4px) scale(1.02);}
.btn-lab{border-color:rgba(8,145,178,0.18);animation:popIn .6s ease .3s both;}
.btn-lab::before{background:linear-gradient(90deg,var(--cyan),#22d3ee);}
.btn-lab:hover{border-color:rgba(8,145,178,0.4);box-shadow:0 14px 36px rgba(8,145,178,0.18);}
.btn-lab .act-icon{background:var(--cyan-l);border-color:rgba(8,145,178,0.2);}
.btn-lab .act-icon svg{stroke:var(--cyan);}
.btn-lab .act-title{color:var(--cyan);}
.btn-xray{border-color:var(--border2);animation:popIn .6s ease .36s both;}
.btn-xray::before{background:linear-gradient(90deg,var(--blue-d),var(--blue));}
.btn-xray:hover{border-color:rgba(26,128,251,0.4);box-shadow:0 14px 36px rgba(26,128,251,0.16);}
.btn-xray .act-icon{background:var(--blue-ll);border-color:var(--border2);}
.btn-xray .act-icon svg{stroke:var(--blue-d);}
.btn-xray .act-title{color:var(--blue-d);}
.act-icon{width:50px;height:50px;border-radius:14px;border:1.5px solid;display:flex;align-items:center;justify-content:center;transition:transform .35s cubic-bezier(0.34,1.8,0.64,1);animation:bob 3s ease-in-out infinite;}
.act-icon svg{width:22px;height:22px;fill:none;stroke-width:1.7;}
.act-btn:hover .act-icon{transform:scale(1.18) rotate(-8deg);animation:none;}
.act-title{font-size:15px;font-weight:900;}
.act-sub{font-size:10px;color:var(--soft);font-weight:500;}

/* RESULTS BUTTONS */
.btn-results-full{display:flex;align-items:center;gap:13px;padding:15px 18px;border-radius:16px;text-decoration:none;border:1.5px solid rgba(124,58,237,0.22);background:linear-gradient(135deg,rgba(237,233,254,0.9),rgba(221,214,254,0.5));transition:all .3s cubic-bezier(0.34,1.5,0.64,1);box-shadow:0 3px 14px rgba(124,58,237,0.08);position:relative;overflow:hidden;margin-bottom:10px;}
.btn-results-full::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--purple),#a78bfa);border-radius:16px 16px 0 0;}
.btn-results-full:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(124,58,237,0.18);border-color:rgba(124,58,237,0.4);}
.btn-results-full.blue-v{border-color:rgba(26,128,251,0.22);background:linear-gradient(135deg,rgba(219,234,254,0.9),rgba(191,219,254,0.5));}
.btn-results-full.blue-v::before{background:linear-gradient(90deg,var(--blue-d),var(--blue));}
.btn-results-full.blue-v:hover{box-shadow:0 10px 30px rgba(26,128,251,0.16);border-color:rgba(26,128,251,0.4);}
.ri{width:46px;height:46px;border-radius:13px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.ri svg{width:20px;height:20px;fill:none;stroke-width:1.7;}
.ri-purple{background:var(--purple-l);} .ri-purple svg{stroke:var(--purple);}
.ri-blue{background:var(--blue-ll);} .ri-blue svg{stroke:var(--blue-d);}
.rt{flex:1;}
.rt-title{font-size:14px;font-weight:900;}
.rt-purple{color:var(--purple);}
.rt-blue{color:var(--blue-d);}
.rt-sub{font-size:11px;color:var(--soft);margin-top:2px;}
.ra svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2.5;opacity:.5;}
.ra-purple{color:var(--purple);}
.ra-blue{color:var(--blue-d);}

/* WAITING */
.waiting-badge{display:flex;align-items:center;gap:10px;padding:13px 16px;border-radius:14px;background:var(--amber-l);border:1.5px solid rgba(217,119,6,0.22);color:var(--amber);font-size:13px;font-weight:700;margin-bottom:10px;}
.waiting-badge svg{width:15px;height:15px;stroke:var(--amber);fill:none;stroke-width:2;flex-shrink:0;}
.waiting-dot{width:8px;height:8px;border-radius:50%;background:var(--amber);animation:ap 1.5s ease infinite;flex-shrink:0;}

/* EMPTY */
.empty-state{background:rgba(255,255,255,0.95);border:1.5px solid var(--border);border-radius:22px;padding:52px 30px;width:100%;max-width:580px;text-align:center;box-shadow:0 6px 28px rgba(26,128,251,0.08);animation:popIn .6s ease .1s both;}
.empty-icon{width:72px;height:72px;background:var(--blue-ll);border:1.5px solid var(--border2);border-radius:20px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;}
.empty-icon svg{width:32px;height:32px;stroke:var(--soft);fill:none;stroke-width:1.4;}
.empty-title{font-size:16px;font-weight:900;color:var(--mid);margin-bottom:6px;}
.empty-sub{font-size:12px;color:var(--muted);}
.back-row{margin-top:14px;animation:fadeUp .5s ease .38s both;}

@media(max-width:480px){.action-row,.info-grid{grid-template-columns:1fr;}.main{padding:18px 12px;}.ph-right{display:none;}}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-orb1"></div><div class="bg-orb2"></div></div>

<div class="main">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="ph-logo-wrap">
            <div class="ph-logo">
                <svg viewBox="0 0 24 24"><path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
            </div>
        </div>
        <div class="ph-info">
            <div class="ph-title">مكتب <span>الفحوصات 2</span></div>
            <div class="ph-sub">أهلاً، <?php echo e(session('name')); ?> — LAB OFFICE 02</div>
        </div>
        <div class="ph-right">
            <?php if($patients->filter(fn($p) => !$p->sent_to_lab2)->count() > 0): ?>
            <a href="<?php echo e(route('two.patients.remaining')); ?>" class="alert-badge">
                <div class="alert-dot"></div>
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                انتظار
            </a>
            <?php else: ?>
            <div class="ph-chip pc-live"><div class="live-d"></div> نشط</div>
            <?php endif; ?>
            <a href="<?php echo e(route('home')); ?>" class="back-btn">
                <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                الرئيسية
            </a>
        </div>
    </div>

    <?php
        $currentPatient = $patients->where('current_lab2', 1)->first();
        $lastLabRequest = $currentPatient
            ? \App\Models\LabRequest::where('patient_id', $currentPatient->id)
                ->where('status', 'done')->latest()->first()
            : null;
    ?>

    <?php if($currentPatient): ?>
    <div class="patient-card">

        <div class="card-top">
            <div class="patient-avatar">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div>
                <div class="patient-name"><?php echo e($currentPatient->first_name); ?> <?php echo e($currentPatient->last_name); ?></div>
                <div class="patient-tags">
                    <span class="ptag pt-cyan"><div class="pt-dot"></div> مريض حالي</span>
                    <span class="ptag pt-blue">
                        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                        <?php echo e($currentPatient->section); ?>

                    </span>
                </div>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">العمر</div>
                <div class="info-value">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <?php echo e($currentPatient->age); ?> سنة
                </div>
            </div>
            <div class="info-item">
                <div class="info-label">الجنس</div>
                <div class="info-value">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?php echo e($currentPatient->gender); ?>

                </div>
            </div>
            <div class="info-item">
                <div class="info-label">الحالة</div>
                <div class="info-value">
                    <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                    <?php echo e($currentPatient->status ?? '—'); ?>

                </div>
            </div>
            <div class="info-item">
                <div class="info-label">الطبيب</div>
                <div class="info-value">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?php echo e($currentPatient->doctor); ?>

                </div>
            </div>
            <div class="info-item full">
                <div class="info-label">تاريخ التسجيل</div>
                <div class="info-value">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <?php echo e($currentPatient->created_at->format('Y-m-d')); ?>

                    &nbsp;
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <?php echo e($currentPatient->created_at->format('H:i')); ?>

                </div>
            </div>
        </div>

        <div class="receive-wrap">
            <?php if(!$currentPatient->received): ?>
            <form method="POST" action="<?php echo e(route('patients.receive', $currentPatient->id)); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-receive">
                    <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    استلام الطلب
                </button>
            </form>
            <?php else: ?>
            <div class="received-badge">
                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                تم الاستلام
            </div>
            <?php endif; ?>
        </div>

        <div class="action-row">
            <a href="<?php echo e(route('doctor.patient.show', $currentPatient->id)); ?>" class="act-btn btn-lab">
                <div class="act-icon">
                    <svg viewBox="0 0 24 24"><path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
                </div>
                <div class="act-title">مخبر</div>
                <div class="act-sub">طلب التحاليل المخبرية</div>
            </a>
            <a href="<?php echo e(route('xray.index', $currentPatient->id)); ?>" class="act-btn btn-xray">
                <div class="act-icon">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="12" cy="12" r="3"/><path d="M3 9h18M3 15h18M9 3v18M15 3v18"/></svg>
                </div>
                <div class="act-title">الأشعة</div>
                <div class="act-sub">تصوير الأشعة</div>
            </a>
        </div>

        <?php if($lastLabRequest && $lastLabRequest->status === 'done'): ?>
        <a href="<?php echo e(route('doctor.results.show', $lastLabRequest->id)); ?>" class="btn-results-full">
            <div class="ri ri-purple">
                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <div class="rt">
                <div class="rt-title rt-purple">نتائج التحاليل جاهزة</div>
                <div class="rt-sub">اضغط لعرض نتائج المريض الحالي</div>
            </div>
            <div class="ra ra-purple"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>
        <?php elseif($lastLabRequest && $lastLabRequest->status === 'pending'): ?>
        <div class="waiting-badge">
            <div class="waiting-dot"></div>
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            في انتظار نتائج المخبر...
        </div>
        <?php endif; ?>

        <a href="<?php echo e(route('doctor.results.list')); ?>" class="btn-results-full blue-v">
            <div class="ri ri-blue">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div class="rt">
                <div class="rt-title rt-blue">كل نتائج التحاليل</div>
                <div class="rt-sub">عرض نتائج جميع المرضى واختيار مريض</div>
            </div>
            <div class="ra ra-blue"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </a>

    </div>

    <?php else: ?>
    <div class="empty-state">
        <div class="empty-icon">
            <svg viewBox="0 0 24 24"><path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
        </div>
        <div class="empty-title">لا يوجد مريض حالياً</div>
        <div class="empty-sub">في انتظار إحالة مريض إلى مكتب الفحوصات 2</div>
    </div>
    <?php endif; ?>

    <div class="back-row">
        <a href="<?php echo e(route('home')); ?>" class="back-btn">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            رجوع للصفحة الرئيسية
        </a>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/lab/two.blade.php ENDPATH**/ ?>