
<?php $__env->startSection('title', 'طلب تصوير إشعاعي'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --bg:#0a0f1a;--surface:#0f1623;--surface2:#151d2e;--surface3:#1a2338;
    --border:#1e2d45;--border2:#243448;--accent:#00c8ff;--accent2:#0084b0;
    --red:#ff3b5c;--red-l:rgba(255,59,92,0.12);
    --amber:#ffb020;--amber-l:rgba(255,176,32,0.12);
    --green:#00d68f;--green-l:rgba(0,214,143,0.12);
    --text:#e8f1ff;--mid:#7b9ac4;--soft:#3d5a80;
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:var(--bg);color:var(--text);}
.bg-scene{position:fixed;inset:0;z-index:0;overflow:hidden;}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(0,200,255,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(0,200,255,0.04) 1px,transparent 1px);background-size:60px 60px;}
.bg-cross{position:absolute;inset:0;background-image:linear-gradient(rgba(0,200,255,0.02) 1px,transparent 1px),linear-gradient(90deg,rgba(0,200,255,0.02) 1px,transparent 1px);background-size:12px 12px;}
.bg-glow1{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(0,200,255,0.05),transparent 70%);top:-250px;right:-250px;}
.bg-glow2{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(0,132,176,0.07),transparent 70%);bottom:-200px;left:-200px;}
.scanline{position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(0,0,0,0.03) 2px,rgba(0,0,0,0.03) 4px);pointer-events:none;}
@keyframes  fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.96)}to{opacity:1;transform:scale(1)}}
@keyframes  scan{0%{top:-2px}100%{top:100vh}}
@keyframes  blink{0%,100%{opacity:1}50%{opacity:0.3}}
@keyframes  pulse-red{0%,100%{box-shadow:0 0 0 0 rgba(255,59,92,0.5)}50%{box-shadow:0 0 24px 4px rgba(255,59,92,0.15)}}
.scan-line{position:fixed;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--accent),transparent);opacity:0.12;animation:scan 10s linear infinite;pointer-events:none;z-index:10;}
.main{position:relative;z-index:1;max-width:760px;margin:0 auto;padding:28px 18px 100px;}
.page-header{background:var(--surface);border:1px solid var(--border2);border-radius:16px;padding:20px 24px;display:flex;align-items:center;gap:16px;margin-bottom:24px;box-shadow:0 0 0 1px rgba(0,200,255,0.04),0 8px 32px rgba(0,0,0,0.4);position:relative;overflow:hidden;animation:fadeUp .5s ease both;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--accent),transparent);}
.page-header::after{content:'RADIOLOGIE • نظام الاستعجالات';position:absolute;left:22px;bottom:8px;font-family:'IBM Plex Mono',monospace;font-size:8px;color:var(--soft);letter-spacing:2px;}
.ph-icon{width:52px;height:52px;border-radius:12px;background:var(--surface2);border:1px solid var(--border2);display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 0 16px rgba(0,200,255,0.1);}
.ph-icon svg{width:26px;height:26px;stroke:var(--accent);fill:none;stroke-width:1.5;}
.ph-info{flex:1;}
.ph-title{font-size:19px;font-weight:900;color:var(--text);letter-spacing:-.3px;}
.ph-title span{color:var(--accent);}
.ph-sub{font-size:10px;color:var(--mid);margin-top:4px;font-family:'IBM Plex Mono',monospace;letter-spacing:.8px;}
.ph-actions{display:flex;gap:8px;}
.btn-nav{display:flex;align-items:center;gap:6px;padding:8px 16px;border-radius:9px;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .2s ease;border:1px solid;white-space:nowrap;}
.btn-back{background:rgba(0,200,255,0.05);border-color:rgba(0,200,255,0.18);color:var(--accent);}
.btn-back:hover{background:rgba(0,200,255,0.1);}
.btn-results{background:rgba(0,214,143,0.05);border-color:rgba(0,214,143,0.18);color:var(--green);}
.btn-results:hover{background:rgba(0,214,143,0.1);}
.alert-ok{display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:10px;font-size:13px;font-weight:700;margin-bottom:18px;background:var(--green-l);border:1px solid rgba(0,214,143,0.3);color:var(--green);}
.patient-bar{background:var(--surface);border:1px solid var(--border2);border-radius:14px;padding:16px 20px;display:flex;align-items:center;gap:14px;margin-bottom:22px;box-shadow:0 4px 20px rgba(0,0,0,0.3);position:relative;overflow:hidden;animation:fadeUp .5s ease .06s both;}
.patient-bar::after{content:'';position:absolute;right:0;top:0;bottom:0;width:2px;background:linear-gradient(180deg,var(--accent),transparent);}
.pb-avatar{width:48px;height:48px;border-radius:11px;background:var(--surface3);border:1px solid var(--border2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.pb-avatar svg{width:22px;height:22px;stroke:var(--accent);fill:none;stroke-width:1.5;}
.pb-info{flex:1;}
.pb-name{font-size:16px;font-weight:900;color:var(--text);}
.pb-meta{font-size:11px;color:var(--mid);margin-top:4px;font-family:'IBM Plex Mono',monospace;letter-spacing:.2px;}
.pb-id{font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--soft);padding:4px 10px;border:1px solid var(--border);border-radius:6px;background:var(--surface2);}
.card{background:var(--surface);border:1px solid var(--border2);border-radius:16px;padding:22px;margin-bottom:16px;box-shadow:0 4px 24px rgba(0,0,0,0.3);animation:popIn .45s ease both;position:relative;overflow:hidden;}
.card::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(0,200,255,0.25),transparent);}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;padding-bottom:13px;border-bottom:1px solid var(--border);}
.card-title{display:flex;align-items:center;gap:10px;font-size:14px;font-weight:800;color:var(--text);}
.card-title svg{width:16px;height:16px;stroke:var(--accent);fill:none;stroke-width:2;flex-shrink:0;}
.ct-label{font-family:'IBM Plex Mono',monospace;font-size:9px;color:var(--accent);letter-spacing:2px;background:rgba(0,200,255,0.07);border:1px solid rgba(0,200,255,0.14);padding:2px 8px;border-radius:4px;}
.ct-badge{font-family:'IBM Plex Mono',monospace;font-size:11px;font-weight:700;color:var(--accent);background:rgba(0,200,255,0.08);border:1px solid rgba(0,200,255,0.2);padding:3px 10px;border-radius:20px;}
.parts-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(110px,1fr));gap:8px;}
.part-btn{display:flex;flex-direction:column;align-items:center;gap:9px;padding:15px 8px;border-radius:12px;border:1px solid var(--border);background:var(--surface2);cursor:pointer;transition:all .2s ease;font-family:'Tajawal',sans-serif;position:relative;}
.part-btn:hover{border-color:rgba(0,200,255,0.35);background:rgba(0,200,255,0.05);transform:translateY(-2px);}
.part-btn.selected{border-color:var(--accent);background:rgba(0,200,255,0.08);box-shadow:0 0 18px rgba(0,200,255,0.12);}
.part-btn.selected::after{content:'';position:absolute;top:7px;left:7px;width:7px;height:7px;border-radius:50%;background:var(--accent);box-shadow:0 0 8px var(--accent);animation:blink 2s ease infinite;}
.part-btn.need-side{border-color:var(--amber) !important;box-shadow:0 0 14px rgba(255,176,32,0.18) !important;}
.part-icon-wrap{width:40px;height:40px;border-radius:10px;background:var(--surface3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;transition:all .2s ease;}
.part-btn.selected .part-icon-wrap{background:rgba(0,200,255,0.1);border-color:rgba(0,200,255,0.3);}
.part-icon-wrap svg{width:20px;height:20px;stroke:var(--soft);fill:none;stroke-width:1.5;transition:stroke .2s;}
.part-btn.selected .part-icon-wrap svg{stroke:var(--accent);}
.part-name{font-size:11px;font-weight:700;color:var(--soft);text-align:center;line-height:1.3;transition:color .2s;}
.part-btn.selected .part-name{color:var(--text);}
.divider{display:flex;align-items:center;gap:12px;margin:18px 0 14px;}
.divider-line{flex:1;height:1px;background:var(--border);}
.divider-text{font-size:9px;color:var(--soft);font-family:'IBM Plex Mono',monospace;letter-spacing:1.5px;}
.selected-tags{display:flex;flex-direction:column;gap:8px;min-height:24px;}
.no-selection{font-size:11px;color:var(--soft);font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.sel-tag{display:flex;align-items:center;flex-wrap:wrap;gap:8px;padding:8px 12px;border-radius:9px;background:rgba(0,200,255,0.05);border:1px solid rgba(0,200,255,0.15);transition:border-color .2s;}
.sel-tag.incomplete{border-color:rgba(255,176,32,0.4);background:rgba(255,176,32,0.04);}
.sel-tag.complete{border-color:rgba(0,214,143,0.3);background:rgba(0,214,143,0.04);}
.tag-name{font-size:12px;font-weight:800;color:var(--text);font-family:'Tajawal',sans-serif;min-width:70px;}
.tag-side-wrap{display:flex;gap:5px;flex-wrap:wrap;}
.side-opt{padding:4px 10px;border-radius:6px;border:1px solid var(--border2);background:var(--surface3);font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:700;color:var(--mid);cursor:pointer;transition:all .15s;white-space:nowrap;}
.side-opt:hover{border-color:rgba(0,200,255,0.3);color:var(--accent);}
.side-opt.active{border-color:var(--accent);background:rgba(0,200,255,0.12);color:var(--accent);}
.side-hint{font-size:9px;color:var(--amber);font-family:'IBM Plex Mono',monospace;letter-spacing:.5px;align-self:center;}
.tag-rm{cursor:pointer;width:20px;height:20px;border-radius:5px;background:transparent;border:1px solid var(--border2);display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--soft);transition:all .15s;margin-right:auto;flex-shrink:0;}
.tag-rm:hover{background:rgba(255,59,92,0.15);border-color:rgba(255,59,92,0.3);color:var(--red);}
.urgency-row{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;}
.urg-btn{padding:16px 10px;border-radius:12px;border:1px solid;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:15px;font-weight:800;transition:all .2s;text-align:center;display:flex;flex-direction:column;align-items:center;gap:6px;}
.urg-label{font-size:9px;font-weight:500;opacity:0.6;font-family:'IBM Plex Mono',monospace;letter-spacing:.8px;}
.urg-عادي{border-color:rgba(0,214,143,0.18);background:rgba(0,214,143,0.04);color:var(--green);}
.urg-مستعجل{border-color:rgba(255,176,32,0.18);background:rgba(255,176,32,0.04);color:var(--amber);}
.urg-حرج{border-color:rgba(255,59,92,0.18);background:rgba(255,59,92,0.04);color:var(--red);}
.urg-btn.selected.urg-عادي{border-color:var(--green);box-shadow:0 0 20px rgba(0,214,143,0.15);}
.urg-btn.selected.urg-مستعجل{border-color:var(--amber);box-shadow:0 0 20px rgba(255,176,32,0.15);}
.urg-btn.selected.urg-حرج{border-color:var(--red);animation:pulse-red 1.5s ease infinite;}
textarea{width:100%;padding:14px 16px;border-radius:10px;border:1px solid var(--border2);background:var(--surface2);font-family:'Tajawal',sans-serif;font-size:13px;color:var(--text);resize:vertical;min-height:85px;outline:none;direction:rtl;transition:border-color .2s;}
textarea::placeholder{color:var(--soft);}
textarea:focus{border-color:rgba(0,200,255,0.35);box-shadow:0 0 0 3px rgba(0,200,255,0.05);}
.btn-send{width:100%;display:flex;align-items:center;justify-content:center;gap:10px;padding:17px;border-radius:13px;background:linear-gradient(135deg,var(--accent2),var(--accent));color:#021018;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:15px;font-weight:900;letter-spacing:.3px;box-shadow:0 4px 24px rgba(0,200,255,0.25);transition:all .3s ease;}
.btn-send:hover{transform:translateY(-2px);box-shadow:0 8px 36px rgba(0,200,255,0.35);}
.btn-send:disabled{opacity:.25;cursor:not-allowed;transform:none;background:var(--surface3);color:var(--soft);box-shadow:none;}
.btn-send svg{width:18px;height:18px;stroke:currentColor;fill:none;stroke-width:2;flex-shrink:0;}
</style>

<div class="bg-scene">
    <div class="bg-grid"></div><div class="bg-cross"></div>
    <div class="bg-glow1"></div><div class="bg-glow2"></div>
    <div class="scanline"></div>
</div>
<div class="scan-line"></div>

<div class="main">
    <div class="page-header">
        <div class="ph-icon">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
        </div>
        <div class="ph-info">
            <div class="ph-title">طلب <span>تصوير إشعاعي</span></div>
            <div class="ph-sub">RADIOGRAPHY REQUEST — MULTI-REGION SELECTION</div>
        </div>
        <div class="ph-actions">
            <a href="<?php echo e(route('doctor.xray.results.list', ['back' => url()->current()])); ?>" class="btn-nav btn-results">قائمة النتائج</a>
            <a href="<?php echo e($patient->section === 'surgical' ? route('lab.two') : route('lab.one')); ?>" class="btn-nav btn-back">رجوع للمكتب</a>
        </div>
    </div>

    <?php if(session('success')): ?>
    <div class="alert-ok">تم إرسال طلب التصوير الإشعاعي بنجاح</div>
    <?php endif; ?>

    <div class="patient-bar">
        <div class="pb-avatar">
            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="pb-info">
            <div class="pb-name"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></div>
            <div class="pb-meta">العمر: <?php echo e($patient->age); ?> سنة &nbsp;|&nbsp; <?php echo e($patient->gender); ?> &nbsp;|&nbsp; الطبيب: <?php echo e($patient->doctor); ?> &nbsp;|&nbsp; <?php echo e($patient->section); ?></div>
        </div>
        <div class="pb-id">PT-<?php echo e(str_pad($patient->id, 5, '0', STR_PAD_LEFT)); ?></div>
    </div>

    <form method="POST" action="<?php echo e(route('xray.send.request', $patient->id)); ?>" id="xrayForm">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="body_part" id="bodyPartInput">
        <input type="hidden" name="urgency" id="urgencyInput" value="عادي">
        <input type="hidden" name="doctor_name" value="<?php echo e(session('name')); ?>">

        <div class="card" style="animation-delay:.07s">
            <div class="card-header">
                <div class="card-title">
                    <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    تحديد مناطق التصوير
                </div>
                <div style="display:flex;gap:8px;align-items:center;">
                    <span class="ct-label">ANATOMY</span>
                    <span class="ct-badge" id="countBadge">00</span>
                </div>
            </div>

            <?php
            $parts = [
                ['name'=>'الرأس',         'side'=>false, 'path'=>'M12 2a8 8 0 0 1 8 8c0 5-4 8-8 10C8 18 4 15 4 10a8 8 0 0 1 8-8z'],
                ['name'=>'الفك',          'side'=>false, 'path'=>'M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01'],
                ['name'=>'الرقبة',        'side'=>false, 'path'=>'M12 4v6M9 7l3 3 3-3M9 17h6'],
                ['name'=>'الصدر',         'side'=>false, 'path'=>'M3 9h18M3 15h18M8 3v18M16 3v18'],
                ['name'=>'العمود الفقري', 'side'=>false, 'path'=>'M12 2v20M9 5h6M9 9h6M9 13h6M9 17h6'],
                ['name'=>'البطن',         'side'=>false, 'path'=>'M12 2C6 2 4 8 4 12s2 10 8 10 8-6 8-10S18 2 12 2z'],
                ['name'=>'الحوض',         'side'=>false, 'path'=>'M5 12c0 5 3 8 7 8s7-3 7-8M3 9h18'],
                ['name'=>'الكتف',         'side'=>true,  'path'=>'M5 9a7 7 0 0 1 14 0M12 16V9'],
                ['name'=>'الذراع',        'side'=>true,  'path'=>'M12 3v18M9 3h6'],
                ['name'=>'الكوع',         'side'=>true,  'path'=>'M8 6l8 12M16 6l-8 12'],
                ['name'=>'الرسغ',         'side'=>true,  'path'=>'M6 12h12M9 8v8M15 8v8'],
                ['name'=>'اليد',          'side'=>true,  'path'=>'M8 6v8a4 4 0 0 0 8 0V6M6 10h12'],
                ['name'=>'أصابع اليد',   'side'=>true,  'path'=>'M9 4v8M12 3v9M15 4v8M7 13h10'],
                ['name'=>'الفخذ',         'side'=>true,  'path'=>'M10 3l2 18M14 3l-2 18'],
                ['name'=>'الركبة',        'side'=>true,  'path'=>'M7 8h10v8H7zM12 8v8'],
                ['name'=>'الساق',         'side'=>true,  'path'=>'M11 2l1 20M13 2l-1 20'],
                ['name'=>'الكاحل',        'side'=>true,  'path'=>'M6 10h12M9 6v12M15 6v12'],
                ['name'=>'القدم',         'side'=>true,  'path'=>'M4 16h16v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3z'],
                ['name'=>'أصابع القدم',  'side'=>true,  'path'=>'M7 16V9M10 16V8M13 16V9M16 16V8'],
                ['name'=>'الكعب',         'side'=>true,  'path'=>'M4 18h16l-2-8H6l-2 8z'],
            ];
            ?>

            <div class="parts-grid">
                <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" class="part-btn"
                    data-name="<?php echo e($p['name']); ?>"
                    data-side="<?php echo e($p['side'] ? '1' : '0'); ?>"
                    onclick="togglePart(this)">
                    <div class="part-icon-wrap">
                        <svg viewBox="0 0 24 24"><path d="<?php echo e($p['path']); ?>"/></svg>
                    </div>
                    <span class="part-name"><?php echo e($p['name']); ?></span>
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">SELECTED REGIONS</span>
                <div class="divider-line"></div>
            </div>
            <div class="selected-tags" id="selectedTags">
                <span class="no-selection">-- لا يوجد تحديد بعد --</span>
            </div>
        </div>

        <div class="card" style="animation-delay:.13s">
            <div class="card-header">
                <div class="card-title">
                    <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    مستوى الأولوية
                </div>
                <span class="ct-label">PRIORITY LEVEL</span>
            </div>
            <div class="urgency-row">
                <button type="button" class="urg-btn urg-عادي selected" onclick="selectUrgency(this,'عادي')">
                    <span>عادي</span><span class="urg-label">ROUTINE</span>
                </button>
                <button type="button" class="urg-btn urg-مستعجل" onclick="selectUrgency(this,'مستعجل')">
                    <span>مستعجل</span><span class="urg-label">URGENT</span>
                </button>
                <button type="button" class="urg-btn urg-حرج" onclick="selectUrgency(this,'حرج')">
                    <span>حرج</span><span class="urg-label">STAT / CRITICAL</span>
                </button>
            </div>
        </div>

        <div class="card" style="animation-delay:.19s">
            <div class="card-header">
                <div class="card-title">
                    <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    ملاحظات سريرية
                </div>
                <span class="ct-label">CLINICAL NOTES</span>
            </div>
            <textarea name="notes" placeholder="اكتب الملاحظات السريرية للتقني الإشعاعي..."></textarea>
        </div>

        <button type="submit" class="btn-send" id="sendBtn" disabled>
            <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            إرسال طلب التصوير الإشعاعي
        </button>
    </form>
</div>

<script>
// selected = { 'اليد': { hasSide: true, side: null }, 'الرأس': { hasSide: false, side: null } }
let selected = {};

function togglePart(el) {
    const name = el.dataset.name;
    const hasSide = el.dataset.side === '1';
    if (selected[name] !== undefined) {
        delete selected[name];
        el.classList.remove('selected', 'need-side');
    } else {
        selected[name] = { hasSide, side: null };
        el.classList.add('selected');
        if (hasSide) el.classList.add('need-side');
    }
    renderTags();
    updateBtn();
}

function setSide(name, val, btnEl) {
    if (!selected[name]) return;
    selected[name].side = val;
    // remove need-side from part-btn
    document.querySelectorAll('.part-btn').forEach(b => {
        if (b.dataset.name === name) b.classList.remove('need-side');
    });
    renderTags();
    updateBtn();
}

function removePart(name) {
    delete selected[name];
    document.querySelectorAll('.part-btn').forEach(b => {
        if (b.dataset.name === name) b.classList.remove('selected', 'need-side');
    });
    renderTags();
    updateBtn();
}

function renderTags() {
    const container = document.getElementById('selectedTags');
    const keys = Object.keys(selected);
    document.getElementById('countBadge').textContent = String(keys.length).padStart(2, '0');

    if (keys.length === 0) {
        container.innerHTML = '<span class="no-selection">-- لا يوجد تحديد بعد --</span>';
        document.getElementById('bodyPartInput').value = '';
        return;
    }

    container.innerHTML = keys.map(name => {
        const s = selected[name];
        const isComplete = !s.hasSide || s.side !== null;
        const tagClass = isComplete ? 'sel-tag complete' : 'sel-tag incomplete';

        let sideHtml = '';
        if (s.hasSide) {
            const sides = [['يمين','R'], ['يسار','L'], ['كلاهما','BIL']];
            sideHtml = `<div class="tag-side-wrap">` +
                sides.map(([label, code]) =>
                    `<button type="button" class="side-opt ${s.side===label?'active':''}"
                        onclick="setSide('${name}','${label}',this)">${label} <span style="opacity:.5">${code}</span></button>`
                ).join('') +
                `</div>`;
            if (!isComplete) {
                sideHtml += `<span class="side-hint">← حدد الجهة</span>`;
            }
        }

        return `<div class="${tagClass}">
            <span class="tag-name">${name}</span>
            ${sideHtml}
            <span class="tag-rm" onclick="removePart('${name}')">×</span>
        </div>`;
    }).join('');

    // sync hidden input
    const parts = keys.map(name => {
        const s = selected[name];
        return name + (s.hasSide && s.side ? ' (' + s.side + ')' : '');
    });
    document.getElementById('bodyPartInput').value = parts.join(' | ');
}

function selectUrgency(el, val) {
    document.querySelectorAll('.urg-btn').forEach(b => b.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('urgencyInput').value = val;
}

function updateBtn() {
    const keys = Object.keys(selected);
    if (keys.length === 0) { document.getElementById('sendBtn').disabled = true; return; }
    const allOk = Object.values(selected).every(v => !v.hasSide || v.side !== null);
    document.getElementById('sendBtn').disabled = !allOk;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/lab/xray_index.blade.php ENDPATH**/ ?>