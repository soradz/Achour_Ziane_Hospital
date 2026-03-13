<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>

<?php echo $__env->make('partials._splash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>

<?php echo $__env->make('partials._ticker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/layouts/app.blade.php ENDPATH**/ ?>