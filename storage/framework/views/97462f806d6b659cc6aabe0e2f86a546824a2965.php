

<?php
    try {
        $announcements = \App\Models\Announcement::where('is_active', 1)->get();
    } catch(\Exception $e) {
        $announcements = collect();
    }
?>

<?php if($announcements->count() > 0): ?>

<style>
.ticker-bar {
    position: fixed;
    bottom: 0; left: 0; right: 0;
    z-index: 9999;
    height: 42px;
    background: linear-gradient(90deg, #003d99 0%, #0057c8 20%, #1a80fb 50%, #0057c8 80%, #003d99 100%);
    display: flex;
    align-items: center;
    overflow: hidden;
    box-shadow: 0 -4px 20px rgba(26,128,251,0.35);
    border-top: 2px solid rgba(255,255,255,0.2);
}
.ticker-mascot {
    flex-shrink: 0;
    width: 48px; height: 42px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
    background: rgba(255,255,255,0.12);
    border-left: 1.5px solid rgba(255,255,255,0.2);
}
.ticker-mascot-char { animation: mascotBounce 0.6s ease-in-out infinite alternate; display: inline-block; }
@keyframes  mascotBounce {
    from { transform: translateY(0px) rotate(-5deg); }
    to   { transform: translateY(-3px) rotate(5deg); }
}
.ticker-label {
    flex-shrink: 0;
    background: rgba(255,255,255,0.12);
    border-left: 1.5px solid rgba(255,255,255,0.15);
    height: 100%;
    display: flex; align-items: center; gap: 5px;
    padding: 0 12px;
    font-family: 'Tajawal', Tahoma, sans-serif;
    font-size: 11px; font-weight: 900; color: white;
    white-space: nowrap; letter-spacing: 0.5px;
}
.ticker-dot {
    width: 7px; height: 7px; border-radius: 50%;
    background: #fbbf24;
    animation: tdot 1.2s ease-in-out infinite;
    box-shadow: 0 0 6px #fbbf24;
}
@keyframes  tdot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.5;transform:scale(0.6)} }
.ticker-track {
    flex: 1; overflow: hidden; height: 100%; position: relative;
    mask-image: linear-gradient(90deg, transparent 0%, black 2%, black 98%, transparent 100%);
    -webkit-mask-image: linear-gradient(90deg, transparent 0%, black 2%, black 98%, transparent 100%);
}
.ticker-content {
    display: inline-flex; align-items: center; height: 100%;
    white-space: nowrap;
    animation: tickerScroll linear infinite;
    animation-duration: <?php echo e(max(25, $announcements->count() * 14)); ?>s;
    font-family: 'Tajawal', Tahoma, sans-serif;
    font-size: 13px; font-weight: 600; color: white;
}
.ticker-content:hover { animation-play-state: paused; cursor: pointer; }
@keyframes  tickerScroll { 0%{transform:translateX(-50%)} 100%{transform:translateX(0%)} }
.ticker-ann { display: inline-flex; align-items: center; gap: 6px; }
.ticker-ann-ic { font-size: 15px; animation: icBob 1.5s ease-in-out infinite; display: inline-block; }
@keyframes  icBob { 0%,100%{transform:translateY(0) scale(1)} 50%{transform:translateY(-2px) scale(1.15)} }
.ticker-sep { margin: 0 18px; color: rgba(255,255,255,0.35); font-size: 16px; }
.ticker-end {
    flex-shrink: 0; width: 44px; height: 42px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    background: rgba(255,255,255,0.1);
    border-right: 1.5px solid rgba(255,255,255,0.15);
    animation: endRock 3s ease-in-out infinite alternate;
}
@keyframes  endRock { from{transform:rotate(-10deg)} to{transform:rotate(10deg)} }

body        { padding-bottom: 42px !important; }
.bottom-bar { bottom: 42px !important; }
.bbar       { bottom: 42px !important; }
</style>

<div class="ticker-bar">
    <div class="ticker-mascot">
        <span class="ticker-mascot-char">👨‍⚕️</span>
    </div>
    <div class="ticker-label">
        <div class="ticker-dot"></div>
        📢 إعلان
    </div>
    <div class="ticker-track">
        <div class="ticker-content">
            <?php
                $catIcons = ['gen'=>'📋','doc'=>'👨‍⚕️','appt'=>'📅','health'=>'💚'];
            ?>
            <?php $__currentLoopData = [1,2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ann): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="ticker-ann">
                        <span class="ticker-ann-ic"><?php echo e($catIcons[$ann->category ?? 'gen'] ?? '📋'); ?></span>
                        <?php echo e($ann->text); ?>

                    </span>
                    <span class="ticker-sep">✦</span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="ticker-end">🏥</div>
</div>

<?php endif; ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/partials/_ticker.blade.php ENDPATH**/ ?>