<?php


use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin'],'prefix' => 'admin'], function () {
    Route::prefix('quizzes')->group(function () {
        Route::get('/',[QuizController::class,'index'])->name('quizzes.index');
        Route::get('/create',[QuizController::class,'create'])->name('quizzes.create');
        Route::post( '/store',[QuizController::class,'store'])->name('quizzes.store');
        Route::get('{id}/edit',[QuizController::class,'edit'])->name('quizzes.edit');
        Route::post('{id}/update',[QuizController::class,'update'])->name('quizzes.update');
        Route::get('{id}/destroy',[QuizController::class,'destroy'])->name('quizzes.destroy');
    });
    Route::prefix('quiz')->group(function (){
        Route::get('/{quiz_id}/questions',[QuestionController::class,'index'])->name('questions.index');
        Route::get('/{quiz_id}/questions/create',[QuestionController::class,'create'])->name('questions.create');
        Route::post('/{quiz_id}/questions/store',[QuestionController::class,'store'])->name('questions.store');
        Route::get('/{quiz_id}/questions/edit/{id}',[QuestionController::class,'edit'])->name('questions.edit');
        Route::post('/{quiz_id}/questions/update/{id}',[QuestionController::class,'update'])->name('questions.update');
    });
});
