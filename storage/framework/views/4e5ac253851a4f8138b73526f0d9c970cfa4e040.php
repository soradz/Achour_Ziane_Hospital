

<?php $__env->startSection('title', 'صفحة المخبر'); ?>

<?php $__env->startSection('content'); ?>
<h2>طلبات التحاليل - قائمة الانتظار</h2>

<?php if(session('success')): ?>
<div style="color:green; font-weight:bold; margin-bottom:15px;"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="border:1px solid #ccc; padding:15px; margin-bottom:10px; border-radius:10px; background:#f9f9f9;">
    <strong>المريض:</strong> <?php echo e($req->patient->first_name); ?> <?php echo e($req->patient->last_name); ?> <br>
    <strong>التحاليل المطلوبة:</strong> <?php echo e($req->tests); ?> <br>
    <strong>الحالة:</strong> <?php echo e($req->status); ?> <br><br>

    <?php if($req->status == 'pending'): ?>
        <form method="POST" action="<?php echo e(route('lab.start', $req->id)); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" style="padding:8px 15px; background:#17a2b8; color:white; border:none; border-radius:5px;">بدء التحليل</button>
        </form>
    <?php endif; ?>

    <?php if($req->status == 'processing' || $req->status == 'completed'): ?>
        <form method="POST" action="<?php echo e(route('lab.save', $req->id)); ?>" style="margin-top:10px;">
            <?php echo csrf_field(); ?>
            <textarea name="results" placeholder="أدخل نتائج التحليل" style="width:100%; height:80px;"><?php echo e($req->results); ?></textarea><br>
            <button type="submit" style="padding:8px 15px; background:#28a745; color:white; border:none; border-radius:5px; margin-top:5px;">حفظ النتائج</button>
        </form>

        <?php if($req->status == 'completed'): ?>
            <form method="POST" action="<?php echo e(route('lab.send', $req->id)); ?>" style="margin-top:5px;">
                <?php echo csrf_field(); ?>
                <button type="submit" style="padding:8px 15px; background:#ffc107; color:white; border:none; border-radius:5px;">إرسال النتائج للطبيب</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/lab/lab_index.blade.php ENDPATH**/ ?>