<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Jenis_MitraController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\TahunAkademiksController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('pages.auth.login');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('home', function () {
//         return view('pages.dashboard');
//     })->name('home');
//     Route::resource('users', UserController::class);
// });

/* -------------------------------------------------------------------------- */
/*                               Frontend Routes                              */
/* -------------------------------------------------------------------------- */

/* ------------------------------ Landing Page ------------------------------ */

Route::get('/', function () {
    return view('pages.frontend.index');
});

Route::get('/tracer', function () {
    return view('pages.frontend.index_tracer');
});

/* ----------------------------- News Page ------------------------------ */
Route::get('/news', function () {
    return view('pages.frontend.news');
});

Route::get('/news_post', function () {
    return view('pages.frontend.news_post');
});

/* ------------------------------- About Page ------------------------------- */
// Route::get('/ucicKarir', function () {
//     return view('pages.frontend.ucic_karir');
// });

/* ------------------------------- Lowongan Kerja Page -------------------------------- */
Route::get('/loker', function () {
    return view('pages.frontend.loker');
});

Route::get('/loker_post', function () {
    return view('pages.frontend.loker_post');
});

Route::get('/', function () {
    return view('pages.frontend.index');
});

/* ------------------------------- Lowongan Magang Page -------------------------------- */
Route::get('/mitra', function () {
    return view('pages.frontend.mitra');
});

Route::get('/magang_post', function () {
    return view('pages.frontend.magang_post');
});

/* ------------------------------- Career Clas & Alumni Sharing Page -------------------------------- */
Route::get('/class', function () {
    return view('pages.frontend.class');
});

Route::get('/class_post', function () {
    return view('pages.frontend.class_post');
});

/* -------------------------------------------------------------------------- */
/*                               Backend Routes                              */
/* -------------------------------------------------------------------------- */
Route::get('/', 'App\Http\Controllers\WebController@index');
// Route::get('/article/{slug}', 'App\Http\Controllers\WebController@show');
Route::get('/article/{slug}', [WebController::class, 'show'])->name('article.show');
// Route::get('/{slug_kategori}/{slug_artikel}', 'App\Http\Controllers\WebController@show');

Route::get('dashboard/login', function () {
    return view('pages.backend.auth.login');
});

// Route::middleware(['auth'])->group(function () {

//     Route::get('home', function () {
//         return view('pages.backend.dashboard');
//     })->name('home');
    
//     Route::resource('users', UserController::class);
// });

Route::middleware(['auth'])->group(function () {
    Route::get('home', [DashboardController::class, 'admin'])->name('home');
    // return view('pages.backend.dashboard');
    Route::resource('users', UserController::class);
});

Route::resource('dashboard/user', UserController::class);

// Route::get('user/create', 'App\Http\Controllers\UserController@create')->name('createpengguna');
Route::get('/lowongan', 'App\Http\Controllers\LowonganController@show'); 
Route::get('/loker', 'App\Http\Controllers\LowonganController@index'); 
Route::get('loker/create', [LowonganController::class, 'create'])->name('lowongan.create');
Route::post('/loker', [LowonganController::class, 'store'])->name('lowongan.store');
Route::get('/loker_post/{id}', [LowonganController::class, 'lokerpost'])->name('lokerpost');
Route::get('loker/{loker}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
Route::put('loker/{loker}', [LowonganController::class, 'update'])->name('lowongan.update');
Route::delete('loker/{loker}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');

Route::get('/partner', [MitraController::class, 'show']); 
Route::get('/mitra', [MitraController::class, 'index']); 
Route::get('mitra/create', [MitraController::class, 'create']);
Route::post('/mitra', [MitraController::class, 'store']);
Route::delete('/mitra/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy');

Route::get('mitra/{mitra}/edit', [MitraController::class, 'edit'])->name('mitra.edit');
Route::put('mitra/{mitra}', [MitraController::class, 'update'])->name('mitra.update');

Route::get('/jenis', [Jenis_MitraController::class, 'index']);
Route::get('jenis/create', [Jenis_MitraController::class, 'create'])->name('jenis.create');
Route::post('/jenis', [Jenis_MitraController::class, 'store']);
Route::put('/jenis/{id}','App\Http\Controllers\Jenis_MitraController@update');
Route::get('/jenis/jenis/{id}', [Jenis_MitraController::class, 'edit'])->name('jenis.edit');
Route::put('jenis/{jenis}', [Jenis_MitraController::class, 'update'])->name('jenis.update');
Route::delete('/jenis/{id}', [Jenis_MitraController::class, 'destroy'])->name('jenis.destroy');
// Route::get('/jenis', [Jenis_MitraController::class, 'store']); 
// Route::get('/jenis/edit/{id}','App\Http\Controllers\Jenis_MitraController@edit');

/* ------------------------------- Publikasi 1 : Berita -------------------------------- */
Route::resource('dashboard/kategori', CategoryController::class);
Route::resource('dashboard/artikel', 'App\Http\Controllers\ArtikelController');
Route::delete('/articles/{id}', 'App\Http\Controllers\ArtikelController@destroy')->name('articles.destroy');
// Route::resource('/question', 'App\Http\Controllers\QuestionController');
Route::resource('/bobot_nilai', 'App\Http\Controllers\BobotNilaiController');

// Route::resource('/result', 'App\Http\Controllers\ResultController');
Route::get('/hasil', [ResultController::class, 'index'])->name('pusatkarir.hasil_penilaian');
Route::get('hasil_penilaian/{result}', [ResultController::class, 'show_mahasiswa'])->name('pusatkarir.hasil_penilaian.show');
Route::delete('/hasil_penilaian_destroy/{result_id}', [ResultController::class, 'destroy_mahasiswa'])->name('pusatkarir.hasil_penilaian.destroy');

// Route::resource('/semester', 'App\Http\Controllers\SemesterController');
// Route::resource('/type', 'App\Http\Controllers\OptionController');
// Route::get('type/{question_id}', [OptionController::class, 'show'])->name('type.jawaban_pertanyaan');;

// About
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
Route::post('about', [AboutController::class, 'store'])->name('about.store');
Route::get('about/{about}/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('about/{about}', [AboutController::class, 'update'])->name('about.update');
Route::delete('about/{about}', [AboutController::class, 'destroy'])->name('about.destroy');
Route::get('/tentang', [AboutController::class, 'show']); 

// Semester
Route::get('semester', [SemestersController::class, 'index'])->name('semester');
Route::get('semester/create', [SemestersController::class, 'create'])->name('semester.create');
Route::post('semester', [SemestersController::class, 'store'])->name('semester.store');
Route::get('semester/{semester}/edit', [SemestersController::class, 'edit'])->name('semester.edit');
Route::put('semester/{semester}', [SemestersController::class, 'update'])->name('semester.update');
Route::delete('/semester/{id}', [SemestersController::class, 'destroy'])->name('semester.destroy');

// Tahun 
Route::get('tahun', [TahunAkademiksController::class, 'index'])->name('tahun');
Route::get('tahun/create', [TahunAkademiksController::class, 'create'])->name('tahun.create');
Route::post('tahun', [TahunAkademiksController::class, 'store'])->name('tahun.store');
Route::get('tahun/{tahun}/edit', [TahunAkademiksController::class, 'edit'])->name('tahun.edit');
Route::put('tahun/{tahun}', [TahunAkademiksController::class, 'update'])->name('tahun.update');
Route::delete('tahun/{tahun}', [TahunAkademiksController::class, 'destroy'])->name('tahun.destroy');

// Pertanyaan 
Route::get('question', [QuestionsController::class, 'index'])->name('question');
Route::get('question/create', [QuestionsController::class, 'create'])->name('question.create');
Route::post('question', [QuestionsController::class, 'store'])->name('question.store');
Route::get('question/{question}/edit', [QuestionsController::class, 'edit'])->name('question.edit');
Route::put('question/{question}', [QuestionsController::class, 'update'])->name('question.update');
Route::delete('question/{question}', [QuestionsController::class, 'destroy'])->name('question.destroy');
Route::delete('question_mass_destroy', [QuestionsController::class, 'massDestroy'])->name('question.mass_destroy');

// ================================== DATA OPTION=============================
// Jawaban
Route::get('jawaban', [OptionController::class, 'index'])->name('admin.jawaban');
Route::get('jawaban/create', [OptionController::class, 'create'])->name('admin.jawaban.create');
Route::post('jawaban', [OptionController::class, 'store'])->name('admin.jawaban.store');
Route::get('jawaban/{jawaban}/edit', [OptionController::class, 'edit'])->name('admin.jawaban.edit');
Route::put('jawaban/{jawaban}', [OptionController::class, 'update'])->name('admin.jawaban.update');
Route::delete('jawaban/{jawaban}', [OptionController::class, 'destroy'])->name('admin.jawaban.destroy');

// Jawaban Pertanyaan
Route::get('jawaban_pertanyaan/{question}', [OptionsController::class, 'index'])->name('type.jawaban_pertanyaan');
Route::get('jawaban_pertanyaan/create/{question}', [OptionsController::class, 'create'])->name('jawaban_pertanyaan.create');
Route::post('jawaban_pertanyaan', [OptionsController::class, 'store'])->name('jawaban_pertanyaan.store');
Route::get('jawaban_pertanyaan/{jawaban}/edit', [OptionsController::class, 'edit'])->name('jawaban_pertanyaan.edit');
Route::put('jawaban_pertanyaan/{jawaban}', [OptionsController::class, 'update'])->name('jawaban_pertanyaan.update');
Route::delete('jawaban_pertanyaan/{jawaban}', [OptionsController::class, 'destroy'])->name('jawaban_pertanyaan.destroy');

// ================================== TRACER STUDY =============================
// Route::get('tracer', [TestController::class, 'index_alumni'])->name('alumni.tracer');
Route::get('tracer/create/', [TestController::class, 'create_alumni'])->name('alumni.tracer.create');
Route::post('tracer', [TestController::class, 'store_alumni'])->name('alumni.tracer.store');
Route::get('tracer', [TestController::class, 'index'])->name('alumni.tracer');

// Route::post('/type', [OptionController::class, 'store']);
// Route::post('/question', [QuestionController::class, 'store']);
// Route::post('/semester', [SemesterController::class, 'store']);
// Route::get('/question/create', 'App\Http\Controllers\QuestionController@create');

Route::get('/news', 'App\Http\Controllers\NewsController@index');
Route::get('/{slug_kategori}', 'App\Http\Controllers\NewsController@articleByCategory');
Route::get('/{slug_kategori}/{slug_artikel}', 'App\Http\Controllers\NewsController@single');