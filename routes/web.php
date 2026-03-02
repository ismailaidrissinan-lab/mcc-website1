<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\ProjectController;
use App\Http\Controllers\Public\SectorController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gmd-message', [PageController::class, 'gmd'])->name('gmd');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/awards', [PageController::class, 'awards'])->name('awards');
Route::get('/talent-development', [PageController::class, 'training'])->name('training');
Route::get('/expertise', [PageController::class, 'services'])->name('services');
Route::get('/insights', [\App\Http\Controllers\Public\ArticleController::class, 'index'])->name('articles.index');
Route::get('/insights/{slug}', [\App\Http\Controllers\Public\ArticleController::class, 'show'])->name('articles.show');
Route::get('/community-impact', [PageController::class, 'csr'])->name('csr');
Route::get('/community-impact/{slug}', [PageController::class, 'csrShow'])->name('csr.show');
Route::get('/investor-relations', [PageController::class, 'investors'])->name('investors');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
});

Route::get('/sectors/{sector:slug}', [SectorController::class, 'show'])->name('sectors.show');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'zh'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Authentication Routes
use App\Http\Controllers\Auth\LoginController;
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SectorController as AdminSectorController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Project Batch & Image management
    Route::delete('/projects/bulk-delete', [\App\Http\Controllers\Admin\ProjectController::class, 'bulkDestroy'])->name('projects.bulk-destroy');
    Route::get('projects/export', [AdminProjectController::class, 'export'])->name('projects.export');
    Route::get('projects/import', [AdminProjectController::class, 'import'])->name('projects.import');
    Route::post('projects/import', [AdminProjectController::class, 'processImport'])->name('projects.import.process');
    Route::delete('projects/images/{image}', [AdminProjectController::class, 'destroyImage'])->name('projects.images.destroy');

    Route::resource('projects', AdminProjectController::class);
    Route::resource('sectors', AdminSectorController::class);
    Route::resource('awards', \App\Http\Controllers\Admin\AwardController::class);
    Route::resource('training', \App\Http\Controllers\Admin\TrainingController::class);
    Route::delete('articles/images/{image}', [\App\Http\Controllers\Admin\ArticleController::class, 'destroyImage'])->name('articles.images.destroy');
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
    Route::resource('csr', \App\Http\Controllers\Admin\CsrProjectController::class);
    Route::resource('investors', \App\Http\Controllers\Admin\InvestorDocumentController::class);
    Route::resource('jobs', \App\Http\Controllers\Admin\JobPostingController::class);
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
});

// Fallback route for Laravel Cloud to serve public storage files bypassing Nginx storage blocks
Route::get('/system-assets/{path}', function ($path) {
    if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
        return \Illuminate\Support\Facades\Storage::disk('public')->response($path);
    }

    // Fallback: check local disk in case files were stored there by default
    if (\Illuminate\Support\Facades\Storage::disk('local')->exists($path)) {
        return \Illuminate\Support\Facades\Storage::disk('local')->response($path);
    }

    abort(404, "File not found: " . $path);
})->where('path', '.*');

Route::get('/debug-storage', function() {
    return response()->json([
        'default_disk' => config('filesystems.default'),
        'public_path_defined' => public_path('storage'),
        'public_disk_root' => config('filesystems.disks.public.root'),
        'sector_files_public' => \Illuminate\Support\Facades\Storage::disk('public')->files('sectors'),
        'sector_files_default' => \Illuminate\Support\Facades\Storage::files('sectors'),
        'project_files_public' => \Illuminate\Support\Facades\Storage::disk('public')->files('projects'),
        'db_sectors' => \App\Models\Sector::select('id', 'name', 'image_path')->get()
    ]);
});

