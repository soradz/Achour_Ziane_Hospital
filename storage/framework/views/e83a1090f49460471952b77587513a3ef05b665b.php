
<?php $__env->startSection('title', 'إنشاء مستخدم جديد'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;--blue-ll:#f0f7ff;
    --green:#16a34a;--green-l:#dcfce7;
    --red:#dc2626;--red-l:#fee2e2;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;
    --border:rgba(26,128,251,0.14);--border2:rgba(26,128,251,0.24);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f4f8ff;}
.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#eef5ff 45%,#dbeafe 80%,#bfdbfe 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:48px 48px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.07) 1.5px,transparent 1.5px);background-size:24px 24px;}
.bg-glow{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.07),transparent 70%);top:-250px;right:-250px;}
.bg-glow2{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(22,163,74,0.05),transparent 70%);bottom:-200px;left:-200px;}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  fadeUp{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.96)}to{opacity:1;transform:scale(1)}}

.main{position:relative;z-index:1;min-height:100vh;padding:32px 18px;max-width:600px;margin:0 auto;display:flex;flex-direction:column;gap:16px;justify-content:center;}

.page-header{background:rgba(255,255,255,0.95);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:20px;padding:18px 22px;display:flex;align-items:center;gap:13px;box-shadow:0 4px 24px rgba(26,128,251,0.1);position:relative;overflow:hidden;animation:fadeUp .45s ease both;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#60a5fa);}
.page-header::after{content:'USER MANAGEMENT';position:absolute;left:20px;bottom:7px;font-family:'IBM Plex Mono',monospace;font-size:8px;color:rgba(26,128,251,0.2);letter-spacing:2px;}
.ph-logo{position:relative;width:46px;height:46px;flex-shrink:0;}
.ph-logo::before{content:'';position:absolute;inset:-2px;border-radius:13px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 3s linear infinite;z-index:0;}
.ph-logo-in{position:relative;z-index:1;width:46px;height:46px;border-radius:12px;background:var(--blue-ll);display:flex;align-items:center;justify-content:center;}
.ph-logo-in svg{width:22px;height:22px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.ph-info{flex:1;}
.ph-title{font-size:17px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:10px;color:var(--soft);margin-top:3px;font-family:'IBM Plex Mono',monospace;letter-spacing:.5px;}
.back-btn{display:flex;align-items:center;gap:6px;padding:7px 14px;border-radius:9px;background:var(--blue-ll);border:1.5px solid var(--border2);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .2s;white-space:nowrap;}
.back-btn:hover{background:var(--blue-l);}
.back-btn svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2.5;}

.errors-box{background:var(--red-l);border:1.5px solid rgba(220,38,38,0.25);border-radius:14px;padding:14px 18px;animation:fadeUp .4s ease both;}
.errors-title{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:800;color:var(--red);margin-bottom:8px;}
.errors-title svg{width:15px;height:15px;stroke:var(--red);fill:none;stroke-width:2;flex-shrink:0;}
.errors-box ul{padding-right:18px;}
.errors-box li{font-size:12px;color:var(--red);font-weight:600;margin-bottom:3px;}

.form-card{background:rgba(255,255,255,0.95);backdrop-filter:blur(20px);border:1.5px solid var(--border2);border-radius:22px;padding:28px;box-shadow:0 6px 32px rgba(26,128,251,0.09);animation:popIn .45s ease .1s both;position:relative;overflow:hidden;}
.form-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--green),#4ade80);}

