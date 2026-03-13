
<?php $__env->startSection('title', 'نتيجة الأشعة'); ?>
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
.bg-glow{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.06),transparent 70%);top:-250px;right:-250px;}

@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.96)}to{opacity:1;transform:scale(1)}}
@keyframes  modalIn{from{opacity:0;transform:scale(0.88)}to{opacity:1;transform:scale(1)}}

.main{position:relative;z-index:1;max-width:820px;margin:0 auto;padding:26px 18px 80px;}

/* هيدر */
.page-header{background:rgba(255,255,255,0.96);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:20px;padding:18px 24px;display:flex;align-items:center;gap:14px;margin-bottom:22px;box-shadow:0 4px 24px rgba(26,128,251,0.1);position:relative;overflow:hidden;animation:fadeUp .45s ease both;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#60a5fa);}
.page-header::after{content:'RADIOLOGY RESULT';position:absolute;left:22px;bottom:8px;font-family:'IBM Plex Mono',monospace;font-size:8px;color:rgba(26,128,251,0.2);letter-spacing:2px;}
.ph-logo{position:relative;width:48px;height:48px;flex-shrink:0;}
.ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:14px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 3s linear infinite;z-index:0;}
.ph-logo-in{position:relative;z-index:1;width:48px;height:48px;border-radius:13px;background:var(--green-l);display:flex;align-items:center;justify-content:center;}
.ph-logo-in svg{width:24px;height:24px;stroke:var(--green);fill:none;stroke-width:1.8;}
.ph-info{flex:1;}
.ph-title{font-size:18px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:10px;color:var(--soft);margin-top:3px;font-family:'IBM Plex Mono',monospace;letter-spacing:.5px;}
.ph-actions{display:flex;gap:8px;}
.btn-nav{display:flex;align-items:center;gap:6px;padding:8px 16px;border-radius:9px;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .2s;border:1.5px solid;}
.btn-back{background:var(--blue-ll);border-color:var(--border2);color:var(--blue-d);}
.btn-back:hover{background:var(--blue-l);}
.btn-back svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2;}

/* بيانات المريض */
.patient-card{background:rgba(255,255,255,0.96);border:1.5px solid var(--border2);border-radius:16px;padding:18px 22px;margin-bottom:18px;box-shadow:0 3px 16px rgba(26,128,251,0.07);position:relative;overflow:hidden;animation:fadeUp .45s ease .05s both;}
.patient-card::after{content:'';position:absolute;right:0;top:0;bottom:0;width:3px;background:linear-gradient(180deg,var(--blue),transparent);}
.pc-row{display:flex;align-items:center;gap:15px;}
.pc-avatar{width:52px;height:52px;border-radius:14px;background:var(--blue-ll);border:1.5px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.pc-avatar svg{width:26px;height:26px;stroke:var(--blue-d);fill:none;stroke-width:1.5;}
.pc-info{flex:1;}
.pc-name{font-size:18px;font-weight:900;color:var(--text);}
.pc-meta{font-size:11px;color:var(--mid);margin-top:5px;display:flex;flex-wrap:wrap;gap:14px;}
.pc-meta span{display:flex;align-items:center;gap:5px;font-family:'IBM Plex Mono',monospace;}
.pc-meta svg{width:12px;height:12px;stroke:var(--soft);fill:none;stroke-width:2;}

/* بطاقة */
.card{background:rgba(255,255,255,0.96);border:1.5px solid var(--border);border-radius:16px;padding:22px;margin-bottom:16px;box-shadow:0 3px 16px rgba(26,128,251,0.07);animation:popIn .45s ease both;position:relative;overflow:hidden;}
.card::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(26,128,251,0.2),transparent);}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid rgba(26,128,251,0.08);}
.card-title{display:flex;align-items:center;gap:10px;font-size:14px;font-weight:800;color:var(--text);}
.card-title svg{width:17px;height:17px;stroke:var(--blue);fill:none;stroke-width:2;flex-shrink:0;}
.ct-label{font-family:'IBM Plex Mono',monospace;font-size:9px;color:var(--blue);letter-spacing:2px;background:var(--blue-ll);border:1px solid var(--border);padding:2px 8px;border-radius:4px;}

