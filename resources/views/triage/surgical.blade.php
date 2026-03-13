 هاهو نتاع القسم الجراحي  هاهو <!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>قسم الاستعجالات الجراحي - تسجيل المرضى</title>
<style>
body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f0f2f5; direction:rtl; }
header, footer { position: fixed; left:0; right:0; background:#0066cc; color:white; padding:15px 20px; text-align:center; font-size:18px; z-index:1000; }
footer { bottom:0; }
header { top:0; }
.container { margin:120px 20px 70px 20px; }
h1 { color:#004080; margin-bottom:20px; }
form { background:white; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); margin-bottom:30px; }
form label { display:block; margin:10px 0 5px; font-weight:bold; }
form input, form select { width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; }
form button { margin-top:15px; padding:10px 15px; background:#0066cc; color:white; border:none; border-radius:5px; cursor:pointer; }
.back-btn { background-color:#6c757d; color:white; text-decoration:none; padding:10px 20px; border-radius:8px; font-weight:bold; margin-right:10px; display:inline-block; }
.home-btn { background-color:#0d6efd; color:white; text-decoration:none; padding:10px 20px; border-radius:8px; font-weight:bold; display:inline-block; }
.buttons-top { margin-bottom:20px; }
</style>
</head>
<body>
<header>مستشفى عاشور زيان - القسم الجراحي</header>
<div class="container">

<!-- أزرار العودة -->
<div class="buttons-top">
    <a href="{{ route('triage.index') }}" class="back-btn">رجوع إلى مكتب الفرز والتوجيه</a>
    <a href="{{ route('home') }}" class="home-btn">العودة إلى الصفحة الرئيسية</a>
</div>

<h1>تسجيل مريض جديد - القسم الجراحي</h1>
<form id="addPatientForm">
<label>الاسم:</label><input type="text" name="first_name" required>
<label>اللقب:</label><input type="text" name="last_name" required>
<label>العمر:</label><input type="number" name="age" min="0" required>
<label>الحالة المستعجلة:</label>
<select name="emergency_case" id="emergency_case">
<option value="">-- اختر الحالة أو اكتب حالة جديدة --</option>
<option value="نزيف حاد">نزيف حاد</option>
<option value="كسور متعددة">كسور متعددة</option>
<option value="حروق شديدة">حروق شديدة</option>
<option value="ارتجاج دماغي">ارتجاج دماغي</option>
<option value="إصابة خطيرة">إصابة خطيرة</option>
<option value="أخرى">أخرى</option>
</select>
<input type="text" name="new_case" id="new_case" placeholder="اكتب الحالة الجديدة هنا" style="display:none; margin-top:5px;">
<label>الطبيب الحالي:</label><input type="text" name="doctor" required>
<button type="submit">إضافة المريض للقائمة المؤقتة</button>
</form>

<h2>قائمة المرضى المؤقتة قبل الحفظ النهائي</h2>
<table id="patientsTable">
<thead>
<tr>
<th>الاسم</th>
<th>اللقب</th>
<th>العمر</th>
<th>الحالة المستعجلة</th>
<th>الطبيب الحالي</th>
<th>تعديل</th>
<th>حذف</th>
</tr>
</thead>
<tbody></tbody>
</table>

<button id="saveAllBtn" style="margin-top:20px; padding:10px 20px; font-size:18px; background:#28a745; color:white; border:none; border-radius:8px; cursor:pointer;">حفظ جميع المرضى لمكتب الفحوصات الجراحي</button>

</div>
<footer>جميع الحقوق محفوظة - مستشفى عاشور زيان</footer>

<script>
const emergencySelect = document.getElementById('emergency_case');
const newCaseInput = document.getElementById('new_case');
const form = document.getElementById('addPatientForm');
const tableBody = document.querySelector('#patientsTable tbody');
let tempPatients = [];
let editIndex = null;

emergencySelect.addEventListener('change', () => {
    newCaseInput.style.display = (emergencySelect.value === 'أخرى') ? 'block' : 'none';
});

function renderTable() {
    tableBody.innerHTML = '';
    tempPatients.forEach((p,index)=>{
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${p.first_name}</td>
            <td>${p.last_name}</td>
            <td>${p.age}</td>
            <td>${p.case}</td>
            <td>${p.doctor}</td>
            <td><button class="button edit-btn" style="background:#ffc107;color:white;">تعديل</button></td>
            <td><button class="button delete-btn" style="background:#dc3545;color:white;">حذف</button></td>
        `;
        tableBody.appendChild(row);

        row.querySelector('.edit-btn').addEventListener('click',()=>{
            editIndex=index;
            form.first_name.value=p.first_name;
            form.last_name.value=p.last_name;
            form.age.value=p.age;
            if(["نزيف حاد","كسور متعددة","حروق شديدة","ارتجاج دماغي","إصابة خطيرة"].includes(p.case)){
                form.emergency_case.value=p.case;
                newCaseInput.style.display='none';
            } else {
                form.emergency_case.value='أخرى';
                newCaseInput.style.display='block';
                newCaseInput.value=p.case;
            }
            form.doctor.value=p.doctor;
        });

        row.querySelector('.delete-btn').addEventListener('click',()=>{
            tempPatients.splice(index,1);
            renderTable();
        });
    });
}

form.addEventListener('submit', e=>{
    e.preventDefault();
    const caseValue = (form.emergency_case.value==='أخرى'||form.emergency_case.value==='') ? newCaseInput.value : form.emergency_case.value;
    if(caseValue.trim()===''){ alert('الرجاء كتابة الحالة المستعجلة للمريض.'); return; }
    const patient = {
        first_name: form.first_name.value,
        last_name: form.last_name.value,
        age: form.age.value,
        case: caseValue,
        doctor: form.doctor.value,
        time: new Date().toLocaleString(),
        received:false
    };

    if(editIndex!==null){ tempPatients[editIndex]=patient; editIndex=null; }
    else { tempPatients.push(patient); }

    form.reset();
    newCaseInput.style.display = 'none';
    renderTable();
});

document.getElementById('saveAllBtn').addEventListener('click',()=>{
    let surgicalPatients = JSON.parse(localStorage.getItem('surgical_patients')||'[]');
    tempPatients.forEach(p => p.section='surgical'); // تحديد القسم
    surgicalPatients.push(...tempPatients);
    localStorage.setItem('surgical_patients', JSON.stringify(surgicalPatients));
    tempPatients=[];
    renderTable();
    alert('تم حفظ جميع المرضى لمكتب الفحوصات الجراحي!');
});
</script>
</body>
</html>
