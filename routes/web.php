<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkmController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\akunController;
use App\Http\Controllers\authController;
use App\Http\Controllers\LangController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\depanController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\alumniController;
use App\Http\Controllers\dosen2Controller;
use App\Http\Controllers\galeriController;
use App\Http\Controllers\jurnalController;
use App\Http\Controllers\posisiController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\akademikController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\informasiController;
use App\Http\Controllers\kerjaSamaController;
use App\Http\Controllers\legalisirController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\pengabdianController;
use App\Http\Controllers\programKimiaController;
use App\Http\Controllers\profileMahasiswaController;
use App\Http\Controllers\profileMahasiswa2Controller;
use App\Http\Controllers\tenagaKependidikanController;
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

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, config('app.locales'))) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
    }
    return back();
});


Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::get('/', [depanController::class, "index"])->name('depan.index');
Route::prefix('lembaga')->group(
    function(){
        Route::get('/', [depanController::class, "lembaga"])->name('depan.lembaga');
        Route::get('/visimisi', [depanController::class, "visimisi"])->name('depan.lembaga.visimisi');
        Route::get('/struktur', [depanController::class, "struktur"])->name('depan.lembaga.struktur');
        Route::get('/staff', [depanController::class, "staff"])->name('depan.lembaga.staff');
        Route::get('/staffDetail/{id}', [depanController::class, "staffDetail"])->name('depan.lembaga.staffdetail');
        Route::get('/fasilitas', [depanController::class, "fasilitas"])->name('depan.lembaga.fasilitas');
    }
);
Route::prefix('akademik')->group(
    function(){
        Route::get('/', [depanController::class, "akademik"])->name('depan.akademik');
        Route::get('/akademikDetail/{id}', [depanController::class, "akademikDetail"])->name('depan.akademik.detail');
        Route::get('/PedomanAkademik', [depanController::class, "akademikPedoman"])->name('depan.akademik.pedoman');
        Route::get('/VisitingProfesor', [depanController::class, "akademikVisiting"])->name('depan.akademik.visiting');
        Route::get('/Module', [depanController::class, "akademikModule"])->name('depan.akademik.module');
        Route::get('/PenerimaanMahasiswa', [depanController::class, "akademikPenerimaan"])->name('depan.akademik.penerimaan');
        Route::get('/SummerSchool', [depanController::class, "akademikSummer"])->name('depan.akademik.summer');
        Route::get('/TracerStudy', [depanController::class, "akademikTracer"])->name('depan.akademik.tracer');
        Route::get('/MBKM', [depanController::class, "akademikMBKM"])->name('depan.akademik.mbkm');
        Route::get('/LearningManagementSystem', [depanController::class, "akademikLearning"])->name('depan.akademik.learning');
        Route::get('/SurveyKepuasanMahasiswa', [depanController::class, "akademikSurvey"])->name('depan.akademik.survey');
    
    }
);
Route::prefix('riset')->group(
    function(){
        Route::get('/', [depanController::class, "riset"])->name('depan.riset');
        Route::get('riset/{id}', [depanController::class, "risetDetail"])->name('depan.riset.detail');
    }
);
Route::get('/pengabdian', [depanController::class, "pengabdian"])->name('depan.pengabdian');
Route::get('/pengabdianDetail/{id}', [depanController::class, "pengabdianDetail"])->name('depan.pengabdian.detail');
Route::get('/jurnal', [depanController::class, "jurnal"])->name('depan.jurnal');
Route::prefix('mahasiswa')->group(
    function(){
        Route::get('/', [depanController::class, "mahasiswa"])->name('depan.mahasiswa');
        Route::get('/mahasiswaDetail/{id}', [depanController::class, "mahasiswaDetail"])->name('depan.mahasiswa.detail');
        Route::get('/alumniDetail/{id}', [depanController::class, "alumniDetail"])->name('depan.mahasiswa.alumnidetail');
        Route::get('/pkmDetail/{id}', [depanController::class, "pkmDetail"])->name('depan.mahasiswa.pkmdetail');
        Route::get('/bemhmk', [depanController::class, "mahasiswaBemHmk"])->name('depan.mahasiswa.bemhmk');
        Route::get('/kegiatan&prestasi', [depanController::class, "mahasiswaKegiatanPrestasi"])->name('depan.mahasiswa.kegiatan&prestasi');
        Route::get('/pkm', [depanController::class, "mahasiswaPKM"])->name('depan.mahasiswa.pkm');
       
    }
);

