
<?php $__env->startSection('title', 'لوحة التحكم'); ?>
<?php $__env->startSection('content'); ?>
<style>
@import  url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&display=swap');
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
    --blue:#1a80fb;--blue-d:#0057c8;--blue-dd:#003d8f;
    --blue-l:#dbeafe;--blue-ll:#eef5ff;
    --red:#dc2626;--red-l:#fee2e2;
    --green:#16a34a;--green-l:#dcfce7;
    --amber:#d97706;--amber-l:#fef3c7;
    --cyan:#0891b2;--cyan-l:#cffafe;
    --purple:#7c3aed;--purple-l:#ede9fe;
    --text:#0a2540;--mid:#3a6186;--soft:#7da8cc;--muted:#b8cfe0;
    --border:rgba(26,128,251,0.13);--border2:rgba(26,128,251,0.22);
}
html,body{font-family:'Tajawal',sans-serif;direction:rtl;min-height:100vh;overflow-x:hidden;background:#f7faff;}

.bg-scene{position:fixed;inset:0;z-index:0;background:linear-gradient(160deg,#ffffff 0%,#f0f7ff 30%,#e0eeff 65%,#cce0ff 100%);}
.bg-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.04) 1px,transparent 1px);background-size:52px 52px;}
.bg-dots{position:absolute;inset:0;background-image:radial-gradient(rgba(26,128,251,0.055) 1.5px,transparent 1.5px);background-size:26px 26px;}
.bg-orb1{position:absolute;width:700px;height:700px;border-radius:50%;background:radial-gradient(circle,rgba(26,128,251,0.07),transparent 65%);top:-300px;right:-300px;}
.bg-orb2{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(8,145,178,0.05),transparent 65%);bottom:-200px;left:-200px;}

@keyframes  fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
@keyframes  rowIn{from{opacity:0;transform:translateX(8px)}to{opacity:1;transform:translateX(0)}}
@keyframes  spin{to{transform:rotate(360deg)}}
@keyframes  pulse{0%,100%{opacity:1}50%{opacity:.35}}
@keyframes  grow{from{width:0}to{width:var(--w)}}
@keyframes  slideD{from{opacity:0;transform:translateY(-14px)}to{opacity:1;transform:translateY(0)}}
@keyframes  slideU{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
@keyframes  annIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:translateY(0)}}

