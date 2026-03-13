
<?php $__env->startSection('title', 'نتائج الأشعة'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;--blue-ll:#f0f7ff;
    --cyan:#0891b2;--cyan-l:#cffafe;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --red:#dc2626;--red-l:#fee2e2;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;
    --border:rgba(26,128,251,0.12);
    --border2:rgba(26,128,251,0.2);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f4f8ff;}

.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#eef5ff 40%,#dbeafe 80%,#bfdbfe 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:48px 48px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.08) 1.5px,transparent 1.5px);background-size:24px 24px;}
.bg-glow{position:absolute;width:800px;height:800px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.06),transparent 70%);top:-300px;right:-300px;}

@keyframes  fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.95)}to{opacity:1;transform:scale(1)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  gp{0%,100%{box-shadow:0 0 0 0 rgba(22,163,74,0.4)}50%{box-shadow:0 0 0 6px rgba(22,163,74,0)}}
@keyframes  pulse-blue{0%,100%{opacity:1}50%{opacity:0.5}}

.main{position:relative;z-index:1;max-width:860px;margin:0 auto;padding:26px 18px 80px;}

/* هيدر */
.page-header{
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(20px);
    border:1.5px solid var(--border2);
    border-radius:20px;
    padding:18px 24px;
    display:flex;align-items:center;gap:14px;
    margin-bottom:22px;
    box-shadow:0 4px 24px rgba(26,128,251,0.1),0 1px 0 rgba(255,255,255,0.9) inset;
    position:relative;overflow:hidden;
    animation:fadeUp .45s ease both;
}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#60a5fa);}
.ph-logo{position:relative;width:48px;height:48px;flex-shrink:0;}
.ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:14px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 3s linear infinite;z-index:0;}
.ph-logo-in{position:relative;z-index:1;width:48px;height:48px;border-radius:13px;background:linear-gradient(135deg,#fff,var(--blue-ll));display:flex;align-items:center;justify-content:center;}
.ph-logo-in svg{width:24px;height:24px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.ph-info{flex:1;}
.ph-title{font-size:18px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:10px;color:var(--soft);margin-top:3px;font-family:'IBM Plex Mono',monospace;letter-spacing:.6px;}
.back-btn{display:flex;align-items:center;gap:6px;padding:8px 16px;border-radius:10px;background:var(--blue-ll);border:1.5px solid var(--border2);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .2s ease;}
.back-btn:hover{background:var(--blue-l);border-color:rgba(26,128,251,0.35);}
.back-btn svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2;}

/* بحث */
.search-card{
    background:rgba(255,255,255,0.95);
    border:1.5px solid var(--border2);
    border-radius:18px;
    padding:18px 20px;
    margin-bottom:16px;
    box-shadow:0 3px 16px rgba(26,128,251,0.08);
    animation:fadeUp .45s ease .05s both;
}
.search-wrap{display:flex;align-items:center;gap:12px;}
.search-icon-wrap{width:40px;height:40px;border-radius:11px;background:var(--blue-ll);border:1.5px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.search-icon-wrap svg{width:18px;height:18px;stroke:var(--blue);fill:none;stroke-width:2;}
.search-input{
    flex:1;padding:11px 16px;
    border-radius:11px;
    border:1.5px solid var(--border);
    background:#f8faff;
    font-family:'Tajawal',sans-serif;font-size:14px;color:var(--text);
    outline:none;direction:rtl;transition:all .2s ease;
}
.search-input::placeholder{color:var(--soft);}
.search-input:focus{border-color:var(--blue);background:#fff;box-shadow:0 0 0 3px rgba(26,128,251,0.08);}
.search-count{font-size:11px;font-weight:700;color:var(--soft);margin-top:10px;font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}

/* فلتر */
.filter-row{display:flex;gap:8px;margin-bottom:18px;flex-wrap:wrap;}
.filter-btn{
    display:flex;align-items:center;gap:6px;
    padding:7px 18px;border-radius:20px;
    font-size:12px;font-weight:700;
    border:1.5px solid var(--border);
    background:rgba(255,255,255,0.85);
    color:var(--mid);cursor:pointer;
    font-family:'Tajawal',sans-serif;transition:all .2s ease;
}
.filter-btn .fb-dot{width:7px;height:7px;border-radius:50%;}
.filter-btn.active,.filter-btn:hover{background:var(--blue-ll);border-color:var(--border2);color:var(--blue-d);}
.filter-btn.f-done.active,.filter-btn.f-done:hover{background:var(--green-l);border-color:rgba(22,163,74,0.3);color:var(--green);}
.filter-btn.f-pending.active,.filter-btn.f-pending:hover{background:var(--amber-l);border-color:rgba(217,119,6,0.3);color:var(--amber);}

/* section label */
.section-lbl{display:flex;align-items:center;gap:10px;margin-bottom:12px;margin-top:4px;}
.sl-icon{width:28px;height:28px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.sl-icon svg{width:14px;height:14px;fill:none;stroke-width:2;}
.sl-text{font-size:12px;font-weight:800;color:var(--mid);}
.sl-count{font-family:'IBM Plex Mono',monospace;font-size:11px;font-weight:700;padding:2px 9px;border-radius:20px;}
.sl-line{flex:1;height:1.5px;border-radius:2px;}
.sl-done .sl-icon{background:var(--green-l);} .sl-done .sl-icon svg{stroke:var(--green);}
.sl-done .sl-count{background:var(--green-l);color:var(--green);}
.sl-done .sl-line{background:linear-gradient(90deg,rgba(22,163,74,0.2),transparent);}
.sl-pending .sl-icon{background:var(--amber-l);} .sl-pending .sl-icon svg{stroke:var(--amber);}
.sl-pending .sl-count{background:var(--amber-l);color:var(--amber);}
.sl-pending .sl-line{background:linear-gradient(90deg,rgba(217,119,6,0.2),transparent);}

/* بطاقة نتيجة */
.result-card{
    background:rgba(255,255,255,0.96);
    border:1.5px solid var(--border);
    border-radius:16px;
    padding:16px 18px;
    display:flex;align-items:center;gap:14px;
    margin-bottom:10px;
    transition:all .22s ease;
    animation:popIn .35s ease both;
    position:relative;overflow:hidden;
}
.result-card::before{content:'';position:absolute;top:0;right:0;bottom:0;width:3px;border-radius:0 16px 16px 0;}
.result-card.rc-urg-حرج::before{background:var(--red);}
.result-card.rc-urg-مستعجل::before{background:var(--amber);}
.result-card.rc-urg-عادي::before{background:var(--green);}

.result-card.done{text-decoration:none;color:inherit;}
.result-card:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(26,128,251,0.12);border-color:var(--border2);}

/* أيقونة الحالة */
.rc-status-icon{
    width:46px;height:46px;border-radius:14px;
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;
}
.rc-status-icon svg{width:22px;height:22px;fill:none;stroke-width:1.8;}
.si-done{background:var(--green-l);}  .si-done svg{stroke:var(--green);}
.si-pending{background:var(--amber-l);} .si-pending svg{stroke:var(--amber);}

.rc-info{flex:1;min-width:0;}
.rc-patient{font-size:15px;font-weight:900;color:var(--text);}
.rc-part{
    font-size:11px;font-weight:700;color:var(--blue-d);
    margin-top:4px;font-family:'IBM Plex Mono',monospace;
    letter-spacing:.2px;
}
.rc-meta{font-size:11px;color:var(--soft);margin-top:3px;display:flex;flex-wrap:wrap;gap:10px;}
.rc-meta span{display:flex;align-items:center;gap:4px;}
.rc-meta svg{width:11px;height:11px;stroke:var(--soft);fill:none;stroke-width:2;}

.rc-right{display:flex;flex-direction:column;align-items:flex-end;gap:6px;flex-shrink:0;}
.badge{display:inline-flex;align-items:center;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:800;border:1px solid;font-family:'IBM Plex Mono',monospace;}
.badge-done{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.25);}
.badge-pending{background:var(--amber-l);color:var(--amber);border-color:rgba(217,119,6,0.25);}
.badge-red{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.badge-amber{background:var(--amber-l);color:var(--amber);border-color:rgba(217,119,6,0.2);}
.badge-green{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.rc-arrow{width:28px;height:28px;border-radius:8px;background:var(--blue-ll);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;}
.rc-arrow svg{width:13px;height:13px;stroke:var(--blue);fill:none;stroke-width:2.5;}

.empty-state{background:rgba(255,255,255,0.9);border:1.5px solid var(--border);border-radius:18px;padding:52px 30px;text-align:center;}
.empty-icon{width:60px;height:60px;border-radius:18px;background:var(--blue-ll);border:1.5px solid var(--border);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;}
.empty-icon svg{width:28px;height:28px;stroke:var(--soft);fill:none;stroke-width:1.5;}
.empty-title{font-size:15px;font-weight:800;color:var(--mid);}
.empty-sub{font-size:12px;color:var(--soft);margin-top:5px;}

.hidden{display:none!important;}
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
            <div class="ph-title">نتائج <span>التصوير الإشعاعي</span></div>
            <div class="ph-sub">RADIOLOGY RESULTS — SEARCH BY PATIENT NAME</div>
        </div>
        <a href="<?php echo e(session('xray_results_back', route('home'))); ?>" class="back-btn">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            رجوع
        </a>
    </div>

    
    <div class="search-card">
        <div class="search-wrap">
            <div class="search-icon-wrap">
                <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </div>
            <input type="text" class="search-input" id="searchInput"
                placeholder="ابحث باسم المريض أو لقبه..." oninput="doSearch()">
        </div>
        <div class="search-count" id="searchCount"></div>
    </div>

    
    <div class="filter-row">
        <button class="filter-btn active" onclick="filterStatus('all',this)">
            <div class="fb-dot" style="background:var(--blue);"></div> الكل
        </button>
        <button class="filter-btn f-done" onclick="filterStatus('done',this)">
            <div class="fb-dot" style="background:var(--green);"></div> نتائج جاهزة
        </button>
        <button class="filter-btn f-pending" onclick="filterStatus('pending',this)">
            <div class="fb-dot" style="background:var(--amber);"></div> في الانتظار
        </button>
    </div>

    <?php
        $allRequests = \App\Models\XrayRequest::with('patient')
            ->orderBy('updated_at','desc')->get()
            ->filter(fn($r) => $r->patient !== null);
        $doneReqs    = $allRequests->where('status','done');
        $pendingReqs = $allRequests->where('status','pending');
    ?>

    <?php if($allRequests->isEmpty()): ?>
    <div class="empty-state">
        <div class="empty-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg></div>
        <div class="empty-title">لا توجد طلبات أشعة بعد</div>
        <div class="empty-sub">ستظهر الطلبات هنا بعد إرسالها من مكتب الفحوصات</div>
    </div>
    <?php else: ?>

    
    <?php if($doneReqs->isNotEmpty()): ?>
    <div class="section-lbl sl-done status-section" data-status="done">
        <div class="sl-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
        <span class="sl-text">نتائج جاهزة</span>
        <span class="sl-count"><?php echo e($doneReqs->count()); ?></span>
        <div class="sl-line"></div>
    </div>
    <?php $__currentLoopData = $doneReqs->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $urgCls='rc-urg-'.($req->urgency??'عادي'); $bc=$req->urgency==='حرج'?'badge-red':($req->urgency==='مستعجل'?'badge-amber':'badge-green'); ?>
    <a href="<?php echo e(route('doctor.xray.results.show', $req->id)); ?>"
       class="result-card done <?php echo e($urgCls); ?> status-done"
       data-name="<?php echo e(strtolower($req->patient->first_name.' '.$req->patient->last_name)); ?>"
       style="animation-delay:<?php echo e($i*.04); ?>s">
        <div class="rc-status-icon si-done">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div class="rc-info">
            <div class="rc-patient"><?php echo e($req->patient->first_name); ?> <?php echo e($req->patient->last_name); ?></div>
            <div class="rc-part"><?php echo e($req->body_part); ?></div>
            <div class="rc-meta">
                <span><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><?php echo e($req->doctor_name); ?></span>
                <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?php echo e($req->updated_at->format('Y-m-d H:i')); ?></span>
            </div>
        </div>
        <div class="rc-right">
            <span class="badge badge-done">جاهز</span>
            <span class="badge <?php echo e($bc); ?>"><?php echo e($req->urgency); ?></span>
            <div class="rc-arrow"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></div>
        </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    
    <?php if($pendingReqs->isNotEmpty()): ?>
    <div class="section-lbl sl-pending status-section" data-status="pending" style="margin-top:18px;">
        <div class="sl-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <span class="sl-text">في الانتظار</span>
        <span class="sl-count"><?php echo e($pendingReqs->count()); ?></span>
        <div class="sl-line"></div>
    </div>
    <?php $__currentLoopData = $pendingReqs->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $urgCls='rc-urg-'.($req->urgency??'عادي'); $bc=$req->urgency==='حرج'?'badge-red':($req->urgency==='مستعجل'?'badge-amber':'badge-green'); ?>
    <div class="result-card <?php echo e($urgCls); ?> status-pending"
         data-name="<?php echo e(strtolower($req->patient->first_name.' '.$req->patient->last_name)); ?>"
         style="animation-delay:<?php echo e($i*.04); ?>s">
        <div class="rc-status-icon si-pending">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="rc-info">
            <div class="rc-patient"><?php echo e($req->patient->first_name); ?> <?php echo e($req->patient->last_name); ?></div>
            <div class="rc-part"><?php echo e($req->body_part); ?></div>
            <div class="rc-meta">
                <span><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><?php echo e($req->doctor_name); ?></span>
                <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?php echo e($req->created_at->format('Y-m-d H:i')); ?></span>
            </div>
        </div>
        <div class="rc-right">
            <span class="badge badge-pending">انتظار</span>
            <span class="badge <?php echo e($bc); ?>"><?php echo e($req->urgency); ?></span>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <div class="empty-state hidden" id="noResults">
        <div class="empty-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
        <div class="empty-title">لا توجد نتائج مطابقة</div>
        <div class="empty-sub">جرب بحثاً مختلفاً</div>
    </div>
    <?php endif; ?>
</div>

<script>
let currentFilter = 'all';
function doSearch() {
    const q = document.getElementById('searchInput').value.trim().toLowerCase();
    const cards = document.querySelectorAll('.result-card');
    let visible = 0;
    cards.forEach(card => {
        const name = card.dataset.name || '';
        const statusMatch = currentFilter==='all'
            || (currentFilter==='done' && card.classList.contains('status-done'))
            || (currentFilter==='pending' && card.classList.contains('status-pending'));
        const nameMatch = !q || name.includes(q);
        if(statusMatch && nameMatch){ card.classList.remove('hidden'); visible++; }
        else card.classList.add('hidden');
    });
    document.querySelectorAll('.section-lbl.status-section').forEach(lbl => {
        const st = lbl.dataset.status;
        lbl.classList.toggle('hidden', currentFilter!=='all' && currentFilter!==st);
    });
    document.getElementById('noResults').classList.toggle('hidden', visible > 0);
    document.getElementById('searchCount').textContent = q
        ? `${visible} نتيجة — "${document.getElementById('searchInput').value}"` : '';
}
function filterStatus(status, btn) {
    currentFilter = status;
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    doSearch();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/xray/results_list.blade.php ENDPATH**/ ?>