Route::prefix('alumni')->group(
    function(){
        Route::get('/', [depanController::class, "alumni"])->name('depan.alumni');
        Route::get('/legalisirIjazah', [depanController::class, "alumniLegalisir"])->name('depan.alumni.legalisir');
        Route::get('/portal', [depanController::class, "alumniPortal"])->name('depan.alumni.portal');
    }
);

Route::get('/beasiswa', [depanController::class, "beasiswa"])->name('depan.beasiswa');

Route::prefix('informasi')->group(
    function(){
        Route::get('/berita', [depanController::class, "informasiBerita"])->name('depan.informasi.berita');
        Route::get('/agenda', [depanController::class, "informasiAgenda"])->name('depan.informasi.agenda');  
        Route::get('/kegiatan', [depanController::class, "informasiKegiatan"])->name('depan.informasi.kegiatan');        
        Route::get('/pengumuman', [depanController::class, "informasiPengumuman"])->name('depan.informasi.pengumuman');        
        Route::get('/sistem', [depanController::class, "informasiSistem"])->name('depan.informasi.sistem');   
        Route::get('/detail/{id}', [depanController::class, "informasiDetail"])->name('depan.informasi.detail');        
    }
);

Route::redirect('home', 'dashboard');
Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');

Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
 
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');

Route::get('auth/logout', [authController::class, "logout"]);

Route::prefix('dashboard')->middleware('auth', 'role:Super Admin')->group(
    function(){
        Route::get('/', [profileController::class, 'index']);
        Route::resource('akun', akunController::class);    
        Route::resource('informasi', informasiController::class);    
        Route::resource('dosen', dosenController::class);  
        Route::resource('tenagaKependidikan', tenagaKependidikanController::class);  
        Route::get('prodi', [profileController::class, "index"])->name('prodi.index');
        Route::post('prodi', [profileController::class, "update"])->name('prodi.update');
        Route::resource('fasilitas', fasilitasController::class);    
        Route::resource('pengabdian', pengabdianController::class);    
        Route::resource('akademik', akademikController::class);    
        Route::resource('programKimia', programKimiaController::class);    
        Route::resource('jurnal', jurnalController::class);    
        Route::resource('mahasiswa', mahasiswaController::class);    
        Route::resource('alumni', alumniController::class);    
        Route::resource('posisi', posisiController::class); 
        Route::resource('galeri', galeriController::class); 
        Route::get('legalisir', [legalisirController::class, "index"])->name('legalisir.index');
        Route::post('legalisir', [legalisirController::class, "update"])->name('legalisir.update');
        Route::get('kerjaSama', [kerjaSamaController::class, "index"])->name('kerjaSama.index');
        Route::post('kerjaSama', [kerjaSamaController::class, "update"])->name('kerjaSama.update');
        Route::get('profileMahasiswa', [profileMahasiswaController::class, "index"])->name('profileMahasiswa.index');
        Route::post('profileMahasiswa', [profileMahasiswaController::class, "update"])->name('profileMahasiswa.update');
        Route::get('staff', [staffController::class, "index"])->name('staff.index');
        Route::post('staff', [staffController::class, "update"])->name('staff.update');
        Route::resource('pkm', pkmController::class);    
    }
);
Route::prefix('dashboardMahasiswa')->middleware('auth', 'role:Mahasiswa')->group(
    function(){
        Route::get('/', [profileMahasiswa2Controller::class, 'index']);
        Route::get('profileHMK', [profileMahasiswa2Controller::class, "index"])->name('profileHMK.index');
        Route::post('profileHMK', [profileMahasiswa2Controller::class, "update"])->name('profileHMK.update');
    }
);

Route::prefix('dashboardDosen')->middleware('auth', 'role:Dosen')->group(
    function(){
        Route::get('/', [dosen2Controller::class, 'index']);
        Route::resource('dataDosen', dosen2Controller::class);  
    }
);
