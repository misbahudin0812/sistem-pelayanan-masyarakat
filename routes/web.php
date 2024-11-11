<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\ProfileDesaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(PageController::class)->group(function(){
    Route::get('/', 'beranda')->name('home');
    Route::get('/profile-desa', 'profile')->name('profile-desa');
    Route::get('/visi-misi-desa', 'visimisi')->name('visi-misi-desa');
    Route::get('/perangkat-desa', 'staff')->name('perangkat-desa');
    Route::get('/informasi-desa', 'informasi')->name('informasi-desa');
    Route::get('/informasi-desa/{id}', 'informasidetail')->name('informasi-detail');
});

Route::controller(PengaduanController::class)->group(function(){
    Route::get('/lapor', 'index')->name('lapor');
    Route::get('/lapor/tambah', 'create')->name('tambah-laporan');
    Route::post('/lapor/tambah', 'store')->name('tambah.pengaduan');
})->middleware(['auth']);

Route::controller(SuratController::class)->group(function(){
    Route::get('/surat', 'index')->name('surat');
    Route::get('/surat/tambah', 'create')->name('tambah-surat');
    Route::post('/surat/tambah', 'store')->name('tambah.surat');
    Route::get('/surat/download', 'listdownload')->name('download-surat');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    $user = Auth::user();
    if($user->role == 'admin'){
        return redirect()->route('admin');
    }else{
        return redirect()->route('home');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function (){
        Route::get('/', function () {
            $user = Auth::user();
            return view('admin.dashboard', ['user' => $user]);
        })->name('admin');

        Route::prefix('masyarakat')->group(function (){
            Route::get('/', [MasyarakatController::class, 'create'])->name('admin.masyarakat');
            Route::get('/tambah', [MasyarakatController::class, 'add'])->name('tambah.masyarakat');
            Route::post('/tambah', [MasyarakatController::class, 'store'])->name('tambah.masyarakat');
            Route::get('/edit/{id}', [MasyarakatController::class, 'edit'])->name('edit.masyarakat');
            Route::patch('/edit/{id}', [MasyarakatController::class, 'update'])->name('update.masyarakat');
            Route::delete('/hapus/{id}', [MasyarakatController::class, 'destroy'])->name('hapus.masyarakat');
        });
        Route::prefix('profile')->group(function (){
            Route::get('/', [ProfileDesaController::class, 'create'])->name('admin.profile');
            Route::get('/tambah', [ProfileDesaController::class, 'add'])->name('tambah.profile');
            Route::post('/tambah', [ProfileDesaController::class, 'store'])->name('tambah.profile');
            Route::get('/edit/{id}', [ProfileDesaController::class, 'edit'])->name('edit.profile');
            Route::patch('/edit/{id}', [ProfileDesaController::class, 'update'])->name('update.profile');
            Route::delete('/hapus/{id}', [ProfileDesaController::class, 'destroy'])->name('hapus.profile');
        });
        Route::prefix('bagan')->group(function (){
            Route::get('/', [StaffController::class, 'create'])->name('admin.bagan');
            Route::get('/tambah', [StaffController::class, 'add'])->name('tambah.bagan');
            Route::post('/tambah', [StaffController::class, 'store'])->name('tambah.bagan');
            Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('edit.bagan');
            Route::patch('/edit/{id}', [StaffController::class, 'update'])->name('update.bagan');
            Route::delete('/hapus/{id}', [StaffController::class, 'destroy'])->name('hapus.bagan');
        });
        Route::prefix('informasi')->group(function (){
            Route::get('/', [InformasiController::class, 'create'])->name('admin.informasi');
            Route::get('/tambah', [InformasiController::class, 'add'])->name('tambah.informasi');
            Route::post('/tambah', [InformasiController::class, 'store'])->name('tambah.informasi');
            Route::get('/edit/{id}', [InformasiController::class, 'edit'])->name('edit.informasi');
            Route::patch('/edit/{id}', [InformasiController::class, 'update'])->name('update.informasi');
            Route::delete('/hapus/{id}', [InformasiController::class, 'destroy'])->name('hapus.informasi');
        });
        Route::prefix('pengaduan')->group(function(){
            Route::get('/', [PengaduanController::class, 'pengaduanadmin'])->name('admin.pengaduan');
            Route::get('/ganti-status/{id}/{status}', [PengaduanController::class, 'gantistatus'])->name('ganti.pengaduan');
        });
        Route::prefix('surat')->group(function(){
            Route::get('/', [SuratController::class, 'suratadmin'])->name('admin.surat');
            Route::get('/cetak/{id}', [SuratController::class, 'cetaksurat'])->name('cetak-surat');
            Route::patch('/ganti-status/{id}', [SuratController::class, 'gantistatus'])->name('update.surat');
        });
        Route::get('/cetak-laporan', function () {
            return view('admin.cetak-laporan');
        })->name('admin.cetak-laporan');
    });
});


require __DIR__.'/auth.php';
