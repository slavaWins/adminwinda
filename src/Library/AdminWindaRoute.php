<?php


namespace SlavaWins\AdminWinda\Library;


use Illuminate\Support\Facades\Route;
use SlavaWins\AdminWinda\Http\Controllers\UserAdminController;

class AdminWindaRoute
{

    public static function routes()
    {
        Route::get('/admin', [\App\Http\Controllers\AdminWinda\AdminPageController::class, 'index'])->name('admin');
        Route::get('/admin/users/show/{user}', [UserAdminController::class, 'show'])->name('admin.users.show');
        Route::get('/admin/users/list', [UserAdminController::class, 'index'])->name('admin.users.list');
    }

}