.field{margin-bottom:18px;}
.field-label{display:flex;align-items:center;gap:7px;font-size:10px;font-weight:800;color:var(--soft);letter-spacing:1px;margin-bottom:8px;font-family:'IBM Plex Mono',monospace;}
.field-label svg{width:13px;height:13px;stroke:var(--blue);fill:none;stroke-width:2;}
.field-input{width:100%;padding:12px 15px;border-radius:11px;border:1.5px solid var(--border);background:#f8faff;font-family:'Tajawal',sans-serif;font-size:14px;font-weight:500;color:var(--text);transition:all .2s;outline:none;}
.field-input:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(26,128,251,0.08);background:#fff;}
.field-input::placeholder{color:var(--soft);}

.form-divider{height:1px;background:linear-gradient(90deg,transparent,var(--border2),transparent);margin:22px 0;}

/* بطاقات الأدوار */
.roles-title{display:flex;align-items:center;gap:7px;font-size:10px;font-weight:800;color:var(--soft);letter-spacing:1px;margin-bottom:12px;font-family:'IBM Plex Mono',monospace;}
.roles-title svg{width:13px;height:13px;stroke:var(--blue);fill:none;stroke-width:2;}
.roles-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;}
.role-btn{display:flex;align-items:center;gap:11px;padding:13px 14px;border-radius:13px;border:1.5px solid var(--border);background:#f8faff;cursor:pointer;transition:all .2s;position:relative;}
.role-btn:hover{border-color:var(--border2);background:var(--blue-ll);transform:translateY(-1px);}
.role-btn.selected{border-color:var(--blue);background:var(--blue-ll);box-shadow:0 0 0 3px rgba(26,128,251,0.07);}
.role-icon{width:38px;height:38px;border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;border:1px solid var(--border);}
.role-icon svg{width:18px;height:18px;fill:none;stroke-width:1.8;}
.ri-blue{background:var(--blue-ll);}.ri-blue svg{stroke:var(--blue-d);}
.ri-green{background:var(--green-l);}.ri-green svg{stroke:var(--green);}
.ri-purple{background:#ede9fe;}.ri-purple svg{stroke:#7c3aed;}
.ri-orange{background:#fff7ed;}.ri-orange svg{stroke:#ea580c;}
.role-info{flex:1;}
.role-name{font-size:13px;font-weight:800;color:var(--text);}
.role-sub{font-size:9px;color:var(--soft);margin-top:2px;font-family:'IBM Plex Mono',monospace;letter-spacing:.5px;}
.role-check{width:20px;height:20px;border-radius:50%;border:1.5px solid var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s;}
.role-btn.selected .role-check{background:var(--blue);border-color:var(--blue);}
.role-check svg{width:10px;height:10px;stroke:#fff;fill:none;stroke-width:3;opacity:0;transition:opacity .15s;}
.role-btn.selected .role-check svg{opacity:1;}

.btn-submit{width:100%;display:flex;align-items:center;justify-content:center;gap:9px;padding:14px;border-radius:13px;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:15px;font-weight:800;box-shadow:0 4px 18px rgba(26,128,251,0.3);transition:all .3s ease;margin-top:22px;}
.btn-submit:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(26,128,251,0.38);}
.btn-submit svg{width:17px;height:17px;stroke:currentColor;fill:none;stroke-width:2;}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-glow"></div><div class="bg-glow2"></div></div>

<div class="main">

    <div class="page-header">
        <div class="ph-logo">
            <div class="ph-logo-in">
                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
            </div>
        </div>
        <div class="ph-info">
            <div class="ph-title">إنشاء <span>مستخدم جديد</span></div>
            <div class="ph-sub">ADMIN — CREATE NEW USER ACCOUNT</div>
        </div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="back-btn">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            لوحة التحكم
        </a>
    </div>

    <?php if($errors->any()): ?>
    <div class="errors-box">
        <div class="errors-title">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            يرجى تصحيح الأخطاء التالية
        </div>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="form-card">
        <form method="POST" action="<?php echo e(route('admin.users.store')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="role" id="roleInput" value="<?php echo e(old('role')); ?>">

            <div class="field">
                <div class="field-label">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    FULL NAME — الاسم الكامل
                </div>
                <input type="text" name="name" class="field-input" placeholder="أدخل الاسم الكامل" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="field">
                <div class="field-label">
                    <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    EMAIL — البريد الإلكتروني
                </div>
                <input type="email" name="email" class="field-input" placeholder="example@hospital.dz" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="field">
                <div class="field-label">
                    <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    PASSWORD — كلمة المرور
                </div>
                <input type="password" name="password" class="field-input" placeholder="••••••••" required>
            </div>

            <div class="form-divider"></div>

            <div class="roles-title">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                USER ROLE — اختر الدور
            </div>

            <div class="roles-grid">
                <div class="role-btn <?php echo e(old('role')==='doctor'?'selected':''); ?>" onclick="selectRole(this,'doctor')">
                    <div class="role-icon ri-blue">
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div class="role-info">
                        <div class="role-name">طبيب</div>
                        <div class="role-sub">DOCTOR</div>
                    </div>
                    <div class="role-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
                </div>

                <div class="role-btn <?php echo e(old('role')==='admin'?'selected':''); ?>" onclick="selectRole(this,'admin')">
                    <div class="role-icon ri-purple">
                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div class="role-info">
                        <div class="role-name">مدير</div>
                        <div class="role-sub">ADMIN</div>
                    </div>
                    <div class="role-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
                </div>

                <div class="role-btn <?php echo e(old('role')==='lab_worker'?'selected':''); ?>" onclick="selectRole(this,'lab_worker')">
                    <div class="role-icon ri-green">
                        <svg viewBox="0 0 24 24"><path d="M9 2v6l-2 4v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8l-2-4V2"/><line x1="3" y1="12" x2="21" y2="12"/></svg>
                    </div>
                    <div class="role-info">
                        <div class="role-name">عامل مخبر</div>
                        <div class="role-sub">LAB WORKER</div>
                    </div>
                    <div class="role-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
                </div>

                <div class="role-btn <?php echo e(old('role')==='xray_worker'?'selected':''); ?>" onclick="selectRole(this,'xray_worker')">
                    <div class="role-icon ri-orange">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                    </div>
                    <div class="role-info">
                        <div class="role-name">عامل أشعة</div>
                        <div class="role-sub">XRAY WORKER</div>
                    </div>
                    <div class="role-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                إنشاء الحساب
            </button>
        </form>
    </div>
</div>

<script>
function selectRole(el, val) {
    document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('selected'));
    el.classList.add('selected');
    document.getElementById('roleInput').value = val;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/admin/create_user.blade.php ENDPATH**/ ?>