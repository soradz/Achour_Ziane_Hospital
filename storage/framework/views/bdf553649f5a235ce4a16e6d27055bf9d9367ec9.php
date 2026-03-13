
<?php $__env->startSection('title', 'لوحة التصوير الإشعاعي'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;--blue-ll:#f0f7ff;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --red:#dc2626;--red-l:#fee2e2;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;
    --border:rgba(26,128,251,0.13);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f4f8ff;}
.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#eef5ff 40%,#dbeafe 80%,#bfdbfe 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:48px 48px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.07) 1.5px,transparent 1.5px);background-size:24px 24px;}
.bg-glow{position:absolute;width:800px;height:800px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.06),transparent 70%);top:-300px;right:-300px;}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.95) translateY(10px)}to{opacity:1;transform:scale(1) translateY(0)}}
@keyframes  gp{0%,100%{box-shadow:0 0 0 0 rgba(22,163,74,0.4)}50%{box-shadow:0 0 0 5px rgba(22,163,74,0)}}
@keyframes  slideDown{from{opacity:0;transform:translateY(-6px)}to{opacity:1;transform:translateY(0)}}
.main{position:relative;z-index:1;max-width:900px;margin:0 auto;padding:26px 18px 80px;}
.page-header{background:rgba(255,255,255,0.96);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:20px;padding:18px 24px;display:flex;align-items:center;gap:14px;margin-bottom:22px;box-shadow:0 4px 24px rgba(26,128,251,0.1);position:relative;overflow:hidden;animation:fadeUp .45s ease both;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#60a5fa);}
.page-header::after{content:'RADIOLOGY DEPARTMENT';position:absolute;left:22px;bottom:8px;font-family:'IBM Plex Mono',monospace;font-size:8px;color:rgba(26,128,251,0.2);letter-spacing:2px;}
.ph-logo{position:relative;width:48px;height:48px;flex-shrink:0;}
.ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:14px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 3s linear infinite;z-index:0;}
.ph-logo-in{position:relative;z-index:1;width:48px;height:48px;border-radius:13px;background:var(--blue-ll);display:flex;align-items:center;justify-content:center;}
.ph-logo-in svg{width:24px;height:24px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.ph-info{flex:1;}
.ph-title{font-size:18px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:11px;color:var(--soft);margin-top:3px;font-family:'IBM Plex Mono',monospace;letter-spacing:.4px;}
.ph-right{display:flex;align-items:center;gap:8px;}
.live-chip{display:flex;align-items:center;gap:6px;padding:6px 13px;border-radius:8px;font-size:11px;font-weight:700;background:rgba(22,163,74,0.08);color:var(--green);border:1px solid rgba(22,163,74,0.22);}
.live-dot{width:7px;height:7px;border-radius:50%;background:var(--green);animation:gp 1.8s ease infinite;}
.logout-btn{display:flex;align-items:center;gap:6px;padding:7px 14px;border-radius:9px;background:var(--blue-ll);border:1.5px solid var(--border2);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .2s;}
.logout-btn:hover{background:var(--blue-l);}
.logout-btn svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2;}
.alert-ok{display:flex;align-items:center;gap:10px;padding:13px 16px;border-radius:12px;font-size:13px;font-weight:700;margin-bottom:18px;background:var(--green-l);border:1.5px solid rgba(22,163,74,0.3);color:var(--green);}
.alert-ok svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2.5;flex-shrink:0;}
.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:24px;}
.stat-card{background:rgba(255,255,255,0.96);border:1.5px solid var(--border);border-radius:18px;padding:20px;display:flex;align-items:center;gap:14px;box-shadow:0 3px 16px rgba(26,128,251,0.07);animation:popIn .4s ease both;position:relative;overflow:hidden;}
.stat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;}
.sc-total::before{background:linear-gradient(90deg,var(--blue-d),var(--blue));}
.sc-pending::before{background:linear-gradient(90deg,var(--amber),#fcd34d);}
.sc-done::before{background:linear-gradient(90deg,var(--green),#4ade80);}
.stat-icon{width:46px;height:46px;border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.stat-icon svg{width:22px;height:22px;fill:none;stroke-width:1.8;}
.si-blue{background:var(--blue-ll);}.si-blue svg{stroke:var(--blue-d);}
.si-amber{background:var(--amber-l);}.si-amber svg{stroke:var(--amber);}
.si-green{background:var(--green-l);}.si-green svg{stroke:var(--green);}
.stat-num{font-size:32px;font-weight:900;line-height:1;font-family:'IBM Plex Mono',monospace;}
.sn-blue{color:var(--blue-d);}.sn-amber{color:var(--amber);}.sn-green{color:var(--green);}
.stat-lbl{font-size:11px;font-weight:700;color:var(--soft);margin-top:4px;}
.sec-header{display:flex;align-items:center;gap:10px;margin-bottom:14px;margin-top:4px;}
.sec-icon{width:32px;height:32px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.sec-icon svg{width:15px;height:15px;fill:none;stroke-width:2;}
.si-sec-amber{background:var(--amber-l);}.si-sec-amber svg{stroke:var(--amber);}
.si-sec-green{background:var(--green-l);}.si-sec-green svg{stroke:var(--green);}
.sec-title{font-size:13px;font-weight:900;color:var(--mid);}
.sec-badge{font-family:'IBM Plex Mono',monospace;font-size:11px;font-weight:700;padding:2px 9px;border-radius:20px;}
.sb-amber{background:var(--amber-l);color:var(--amber);}
.sb-green{background:var(--green-l);color:var(--green);}
.sec-line{flex:1;height:1.5px;border-radius:2px;}
.sl-amber{background:linear-gradient(90deg,rgba(217,119,6,0.2),transparent);}
.sl-green{background:linear-gradient(90deg,rgba(22,163,74,0.2),transparent);}
.req-card{background:rgba(255,255,255,0.96);border:1.5px solid var(--border);border-radius:16px;overflow:hidden;margin-bottom:12px;box-shadow:0 3px 14px rgba(26,128,251,0.07);animation:popIn .4s ease both;transition:box-shadow .2s;}
.req-card:hover{box-shadow:0 6px 24px rgba(26,128,251,0.13);}
.req-card.urg-حرج{border-right:4px solid var(--red);}
.req-card.urg-مستعجل{border-right:4px solid var(--amber);}
.req-card.urg-عادي{border-right:4px solid var(--green);}
.req-header{display:flex;align-items:center;gap:13px;padding:16px 20px;cursor:pointer;transition:background .15s;}
.req-header:hover{background:rgba(26,128,251,0.02);}
.req-num{width:36px;height:36px;border-radius:11px;background:var(--blue-ll);border:1px solid var(--border);color:var(--blue-d);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:900;font-family:'IBM Plex Mono',monospace;flex-shrink:0;}
.req-info{flex:1;}
.req-name{font-size:15px;font-weight:900;color:var(--text);}
.req-tags{display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-top:7px;}
.req-part-tag{display:inline-flex;align-items:center;gap:5px;padding:3px 11px;border-radius:6px;font-size:11px;font-weight:700;background:var(--blue-ll);color:var(--blue-d);border:1px solid var(--border);font-family:'IBM Plex Mono',monospace;}
.req-part-tag svg{width:11px;height:11px;stroke:currentColor;fill:none;stroke-width:2;}
.req-meta-item{font-size:11px;color:var(--soft);display:flex;align-items:center;gap:4px;}
.req-meta-item svg{width:11px;height:11px;stroke:var(--soft);fill:none;stroke-width:2;}
.badge{display:inline-flex;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:800;border:1px solid;font-family:'IBM Plex Mono',monospace;}
.badge-red{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.badge-amber{background:var(--amber-l);color:var(--amber);border-color:rgba(217,119,6,0.2);}
.badge-green{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.chevron-btn{width:32px;height:32px;border-radius:9px;background:var(--blue-ll);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .25s;}
.chevron-btn svg{width:14px;height:14px;stroke:var(--blue);fill:none;stroke-width:2.5;transition:transform .25s;}
.req-card.open .chevron-btn svg{transform:rotate(180deg);}
.req-card.open .chevron-btn{background:var(--blue-l);}
.req-panel{display:none;padding:20px 22px;border-top:1px solid rgba(26,128,251,0.1);background:rgba(248,252,255,0.9);}
.req-card.open .req-panel{display:block;animation:slideDown .3s ease both;}
.notes-box{background:rgba(26,128,251,0.05);border:1px solid var(--border);border-radius:11px;padding:12px 15px;margin-bottom:16px;font-size:13px;color:var(--mid);font-weight:600;display:flex;align-items:flex-start;gap:9px;}
.notes-box svg{width:15px;height:15px;stroke:var(--blue);fill:none;stroke-width:2;flex-shrink:0;margin-top:1px;}
.field-label{font-size:9px;font-weight:800;color:var(--soft);margin-bottom:8px;letter-spacing:1px;font-family:'IBM Plex Mono',monospace;}
.upload-area{border:2px dashed var(--border2);border-radius:12px;padding:22px;text-align:center;cursor:pointer;transition:all .2s;margin-bottom:16px;background:rgba(255,255,255,0.6);}
.upload-area:hover{border-color:var(--blue);background:var(--blue-ll);}
.upload-area input{display:none;}
.upload-icon-wrap{width:50px;height:50px;border-radius:14px;background:var(--blue-ll);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;}
.upload-icon-wrap svg{width:24px;height:24px;stroke:var(--blue);fill:none;stroke-width:1.8;}
.upload-text{font-size:13px;font-weight:700;color:var(--mid);}
.upload-sub{font-size:10px;color:var(--soft);margin-top:4px;font-family:'IBM Plex Mono',monospace;letter-spacing:.5px;}
.file-preview{font-size:12px;font-weight:700;color:var(--green);margin-top:10px;display:flex;align-items:center;justify-content:center;gap:6px;}
.file-preview svg{width:14px;height:14px;stroke:var(--green);fill:none;stroke-width:2;}
.btn-send-result{display:inline-flex;align-items:center;gap:9px;padding:13px 30px;border-radius:12px;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:14px;font-weight:800;box-shadow:0 4px 16px rgba(26,128,251,0.3);transition:all .25s;}
.btn-send-result:hover{transform:translateY(-1px);box-shadow:0 8px 24px rgba(26,128,251,0.4);}
.btn-send-result svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2;}
.done-row{background:rgba(255,255,255,0.93);border:1.5px solid rgba(22,163,74,0.18);border-radius:14px;padding:14px 18px;display:flex;align-items:center;gap:13px;margin-bottom:10px;box-shadow:0 2px 10px rgba(22,163,74,0.06);animation:popIn .4s ease both;}
.done-status{width:40px;height:40px;border-radius:12px;background:var(--green-l);border:1px solid rgba(22,163,74,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.done-status svg{width:18px;height:18px;stroke:var(--green);fill:none;stroke-width:2.5;}
.done-info{flex:1;}
.done-name{font-size:14px;font-weight:900;color:var(--text);}
.done-meta{font-size:11px;color:var(--soft);margin-top:3px;display:flex;gap:10px;flex-wrap:wrap;}
.done-meta span{display:flex;align-items:center;gap:4px;font-family:'IBM Plex Mono',monospace;}
.done-meta svg{width:11px;height:11px;stroke:var(--soft);fill:none;stroke-width:2;}
.empty-card{background:rgba(255,255,255,0.9);border:1.5px solid var(--border);border-radius:16px;padding:42px 30px;text-align:center;margin-bottom:20px;}
.empty-icon-wrap{width:58px;height:58px;border-radius:17px;background:var(--blue-ll);border:1.5px solid var(--border);display:flex;align-items:center;justify-content:center;margin:0 auto 13px;}
.empty-icon-wrap svg{width:27px;height:27px;stroke:var(--soft);fill:none;stroke-width:1.5;}
.empty-title{font-size:14px;font-weight:800;color:var(--mid);}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-glow"></div></div>

<div class="main">

    <div class="page-header">
        <div class="ph-logo">
            <div class="ph-logo-in">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
            </div>
        </div>
        <div class="ph-info">
            <div class="ph-title">لوحة <span>التصوير الإشعاعي</span></div>
            <div class="ph-sub">مرحباً <?php echo e(session('name')); ?> — XRAY WORKER DASHBOARD</div>
        </div>
        <div class="ph-right">
            <div class="live-chip"><div class="live-dot"></div> نشط</div>
            <a href="<?php echo e(route('logout')); ?>" class="logout-btn">
                <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                خروج
            </a>
        </div>
    </div>

    <?php if(session('success')): ?>
    <div class="alert-ok">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <div class="stats-row">
        <div class="stat-card sc-total" style="animation-delay:.05s">
            <div class="stat-icon si-blue"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg></div>
            <div><div class="stat-num sn-blue"><?php echo e($requests->count()); ?></div><div class="stat-lbl">إجمالي الطلبات</div></div>
        </div>
        <div class="stat-card sc-pending" style="animation-delay:.1s">
            <div class="stat-icon si-amber"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
            <div><div class="stat-num sn-amber"><?php echo e($pending); ?></div><div class="stat-lbl">في الانتظار</div></div>
        </div>
        <div class="stat-card sc-done" style="animation-delay:.15s">
            <div class="stat-icon si-green"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><div class="stat-num sn-green"><?php echo e($done); ?></div><div class="stat-lbl">مكتملة</div></div>
        </div>
    </div>

    <?php
        $pendingReqs = $requests->where('status','pending');
        $doneReqs    = $requests->where('status','done');
    ?>

    <div class="sec-header">
        <div class="sec-icon si-sec-amber"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <span class="sec-title">في الانتظار</span>
        <span class="sec-badge sb-amber"><?php echo e($pendingReqs->count()); ?></span>
        <div class="sec-line sl-amber"></div>
    </div>

    <?php if($pendingReqs->isEmpty()): ?>
    <div class="empty-card" style="margin-bottom:22px;">
        <div class="empty-icon-wrap"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <div class="empty-title">لا توجد طلبات في الانتظار</div>
    </div>
    <?php else: ?>
    <?php $__currentLoopData = $pendingReqs->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $bc = $req->urgency==='حرج'?'badge-red':($req->urgency==='مستعجل'?'badge-amber':'badge-green'); ?>
    <div class="req-card urg-<?php echo e($req->urgency); ?>" id="row-<?php echo e($req->id); ?>" style="animation-delay:<?php echo e($i*.05); ?>s">
        <div class="req-header" onclick="toggleRow(<?php echo e($req->id); ?>)">
            <div class="req-num"><?php echo e(str_pad($i+1,2,'0',STR_PAD_LEFT)); ?></div>
            <div class="req-info">
                <div class="req-name"><?php echo e($req->patient->first_name ?? '—'); ?> <?php echo e($req->patient->last_name ?? ''); ?></div>
                <div class="req-tags">
                    <span class="req-part-tag">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                        <?php echo e($req->body_part); ?><?php echo e($req->side ? ' ('.$req->side.')' : ''); ?>

                    </span>
                    <span class="req-meta-item">
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <?php echo e($req->doctor_name); ?>

                    </span>
                    <span class="req-meta-item">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?php echo e($req->created_at->format('H:i')); ?>

                    </span>
                </div>
            </div>
            <div style="display:flex;gap:8px;align-items:center;">
                <span class="badge <?php echo e($bc); ?>"><?php echo e($req->urgency); ?></span>
                <div class="chevron-btn"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></div>
            </div>
        </div>

        <div class="req-panel">
            <?php if($req->notes): ?>
            <div class="notes-box">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                ملاحظة الطبيب: <?php echo e($req->notes); ?>

            </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('xray.results.store', $req->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="field-label">UPLOAD IMAGE — رفع صورة الأشعة</div>
                <label class="upload-area" id="upload-<?php echo e($req->id); ?>">
                    <input type="file" name="image" accept="image/*,.pdf" onchange="showFile(this,<?php echo e($req->id); ?>)" required>
                    <div class="upload-icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                    </div>
                    <div class="upload-text">اضغط لرفع صورة الأشعة</div>
                    <div class="upload-sub">JPG · PNG · PDF</div>
                    <div class="file-preview" id="file-<?php echo e($req->id); ?>"></div>
                </label>
                <button type="submit" class="btn-send-result">
                    <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    إرسال النتيجة للطبيب
                </button>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <div class="sec-header" style="margin-top:10px;">
        <div class="sec-icon si-sec-green"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <span class="sec-title">مكتملة</span>
        <span class="sec-badge sb-green"><?php echo e($doneReqs->count()); ?></span>
        <div class="sec-line sl-green"></div>
    </div>

    <?php if($doneReqs->isEmpty()): ?>
    <div class="empty-card">
        <div class="empty-icon-wrap"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div class="empty-title">لا توجد طلبات مكتملة بعد</div>
    </div>
    <?php else: ?>
    <?php $__currentLoopData = $doneReqs->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="done-row" style="animation-delay:<?php echo e($i*.04); ?>s">
        <div class="done-status"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <div class="done-info">
            <div class="done-name"><?php echo e($req->patient->first_name ?? '—'); ?> <?php echo e($req->patient->last_name ?? ''); ?></div>
            <div class="done-meta">
                <span><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg><?php echo e($req->body_part); ?><?php echo e($req->side ? ' ('.$req->side.')' : ''); ?></span>
                <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?php echo e($req->updated_at->format('H:i')); ?></span>
            </div>
        </div>
        <span class="badge badge-green">أُرسل</span>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</div>

<script>
function toggleRow(id){ document.getElementById('row-'+id).classList.toggle('open'); }
function showFile(input,id){
    const name = input.files[0]?.name;
    const el = document.getElementById('file-'+id);
    if(name) el.innerHTML = `<svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> ${name}`;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/xray/dashboard.blade.php ENDPATH**/ ?>