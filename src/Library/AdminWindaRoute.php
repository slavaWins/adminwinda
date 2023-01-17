<?php


namespace AdminWinda\Library;


use Illuminate\Support\Facades\Route;
use AdminWinda\Http\Controllers\AdminWindaController;

class AdminWindaRoute
{

    public static function routes()
    {
        Route::get('/admin', [\App\Http\Controllers\AdminWinda\AdminPageController::class, 'index'])->name('admin');
      //  Route::get('/admin', [AdminWindaController::class, 'index'])->name('admin.index');
    }

}
