<?php

use App\Http\Controllers\ApotekerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController as Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerService\DashboardController as CustomerServiceDashboardController;
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\Apoteker\DashboardController as ApotekerDashboardController;
use App\Http\Controllers\CustomerService\PatientController as CustomerServicePatientController;
use App\Http\Controllers\Dokter\PatientController as DokterPatientController;
use App\Http\Controllers\Apoteker\PatientController as ApotekerPatientController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

// TODO: Home --

Route::get('/', [Auth::class, 'create']);

// TODO: Home --

// Route::get('/login', function() {
//     return view('auth.login');
// })->name('login')->middleware('guest');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');



// TODO: Profil --
Route::get('profil/data', function () {
    return view('profil.data');
})->name('profil.data');

// Route::get('profil/UbahPassword', function () {
//     return view('profil.ubahPassword');
// })->name('profil.ubahPassword');

Route::get('/profil/edit/password', [UserController::class, 'editPassword'])->name('profil.editPassword');
Route::put('/profil/update/password', [UserController::class, 'updatePassword'])->name('profil.updatePassword');



// ? Role Admin --

Route::get('/ayam', [PatientController::class, 'index']);

Route::group(['middleware' => ['auth', 'role:admin',]], function () {
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin.dashboard');



    // TODO: Poly --

    Route::get('/polys/create', [PolyController::class, 'create'])
        ->name('polys.create');

    Route::post('/polys/store', [PolyController::class, 'store'])
        ->name('polys.store');

    Route::get('/polys/index', [PolyController::class, 'index'])
        ->name('polys.index');

    Route::get('/polys/{poly}', [PolyController::class, 'show'])
        ->name('polys.show');

    Route::get('/polys/{poly}/edit', [PolyController::class, 'edit'])
        ->name('polys.edit');

    Route::put('/polys/{poly}', [PolyController::class, 'update'])
        ->name('polys.update');

    Route::delete('/polys/{poly}', [PolyController::class, 'destroy'])
        ->name('polys.destroy');

    // TODO: Poly --




    // TODO: Doctors --

    Route::get('/doctors/create', [DoctorController::class, 'create'])
        ->name('doctors.create');

    Route::post('/doctors/store', [DoctorController::class, 'store'])
        ->name('doctors.store');

    Route::get('/doctors/index', [DoctorController::class, 'index'])
        ->name('doctors.index');

    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])
        ->name('doctors.show');

    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])
        ->name('doctors.edit');

    Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])
        ->name('doctors.update');

    Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])
        ->name('doctors.destroy');


    // TODO: Doctors --




    // TODO: Laporan --

    Route::get('/admin/laporan', [HomeController::class, 'laporan']);
    Route::get('/laporan/excel', [HomeController::class, 'export'])->name('laporan.excel');
    Route::get('/admin/laporan', [HomeController::class, 'laporan']);

    Route::get('/admin/patients/index', [HomeController::class, 'index'])
        ->name('admin.patients.index');

    // TODO: Laproan --
});

// ? Role Admin --




// ? Role Dokter --

Route::group(['middleware' => ['auth', 'role:dokter'], 'prefix' => 'dokter', 'as' => 'dokter.'], function () {
    Route::get('/', [DokterDashboardController::class, 'index'])->name('dashboard');

    Route::get('patients/data', [DokterPatientController::class, 'data'])
        ->name('patients.data');
    Route::resource('patients', DokterPatientController::class);

    Route::get('history', [DoctorController::class, 'history']);
    Route::get('/dokter/cari', [DokterPatientController::class, 'data'])->name('search');
    Route::get('/dokter/cariResep', [DokterPatientController::class, 'index'])->name('search_resep');
    Route::get('/dokter/show2/{patient}', [DokterPatientController::class, 'show2'])
        ->name('patients.show2');
});

// ? Role Dokter --




// ? Role Apoteker --

Route::group(['middleware' => ['auth', 'role:apoteker'], 'prefix' => 'apoteker'], function () {
    Route::get('/', [ApotekerDashboardController::class, 'index'])->name('apoteker.dashboard');

    Route::get('/apoteker/patients/index', [ApotekerPatientController::class, 'index'])
        ->name('apoteker.patients.index');

    Route::get('/apoteker/patients/kelola', [ApotekerPatientController::class, 'kelola']);

    Route::get('/apoteker/history', [ApotekerController::class, 'history'])
        ->name('apoteker.patients.history');
    Route::post('/apoteker/status/{patient}', [ApotekerPatientController::class, 'gantiStatus'])->name('ganti.status');
    Route::get('/patientss/{patient}', [ApotekerPatientController::class, 'kelola'])->name('kelola.patients.show');

    Route::get('/apoteker/cari', [ApotekerPatientController::class, 'index'])->name('search');
    Route::get('/apoteker/history/cari', [ApotekerController::class, 'history'])->name('apoteker.search');


    Route::get('/apoteker/show/{patient}', [ApotekerPatientController::class, 'show'])
        ->name('apoteker.patients.show');

    Route::get('/apoteker/show/{patient}', [ApotekerPatientController::class, 'show'])
        ->name('apoteker.patients.show');
});

// ? Role Apoteker --




// TODO: Users --

Route::get('user_doctor/create', [UserController::class, 'create'])
    ->name('users_doctor.create');

Route::post('user_doctor/store', [UserController::class, 'store'])
    ->name('users_doctor.store');

Route::get('user_doctor/index', [UserController::class, 'index'])
    ->name('users_doctor.index');

Route::post('user_doctor/{user}', [UserController::class, 'show'])
    ->name('users_doctor.show');

Route::delete('user_doctor/{user}', [UserController::class, 'destroy'])
    ->name('users_doctor.destroy');

// TODO: Users --




// ? Role Customer Service (CS) --

Route::group(['middleware' => ['auth', 'role:cs'], 'prefix' => 'customer-service', 'as' => 'cs.'], function () {
    Route::get('/', [CustomerServiceDashboardController::class, 'index'])->name('dashboard');

    Route::resource('patients', CustomerServicePatientController::class);

    // Route::delete('/patients/{patient}', [CustomerServicePatientController::class, 'destroy'])
    //     ->name('patients.destroy');

    Route::get('history', [DoctorController::class, 'history']);

    Route::get('/cs/cari', [CustomerServicePatientController::class, 'index'])->name('search');
});

// ? Role Customer Service (CS) --