/* TOPBAR */
.topbar{position:fixed;top:0;left:0;right:0;height:62px;background:rgba(255,255,255,0.93);backdrop-filter:blur(24px);border-bottom:1.5px solid var(--border2);display:flex;align-items:center;justify-content:space-between;padding:0 32px;z-index:1000;box-shadow:0 2px 20px rgba(26,128,251,0.08);animation:slideD .5s ease both;}
.topbar::after{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--blue-dd),var(--blue),#60a5fa);}
.tb-brand{display:flex;align-items:center;gap:12px;}
.tb-logo-wrap{position:relative;width:42px;height:42px;flex-shrink:0;}
.tb-logo-wrap::before{content:'';position:absolute;inset:-2px;border-radius:12px;background:conic-gradient(var(--blue-d),var(--blue),#93c5fd,var(--blue-d));animation:spin 4s linear infinite;z-index:0;}
.tb-logo{position:relative;z-index:1;width:42px;height:42px;border-radius:10px;background:#fff;display:flex;align-items:center;justify-content:center;}
.tb-logo svg{width:20px;height:20px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.tb-name{font-size:14px;font-weight:900;color:var(--text);}
.tb-sub{font-size:10px;color:var(--soft);font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.tb-center{display:flex;align-items:center;gap:8px;}
.tb-chip{display:flex;align-items:center;gap:5px;padding:5px 12px;border-radius:8px;font-size:11px;font-weight:700;font-family:'IBM Plex Mono',monospace;}
.tc-live{background:var(--green-l);color:var(--green);border:1px solid rgba(22,163,74,0.22);}
.tc-time{background:var(--blue-ll);color:var(--blue-d);border:1px solid var(--border2);}
.live-d{width:6px;height:6px;border-radius:50%;background:var(--green);animation:pulse 1.8s ease infinite;}
.tc-time svg{width:13px;height:13px;stroke:var(--blue);fill:none;stroke-width:2;}
.tb-btns{display:flex;gap:8px;}
.btn-back{display:flex;align-items:center;gap:6px;padding:7px 16px;border-radius:9px;background:rgba(255,255,255,0.8);border:1.5px solid var(--border2);color:var(--mid);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;transition:all .22s ease;}
.btn-back:hover{background:var(--blue-ll);color:var(--blue-d);transform:translateY(-1px);}
.btn-back svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2;}
.btn-add{display:flex;align-items:center;gap:6px;padding:7px 16px;border-radius:9px;background:linear-gradient(135deg,var(--green),#4ade80);color:#fff;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(22,163,74,0.25);transition:all .22s ease;}
.btn-add:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(22,163,74,0.35);}
.btn-add svg{width:14px;height:14px;stroke:#fff;fill:none;stroke-width:2.5;}

/* BOTTOM BAR */
.bbar{position:fixed;bottom:0;left:0;right:0;height:44px;background:rgba(255,255,255,0.93);backdrop-filter:blur(20px);border-top:1.5px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 32px;z-index:1000;animation:slideU .5s ease .3s both;}
.bb-s{display:flex;align-items:center;gap:14px;}
.bb-it{display:flex;align-items:center;gap:5px;font-size:10px;font-weight:600;color:var(--muted);}
.bb-it svg{width:11px;height:11px;stroke:var(--soft);fill:none;stroke-width:2;}
.bb-sep{width:1px;height:14px;background:var(--border);}
.bb-dot{width:6px;height:6px;border-radius:50%;background:var(--green);animation:pulse 1.8s ease infinite;}
.bb-ver{font-family:'IBM Plex Mono',monospace;font-size:9px;font-weight:700;background:var(--blue-ll);border:1px solid var(--border2);border-radius:5px;padding:2px 7px;color:var(--blue-d);}

/* MAIN */
.main{position:relative;z-index:1;padding:78px 24px 58px;max-width:1100px;margin:0 auto;display:flex;flex-direction:column;gap:18px;}

/* DIVIDER */
.divider{display:flex;align-items:center;gap:10px;animation:fadeUp .4s ease both;}
.div-line{flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(26,128,251,0.2),transparent);}
.div-icon{width:28px;height:28px;border-radius:8px;background:var(--blue-ll);border:1px solid var(--border2);display:flex;align-items:center;justify-content:center;}
.div-icon svg{width:13px;height:13px;stroke:var(--blue);fill:none;stroke-width:2;}
.div-text{font-size:10px;font-weight:700;color:var(--soft);letter-spacing:1.5px;font-family:'IBM Plex Mono',monospace;white-space:nowrap;}

/* PAGE HEADER */
.ph{display:flex;align-items:center;justify-content:space-between;animation:fadeUp .5s ease .05s both;}
.ph-left h1{font-size:22px;font-weight:900;color:var(--text);letter-spacing:-.3px;}
.ph-left h1 span{background:linear-gradient(90deg,var(--blue-dd),var(--blue),#60a5fa);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.ph-left p{font-size:11px;color:var(--soft);margin-top:3px;}
.ph-badge{display:flex;align-items:center;gap:6px;background:rgba(255,255,255,0.9);border:1.5px solid var(--border2);border-radius:20px;padding:5px 14px;font-size:11px;font-weight:700;color:var(--blue-d);font-family:'IBM Plex Mono',monospace;}
.ph-bd{width:6px;height:6px;border-radius:50%;background:var(--blue);animation:pulse 1.8s ease infinite;}

/* STAT CARDS */
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;animation:fadeUp .5s ease .08s both;}
.sc{background:rgba(255,255,255,0.95);border:1.5px solid var(--border);border-radius:18px;padding:18px 16px 14px;position:relative;overflow:hidden;transition:all .28s cubic-bezier(0.34,1.4,0.64,1);box-shadow:0 2px 14px rgba(26,128,251,0.07);cursor:default;}
.sc::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:18px 18px 0 0;}
.sc:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(26,128,251,0.14);}
.sc-b::before{background:linear-gradient(90deg,var(--blue-d),var(--blue));}
.sc-b:hover{border-color:rgba(26,128,251,0.3);}
.sc-b .sc-icon{background:var(--blue-ll);} .sc-b .sc-icon svg{stroke:var(--blue-d);}
.sc-b .num{color:var(--blue-d);} .sc-b .bar-f{background:linear-gradient(90deg,var(--blue-d),var(--blue));}
.sc-r::before{background:linear-gradient(90deg,var(--red),#f87171);}
.sc-r:hover{border-color:rgba(220,38,38,0.25);}
.sc-r .sc-icon{background:var(--red-l);} .sc-r .sc-icon svg{stroke:var(--red);}
.sc-r .num{color:var(--red);} .sc-r .bar-f{background:linear-gradient(90deg,var(--red),#f87171);}
.sc-g::before{background:linear-gradient(90deg,var(--green),#4ade80);}
.sc-g:hover{border-color:rgba(22,163,74,0.25);}
.sc-g .sc-icon{background:var(--green-l);} .sc-g .sc-icon svg{stroke:var(--green);}
.sc-g .num{color:var(--green);} .sc-g .bar-f{background:linear-gradient(90deg,var(--green),#4ade80);}
.sc-c::before{background:linear-gradient(90deg,var(--cyan),#22d3ee);}
.sc-c:hover{border-color:rgba(8,145,178,0.25);}
.sc-c .sc-icon{background:var(--cyan-l);} .sc-c .sc-icon svg{stroke:var(--cyan);}
.sc-c .num{color:var(--cyan);} .sc-c .bar-f{background:linear-gradient(90deg,var(--cyan),#22d3ee);}
.sc-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:10px;}
.sc-icon{width:42px;height:42px;border-radius:12px;display:flex;align-items:center;justify-content:center;border:1.5px solid transparent;flex-shrink:0;}
.sc-icon svg{width:20px;height:20px;fill:none;stroke-width:1.8;}
.lbl{font-size:10px;font-weight:800;color:var(--soft);letter-spacing:.7px;text-transform:uppercase;margin-bottom:3px;font-family:'IBM Plex Mono',monospace;}
.num{font-size:32px;font-weight:900;line-height:1;letter-spacing:-1.5px;}
.hint{font-size:10px;color:var(--soft);margin-top:3px;}
.bar{height:3px;background:rgba(26,128,251,0.07);border-radius:10px;overflow:hidden;margin-top:12px;}
.bar-f{height:100%;border-radius:10px;animation:grow 1.2s cubic-bezier(0.34,1.2,0.64,1) .3s both;}

/* TABLE */
.t-hdr{display:flex;align-items:center;justify-content:space-between;animation:fadeUp .4s ease .22s both;}
.t-title{display:flex;align-items:center;gap:8px;font-size:14px;font-weight:900;color:var(--text);}
.t-title svg{width:16px;height:16px;stroke:var(--blue);fill:none;stroke-width:2;}
.t-badge{display:inline-flex;align-items:center;gap:5px;background:var(--blue-ll);border:1px solid var(--border2);border-radius:20px;padding:4px 12px;font-size:10px;font-weight:700;color:var(--blue-d);font-family:'IBM Plex Mono',monospace;}
.t-bd{width:5px;height:5px;border-radius:50%;background:var(--blue);animation:pulse 1.8s ease infinite;}
.t-wrap{background:rgba(255,255,255,0.97);border:1.5px solid var(--border);border-radius:18px;overflow:hidden;box-shadow:0 4px 24px rgba(26,128,251,0.08);animation:fadeUp .5s ease .26s both;}
.t-scroll{overflow-x:auto;}
table{width:100%;min-width:780px;border-collapse:collapse;}
thead tr{background:linear-gradient(135deg,rgba(26,128,251,0.06),rgba(26,128,251,0.02));border-bottom:1.5px solid rgba(26,128,251,0.09);}
thead th{padding:13px 16px;font-size:10px;font-weight:800;color:var(--mid);letter-spacing:.8px;text-align:center;white-space:nowrap;font-family:'IBM Plex Mono',monospace;}
thead th:first-child{text-align:right;}
tbody tr{border-bottom:1px solid rgba(26,128,251,0.06);transition:background .18s;animation:rowIn .35s ease both;}
tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:rgba(26,128,251,0.025);}
tbody tr:nth-child(1){animation-delay:.28s} tbody tr:nth-child(2){animation-delay:.33s}
tbody tr:nth-child(3){animation-delay:.38s} tbody tr:nth-child(4){animation-delay:.43s}
tbody tr:nth-child(5){animation-delay:.48s}
td{padding:13px 16px;font-size:13px;color:var(--text);text-align:center;font-weight:500;vertical-align:middle;}
td:first-child{text-align:right;}
.td-n{display:flex;align-items:center;gap:9px;}
.td-av{width:34px;height:34px;border-radius:10px;background:var(--blue-ll);border:1.5px solid var(--border2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.td-av svg{width:16px;height:16px;stroke:var(--blue-d);fill:none;stroke-width:1.8;}
.td-nm{font-size:13px;font-weight:700;color:var(--text);}
.td-age{font-size:14px;font-weight:800;color:var(--mid);font-family:'IBM Plex Mono',monospace;}
.gender-badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:700;border:1px solid;}
.gb-m{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.2);}
.gb-f{background:#fce7f3;color:#be185d;border-color:rgba(219,39,119,0.2);}
.pill{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:700;border:1px solid;}
.pd{width:5px;height:5px;border-radius:50%;}
.pl-b{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.2);}
.pl-b .pd{background:var(--blue);animation:pulse 1.8s ease infinite;}
.pl-r{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.pl-r .pd{background:var(--red);animation:pulse 1.8s ease infinite;}
.pl-g{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.pl-g .pd{background:var(--green);animation:pulse 1.8s ease infinite;}
.pl-a{background:var(--amber-l);color:var(--amber);border-color:rgba(217,119,6,0.18);}
.pl-a .pd{background:var(--amber);}
.stag{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:8px;font-size:11px;font-weight:700;border:1px solid;}
.stag svg{width:11px;height:11px;fill:none;stroke:currentColor;stroke-width:2;}
.st-b{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.2);}
.st-r{background:var(--red-l);color:var(--red);border-color:rgba(220,38,38,0.2);}
.st-d{background:rgba(100,116,139,0.08);color:var(--mid);border-color:rgba(100,116,139,0.15);}
.td-dt{font-size:11px;color:var(--soft);font-weight:600;line-height:1.7;font-family:'IBM Plex Mono',monospace;}
.td-dt svg{width:11px;height:11px;stroke:var(--muted);fill:none;stroke-width:2;vertical-align:middle;margin-left:2px;}
.empty{text-align:center;padding:52px 20px;}
.empty-icon{width:64px;height:64px;background:var(--blue-ll);border:1.5px solid var(--border2);border-radius:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;}
.empty-icon svg{width:28px;height:28px;stroke:var(--soft);fill:none;stroke-width:1.4;}
.e-t{font-size:14px;font-weight:800;color:var(--mid);}
.e-s{font-size:12px;color:var(--muted);margin-top:4px;}

/* ANNOUNCEMENTS */
.ann-section{animation:fadeUp .5s ease .36s both;}
.ann-hdr{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;}
.ann-ttl{display:flex;align-items:center;gap:8px;font-size:14px;font-weight:900;color:var(--text);}
.ann-ttl svg{width:16px;height:16px;stroke:var(--amber);fill:none;stroke-width:2;}
.ann-cnt{display:inline-flex;align-items:center;gap:5px;background:var(--amber-l);border:1px solid rgba(217,119,6,0.2);border-radius:20px;padding:4px 12px;font-size:10px;font-weight:700;color:var(--amber);font-family:'IBM Plex Mono',monospace;}
.ann-cdot{width:5px;height:5px;border-radius:50%;background:var(--amber);animation:pulse 1.8s ease infinite;}
.btn-ann-full{display:flex;align-items:center;gap:6px;padding:7px 16px;border-radius:9px;background:linear-gradient(135deg,var(--amber),#fbbf24);color:#fff;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;text-decoration:none;border:none;cursor:pointer;box-shadow:0 3px 10px rgba(217,119,6,0.22);transition:all .22s ease;}
.btn-ann-full:hover{transform:translateY(-1px);box-shadow:0 6px 18px rgba(217,119,6,0.3);}
.btn-ann-full svg{width:13px;height:13px;stroke:#fff;fill:none;stroke-width:2;}
.ann-wrap{background:rgba(255,255,255,0.97);border:1.5px solid rgba(217,119,6,0.18);border-radius:18px;overflow:hidden;box-shadow:0 4px 24px rgba(217,119,6,0.07);position:relative;}
.ann-wrap::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--amber),#fbbf24,#fde68a);border-radius:18px 18px 0 0;}
.ann-add-bar{display:flex;align-items:center;gap:10px;padding:14px 20px;border-bottom:1.5px solid rgba(217,119,6,0.1);background:rgba(254,243,199,0.2);}
.ann-add-icon{width:36px;height:36px;background:var(--amber-l);border:1px solid rgba(217,119,6,0.2);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.ann-add-icon svg{width:16px;height:16px;stroke:var(--amber);fill:none;stroke-width:2;}
.ann-cat-sel{padding:9px 12px;border-radius:9px;border:1.5px solid rgba(217,119,6,0.2);background:rgba(255,255,255,0.9);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;color:var(--mid);outline:none;cursor:pointer;flex-shrink:0;transition:border-color .22s;}
.ann-cat-sel:focus{border-color:var(--amber);}
.ann-txt-in{flex:1;padding:9px 14px;border-radius:9px;border:1.5px solid rgba(217,119,6,0.2);background:rgba(255,255,255,0.9);font-family:'Tajawal',sans-serif;font-size:13px;font-weight:500;color:var(--text);outline:none;transition:all .22s ease;}
.ann-txt-in:focus{border-color:var(--amber);box-shadow:0 0 0 3px rgba(217,119,6,0.08);background:#fff;}
.ann-txt-in::placeholder{color:var(--muted);}
.btn-ann-add{display:flex;align-items:center;gap:6px;padding:9px 18px;border-radius:9px;border:none;cursor:pointer;background:linear-gradient(135deg,var(--green),#4ade80);color:#fff;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:800;box-shadow:0 3px 10px rgba(22,163,74,0.22);transition:all .22s ease;white-space:nowrap;flex-shrink:0;}
.btn-ann-add:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(22,163,74,0.3);}
.btn-ann-add svg{width:14px;height:14px;stroke:#fff;fill:none;stroke-width:2.5;}
.ann-list{max-height:300px;overflow-y:auto;}
.ann-list::-webkit-scrollbar{width:4px;}
.ann-list::-webkit-scrollbar-thumb{background:rgba(217,119,6,0.18);border-radius:4px;}
.ann-row{display:flex;align-items:center;gap:10px;padding:13px 20px;border-bottom:1px solid rgba(217,119,6,0.07);transition:background .18s;animation:annIn .3s ease both;}
.ann-row:last-child{border-bottom:none;}
.ann-row:hover{background:rgba(217,119,6,0.02);}
.tg-f{margin:0;}
.tg-btn{position:relative;width:36px;height:20px;border-radius:10px;border:none;cursor:pointer;padding:0;flex-shrink:0;transition:background .3s ease;}
.tg-btn.on{background:linear-gradient(135deg,var(--green),#4ade80);box-shadow:0 2px 6px rgba(22,163,74,0.25);}
.tg-btn.off{background:#cbd5e1;}
.tg-btn::after{content:'';position:absolute;top:3px;width:14px;height:14px;border-radius:50%;background:#fff;box-shadow:0 1px 3px rgba(0,0,0,0.15);transition:all .3s ease;}
.tg-btn.on::after{right:3px;} .tg-btn.off::after{left:3px;}
.cb{flex-shrink:0;padding:3px 9px;border-radius:20px;font-size:9px;font-weight:800;border:1px solid;font-family:'IBM Plex Mono',monospace;letter-spacing:.3px;}
.cb-gen{background:var(--blue-ll);color:var(--blue-d);border-color:rgba(26,128,251,0.18);}
.cb-doc{background:var(--purple-l);color:var(--purple);border-color:rgba(124,58,237,0.2);}
.cb-appt{background:var(--cyan-l);color:var(--cyan);border-color:rgba(8,145,178,0.2);}
.cb-health{background:var(--green-l);color:var(--green);border-color:rgba(22,163,74,0.2);}
.ann-text{flex:1;font-size:13px;font-weight:600;color:var(--text);line-height:1.4;}
.ann-text.muted{color:var(--soft);text-decoration:line-through;}
.ann-btns{display:flex;gap:5px;flex-shrink:0;}
.abtn{width:30px;height:30px;border-radius:8px;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s ease;}
.abtn svg{width:13px;height:13px;fill:none;stroke:currentColor;stroke-width:2;}
.ab-e{background:var(--amber-l);color:var(--amber);}
.ab-e:hover{background:rgba(217,119,6,0.18);transform:scale(1.1);}
.ab-d{background:var(--red-l);color:var(--red);}
.ab-d:hover{background:rgba(220,38,38,0.16);transform:scale(1.1);}
.ann-edit{display:none;padding:11px 20px;background:rgba(26,128,251,0.03);border-top:1px dashed rgba(26,128,251,0.12);}
.ann-edit.open{display:flex;gap:8px;align-items:center;animation:fadeUp .2s ease both;}
.ae-in{flex:1;padding:8px 12px;border-radius:9px;border:1.5px solid var(--blue);background:#fff;font-family:'Tajawal',sans-serif;font-size:13px;color:var(--text);outline:none;}
.ae-sv{padding:8px 16px;border-radius:9px;border:none;cursor:pointer;background:linear-gradient(135deg,var(--blue-d),var(--blue));color:#fff;font-family:'Tajawal',sans-serif;font-size:11px;font-weight:800;box-shadow:0 2px 8px rgba(26,128,251,0.2);transition:all .2s ease;white-space:nowrap;}
.ae-sv:hover{transform:translateY(-1px);}
.ae-cl{padding:8px 12px;border-radius:9px;border:1.5px solid var(--border);cursor:pointer;background:#fff;font-family:'Tajawal',sans-serif;font-size:11px;font-weight:700;color:var(--mid);transition:all .2s ease;white-space:nowrap;}
.ann-emp{text-align:center;padding:32px 20px;}
.ae-ic{width:52px;height:52px;background:var(--amber-l);border:1.5px solid rgba(217,119,6,0.2);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;}
.ae-ic svg{width:22px;height:22px;stroke:var(--amber);fill:none;stroke-width:1.5;}
.ae-t{font-size:13px;font-weight:800;color:var(--mid);}

/* MODAL */
.del-ov{display:none;position:fixed;inset:0;z-index:9999;background:rgba(10,37,64,0.4);backdrop-filter:blur(4px);align-items:center;justify-content:center;}
.del-ov.open{display:flex;animation:fadeUp .2s ease both;}
.del-card{background:#fff;border-radius:22px;padding:30px 24px;max-width:360px;width:90%;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.12);}
.dc-icon{width:60px;height:60px;background:var(--red-l);border:2px solid rgba(220,38,38,0.2);border-radius:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;}
.dc-icon svg{width:26px;height:26px;stroke:var(--red);fill:none;stroke-width:1.8;}
.dc-t{font-size:16px;font-weight:900;color:var(--text);margin-bottom:8px;}
.dc-txt{font-size:12px;color:var(--mid);margin-bottom:20px;line-height:1.6;background:var(--red-l);padding:8px 12px;border-radius:9px;border:1px solid rgba(220,38,38,0.15);}
.dc-btns{display:flex;gap:10px;justify-content:center;}
.dc-yes{padding:10px 24px;border-radius:10px;border:none;cursor:pointer;background:linear-gradient(135deg,var(--red),#f87171);color:#fff;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:800;box-shadow:0 3px 10px rgba(220,38,38,0.22);transition:all .2s ease;}
.dc-yes:hover{transform:translateY(-1px);}
.dc-no{padding:10px 20px;border-radius:10px;border:1.5px solid var(--border);cursor:pointer;background:#fff;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:700;color:var(--mid);transition:all .2s ease;}
.dc-no:hover{background:#f1f5f9;}

@media(max-width:900px){.stats{grid-template-columns:1fr 1fr;}.tb-center{display:none;}.ann-add-bar{flex-wrap:wrap;}}
@media(max-width:520px){.stats{grid-template-columns:1fr;}.topbar,.bbar{padding:0 14px;}.main{padding:70px 14px 54px;}}
</style>

<div class="bg-scene"><div class="bg-grid"></div><div class="bg-dots"></div><div class="bg-orb1"></div><div class="bg-orb2"></div></div>


<div class="del-ov" id="delOv">
    <div class="del-card">
        <div class="dc-icon"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/></svg></div>
        <div class="dc-t">حذف الإعلان؟</div>
        <div class="dc-txt" id="delTxt">...</div>
        <div class="dc-btns">
            <form id="delForm" method="POST" style="margin:0;">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="dc-yes">حذف نهائياً</button>
            </form>
            <button class="dc-no" onclick="closeDel()">إلغاء</button>
        </div>
    </div>
</div>


<div class="topbar">
    <div class="tb-brand">
        <div class="tb-logo-wrap">
            <div class="tb-logo">
                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
        </div>
        <div>
            <div class="tb-name">لوحة التحكم</div>
            <div class="tb-sub">ADMIN DASHBOARD</div>
        </div>
    </div>
    <div class="tb-center">
        <div class="tb-chip tc-live"><div class="live-d"></div> النظام نشط</div>
        <div class="tb-chip tc-time">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <span id="liveClock">--:--:--</span>
        </div>
    </div>
    <div class="tb-btns">
        <a href="<?php echo e(route('home')); ?>" class="btn-back">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            رجوع
        </a>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn-add">
            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            إنشاء حساب
        </a>
    </div>
</div>


<div class="main">

    <div class="divider">
        <div class="div-line"></div>
        <div class="div-icon"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
        <span class="div-text">EMERGENCY STATS — إحصاءات اليوم</span>
        <div class="div-icon"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
        <div class="div-line"></div>
    </div>

    <div class="ph">
        <div class="ph-left">
            <h1>إحصاءات <span>المرضى</span></h1>
            <p>متابعة الحالات والأقسام في الوقت الفعلي</p>
        </div>
        <div class="ph-badge"><div class="ph-bd"></div> تحديث مستمر</div>
    </div>

    
    <div class="stats">
        <div class="sc sc-b" style="animation-delay:.08s">
            <div class="sc-top">
                <div>
                    <div class="lbl">القسم الطبي</div>
                    <div class="num"><?php echo e($todayMedicalCount ?? 0); ?></div>
                    <div class="hint">مريض اليوم</div>
                </div>
                <div class="sc-icon">
                    <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </div>
            </div>
            <div class="bar"><div class="bar-f" style="--w:<?php echo e(min(($todayMedicalCount??0)*10,100)); ?>%"></div></div>
        </div>

        <div class="sc sc-r" style="animation-delay:.13s">
            <div class="sc-top">
                <div>
                    <div class="lbl">القسم الجراحي</div>
                    <div class="num"><?php echo e($todaySurgicalCount ?? 0); ?></div>
                    <div class="hint">مريض اليوم</div>
                </div>
                <div class="sc-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
            </div>
            <div class="bar"><div class="bar-f" style="--w:<?php echo e(min(($todaySurgicalCount??0)*10,100)); ?>%"></div></div>
        </div>

        <div class="sc sc-g" style="animation-delay:.18s">
            <div class="sc-top">
                <div>
                    <div class="lbl">الإجمالي</div>
                    <div class="num"><?php echo e(($todayMedicalCount??0)+($todaySurgicalCount??0)); ?></div>
                    <div class="hint">جميع الأقسام</div>
                </div>
                <div class="sc-icon">
                    <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </div>
            </div>
            <div class="bar"><div class="bar-f" style="--w:<?php echo e(min((($todayMedicalCount??0)+($todaySurgicalCount??0))*5,100)); ?>%"></div></div>
        </div>

        <div class="sc sc-c" style="animation-delay:.23s">
            <div class="sc-top">
                <div>
                    <div class="lbl">آخر السجلات</div>
                    <div class="num"><?php echo e($latestPatients->count()); ?></div>
                    <div class="hint">حالة مسجلة</div>
                </div>
                <div class="sc-icon">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
            </div>
            <div class="bar"><div class="bar-f" style="--w:<?php echo e(min($latestPatients->count()*20,100)); ?>%"></div></div>
        </div>
    </div>

    
    <div class="t-hdr">
        <div class="t-title">
            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            آخر المرضى المسجلين
        </div>
        <span class="t-badge"><div class="t-bd"></div> آخر 5 سجلات</span>
    </div>

    <div class="t-wrap">
        <div class="t-scroll">
            <table>
                <thead>
                    <tr>
                        <th>الاسم الكامل</th>
                        <th>العمر</th>
                        <th>الجنس</th>
                        <th>الحالة</th>
                        <th>القسم</th>
                        <th>وقت التسجيل</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $latestPatients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="td-n">
                                <div class="td-av">
                                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                <span class="td-nm"><?php echo e(trim(($patient->first_name??'').' '.($patient->last_name??'')) ?: '—'); ?></span>
                            </div>
                        </td>
                        <td><span class="td-age"><?php echo e(!empty($patient->age) ? $patient->age : '—'); ?></span></td>
                        <td>
                            <?php if(!empty($patient->gender)): ?>
                            <span class="gender-badge <?php echo e($patient->gender==='أنثى' ? 'gb-f' : 'gb-m'); ?>">
                                <?php echo e($patient->gender); ?>

                            </span>
                            <?php else: ?> <span style="color:var(--muted)">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($patient->status)): ?>
                                <?php $s=$patient->status; ?>
                                <?php if(str_contains($s,'حرج')||str_contains($s,'خطر')): ?>
                                    <span class="pill pl-r"><div class="pd"></div><?php echo e($s); ?></span>
                                <?php elseif(str_contains($s,'مستقر')||str_contains($s,'جيد')): ?>
                                    <span class="pill pl-g"><div class="pd"></div><?php echo e($s); ?></span>
                                <?php elseif(str_contains($s,'متوسط')): ?>
                                    <span class="pill pl-a"><div class="pd"></div><?php echo e($s); ?></span>
                                <?php else: ?>
                                    <span class="pill pl-b"><div class="pd"></div><?php echo e($s); ?></span>
                                <?php endif; ?>
                            <?php else: ?> <span style="color:var(--muted)">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($patient->section)): ?>
                                <?php $sec=$patient->section; ?>
                                <?php if(str_contains($sec,'طبي')||str_contains($sec,'داخلي')||$sec==='medical'): ?>
                                    <span class="stag st-b">
                                        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                        <?php echo e($sec); ?>

                                    </span>
                                <?php elseif(str_contains($sec,'جراح')||$sec==='surgical'): ?>
                                    <span class="stag st-r">
                                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        <?php echo e($sec); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="stag st-d"><?php echo e($sec); ?></span>
                                <?php endif; ?>
                            <?php else: ?> <span style="color:var(--muted)">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="td-dt">
                                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <?php echo e($patient->created_at->format('d/m/Y')); ?><br>
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <?php echo e($patient->created_at->format('H:i')); ?>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6">
                        <div class="empty">
                            <div class="empty-icon">
                                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                            </div>
                            <div class="e-t">لا يوجد مرضى مسجلين</div>
                            <div class="e-s">ستظهر السجلات فور تسجيل أول مريض</div>
                        </div>
                    </td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="ann-section">
        <div class="ann-hdr">
            <div class="ann-ttl">
                <svg viewBox="0 0 24 24"><path d="M22 3l-8.646 8.646M22 3H15M22 3v7"/><path d="M16 2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5"/></svg>
                إدارة الإعلانات
            </div>
            <div style="display:flex;align-items:center;gap:8px;">
                <span class="ann-cnt">
                    <div class="ann-cdot"></div>
                    <?php $annTotal = isset($announcements) ? $announcements->count() : 0; ?>
                    <?php echo e($annTotal); ?> إعلان
                </span>
                <a href="<?php echo e(route('admin.announcements.index')); ?>" class="btn-ann-full">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                    إدارة كاملة
                </a>
            </div>
        </div>

        <div class="ann-wrap">
            <form method="POST" action="<?php echo e(route('admin.announcements.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="ann-add-bar">
                    <div class="ann-add-icon">
                        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    </div>
                    <select name="category" class="ann-cat-sel">
                        <option value="gen">عام</option>
                        <option value="doc">طبيب</option>
                        <option value="appt">موعد</option>
                        <option value="health">صحة</option>
                    </select>
                    <input type="text" name="text" class="ann-txt-in"
                           placeholder="أضف إعلان سريع... مثلاً: طبيب الأعصاب متاح اليوم"
                           maxlength="300" required>
                    <button type="submit" class="btn-ann-add">
                        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        إضافة
                    </button>
                </div>
            </form>

            <div class="ann-list">
                <?php
                $catMap=[
                    'gen'   =>['cb-gen',   'عام'],
                    'doc'   =>['cb-doc',   'طبيب'],
                    'appt'  =>['cb-appt',  'موعد'],
                    'health'=>['cb-health','صحة'],
                ];
                ?>

                <?php if(isset($announcements) && $announcements->count() > 0): ?>
                    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $ann): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $cat=$catMap[$ann->category??'gen']??$catMap['gen']; ?>
                    <div style="animation-delay:<?php echo e(0.05+$i*0.04); ?>s">
                        <div class="ann-row">
                            <form method="POST" action="<?php echo e(route('admin.announcements.toggle', $ann->id)); ?>" class="tg-f">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="tg-btn <?php echo e($ann->is_active ? 'on' : 'off'); ?>" title="<?php echo e($ann->is_active ? 'إيقاف' : 'تفعيل'); ?>"></button>
                            </form>
                            <span class="cb <?php echo e($cat[0]); ?>"><?php echo e($cat[1]); ?></span>
                            <div class="ann-text <?php echo e($ann->is_active ? '' : 'muted'); ?>"><?php echo e($ann->text); ?></div>
                            <div class="ann-btns">
                                <button class="abtn ab-e" title="تعديل" onclick="openEdit(<?php echo e($ann->id); ?>, `<?php echo e(addslashes($ann->text)); ?>`)">
                                    <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </button>
                                <button class="abtn ab-d" title="حذف" onclick="openDel(<?php echo e($ann->id); ?>, `<?php echo e(addslashes($ann->text)); ?>`)">
                                    <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="ann-edit" id="ae-<?php echo e($ann->id); ?>">
                            <form method="POST" action="<?php echo e(route('admin.announcements.update', $ann->id)); ?>">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <input type="text" name="text" id="aein-<?php echo e($ann->id); ?>" class="ae-in" maxlength="300" required>
                                <button type="submit" class="ae-sv">حفظ</button>
                                <button type="button" class="ae-cl" onclick="closeEdit(<?php echo e($ann->id); ?>)">إلغاء</button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="ann-emp">
                        <div class="ae-ic">
                            <svg viewBox="0 0 24 24"><path d="M22 3l-8.646 8.646M22 3H15M22 3v7"/><path d="M16 2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5"/></svg>
                        </div>
                        <div class="ae-t">لا يوجد إعلانات — أضف إعلاناً بالأعلى</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>


<div class="bbar">
    <div class="bb-s">
        <div class="bb-it"><div class="bb-dot"></div> النظام نشط</div>
        <div class="bb-sep"></div>
        <div class="bb-it">
            <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            قسم الطوارئ
        </div>
        <div class="bb-sep"></div>
        <div class="bb-it">
            <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            آمن
        </div>
    </div>
    <div class="bb-s">
        <div class="bb-it">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <span id="footerClock">--:--</span>
        </div>
        <div class="bb-sep"></div>
        <div class="bb-ver">v2.0</div>
    </div>
</div>

<script>
function tick(){
    const n=new Date(),pad=v=>String(v).padStart(2,'0');
    document.getElementById('liveClock').textContent=`${pad(n.getHours())}:${pad(n.getMinutes())}:${pad(n.getSeconds())}`;
    document.getElementById('footerClock').textContent=`${pad(n.getHours())}:${pad(n.getMinutes())}`;
}
tick(); setInterval(tick,1000);
function openEdit(id,text){
    document.querySelectorAll('.ann-edit.open').forEach(e=>e.classList.remove('open'));
    document.getElementById('aein-'+id).value=text;
    document.getElementById('ae-'+id).classList.add('open');
    setTimeout(()=>document.getElementById('aein-'+id).focus(),50);
}
function closeEdit(id){document.getElementById('ae-'+id).classList.remove('open');}
function openDel(id,text){
    document.getElementById('delTxt').textContent=text;
    document.getElementById('delForm').action=`<?php echo e(url('admin/announcements')); ?>/${id}`;
    document.getElementById('delOv').classList.add('open');
}
function closeDel(){document.getElementById('delOv').classList.remove('open');}
document.getElementById('delOv').addEventListener('click',function(e){if(e.target===this)closeDel();});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\urgences-hospital\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>