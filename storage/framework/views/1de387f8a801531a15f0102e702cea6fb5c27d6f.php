
<?php $__env->startSection('title', 'إدارة الإعلانات'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-l:#dbeafe;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --red:#dc2626;--red-l:#fee2e2;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;
    --border:rgba(26,128,251,0.15);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;background:linear-gradient(145deg,#fff 0%,#d6ecff 45%,#b8dcff 100%);}
@keyframes  fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
@keyframes  popIn{from{opacity:0;transform:scale(0.95)}to{opacity:1;transform:scale(1)}}
@keyframes  spin{to{transform:rotate(360deg)}}

.main{max-width:780px;margin:0 auto;padding:28px 18px 80px;}

.page-header{background:rgba(255,255,255,0.88);backdrop-filter:blur(20px);border:1.5px solid var(--border);border-radius:20px;padding:18px 24px;display:flex;align-items:center;gap:13px;margin-bottom:22px;box-shadow:0 5px 24px rgba(26,128,251,0.1);position:relative;overflow:hidden;animation:fadeUp .4s ease both;}
.page-header::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--amber),#fbbf24);border-radius:20px 20px 0 0;}
.ph-icon{width:44px;height:44px;border-radius:13px;background:var(--amber-l);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;}
.ph-info{flex:1;}
.ph-title{font-size:17px;font-weight:900;color:var(--text);}
.ph-title span{background:linear-gradient(90deg,var(--amber),#f59e0b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-sub{font-size:11px;color:var(--soft);margin-top:2px;font-weight:600;}
.back-btn{display:flex;align-items:center;gap:5px;padding:6px 13px;border-radius:8px;background:rgba(26,128,251,0.07);border:1.5px solid var(--border);color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;}

.alert{display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:13px;font-size:13px;font-weight:700;margin-bottom:16px;animation:fadeUp .3s ease both;}
.alert-ok{background:var(--green-l);border:1.5px solid rgba(22,163,74,0.3);color:var(--green);}

/* نموذج الإضافة */
.add-card{background:rgba(255,255,255,0.9);backdrop-filter:blur(16px);border:1.5px solid var(--border);border-radius:18px;padding:22px;margin-bottom:22px;box-shadow:0 4px 16px rgba(26,128,251,0.08);animation:popIn .4s ease .1s both;}
.add-card-title{font-size:14px;font-weight:800;color:var(--blue-d);margin-bottom:14px;display:flex;align-items:center;gap:7px;}
.form-row{display:grid;grid-template-columns:1fr auto auto;gap:10px;align-items:end;}
.field{display:flex;flex-direction:column;gap:5px;}
.field label{font-size:10px;font-weight:800;color:var(--soft);letter-spacing:.6px;}
.field textarea{width:100%;padding:10px 13px;border-radius:10px;border:1.5px solid rgba(26,128,251,0.18);background:#f8faff;font-family:'Tajawal',sans-serif;font-size:13px;color:var(--text);resize:none;outline:none;transition:border-color .2s ease;}
.field textarea:focus{border-color:var(--blue);background:#fff;}
.field select{padding:10px 13px;border-radius:10px;border:1.5px solid rgba(26,128,251,0.18);background:#f8faff;font-family:'Tajawal',sans-serif;font-size:13px;color:var(--text);outline:none;}
.btn-add{display:inline-flex;align-items:center;gap:7px;padding:10px 22px;border-radius:11px;background:linear-gradient(135deg,var(--amber),#f59e0b);color:#fff;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:800;box-shadow:0 4px 14px rgba(217,119,6,0.3);transition:all .25s ease;white-space:nowrap;}
.btn-add:hover{transform:translateY(-1px);box-shadow:0 8px 20px rgba(217,119,6,0.35);}

/* قائمة الإعلانات */
.section-title{font-size:13px;font-weight:800;color:var(--mid);margin-bottom:12px;display:flex;align-items:center;gap:8px;}
.section-title .stl{height:2px;flex:1;background:linear-gradient(90deg,var(--border),transparent);border-radius:2px;}

.ann-list{display:flex;flex-direction:column;gap:10px;}
.ann-card{background:rgba(255,255,255,0.9);backdrop-filter:blur(16px);border:1.5px solid var(--border);border-radius:16px;padding:16px 18px;display:flex;align-items:flex-start;gap:13px;box-shadow:0 2px 10px rgba(26,128,251,0.06);animation:popIn .4s ease both;transition:box-shadow .2s ease;}
.ann-card:hover{box-shadow:0 6px 22px rgba(26,128,251,0.12);}
.ann-card.inactive{opacity:0.55;}
.ann-card.inactive .ann-text{text-decoration:line-through;color:var(--soft);}

.ann-status{width:10px;height:10px;border-radius:50%;flex-shrink:0;margin-top:5px;}
.status-on{background:var(--green);box-shadow:0 0 0 3px rgba(22,163,74,0.2);}
.status-off{background:#d1d5db;}

.ann-body{flex:1;}
.ann-text{font-size:14px;font-weight:600;color:var(--text);line-height:1.6;margin-bottom:6px;}
.ann-meta{display:flex;flex-wrap:wrap;gap:6px;align-items:center;}
.ann-cat{display:inline-flex;padding:2px 9px;border-radius:20px;font-size:10px;font-weight:800;border:1px solid;}
.cat-gen{background:var(--blue-l);color:var(--blue-d);border-color:var(--border);}
.cat-urg{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.cat-med{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.ann-date{font-size:10px;color:var(--soft);font-weight:600;}

.ann-actions{display:flex;gap:6px;flex-shrink:0;}
.btn-icon{display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:9px;border:1.5px solid;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:14px;transition:all .2s ease;}
.btn-toggle-on{background:var(--green-l);border-color:rgba(22,163,74,0.25);color:var(--green);}
.btn-toggle-on:hover{background:rgba(22,163,74,0.2);}
.btn-toggle-off{background:#f3f4f6;border-color:#d1d5db;color:#6b7280;}
.btn-toggle-off:hover{background:#e5e7eb;}
.btn-edit{background:var(--blue-l);border-color:var(--border);color:var(--blue-d);}
.btn-edit:hover{background:rgba(26,128,251,0.18);}
.btn-delete{background:var(--red-l);border-color:rgba(220,38,38,0.2);color:var(--red);}
.btn-delete:hover{background:rgba(220,38,38,0.18);}

/* modal تعديل */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,40,0.35);backdrop-filter:blur(4px);z-index:1000;align-items:center;justify-content:center;}
.modal-overlay.open{display:flex;}
.modal{background:#fff;border-radius:20px;padding:26px;width:100%;max-width:480px;box-shadow:0 20px 60px rgba(0,0,0,0.2);animation:popIn .3s ease;}
.modal-title{font-size:16px;font-weight:900;color:var(--text);margin-bottom:16px;}
.modal textarea{width:100%;padding:11px 14px;border-radius:11px;border:1.5px solid var(--border);font-family:'Tajawal',sans-serif;font-size:14px;color:var(--text);resize:vertical;min-height:90px;outline:none;}
.modal textarea:focus{border-color:var(--blue);}
.modal-actions{display:flex;gap:10px;margin-top:14px;justify-content:flex-end;}
.btn-save{padding:9px 22px;border-radius:10px;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;border:none;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:800;}
.btn-cancel{padding:9px 18px;border-radius:10px;background:#f3f4f6;border:1.5px solid #e5e7eb;color:#6b7280;cursor:pointer;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;}

.empty-state{background:rgba(255,255,255,0.85);border:1.5px solid var(--border);border-radius:18px;padding:44px;text-align:center;}
.empty-icon{font-size:44px;opacity:.4;display:block;margin-bottom:12px;}
.empty-title{font-size:15px;font-weight:800;color:var(--mid);}
</style>

<div class="main">
    <div class="page-header">
        <div class="ph-icon">📢</div>
        <div class="ph-info">
            <div class="ph-title">إدارة <span>الإعلانات</span></div>
            <div class="ph-sub">إضافة وتعديل وتفعيل الإعلانات في الشريط السفلي</div>
        </div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="back-btn">↩ لوحة الإدارة</a>
    </div>

    <?php if(session('success')): ?>
    <div class="alert alert-ok">✅ <?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <div class="add-card">
        <div class="add-card-title">➕ إضافة إعلان جديد</div>
        <form method="POST" action="<?php echo e(route('admin.announcements.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="field">
                    <label>نص الإعلان</label>
                    <textarea name="text" rows="2" placeholder="اكتب نص الإعلان هنا..." required></textarea>
                </div>
                <div class="field">
                    <label>التصنيف</label>
                    <select name="category">
                        <option value="gen">عام</option>
                        <option value="urg">استعجال</option>
                        <option value="med">طبي</option>
                    </select>
                </div>
                <button type="submit" class="btn-add">📤 إضافة</button>
            </div>
        </form>
    </div>

    
    <div class="section-title">
        📋 الإعلانات (<?php echo e($announcements->count()); ?>)
        <div class="stl"></div>
    </div>

    <?php if($announcements->isEmpty()): ?>
    <div class="empty-state">
        <span class="empty-icon">📭</span>
        <div class="empty-title">لا توجد إعلانات بعد</div>
    </div>
    <?php else: ?>
    <div class="ann-list">
        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $ann): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $catLabel = ['gen'=>'عام','urg'=>'استعجال','med'=>'طبي'][$ann->category] ?? 'عام';
            $catClass  = ['gen'=>'cat-gen','urg'=>'cat-urg','med'=>'cat-med'][$ann->category] ?? 'cat-gen';
        ?>
        <div class="ann-card <?php echo e($ann->is_active ? '' : 'inactive'); ?>" style="animation-delay:<?php echo e($i * 0.05); ?>s">
            <div class="ann-status <?php echo e($ann->is_active ? 'status-on' : 'status-off'); ?>"></div>
            <div class="ann-body">
                <div class="ann-text"><?php echo e($ann->text); ?></div>
                <div class="ann-meta">
                    <span class="ann-cat <?php echo e($catClass); ?>"><?php echo e($catLabel); ?></span>
                    <span class="ann-date">🕐 <?php echo e($ann->created_at->format('Y-m-d H:i')); ?></span>
                    <?php if($ann->is_active): ?>
                    <span style="font-size:10px;font-weight:800;color:var(--green);">● نشط</span>
                    <?php else: ?>
                    <span style="font-size:10px;font-weight:800;color:#9ca3af;">● موقوف</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="ann-actions">
                
                <form method="POST" action="<?php echo e(route('admin.announcements.toggle', $ann->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-icon <?php echo e($ann->is_active ? 'btn-toggle-on' : 'btn-toggle-off'); ?>" title="<?php echo e($ann->is_active ? 'إيقاف' : 'تفعيل'); ?>">
                        <?php echo e($ann->is_active ? '✅' : '⏸'); ?>

                    </button>
                </form>
                
                <button onclick="openEdit(<?php echo e($ann->id); ?>, '<?php echo e(addslashes($ann->text)); ?>')" class="btn-icon btn-edit" title="تعديل">✏️</button>
                
                <form method="POST" action="<?php echo e(route('admin.announcements.destroy', $ann->id)); ?>" onsubmit="return confirm('حذف هذا الإعلان؟')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn-icon btn-delete" title="حذف">🗑</button>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>


<div class="modal-overlay" id="editModal">
    <div class="modal">
        <div class="modal-title">✏️ تعديل الإعلان</div>
        <form method="POST" id="editForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <textarea name="text" id="editText" rows="3" required></textarea>
            <div class="modal-actions">
                <button type="button" onclick="closeEdit()" class="btn-cancel">إلغاء</button>
                <button type="submit" class="btn-save">💾 حفظ</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEdit(id, text) {
    document.getElementById('editText').value = text;
    document.getElementById('editForm').action = '/admin/announcements/' + id;
    document.getElementById('editModal').classList.add('open');
}
function closeEdit() {
    document.getElementById('editModal').classList.remove('open');
}
document.getElementById('editModal').addEventListener('click', function(e) {
    if(e.target === this) closeEdit();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/admin/announcements/index.blade.php ENDPATH**/ ?>