/* صورة الأشعة */
.xray-image-wrap{border-radius:14px;overflow:hidden;border:1.5px solid var(--border);background:#000;text-align:center;cursor:zoom-in;position:relative;}
.xray-image-wrap::after{content:'';position:absolute;inset:0;background:rgba(0,0,0,0);transition:background .2s;}
.xray-image-wrap:hover::after{background:rgba(0,0,0,0.12);}
.zoom-hint{display:flex;align-items:center;justify-content:center;gap:6px;margin-top:10px;font-size:11px;color:var(--soft);font-family:'IBM Plex Mono',monospace;}
.zoom-hint svg{width:13px;height:13px;stroke:var(--soft);fill:none;stroke-width:2;}
.xray-image-wrap img{max-width:100%;max-height:500px;object-fit:contain;display:block;margin:0 auto;transition:transform .2s;}
.xray-image-wrap.pdf-wrap{background:var(--blue-ll);padding:30px;text-align:center;cursor:default;}
.xray-image-wrap.pdf-wrap::after{display:none;}
.pdf-icon{width:64px;height:64px;border-radius:18px;background:var(--blue-l);border:1.5px solid var(--border2);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;}
.pdf-icon svg{width:30px;height:30px;stroke:var(--blue-d);fill:none;stroke-width:1.5;}
.pdf-name{font-size:13px;font-weight:700;color:var(--mid);margin-bottom:12px;}
.pdf-btn{display:inline-flex;align-items:center;gap:7px;padding:10px 22px;border-radius:10px;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;text-decoration:none;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;box-shadow:0 4px 14px rgba(26,128,251,0.3);}
.pdf-btn svg{width:15px;height:15px;stroke:currentColor;fill:none;stroke-width:2;}
.no-image{padding:44px;text-align:center;}
.no-image-icon{width:60px;height:60px;border-radius:18px;background:var(--blue-ll);border:1.5px solid var(--border);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;}
.no-image-icon svg{width:28px;height:28px;stroke:var(--soft);fill:none;stroke-width:1.5;}
.no-image-text{font-size:13px;color:var(--soft);font-weight:600;}

/* ZOOM MODAL */
.zoom-overlay{position:fixed;inset:0;z-index:9999;background:rgba(5,15,30,0.92);backdrop-filter:blur(8px);display:none;align-items:center;justify-content:center;padding:20px;}
.zoom-overlay.open{display:flex;}
.zoom-modal{position:relative;animation:modalIn .25s cubic-bezier(0.34,1.4,0.64,1) both;max-width:95vw;max-height:92vh;}
.zoom-modal img{max-width:90vw;max-height:88vh;object-fit:contain;border-radius:12px;border:1.5px solid rgba(255,255,255,0.12);box-shadow:0 30px 80px rgba(0,0,0,0.6);display:block;
    transform-origin:center;
    transition:transform .15s ease;
    cursor:grab;
}
.zoom-modal img:active{cursor:grabbing;}
.zoom-close{position:fixed;top:20px;left:20px;width:42px;height:42px;border-radius:12px;background:rgba(255,255,255,0.12);border:1.5px solid rgba(255,255,255,0.2);color:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s;backdrop-filter:blur(8px);}
.zoom-close:hover{background:rgba(220,38,38,0.4);border-color:rgba(220,38,38,0.5);}
.zoom-close svg{width:18px;height:18px;stroke:#fff;fill:none;stroke-width:2.5;}
.zoom-controls{position:fixed;bottom:24px;left:50%;transform:translateX(-50%);display:flex;gap:10px;}
.zoom-btn{display:flex;align-items:center;gap:6px;padding:9px 18px;border-radius:10px;background:rgba(255,255,255,0.12);border:1.5px solid rgba(255,255,255,0.2);color:#fff;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;transition:all .2s;backdrop-filter:blur(8px);}
.zoom-btn:hover{background:rgba(255,255,255,0.2);}
.zoom-btn svg{width:15px;height:15px;stroke:#fff;fill:none;stroke-width:2.5;}

/* طباعة */
@media  print{
    .bg-scene,.ph-actions,.bg-grid,.bg-dots,.bg-glow,.zoom-overlay{display:none!important;}
    body{background:#fff!important;}
    .main{padding:0!important;max-width:100%!important;}
    .card,.patient-card{box-shadow:none!important;border-color:#ddd!important;}
}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-glow"></div></div>

<!-- ZOOM MODAL -->
<div class="zoom-overlay" id="zoomOverlay" onclick="closeZoom(event)">
    <div class="zoom-modal">
        <img id="zoomImg" src="" alt="صورة الأشعة">
    </div>
    <div class="zoom-close" onclick="closeZoomDirect()">
        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </div>
    <div class="zoom-controls">
        <button class="zoom-btn" onclick="zoomIn()">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
            تكبير
        </button>
        <button class="zoom-btn" onclick="zoomOut()">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
            تصغير
        </button>
        <button class="zoom-btn" onclick="resetZoom()">
            <svg viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.5"/></svg>
            إعادة
        </button>
    </div>
</div>

<div class="main">

    <div class="page-header">
        <div class="ph-logo">
            <div class="ph-logo-in">
                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
        </div>
        <div class="ph-info">
            <div class="ph-title">نتيجة <span>التصوير الإشعاعي</span></div>
            <div class="ph-sub">RADIOLOGY RESULT — REF #<?php echo e(str_pad($xrayRequest->id, 6, '0', STR_PAD_LEFT)); ?></div>
        </div>
        <div class="ph-actions">
            <a href="<?php echo e(route('doctor.xray.results.list')); ?>" class="btn-nav btn-back">
                <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                رجوع
            </a>
        </div>
    </div>

    
    <div class="patient-card">
        <div class="pc-row">
            <div class="pc-avatar">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div class="pc-info">
                <div class="pc-name"><?php echo e($xrayRequest->patient->first_name); ?> <?php echo e($xrayRequest->patient->last_name); ?></div>
                <div class="pc-meta">
                    <span>
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php echo e($xrayRequest->updated_at->format('Y-m-d')); ?> — <?php echo e($xrayRequest->updated_at->format('H:i')); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card" style="animation-delay:.2s">
        <div class="card-header">
            <div class="card-title">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                صورة الأشعة
            </div>
            <span class="ct-label">RADIOGRAPH</span>
        </div>

        <?php if($xrayRequest->image_path): ?>
            <?php $ext = pathinfo($xrayRequest->image_path, PATHINFO_EXTENSION); ?>
            <?php if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp'])): ?>
            <div class="xray-image-wrap" onclick="openZoom('<?php echo e(asset('storage/'.$xrayRequest->image_path)); ?>')">
                <img src="<?php echo e(asset('storage/'.$xrayRequest->image_path)); ?>" alt="صورة الأشعة">
            </div>
            <div class="zoom-hint">
                <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
                اضغط على الصورة للتكبير
            </div>
            <?php else: ?>
            <div class="xray-image-wrap pdf-wrap">
                <div class="pdf-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
                <div class="pdf-name"><?php echo e(basename($xrayRequest->image_path)); ?></div>
                <a href="<?php echo e(asset('storage/'.$xrayRequest->image_path)); ?>" target="_blank" class="pdf-btn">
                    <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    فتح ملف PDF
                </a>
            </div>
            <?php endif; ?>
        <?php else: ?>
        <div class="no-image">
            <div class="no-image-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg></div>
            <div class="no-image-text">لم يتم رفع صورة الأشعة</div>
        </div>
        <?php endif; ?>
    </div>

</div>

<script>
let currentScale = 1;

function openZoom(src) {
    document.getElementById('zoomImg').src = src;
    document.getElementById('zoomOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
    currentScale = 1;
    document.getElementById('zoomImg').style.transform = 'scale(1)';
}

function closeZoom(e) {
    if (e.target === document.getElementById('zoomOverlay')) closeZoomDirect();
}

function closeZoomDirect() {
    document.getElementById('zoomOverlay').classList.remove('open');
    document.body.style.overflow = '';
    currentScale = 1;
}

function zoomIn() {
    currentScale = Math.min(currentScale + 0.3, 4);
    document.getElementById('zoomImg').style.transform = `scale(${currentScale})`;
}

function zoomOut() {
    currentScale = Math.max(currentScale - 0.3, 0.5);
    document.getElementById('zoomImg').style.transform = `scale(${currentScale})`;
}

function resetZoom() {
    currentScale = 1;
    document.getElementById('zoomImg').style.transform = 'scale(1)';
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeZoomDirect();
    if (e.key === '+' || e.key === '=') zoomIn();
    if (e.key === '-') zoomOut();
});

// wheel zoom
document.getElementById('zoomImg').addEventListener('wheel', e => {
    e.preventDefault();
    e.deltaY < 0 ? zoomIn() : zoomOut();
}, {passive: false});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/xray/results_show.blade.php ENDPATH**/ ?>