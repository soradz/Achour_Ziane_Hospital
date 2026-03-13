<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>وصفة طبية</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    :root {
        --blue:   #1a80fb;
        --blue-d: #0057c8;
        --blue-l: #dbeafe;
        --green:  #16a34a;
        --green-l:#dcfce7;
        --text:   #0a2540;
        --mid:    #3a6186;
        --soft:   #7da8cc;
        --border: rgba(26,128,251,0.15);
    }

    html, body {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        min-height: 100vh;
        overflow-x: hidden;
        background: linear-gradient(145deg,#ffffff 0%,#d6ecff 45%,#b8dcff 80%,#9aceff 100%);
    }

    /* ══ BG ══ */
    .bg-scene { position:fixed;inset:0;z-index:0;overflow:hidden;pointer-events:none; }
    .bg-c { position:absolute;border-radius:50%;filter:blur(70px);opacity:0.4; }
    .bc1 { width:600px;height:600px;background:radial-gradient(circle,#70b8ff,#3a8fef);top:-180px;right:-180px;animation:d1 20s ease-in-out infinite; }
    .bc2 { width:440px;height:440px;background:radial-gradient(circle,#b3d9ff,#5aaaff);bottom:-130px;left:-130px;animation:d2 25s ease-in-out infinite; }
    .bg-grid { position:absolute;inset:0;background-image:linear-gradient(rgba(26,128,251,0.05) 1px,transparent 1px),linear-gradient(90deg,rgba(26,128,251,0.05) 1px,transparent 1px);background-size:44px 44px; }
    @keyframes d1{0%,100%{transform:translate(0,0)}33%{transform:translate(-40px,28px)}66%{transform:translate(20px,-38px)}}
    @keyframes d2{0%,100%{transform:translate(0,0)}40%{transform:translate(38px,-20px)}70%{transform:translate(-28px,38px)}}
    @keyframes spin{to{transform:rotate(360deg)}}
    @keyframes hb{0%,100%{transform:scale(1)}14%{transform:scale(1.1)}28%{transform:scale(1)}42%{transform:scale(1.06)}}
    @keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
    @keyframes bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}

    /* ══ WRAPPER ══ */
    .wrapper {
        position: relative; z-index: 1;
        max-width: 820px;
        margin: 0 auto;
        padding: 24px 18px 40px;
        display: flex; flex-direction: column; gap: 16px;
    }

    /* ══ TOP BAR (no-print) ══ */
    .top-bar {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(20px);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 13px 20px;
        display: flex; align-items: center; justify-content: space-between; gap: 12px;
        box-shadow: 0 4px 20px rgba(26,128,251,0.1);
        animation: fadeUp 0.4s ease both;
        position: relative; overflow: hidden;
    }
    .top-bar::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);border-radius:18px 18px 0 0; }

    .tb-brand { display:flex;align-items:center;gap:10px; }
    .tb-logo { position:relative;width:38px;height:38px; }
    .tb-logo::before { content:'';position:absolute;inset:-2px;border-radius:11px;background:conic-gradient(var(--blue),#4fa8ff,#a8d4ff,var(--blue));animation:spin 3s linear infinite;z-index:0; }
    .tb-logo-in { position:relative;z-index:1;width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#fff,#e0f0ff);display:flex;align-items:center;justify-content:center;font-size:18px;animation:hb 3s ease infinite; }
    .tb-name { font-size:13px;font-weight:900;color:var(--text); }
    .tb-sub  { font-size:10px;color:var(--soft); }

    .tb-btns { display:flex;gap:8px; }
    .btn-back {
        display:flex;align-items:center;gap:5px;padding:7px 14px;border-radius:9px;
        background:rgba(26,128,251,0.07);border:1.5px solid var(--border);
        color:var(--blue-d);font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;
        text-decoration:none;transition:all 0.25s ease;
    }
    .btn-back:hover { background:rgba(26,128,251,0.14);transform:translateY(-1px); }
    .btn-print {
        display:flex;align-items:center;gap:5px;padding:7px 16px;border-radius:9px;
        background:linear-gradient(135deg,var(--blue-d),var(--blue));
        color:white;font-family:'Tajawal',sans-serif;font-size:12px;font-weight:700;
        border:none;cursor:pointer;
        box-shadow:0 3px 12px rgba(26,128,251,0.28);
        transition:all 0.3s ease;position:relative;overflow:hidden;
    }
    .btn-print::after { content:'';position:absolute;top:-50%;left:-80%;width:50%;height:200%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.2),transparent);transform:skewX(-15deg);transition:left 0.5s ease; }
    .btn-print:hover::after { left:140%; }
    .btn-print:hover { transform:translateY(-1px);box-shadow:0 8px 22px rgba(26,128,251,0.38); }

    /* ══ PRESCRIPTION CARD ══ */
    .rx-card {
        background: rgba(255,255,255,0.93);
        backdrop-filter: blur(20px);
        border: 1.5px solid var(--border);
        border-radius: 22px;
        padding: 28px 28px 32px;
        box-shadow: 0 8px 36px rgba(26,128,251,0.1), 0 1px 0 rgba(255,255,255,0.9) inset;
        animation: fadeUp 0.5s ease 0.08s both;
        position: relative; overflow: hidden;
    }
    .rx-card::before { content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--blue-d),var(--blue),#4fa8ff);border-radius:22px 22px 0 0; }

    /* ══ LETTERHEAD ══ */
    .letterhead {
        text-align: center;
        padding-bottom: 18px;
        margin-bottom: 20px;
        border-bottom: 2px dashed rgba(26,128,251,0.15);
    }
    .lh-logo-wrap { position:relative;width:58px;height:58px;margin:0 auto 10px; }
    .lh-logo-wrap::before { content:'';position:absolute;inset:-3px;border-radius:50%;background:conic-gradient(var(--blue),#4fa8ff,#a8d4ff,var(--blue));animation:spin 4s linear infinite;z-index:0; }
    .lh-logo-in { position:relative;z-index:1;width:58px;height:58px;border-radius:50%;background:linear-gradient(135deg,#fff,#e0f0ff);display:flex;align-items:center;justify-content:center;font-size:26px;box-shadow:0 4px 14px rgba(26,128,251,0.2);animation:hb 3s ease infinite; }
    .lh-h1 { font-size:12px;font-weight:700;color:var(--mid);line-height:1.7; }
    .lh-h2 { font-size:16px;font-weight:900;color:var(--blue-d);margin-top:6px;letter-spacing:-0.2px; }
    .rx-badge {
        display:inline-flex;align-items:center;gap:6px;
        background:var(--blue-l);border:1.5px solid var(--border);
        border-radius:30px;padding:4px 16px;
        font-size:13px;font-weight:800;color:var(--blue-d);
        margin-top:8px;
    }

    /* ══ SECTION HEADER ══ */
    .sec-head {
        display: flex; align-items: center; gap: 8px;
        margin-bottom: 14px; padding-bottom: 8px;
        border-bottom: 1px solid rgba(26,128,251,0.1);
    }
    .sh-ic { font-size:18px;animation:bob 3s ease-in-out infinite; }
    .sh-title { font-size:14px;font-weight:900;color:var(--text); }
    .sh-title span { background:linear-gradient(90deg,var(--blue-d),var(--blue));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }

    .section-block { margin-bottom: 22px; }

    /* ══ FORM FIELDS ══ */
    .frow { display:grid;gap:12px;margin-bottom:12px; }
    .frow-2 { grid-template-columns:1fr 1fr; }
    .frow-3 { grid-template-columns:1fr 1fr 1fr; }
    .frow-1 { grid-template-columns:1fr; }

    .field { display:flex;flex-direction:column;gap:4px; }
    .f-label { font-size:10px;font-weight:800;color:var(--soft);letter-spacing:0.7px;text-transform:uppercase; }
    .f-input {
        padding:9px 12px;border-radius:10px;
        border:1.5px solid rgba(26,128,251,0.18);
        background:rgba(255,255,255,0.9);
        font-family:'Tajawal',sans-serif;font-size:13px;font-weight:500;color:var(--text);
        outline:none;transition:all 0.25s ease;-webkit-appearance:none;
    }
    .f-input:focus { border-color:var(--blue);box-shadow:0 0 0 3px rgba(26,128,251,0.1);background:#fff; }
    .f-input::placeholder { color:var(--soft); }
    textarea.f-input { resize:vertical;min-height:70px; }
    select.f-input { cursor:pointer; }

    /* ══ DIVIDER ══ */
    .rx-divider {
        display:flex;align-items:center;gap:10px;margin:4px 0 18px;
    }
    .rd-line { flex:1;height:1px;background:linear-gradient(90deg,transparent,rgba(26,128,251,0.15),transparent); }
    .rd-cross { font-size:11px;color:rgba(26,128,251,0.3); }

    /* ══ MED TABLE ══ */
    .med-table-wrap {
        border:1.5px solid var(--border);border-radius:14px;overflow:hidden;
        margin-bottom:14px;
    }
    table { width:100%;border-collapse:collapse; }
    thead tr { background:linear-gradient(135deg,rgba(26,128,251,0.1),rgba(26,128,251,0.05));border-bottom:1.5px solid var(--border); }
    thead th { padding:10px 12px;font-size:10px;font-weight:800;color:var(--mid);letter-spacing:0.7px;text-align:center;text-transform:uppercase; }
    tbody tr { border-bottom:1px solid rgba(26,128,251,0.07);transition:background 0.2s; }
    tbody tr:last-child { border-bottom:none; }
    tbody tr:hover { background:rgba(26,128,251,0.03); }
    tbody td { padding:10px 12px;font-size:12px;font-weight:600;color:var(--text);text-align:center; }
    .td-del { cursor:pointer;color:var(--soft);font-size:14px;transition:color 0.2s;background:none;border:none;padding:4px 8px;border-radius:6px; }
    .td-del:hover { color:#dc2626;background:rgba(220,38,38,0.08); }
    .empty-row td { color:var(--soft);font-style:italic;font-size:12px;padding:20px; }

    /* ══ ADD MEDICINE PANEL ══ */
    .add-med-panel {
        background:rgba(26,128,251,0.04);
        border:1.5px dashed rgba(26,128,251,0.2);
        border-radius:16px;padding:18px;margin-bottom:14px;
    }
    .amp-title { font-size:12px;font-weight:800;color:var(--mid);margin-bottom:12px;display:flex;align-items:center;gap:6px; }
    .btn-add-med {
        width:100%;padding:11px;border-radius:11px;border:none;cursor:pointer;
        background:linear-gradient(135deg,var(--blue-d),var(--blue));
        color:white;font-family:'Tajawal',sans-serif;font-size:13px;font-weight:800;
        box-shadow:0 3px 12px rgba(26,128,251,0.25);transition:all 0.3s ease;
        position:relative;overflow:hidden;margin-top:10px;
    }
    .btn-add-med::after { content:'';position:absolute;top:-50%;left:-80%;width:50%;height:200%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.2),transparent);transform:skewX(-15deg);transition:left 0.5s ease; }
    .btn-add-med:hover::after { left:140%; }
    .btn-add-med:hover { transform:translateY(-1px);box-shadow:0 8px 20px rgba(26,128,251,0.35); }

    /* ══ SIGNATURE ══ */
    .sig-row { display:grid;grid-template-columns:1fr 1fr;gap:30px;margin-top:28px;padding-top:20px;border-top:1.5px dashed rgba(26,128,251,0.15); }
    .sig-box { text-align:center; }
    .sig-line { border-top:1.5px solid rgba(26,128,251,0.25);margin-top:50px;padding-top:7px;font-size:11px;font-weight:700;color:var(--mid); }

    /* ══ PRINT ══ */
    @media print {
        @page {
            size: A4;
            margin: 0;
        }

        html, body {
            background: white !important;
            font-size: 11px;
            margin: 0; padding: 0;
        }

        .bg-scene, .top-bar, .no-print { display:none !important; }

        /* wrapper fills full page with border padding */
        .wrapper {
            padding: 0;
            max-width: 100%;
            gap: 0;
            width: 100%;
        }

        /* The card becomes the full A4 page with a border frame */
        .rx-card {
            margin: 6mm;
            border-radius: 0 !important;
            border: 2.5px solid #0057c8 !important;
            box-shadow: none !important;
            background: white !important;
            padding: 6mm 7mm !important;
            min-height: calc(297mm - 12mm);
            position: relative;
            /* double-line border effect via outline */
            outline: 1px solid #a8d4ff;
            outline-offset: 3px;
        }
        .rx-card::before { display:none; }

        /* Corner crosses decoration */
        .rx-card::after {
            content: '✚';
            position: absolute;
            top: 3mm; right: 3mm;
            font-size: 10px; color: #a8d4ff;
        }

        /* ── Letterhead ── */
        .letterhead {
            padding-bottom: 4px;
            margin-bottom: 6px;
            border-bottom: 1.5px solid #0057c8;
        }
        .lh-logo-wrap { width:32px;height:32px;margin-bottom:3px; }
        .lh-logo-wrap::before { display:none; }
        .lh-logo-in {
            width:32px;height:32px;font-size:14px;
            border:1.5px solid #0057c8;
            background:#dbeafe !important;
            -webkit-print-color-adjust:exact;
            print-color-adjust:exact;
        }
        .lh-h1 { font-size:8.5px; line-height:1.5; color:#3a6186; }
        .lh-h2 { font-size:11px; margin-top:2px; color:#0057c8; }
        .rx-badge {
            font-size:9.5px; padding:1px 8px; margin-top:3px;
            background:#dbeafe !important; border:1px solid #0057c8;
            -webkit-print-color-adjust:exact; print-color-adjust:exact;
        }

        /* ── Sections ── */
        .section-block { margin-bottom:6px; }
        .sec-head {
            margin-bottom:4px; padding-bottom:3px;
            border-bottom:1px solid #0057c8;
        }
        .sh-ic { display:none; }
        .sh-title { font-size:10px !important; font-weight:900; }
        .sh-title span { -webkit-text-fill-color:#0057c8 !important; color:#0057c8 !important; }

        /* ── Fields ── */
        .frow { gap:5px; margin-bottom:5px; }
        .frow-2 { grid-template-columns:1fr 1fr; }
        .frow-3 { grid-template-columns:1fr 1fr 1fr; }
        .field { gap:1px; }
        .f-label { font-size:7.5px; color:#7da8cc; }
        .f-input {
            border:none !important;
            border-bottom:1px solid #bbb !important;
            border-radius:0 !important;
            padding:1px 2px !important;
            font-size:10.5px !important;
            background:transparent !important;
            box-shadow:none !important;
            -webkit-appearance:none;
        }
        textarea.f-input { min-height:20px !important; resize:none; }

        /* ── Dividers ── */
        .rx-divider { margin:3px 0 6px; }
        .rd-line { background: rgba(0,87,200,0.2) !important; }
        .rd-cross { font-size:9px; color:rgba(0,87,200,0.3); }

        /* ── Medicine table ── */
        .med-table-wrap {
            border:1px solid #0057c8 !important;
            border-radius:0 !important;
            margin-bottom:6px;
            -webkit-print-color-adjust:exact;
            print-color-adjust:exact;
        }
        thead tr {
            background:#dbeafe !important;
            -webkit-print-color-adjust:exact;
            print-color-adjust:exact;
        }
        thead th { font-size:8.5px; padding:4px 5px; color:#0057c8; }
        tbody td { font-size:9.5px; padding:4px 5px; }
        tbody tr { border-bottom:1px solid #e0eeff !important; }
        .td-del { display:none !important; }
        .empty-row td { padding:6px; font-size:9.5px; }

        /* ── Signature ── */
        .sig-row {
            margin-top:10px; padding-top:8px;
            border-top:1px dashed #0057c8;
        }
        .sig-line { margin-top:22px; font-size:9px; border-top:1px solid #0057c8; }
    }

    @media(max-width:560px){
        .frow-2,.frow-3 { grid-template-columns:1fr; }
        .sig-row { grid-template-columns:1fr; }
        .tb-btns .btn-back span { display:none; }
    }
</style>
</head>
<body>

<!-- BG -->
<div class="bg-scene">
    <div class="bg-c bc1"></div>
    <div class="bg-c bc2"></div>
    <div class="bg-grid"></div>
</div>

<div class="wrapper">

    <!-- Top bar -->
    <div class="top-bar no-print">
        <div class="tb-brand">
            <div class="tb-logo"><div class="tb-logo-in">🏥</div></div>
            <div>
                <div class="tb-name">مستشفى عاشور زيان</div>
                <div class="tb-sub">أولاد جلال — نظام الاستعجالات</div>
            </div>
        </div>
        <div class="tb-btns">
            <a href="{{ route('home') }}" class="btn-back">↩ <span>الرئيسية</span></a>
            <button class="btn-print" onclick="window.print()">🖨️ طباعة الوصفة</button>
        </div>
    </div>

    <!-- Prescription card -->
    <div class="rx-card">

        <!-- Letterhead -->
        <div class="letterhead">
            <div class="lh-logo-wrap"><div class="lh-logo-in">⚕️</div></div>
            <div class="lh-h1">
                الجمهورية الجزائرية الديمقراطية الشعبية<br>
                وزارة الصحة، مديرية الصحة والسكان<br>
                المؤسسة العمومية الاستشفائية عاشور زيان – أولاد جلال
            </div>

            <div class="rx-badge">📋 وصفة طبية</div>
        </div>

        <!-- Doctor info -->
        <div class="section-block">
            <div class="sec-head">
                <span class="sh-ic">👨‍⚕️</span>
                <div class="sh-title">بيانات <span>الطبيب</span></div>
            </div>

            <div class="frow frow-2">
                <div class="field">
                    <div class="f-label">الاسم</div>
                    <input type="text" id="doctor_first_name" class="f-input" placeholder="اسم الطبيب">
                </div>
                <div class="field">
                    <div class="f-label">اللقب</div>
                    <input type="text" id="doctor_last_name" class="f-input" placeholder="لقب الطبيب">
                </div>
            </div>

            <div class="frow frow-2">
                <div class="field">
                    <div class="f-label">التخصص</div>
                    <input type="text" id="doctor_specialty" class="f-input" placeholder="طب عام، جراحة...">
                </div>
                <div class="field">
                    <div class="f-label">رقم الترخيص</div>
                    <input type="text" id="doctor_license" class="f-input" placeholder="رقم الترخيص">
                </div>
            </div>

            <div class="frow frow-2">
                <div class="field">
                    <div class="f-label">عنوان العيادة</div>
                    <input type="text" id="doctor_address" class="f-input" placeholder="العنوان">
                </div>
                <div class="field">
                    <div class="f-label">الهاتف</div>
                    <input type="text" id="doctor_phone" class="f-input" placeholder="05xx xx xx xx">
                </div>
            </div>
        </div>

        <div class="rx-divider"><div class="rd-line"></div><span class="rd-cross">✚</span><div class="rd-line"></div></div>

        <!-- Patient info -->
        <div class="section-block">
            <div class="sec-head">
                <span class="sh-ic">🧑‍⚕️</span>
                <div class="sh-title">بيانات <span>المريض</span></div>
            </div>

            <div class="frow frow-2">
                <div class="field">
                    <div class="f-label">الاسم</div>
                    <input type="text" id="first_name" class="f-input" placeholder="اسم المريض">
                </div>
                <div class="field">
                    <div class="f-label">اللقب</div>
                    <input type="text" id="last_name" class="f-input" placeholder="لقب المريض">
                </div>
            </div>

            <div class="frow frow-3">
                <div class="field">
                    <div class="f-label">العمر</div>
                    <input type="number" id="age" class="f-input" placeholder="السن">
                </div>
                <div class="field">
                    <div class="f-label">الجنس</div>
                    <select id="gender" class="f-input">
                        <option value="">— اختر —</option>
                        <option value="ذكر">👨 ذكر</option>
                        <option value="أنثى">👩 أنثى</option>
                    </select>
                </div>
                <div class="field">
                    <div class="f-label">الوزن (اختياري)</div>
                    <input type="text" id="weight" class="f-input" placeholder="كغ">
                </div>
            </div>
        </div>

        <div class="rx-divider"><div class="rd-line"></div><span class="rd-cross">✚</span><div class="rd-line"></div></div>

        <!-- Medicines -->
        <div class="section-block">
            <div class="sec-head">
                <span class="sh-ic">💊</span>
                <div class="sh-title"><span>الأدوية</span> الموصوفة</div>
            </div>

            <!-- Table -->
            <div class="med-table-wrap">
                <table id="medTable">
                    <thead>
                        <tr>
                            <th>اسم الدواء</th>
                            <th>الجرعة</th>
                            <th>عدد المرات</th>
                            <th>التوقيت</th>
                            <th class="no-print">حذف</th>
                        </tr>
                    </thead>
                    <tbody id="medBody">
                        <tr class="empty-row"><td colspan="5">لم يتم إضافة أي دواء بعد</td></tr>
                    </tbody>
                </table>
            </div>

            <!-- Add medicine panel -->
            <div class="add-med-panel no-print">
                <div class="amp-title">💉 إضافة دواء جديد</div>

                <div class="frow frow-2">
                    <div class="field">
                        <div class="f-label">اختر من القائمة</div>
                        <select id="med_select" class="f-input">
                            <option value="">— اختر دواء —</option>
                            <option>باراسيتامول</option>
                            <option>إيبوبروفين</option>
                            <option>أموكسيسيلين</option>
                            <option>ميترونيدازول</option>
                            <option>أوميبرازول</option>
                            <option>سيفيكسيم</option>
                            <option>دوكسيسيكلين</option>
                            <option>ميتفورمين</option>
                            <option>أملوديبين</option>
                            <option>أتورفاستاتين</option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="f-label">أو اكتب اسم الدواء</div>
                        <input type="text" id="med_name" class="f-input" placeholder="اسم الدواء...">
                    </div>
                </div>

                <div class="frow frow-3">
                    <div class="field">
                        <div class="f-label">الجرعة</div>
                        <select id="med_dose" class="f-input">
                            <option>100 ملغ</option>
                            <option>250 ملغ</option>
                            <option>500 ملغ</option>
                            <option>750 ملغ</option>
                            <option>1 غ</option>
                            <option>2 غ</option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="f-label">عدد المرات</div>
                        <select id="med_times" class="f-input">
                            <option>مرة واحدة</option>
                            <option>مرتين</option>
                            <option>3 مرات</option>
                            <option>4 مرات</option>
                            <option>5 مرات</option>
                            <option>6 مرات</option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="f-label">التوقيت</div>
                        <select id="med_time" class="f-input">
                            <option>صباح</option>
                            <option>ظهر</option>
                            <option>مساء</option>
                            <option>ليلاً</option>
                            <option>صباح وظهر</option>
                            <option>صباح ومساء</option>
                            <option>ظهر ومساء</option>
                            <option>صباح وظهر ومساء</option>
                        </select>
                    </div>
                </div>

                <button class="btn-add-med" onclick="addMedicine()">➕ إضافة الدواء للوصفة</button>
            </div>
        </div>

        <!-- Signature -->
        <div class="sig-row">
            <div class="sig-box">
                <div class="sig-line">توقيع الطبيب وختمه</div>
            </div>
            <div class="sig-box">
                <div class="sig-line" id="sigDate">تاريخ الوصفة</div>
            </div>
        </div>

    </div>
</div>

<script>
    // Set today's date
    const d = new Date();
    const dd = String(d.getDate()).padStart(2,'0');
    const mm = String(d.getMonth()+1).padStart(2,'0');
    document.getElementById('sigDate').textContent = `${d.getFullYear()} / ${mm} / ${dd}`;

    const medBody = document.getElementById('medBody');

    function clearEmpty() {
        const empty = medBody.querySelector('.empty-row');
        if (empty) empty.remove();
    }

    function addMedicine() {
        let name = document.getElementById('med_name').value.trim();
        if (!name) name = document.getElementById('med_select').value;
        if (!name) { alert('⚠️ أدخل اسم الدواء'); return; }

        clearEmpty();

        const row = document.createElement('tr');
        row.innerHTML = `
            <td style="font-weight:700">${name}</td>
            <td>${document.getElementById('med_dose').value}</td>
            <td>${document.getElementById('med_times').value}</td>
            <td>${document.getElementById('med_time').value}</td>
            <td class="no-print"><button class="td-del" onclick="this.closest('tr').remove(); checkEmpty()">✕</button></td>
        `;
        medBody.appendChild(row);

        document.getElementById('med_name').value = '';
        document.getElementById('med_select').value = '';
        document.getElementById('med_dose').value = '100 ملغ';
        document.getElementById('med_times').value = 'مرة واحدة';
        document.getElementById('med_time').value = 'صباح';

    }

    function checkEmpty() {
        if (medBody.querySelectorAll('tr:not(.empty-row)').length === 0) {
            medBody.innerHTML = '<tr class="empty-row"><td colspan="5">لم يتم إضافة أي دواء بعد</td></tr>';
        }
    }

    // med_select → fill med_name
    document.getElementById('med_select').addEventListener('change', function(){
        if (this.value) document.getElementById('med_name').value = this.value;
    });
</script>
</body>
</html>