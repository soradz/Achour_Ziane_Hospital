

<?php if(session('show_splash')): ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;800;900&display=swap');

#tv-ad {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: #000;
    font-family: 'Tajawal', sans-serif;
    direction: rtl;
    overflow: hidden;
    cursor: default;
}

/* ══ SCENES ══ */
.ad-scene {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s ease;
}
.ad-scene.active {
    opacity: 1;
    pointer-events: auto;
}

/* ══ SCENE 1 ══ */
#sc1 { background: radial-gradient(ellipse at center, #1a0a2e 0%, #0a0014 60%, #000 100%); }
.sc1-glow { position:absolute;inset:0;background:radial-gradient(ellipse at 50% 45%,rgba(180,0,50,.18) 0%,transparent 65%);animation:g1pulse 2s ease-in-out infinite alternate; }
@keyframes  g1pulse{from{opacity:.5}to{opacity:1}}
.big-virus{font-size:clamp(80px,14vw,130px);position:relative;z-index:2;animation:vEntrance .8s cubic-bezier(.34,1.56,.64,1) .3s both,vIdle 3s ease-in-out 1.1s infinite alternate;filter:drop-shadow(0 0 28px rgba(220,30,30,.7));}
@keyframes  vEntrance{from{transform:scale(0) rotate(-180deg);opacity:0}to{transform:scale(1) rotate(0);opacity:1}}
@keyframes  vIdle{from{transform:scale(1) rotate(-3deg)}to{transform:scale(1.07) rotate(3deg);filter:drop-shadow(0 0 44px rgba(220,30,30,.9))}}
.v-rays{position:absolute;width:clamp(220px,40vw,380px);height:clamp(220px,40vw,380px);top:50%;left:50%;transform:translate(-50%,-60%);z-index:1;}
.vr{position:absolute;top:50%;left:50%;height:2px;transform-origin:left center;background:linear-gradient(90deg,rgba(220,30,30,.8),transparent);border-radius:2px;animation:vrP 1.5s ease-in-out infinite alternate;}
@keyframes  vrP{from{opacity:.3}to{opacity:.85}}
.sc1-txt{margin-top:22px;text-align:center;z-index:2;animation:tReveal .6s ease 1.1s both;}
@keyframes  tReveal{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.sc1-h{font-size:clamp(22px,4vw,44px);font-weight:900;color:#fff;letter-spacing:2px;text-shadow:0 0 30px rgba(220,30,30,.5);}
.sc1-h .r{color:#ff4444;text-shadow:0 0 18px #ff4444;}
.sc1-s{font-size:clamp(12px,2vw,18px);color:rgba(255,255,255,.45);margin-top:8px;letter-spacing:3px;}
.vp{position:absolute;border-radius:50%;background:radial-gradient(circle,rgba(220,30,30,.7),transparent);animation:vpF linear infinite;pointer-events:none;}
@keyframes  vpF{0%{opacity:0;transform:translate(0,0) scale(1)}10%{opacity:.7}90%{opacity:.3}100%{opacity:0;transform:translate(var(--vx),var(--vy)) scale(.3)}}

/* ══ SCENE 2 ══ */
#sc2{background:linear-gradient(180deg,#041428 0%,#071e3d 50%,#0a2a52 100%);}
.sc2-spot{position:absolute;top:-10%;left:50%;transform:translateX(-50%);width:320px;height:80%;background:linear-gradient(180deg,rgba(26,128,251,.14) 0%,transparent 100%);clip-path:polygon(30% 0%,70% 0%,100% 100%,0% 100%);animation:spotP 2s ease-in-out infinite alternate;}
@keyframes  spotP{from{opacity:.4}to{opacity:.85}}
.xbeam{position:absolute;top:0;bottom:0;left:50%;transform:translateX(-50%);width:3px;background:linear-gradient(180deg,transparent,rgba(26,200,251,.55),rgba(26,200,251,.9),rgba(26,200,251,.55),transparent);animation:xbP .8s ease-in-out infinite alternate;z-index:1;}
@keyframes  xbP{from{opacity:.3;width:2px}to{opacity:.85;width:5px;box-shadow:0 0 14px rgba(26,200,251,.5)}}
.flee-virus{position:absolute;top:28%;left:50%;transform:translateX(-50%);font-size:clamp(34px,7vw,56px);animation:flee 2s ease-in-out infinite alternate;z-index:2;}
@keyframes  flee{0%{transform:translateX(-50%) scale(1)}50%{transform:translateX(-62%) scale(.8) rotate(-15deg)}100%{transform:translateX(-38%) scale(.65) rotate(15deg);opacity:.45}}
.fly-s{position:absolute;font-size:clamp(28px,5vw,44px);animation:fsT 1s ease-in-out infinite alternate;filter:drop-shadow(0 4px 8px rgba(0,0,0,.4));z-index:3;}
.fly-s.l{top:36%;left:16%;}
.fly-s.rr{top:36%;right:16%;animation-name:fsR;animation-delay:.5s;transform:scaleX(-1);}
@keyframes  fsT{from{transform:translateY(0) rotate(-28deg)}to{transform:translateY(-14px) rotate(10deg)}}
@keyframes  fsR{from{transform:scaleX(-1) translateY(0) rotate(-28deg)}to{transform:scaleX(-1) translateY(-14px) rotate(10deg)}}
.sc2-docs{display:flex;align-items:flex-end;gap:clamp(18px,5vw,60px);z-index:2;margin-bottom:18px;}
.dw{display:flex;flex-direction:column;align-items:center;gap:5px;}
.dw .de{font-size:clamp(46px,9vw,78px);filter:drop-shadow(0 8px 16px rgba(0,0,0,.5));}
.dw .dl{font-size:clamp(9px,1.4vw,13px);font-weight:800;color:rgba(255,255,255,.7);background:rgba(26,128,251,.18);border:1px solid rgba(26,128,251,.3);border-radius:20px;padding:2px 10px;white-space:nowrap;}
.sc2-txt{z-index:2;text-align:center;animation:tReveal .6s ease .35s both;}
.sc2-h{font-size:clamp(20px,3.5vw,40px);font-weight:900;color:#fff;text-shadow:0 0 18px rgba(26,128,251,.4);}
.sc2-h .b{color:#4fa8ff;text-shadow:0 0 14px #4fa8ff;}
.sc2-s{font-size:clamp(11px,1.8vw,16px);color:rgba(255,255,255,.45);margin-top:6px;letter-spacing:3px;}

/* ══ SCENE 3 ══ */
#sc3{background:linear-gradient(135deg,#001a0a 0%,#003018 50%,#001a0a 100%);}
.sc3-glow{position:absolute;inset:0;background:radial-gradient(ellipse at 50% 40%,rgba(22,163,74,.12) 0%,transparent 70%);animation:g3pulse 2s ease-in-out infinite alternate;}
@keyframes  g3pulse{from{opacity:.5}to{opacity:1}}
.sc3-h{font-size:clamp(18px,3.5vw,36px);font-weight:900;color:#fff;text-align:center;margin-bottom:clamp(12px,2vh,22px);z-index:2;animation:tReveal .6s ease .05s both;}
.sc3-h span{color:#4ade80;text-shadow:0 0 14px rgba(74,222,128,.5);}
.tips{display:flex;flex-direction:column;gap:clamp(9px,1.8vh,16px);z-index:2;width:100%;max-width:580px;padding:0 20px;}
.tip{display:flex;align-items:center;gap:13px;background:rgba(22,163,74,.07);border:1px solid rgba(22,163,74,.2);border-radius:12px;padding:clamp(8px,1.4vh,14px) clamp(12px,2vw,20px);animation:tipIn .5s ease both;}
@keyframes  tipIn{from{opacity:0;transform:translateX(40px)}to{opacity:1;transform:translateX(0)}}
.tip:nth-child(1){animation-delay:.08s}
.tip:nth-child(2){animation-delay:.22s}
.tip:nth-child(3){animation-delay:.36s}
.tip:nth-child(4){animation-delay:.5s}
.tip-ic{font-size:clamp(22px,4vw,32px);flex-shrink:0;}
.tip-t{font-size:clamp(12px,1.9vw,17px);font-weight:700;color:rgba(255,255,255,.88);line-height:1.4;}
.tip-t strong{color:#4ade80;}

/* ══ SCENE 4 ══ */
#sc4{background:linear-gradient(180deg,#020e1f 0%,#041428 100%);}
.hosp-logo{display:flex;flex-direction:column;align-items:center;gap:8px;z-index:2;animation:logoIn 1s cubic-bezier(.34,1.3,.64,1) .2s both;}
@keyframes  logoIn{from{opacity:0;transform:scale(.5)}to{opacity:1;transform:scale(1)}}
.logo-x{font-size:clamp(50px,10vw,90px);animation:xGlow 1.5s ease-in-out infinite alternate;filter:drop-shadow(0 0 18px rgba(255,50,50,.6));}
@keyframes  xGlow{from{filter:drop-shadow(0 0 14px rgba(255,50,50,.5))}to{filter:drop-shadow(0 0 34px rgba(255,50,50,.9));transform:scale(1.05)}}
.logo-n{font-size:clamp(24px,4.5vw,50px);font-weight:900;color:#fff;letter-spacing:3px;text-align:center;}
.logo-n span{background:linear-gradient(90deg,#1a80fb,#4fa8ff,#a8d4ff,#4fa8ff,#1a80fb);background-size:300%;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmer 3s linear infinite;}
@keyframes  shimmer{from{background-position:0%}to{background-position:300%}}
.logo-tl{font-size:clamp(11px,1.7vw,16px);color:rgba(255,255,255,.4);letter-spacing:4px;text-align:center;margin-top:3px;}
.team{display:flex;gap:clamp(14px,4vw,38px);margin-top:clamp(14px,3vh,28px);z-index:2;animation:teamIn .8s ease .8s both;}
@keyframes  teamIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.tm{display:flex;flex-direction:column;align-items:center;gap:3px;}
.tm .te{font-size:clamp(30px,6vw,52px);animation:tmBob 1.5s ease-in-out infinite alternate;}
.tm:nth-child(2) .te{animation-delay:.3s}
.tm:nth-child(3) .te{animation-delay:.6s}
.tm:nth-child(4) .te{animation-delay:.9s}
@keyframes  tmBob{from{transform:translateY(0)}to{transform:translateY(-8px)}}
.tm .tr{font-size:clamp(9px,1.3vw,12px);font-weight:800;color:rgba(255,255,255,.45);}
.slogan{margin-top:clamp(10px,2vh,18px);font-size:clamp(13px,2.2vw,20px);font-weight:700;color:rgba(255,255,255,.55);letter-spacing:1px;text-align:center;z-index:2;animation:tReveal .6s ease 1.4s both;}
.slogan strong{color:#4fa8ff;}

/* ══ UI ══ */
.skip-btn{position:absolute;top:16px;left:16px;z-index:100;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);color:rgba(255,255,255,.6);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;padding:6px 16px;border-radius:20px;cursor:pointer;transition:all .25s ease;letter-spacing:1px;animation:skipIn .5s ease 1.2s both;}
@keyframes  skipIn{from{opacity:0}to{opacity:1}}
.skip-btn:hover{background:rgba(255,255,255,.2);color:white;transform:scale(1.04);}
.sc-num{position:absolute;top:16px;right:18px;font-size:10px;font-weight:800;color:rgba(255,255,255,.2);letter-spacing:2px;z-index:100;}
.dots{position:absolute;bottom:14px;left:50%;transform:translateX(-50%);display:flex;gap:7px;z-index:100;}
.dot{width:7px;height:7px;border-radius:50%;background:rgba(255,255,255,.22);transition:all .3s ease;}
.dot.on{background:#4fa8ff;box-shadow:0 0 8px #4fa8ff;width:22px;border-radius:4px;}
.prog{position:absolute;bottom:0;left:0;right:0;height:3px;background:rgba(255,255,255,.08);z-index:100;}
.prog-b{height:100%;background:linear-gradient(90deg,#1a80fb,#4fa8ff);width:0%;box-shadow:0 0 8px rgba(26,128,251,.6);}
.tv-lines{position:absolute;inset:0;background:repeating-linear-gradient(0deg,transparent,transparent 3px,rgba(0,0,0,.03) 3px,rgba(0,0,0,.03) 4px);pointer-events:none;z-index:99;}
@keyframes  d1anim{from{transform:rotate(-8deg) translateY(0)}to{transform:rotate(5deg) translateY(-8px)}}
@keyframes  d2anim{from{transform:rotate(-4deg) translateY(0)}to{transform:rotate(4deg) translateY(-10px)}}
@keyframes  d3anim{from{transform:rotate(6deg) translateY(0)}to{transform:rotate(-5deg) translateY(-8px)}}
</style>

<div id="tv-ad">
    <div class="tv-lines"></div>
    <button class="skip-btn" onclick="skipAd()">تخطي ◄◄</button>
    <div class="sc-num" id="scNum">01 / 04</div>
    <div class="dots">
        <div class="dot on" id="d0"></div>
        <div class="dot"    id="d1"></div>
        <div class="dot"    id="d2"></div>
        <div class="dot"    id="d3"></div>
    </div>
    <div class="prog"><div class="prog-b" id="pb"></div></div>

    
    <div class="ad-scene active" id="sc1">
        <div class="sc1-glow"></div>
        <div id="vps"></div>
        <div class="v-rays" id="vrs"></div>
        <div class="big-virus">🦠</div>
        <div class="sc1-txt">
            <div class="sc1-h"><span class="r">العدوى</span> تنتشر في صمت</div>
            <div class="sc1-s">كل يوم · آلاف الحالات · في كل مكان</div>
        </div>
    </div>

    
    <div class="ad-scene" id="sc2">
        <div class="sc2-spot"></div>
        <div class="xbeam"></div>
        <div class="flee-virus">🦠</div>
        <div class="fly-s l">💉</div>
        <div class="fly-s rr">💊</div>
        <div class="sc2-docs">
            <div class="dw"><div class="de" style="animation:d1anim 1.2s ease-in-out infinite alternate">👨‍⚕️</div><div class="dl">طبيب عام</div></div>
            <div class="dw"><div class="de" style="font-size:clamp(56px,10vw,90px);animation:d2anim 1s ease-in-out infinite alternate">🧑‍⚕️</div><div class="dl" style="background:rgba(26,200,251,.15);border-color:rgba(26,200,251,.3)">رئيس القسم</div></div>
            <div class="dw"><div class="de" style="animation:d3anim 1.4s ease-in-out infinite alternate">👩‍⚕️</div><div class="dl">ممرضة</div></div>
        </div>
        <div class="sc2-txt">
            <div class="sc2-h">فريقنا <span class="b">يحارب</span> من أجلك</div>
            <div class="sc2-s">على مدار الساعة · 24 / 7</div>
        </div>
    </div>

    
    <div class="ad-scene" id="sc3">
        <div class="sc3-glow"></div>
        <div class="sc3-h">للوقاية <span>اتبع هذه النصائح</span></div>
        <div class="tips">
            <div class="tip"><div class="tip-ic">🧴</div><div class="tip-t">اغسل يديك <strong>باستمرار</strong> بالماء والصابون لمدة 20 ثانية</div></div>
            <div class="tip"><div class="tip-ic">😷</div><div class="tip-t">ارتدِ <strong>الكمامة</strong> في الأماكن المزدحمة والمغلقة</div></div>
            <div class="tip"><div class="tip-ic">💧</div><div class="tip-t">اشرب <strong>8 أكواب ماء</strong> يومياً لتقوية جهاز المناعة</div></div>
            <div class="tip"><div class="tip-ic">🏃</div><div class="tip-t">مارس <strong>الرياضة 30 دقيقة</strong> يومياً لحماية قلبك وجسمك</div></div>
        </div>
    </div>

    
    <div class="ad-scene" id="sc4">
        <div id="fps"></div>
        <div class="hosp-logo">
            <div class="logo-x">✚</div>
            <div class="logo-n"><span>مستشفى الاستعجالات</span></div>
            <div class="logo-tl">قسم الطوارئ — في خدمتكم دائماً</div>
        </div>
        <div class="team">
            <div class="tm"><div class="te">👨‍⚕️</div><div class="tr">طبيب</div></div>
            <div class="tm"><div class="te">👩‍⚕️</div><div class="tr">طبيبة</div></div>
            <div class="tm"><div class="te">🧑‍⚕️</div><div class="tr">جراح</div></div>
            <div class="tm"><div class="te">👨‍🔬</div><div class="tr">مخبر</div></div>
        </div>
        <div class="slogan">صحتك <strong>أمانة</strong> في أيدينا</div>
    </div>
</div>

<script>
(function(){
    const vrs=document.getElementById('vrs');
    if(vrs){for(let i=0;i<10;i++){const r=document.createElement('div');r.className='vr';r.style.cssText=`width:${60+Math.random()*65}px;transform:rotate(${i*36}deg);animation-delay:${i*.14}s;animation-duration:${1.2+Math.random()*.8}s;`;vrs.appendChild(r);}}
    const vps=document.getElementById('vps');
    if(vps){for(let i=0;i<18;i++){const p=document.createElement('div');p.className='vp';const s=4+Math.random()*10;p.style.cssText=`width:${s}px;height:${s}px;left:${10+Math.random()*80}%;top:${10+Math.random()*80}%;animation-duration:${3+Math.random()*5}s;animation-delay:${Math.random()*4}s;`;p.style.setProperty('--vx',(Math.random()*130-65)+'px');p.style.setProperty('--vy',(Math.random()*130-65)+'px');vps.appendChild(p);}}
    const fps=document.getElementById('fps');
    if(fps){const cols=['#1a80fb','#4fa8ff','#4ade80','#fbbf24','#fff'];for(let i=0;i<22;i++){const p=document.createElement('div');p.className='vp';const s=3+Math.random()*7;p.style.cssText=`width:${s}px;height:${s}px;left:${5+Math.random()*90}%;top:${5+Math.random()*90}%;background:${cols[Math.floor(Math.random()*cols.length)]};animation-duration:${4+Math.random()*6}s;animation-delay:${Math.random()*5}s;`;p.style.setProperty('--vx',(Math.random()*160-80)+'px');p.style.setProperty('--vy',(Math.random()*160-80)+'px');fps.appendChild(p);}}

    const SCS=['sc1','sc2','sc3','sc4'];
    const DURS=[3500,3500,4200,3500];
    const NUMS=['01 / 04','02 / 04','03 / 04','04 / 04'];
    let cur=0,tmr=null;

    function show(i){
        SCS.forEach((id,j)=>{
            document.getElementById(id).classList.remove('active');
            document.getElementById('d'+j).classList.remove('on');
        });
        document.getElementById(SCS[i]).classList.add('active');
        document.getElementById('d'+i).classList.add('on');
        document.getElementById('scNum').textContent=NUMS[i];
        const pb=document.getElementById('pb');
        pb.style.transition='none';pb.style.width='0%';
        setTimeout(()=>{pb.style.transition=`width ${DURS[i]}ms linear`;pb.style.width='100%';},50);
    }

    function next(){
        cur++;
        if(cur>=SCS.length){closeAd();return;}
        show(cur);
        clearTimeout(tmr);
        tmr=setTimeout(next,DURS[cur]);
    }

    window.skipAd=function(){closeAd();};

    function closeAd(){
        clearTimeout(tmr);
        // امسح الـ session flag
        fetch('/splash/dismiss',{
            method:'POST',
            headers:{
                'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>',
                'Content-Type':'application/json'
            }
        });
        const ad=document.getElementById('tv-ad');
        ad.style.transition='opacity 0.5s ease';
        ad.style.opacity='0';
        setTimeout(()=>{ad.style.display='none';},520);
    }

    show(0);
    tmr=setTimeout(next,DURS[0]);
    document.addEventListener('keydown',e=>{if(e.key==='Escape')closeAd();},{once:true});
})();
</script>
<?php endif; ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/partials/_splash.blade.php ENDPATH**/ ?>