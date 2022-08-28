<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/AuthLogin', [App\Http\Controllers\BackEnd\AuthController::class, 'index'])->name('AuthLogin');
Route::post('/ActionLogin', [App\Http\Controllers\BackEnd\AuthController::class, 'actionLogin'])->name('ActionLogin');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/login', [App\Http\Controllers\IndexController::class, 'login'])->name('login');
Route::get('/regis', [App\Http\Controllers\IndexController::class, 'regis'])->name('regis');
Route::get('/tender', [App\Http\Controllers\IndexController::class, 'tender'])->name('tender');
Route::get('/contact', [App\Http\Controllers\IndexController::class, 'contact'])->name('contact');
Route::get('/activity', [App\Http\Controllers\IndexController::class, 'activity'])->name('activity');
Route::get('/news', [App\Http\Controllers\IndexController::class, 'news'])->name('news');
Route::get('/biodata/{id}', [App\Http\Controllers\IndexController::class, 'biodata'])->name('biodata');
Route::get('/dokumen/{data}', [App\Http\Controllers\IndexController::class, 'dokumen'])->name('dokumen');

Route::post('/actionAuth', [App\Http\Controllers\UtilityController::class, 'actionAuth'])->name('actionAuth');
Route::post('/regAuth', [App\Http\Controllers\UtilityController::class, 'regAuth'])->name('regAuth');
Route::post('/uploadDokumen', [App\Http\Controllers\UtilityController::class, 'uploadDokumen'])->name('uploadDokumen');
Route::put('/updateData/{id}', [App\Http\Controllers\UtilityController::class, 'updateData'])->name('updateData');

Route::group(['middleware' => ['is_role:1']], function () {
    Route::get('/superadmin', [App\Http\Controllers\superadmin\SuperAdminController::class, 'index'])->name('superadmin.index');

    Route::get('/user', [App\Http\Controllers\superadmin\SuperAdminController::class, 'userApp'])->name('superadmin.user.index');
    Route::get('/create_user', [App\Http\Controllers\superadmin\UserController::class, 'create'])->name('superadmin.user.create');
    Route::post('/store_user', [App\Http\Controllers\superadmin\UserController::class, 'store'])->name('superadmin.user.store');
    Route::get('/edit_user/{id}', [App\Http\Controllers\superadmin\UserController::class, 'edit'])->name('superadmin.user.edit');
    Route::post('/update_user/{id}', [App\Http\Controllers\superadmin\UserController::class, 'update'])->name('superadmin.user.update');

    Route::get('/vendors', [App\Http\Controllers\superadmin\SuperAdminController::class, 'vendorApp'])->name('superadmin.vendors.index');
    Route::get('/detail_vendor/{id}', [App\Http\Controllers\superadmin\VendorController::class, 'show'])->name('superadmin.vendors.detail');

    Route::get('/downloadNpwp/{npwp}', [App\Http\Controllers\superadmin\VendorController::class, 'downloadDokumenNPWP'])->name('superadmin.npwp.download');
    Route::get('/downloadAkta/{akta}', [App\Http\Controllers\superadmin\VendorController::class, 'downloadDokumenAkta'])->name('superadmin.akta.download');
    Route::get('/downloadUsaha/{induk}', [App\Http\Controllers\superadmin\VendorController::class, 'downloadDokumenIndukUsaha'])->name('superadmin.usaha.download');
    Route::get('/downloadPendaftaran/{daftar}', [App\Http\Controllers\superadmin\VendorController::class, 'downloadDokumenPendaftaran'])->name('superadmin.pendaftaran.download');
    Route::get('/downloadDokumenPernyataan/{perynataan}', [App\Http\Controllers\superadmin\VendorController::class, 'downloadDokumenPernyataan'])->name('superadmin.pernyataan.download');
    Route::get('/downloadDokumenImage/{image}', [App\Http\Controllers\superadmin\VendorController::class, 'downloadDokumenImage'])->name('superadmin.image.download');


    Route::get('/tenders', [App\Http\Controllers\superadmin\SuperAdminController::class, 'tenderList'])->name('superadmin.tender.index');
    Route::get('/create_tender', [App\Http\Controllers\superadmin\TenderController::class, 'create'])->name('superadmin.tender.create');
    Route::post('/post_tender', [App\Http\Controllers\superadmin\TenderController::class, 'store'])->name('superadmin.tender.store');
    Route::get('/detail_tender/{id}', [App\Http\Controllers\superadmin\TenderController::class, 'show'])->name('superadmin.tender.detail');
});

Route::group(['middleware' => ['is_role:2']], function () {
    Route::get('/admin', [App\Http\Controllers\admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/pengguna', [App\Http\Controllers\admin\AdminController::class, 'listTender'])->name('admin.penyedia.index');
    Route::get('/validasi/{id_user}', [App\Http\Controllers\admin\AdminController::class, 'validasi'])->name('admin.penyedia.validate');
    Route::get('/update/{id_user}', [App\Http\Controllers\admin\AdminController::class, 'updateUser'])->name('admin.penyedia.edit');
    Route::get('/preview/{id}', [App\Http\Controllers\admin\AdminController::class, 'preview'])->name('admin.penyedia.preview');
    Route::get('/download/{npwp}', [App\Http\Controllers\admin\AdminController::class, 'download'])->name('admin.penyedia.download');
    Route::post('/sendEmail/{id}', [App\Http\Controllers\admin\AdminController::class, 'sendEmail'])->name('admin.penyedia.sendEmail');
});

Route::group(['middleware' => ['is_role:3']], function () {
    Route::get('/penyedia', [App\Http\Controllers\penyedia\PenyediaController::class, 'index'])->name('penyedia.index');
});
