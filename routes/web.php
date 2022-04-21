<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostPageController;

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
Route::get('/', [PostPageController::class, 'index']);
Route::get('/semuapost/{trashed?}', [PostPageController::class, 'allpost']);
Route::get('/tambahbaru', [PostPageController::class, 'addnew']);
Route::get('/preview', [PostPageController::class, 'preview']);
Route::get('/editpost/{id}', [PostPageController::class, 'editpost']);