<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReportController;

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


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // Untuk menampilkan view page user
    Route::post('/view', [UserController::class, 'ListUserindex'])->name('users.list'); // Untuk menampilkan daftar user
    Route::get('/create', [UserController::class, 'create'])->name('users.create'); // Untuk menampilkan form tambah user
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Untuk menyimpan data user baru
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Untuk menampilkan form edit user
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update'); // Untuk memperbarui data user
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Untuk menghapus user
});
Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index'); // Untuk menampilkan halaman kelola roles
    Route::post('/view', [RoleController::class, 'listRoles'])->name('roles.list'); // Untuk menampilkan daftar roles
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create'); // Untuk menampilkan form tambah role
    Route::post('/', [RoleController::class, 'store'])->name('roles.store'); // Untuk menyimpan data role baru
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit'); // Untuk menampilkan form edit role
    Route::put('/{id}', [RoleController::class, 'update'])->name('roles.update'); // Untuk memperbarui data role
    Route::delete('/{id}', [RoleController::class, 'destroy'])->name('roles.destroy'); // Untuk menghapus role

    Route::get('/assigned', [RoleController::class, 'assignedRoles'])->name('roles.indexassigned');
    Route::post('/assigned', [RoleController::class, 'listAssignedRoles'])->name('roles.assigned');

    // Menampilkan halaman pengaturan roles untuk user tertentu
    Route::get('manage/{user}', [RoleController::class, 'manageRoles'])->name('roles.manageRoles');

    // Menghapus role dari user
    Route::delete('remove/{user}/{role}', [RoleController::class, 'removeRole'])->name('roles.removeRole');


});
Route::get('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');
Route::post('/roles/assign', [RoleController::class, 'storeAssign'])->name('roles.storeAssign');

Route::prefix('permissions')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('permissions.index'); // Untuk menampilkan halaman kelola permissions
    Route::post('/view', [PermissionController::class, 'listPermissions'])->name('permissions.list'); // Untuk menampilkan daftar permissions
    Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create'); // Untuk menampilkan form tambah permission
    Route::post('/', [PermissionController::class, 'store'])->name('permissions.store'); // Untuk menyimpan data permission baru
    Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit'); // Untuk menampilkan form edit permission
    Route::put('/{id}', [PermissionController::class, 'update'])->name('permissions.update'); // Untuk memperbarui data permission
    Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy'); // Untuk menghapus permission
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('home.dashboard');
Route::get('/home', [HomeController::class, 'home'])->name('home.home');

// Route::get('/dashboard', function () {

//     dd(auth()->user()->getRoleName);


//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

Route::get('/export-pdf', [UserReportController::class, 'exportPdf'])->name('report.exportPdf');



//role and permission
// Route untuk Role
// Route::resource('roles', RoleController::class);

// Route untuk Permission
// Route::group(['middleware' => ['auth', 'role:admin']], function () {
// Route::resource('permissions', PermissionController::class);
// });


require __DIR__ . '/auth.php';
