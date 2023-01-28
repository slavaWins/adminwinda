<?php


namespace SlavaWins\AdminWinda\Library;


use Illuminate\Support\Facades\Route;
use SlavaWins\AdminWinda\Http\Controllers\UserAdminController;
use SlavaWins\AdminWinda\Http\Controllers\IndexAdminController;
use SlavaWins\AdminWinda\Http\Controllers\MpmAdminController;

class AdminWindaRoute
{

    public static function routes()
    {
        Route::get('/admin', [IndexAdminController::class, 'index'])->name('admin');
        Route::get('/admin/users/show/{user}', [UserAdminController::class, 'show'])->name('admin.users.show');
        Route::get('/admin/users/list', [UserAdminController::class, 'index'])->name('admin.users.list');


        Route::get('/admin/model/{modelClass}/list', [MpmAdminController::class, 'list'])->name('admin.mpm.list');

        Route::get('/admin/model/{modelClass}/create', [MpmAdminController::class, 'index'])->name('admin.mpm.create');
        Route::get('/admin/model/{modelClass}/edit/{id}', [MpmAdminController::class, 'edit'])->name('admin.mpm.edit');
        Route::post('/admin/model/{modelClass}/edit/{id}', [MpmAdminController::class, 'editSave'])->name('admin.mpm.edit.post');


        Route::get('/admin/model/{modelClass}/analtitics', [MpmAdminController::class, 'index'])->name('admin.mpm.analtitics');
    }

}
