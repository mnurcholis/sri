<?php

use App\Http\Controllers\HelperController;
use App\Livewire\Admin\Pages\Permission;
use App\Livewire\Admin\Pages\Role;
use App\Livewire\Admin\Pages\User;
use App\Livewire\Admin\Pages\Home;
use App\Livewire\Admin\Pages\KirimSurat\KirimSurat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});


Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Home::class)->name('home');
    Route::get('/kirimsurat', KirimSurat::class)->name('kirimsurat');
    Route::get('/user', User::class)->name('user');
    Route::get('/role', Role::class)->name('role');
    Route::get('/permission', Permission::class)->name('permission');
});
Route::get('show-picture}', [HelperController::class, 'showPicture'])->name('helper.show-picture');
