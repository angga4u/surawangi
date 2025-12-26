
// HALAMAN BERANDA
Route::get('/', [NewsController::class, 'index'])->name('home');

// HALAMAN PROFIL
Route::get('/profil', [PageController::class, 'profile'])->name('profile.index');

// Daftar berita berdasarkan kategori (pakai slug)
Route::get('/berita/{category:slug}', [NewsController::class, 'category'])->name('news.index');

// Detail berita berdasarkan kategori + slug berita
Route::get('/berita/{category:slug}/{slug}', [NewsController::class, 'show'])->name('news.show');

// Form aspirasi untuk masyarakat
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');

// Proses simpan aspirasi
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');

// Halaman admin/DPRD melihat semua aspirasi
Route::get('/aspirasi/list', [AspirasiController::class, 'list'])->name('aspirasi.list');

// Hapus aspirasi
Route::delete('/aspirasi/{id}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
