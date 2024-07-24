<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthControllerDetartment_Head;
use App\Http\Controllers\new_typeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\subject;
use App\Http\Controllers\subject_type;
use App\Models\News;
use App\Models\Subject as ModelsSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/test', function () {
//    $news= ModelsSubject::find('2');
//     return response()->json(['data'=>$news->image]);
// $U=collect([5, 2, 3, 4])->every(function (int $value, int $key) {
//     return $value >=2;
// });
// $user_info =News::select('news_type_id', DB::raw('count(id) as total'))
//                  ->groupBy('news_type_id')
//                  ->get();
// return response()->json(['data'=>$user_info]);
// $users = News::whereHas('news_type', function($q){
//     $q->where('describe', 'gfghhhhfh')->where('title','hgmgjhfh');
// })->get();
// $user_info =News::select('news_type_id as r', DB::raw('count(id) as total'))
//                  ->groupBy('r')->having('total',  4)
//                  ->get();

                 $user_info =News::select('news_type_id as r', DB::raw('count(id) as total'))
                 ->groupBy('r')->offset(1)-> take(1)
                 ->get();

return response()->json(['data'=>$user_info ]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
Route::prefix('/Detartment_Head')->controller(AuthControllerDetartment_Head::class)->group(function () {
    Route::post('/create', 'register');
    Route::post('/login', 'login');
});
Route::prefix('/Detartment_Head')->controller(AuthControllerDetartment_Head::class)->group(function () {
    Route::post('/create', 'register');
    Route::post('/login', 'login');
});
Route::prefix('/new_type')->controller(new_typeController::class)->group(function () {
    Route::post('/create', 'create');
    Route::post('/delete/{id}', 'delete');
    Route::post('/update/{id}', 'update');
    Route::get('/index', 'index');
});
Route::prefix('/news')->controller(NewsController::class)->group(function () {
    Route::post('/create', 'create');
    Route::post('/delete/{id}', 'destroy');
    Route::post('/update/{id}', 'update');
    Route::get('/index', 'index');
    Route::get('/add_favourite_news', 'add_favourite_news');
    Route::get('/show_favourite_news', 'show_favourite_news');
    
});
Route::prefix('/subject_type')->controller(subject_type::class)->group(function () {
    Route::post('/create', 'create');
    Route::post('/delete/{id}', 'destroy');
    Route::post('/update/{id}', 'update');
    Route::get('/index', 'index');
    
    
});
Route::prefix('/subject')->controller(subject::class)->group(function () {
    Route::post('/create', 'store');
    Route::post('/delete/{id}', 'destroy');
    Route::post('/update/{id}', 'update');
    Route::get('/index', 'index');
    
    
});




