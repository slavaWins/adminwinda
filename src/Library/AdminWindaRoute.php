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
        $adminBasePath = env("ADMIN_URL", "admin");
        $adminBasePath=trim($adminBasePath, "/");

        Route::get($adminBasePath, [IndexAdminController::class, 'index'])->name('admin');
        Route::get($adminBasePath.'/users/show/{user}', [UserAdminController::class, 'show'])->name('admin.users.show');
        Route::get($adminBasePath.'//users/list', [UserAdminController::class, 'index'])->name('admin.users.list');


        Route::get($adminBasePath.'/model/{modelClass}/list', [MpmAdminController::class, 'list'])->name('admin.mpm.list');

        Route::get($adminBasePath.'/model/{modelClass}/edit/{id}', [MpmAdminController::class, 'edit'])->name('admin.mpm.edit');
        Route::get($adminBasePath.'/model/{modelClass}/delete/{id}', [MpmAdminController::class, 'delete'])->name('admin.mpm.delete');
        Route::post($adminBasePath.'/model/{modelClass}/edit/{id}/{tag}', [MpmAdminController::class, 'editSave'])->name('admin.mpm.edit.post');


        Route::get($adminBasePath.'/model/{modelClass}/analtitics', [MpmAdminController::class, 'analtitics'])->name('admin.mpm.analtitics');
    }

}
