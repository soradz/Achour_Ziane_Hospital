<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SimpleLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LabWorkerController;

Route::get('/login', [SimpleLoginController::class, 'showLogin'])->name('login');
Route::post('/login', [SimpleLoginController::class, 'login']);
Route::get('/logout', [SimpleLoginController::class, 'logout'])->name('logout');

Route::get('/', [SimpleLoginController::class, 'home'])->name('home');

Route::post('/splash/dismiss', function() {
    session()->forget('show_splash');
    return response()->json(['ok' => true]);
})->name('splash.dismiss');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');

Route::get('/admin/announcements',              [AnnouncementController::class, 'index'])  ->name('admin.announcements.index');
Route::post('/admin/announcements',             [AnnouncementController::class, 'store'])  ->name('admin.announcements.store');
Route::put('/admin/announcements/{id}',         [AnnouncementController::class, 'update']) ->name('admin.announcements.update');
Route::delete('/admin/announcements/{id}',      [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');
Route::post('/admin/announcements/{id}/toggle', [AnnouncementController::class, 'toggle']) ->name('admin.announcements.toggle');

Route::get('/triage', [PatientController::class, 'triage1'])->name('triage');

Route::get('/triage/medical/create', [PatientController::class, 'create'])
    ->name('patients.create.medical')
    ->defaults('department', 'medical');

Route::get('/triage/surgical/create', [PatientController::class, 'create'])
    ->name('patients.create.surgical')
    ->defaults('department', 'surgical');

Route::get('/patients/create/{department}', function ($department) {
    return redirect()->route('patients.create.' . $department);
})->name('patients.create');

Route::post('/triage/store', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/today', [PatientController::class, 'today'])->name('patients.today');
Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
Route::post('/patients/{patient}/receive', [PatientController::class, 'receive'])->name('patients.receive');

Route::get('/lab/one', [LabController::class, 'one'])->name('lab.one');
Route::get('/patients_remaining', [PatientController::class, 'patientsRemaining1'])->name('patients.remaining');
Route::get('/patients/select1/{patient}', [PatientController::class, 'select1'])->name('patients.select1');

Route::get('/lab/two', [LabController::class, 'two'])->name('lab.two');
Route::get('/two', [PatientController::class, 'triage2'])->name('two');
Route::get('/two/patients_remaining', [PatientController::class, 'patientsRemaining2'])->name('two.patients.remaining');
Route::get('/patients/select2/{patient}', [PatientController::class, 'select2'])->name('patients.select2');

Route::get('/doctor/patient/{patient}',         [DoctorController::class, 'showPatient'])  ->name('doctor.patient.show');
Route::post('/doctor/send-to-lab/{patient}',    [DoctorController::class, 'sendToLab'])    ->name('doctor.send.to.lab');
Route::get('/doctor/results/{labRequest}',      [DoctorController::class, 'showResults'])  ->name('doctor.results.show'); // ← جديد

Route::get('/lab-worker/dashboard',  [LabWorkerController::class, 'dashboard'])    ->name('lab.worker.dashboard');
Route::post('/lab/results/{id}',     [LabWorkerController::class, 'storeResults']) ->name('lab.results.store');

Route::get('/lab/{patient}/index',  [LabController::class, 'lab']) ->name('lab.index');
Route::get('/xray/{patient}/index', [LabController::class, 'xray'])->name('xray.index');

Route::get('/room/treatment/{firstPatient}',  [LabController::class, 'treatmentRoom']) ->name('room.treatment');
Route::get('/room/children/{firstPatient}',   [LabController::class, 'childrenRoom'])  ->name('room.children');
Route::get('/room/trauma/{firstPatient}',     [LabController::class, 'traumaRoom'])    ->name('room.trauma');
Route::get('/room/dental/{firstPatient}',     [LabController::class, 'dentalRoom'])    ->name('room.dental');
Route::get('/room/isolation/{firstPatient}',  [LabController::class, 'isolationRoom']) ->name('room.isolation');
Route::get('/room/hospital/{firstPatient}',   [LabController::class, 'hospitalRoom'])  ->name('room.hospital');

Route::post('/room/release/{room}', [LabController::class, 'releasePatient'])->name('rooms.release');

Route::get('/prescription', function () {
    return view('prescription.create');
})->name('prescription.create');

Route::get('/notifications/fetch',                [NotificationController::class, 'fetchNotifications'])->name('notifications.fetch');
Route::post('/notifications/seen/{notification}', [NotificationController::class, 'markAsSeen'])        ->name('notifications.seen');

Route::post('/lab/send-patient/{id}',      [LabController::class, 'sendPatient'])    ->name('lab.sendPatient');
Route::post('/patients/send-patient/{id}', [LabController::class, 'sendPatient'])    ->name('patients.sendPatient');
Route::get('/lab/two/remaining',           [LabController::class, 'remainingTwo'])   ->name('patients.remaining.two');
Route::post('/lab/two/send/{id}',          [LabController::class, 'sendPatientTwo']) ->name('lab.two.sendPatient');

Route::post('/lab/start/{id}',  [LabController::class, 'startAnalysis'])->name('lab.start');
Route::post('/lab/save/{id}',   [LabController::class, 'saveResults'])  ->name('lab.save');
Route::post('/lab/send/{id}',   [LabController::class, 'sendToDoctor']) ->name('lab.send');

Route::get('/doctor/results', [DoctorController::class, 'resultsList'])->name('doctor.results.list');

use App\Http\Controllers\XrayController;

Route::get('/xray/dashboard', [XrayController::class, 'dashboard'])->name('xray.dashboard');
Route::post('/xray/results/{id}', [XrayController::class, 'storeResults'])->name('xray.results.store');
Route::get('/doctor/xray-results', [XrayController::class, 'resultsList'])->name('doctor.xray.results.list');
Route::get('/doctor/xray-results/{xrayRequest}', [XrayController::class, 'showResults'])->name('doctor.xray.results.show');
Route::post('/xray/send/{patient}', [XrayController::class, 'sendRequest'])->name('xray.send.request');