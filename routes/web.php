<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\FillController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Auth::routes(['verify' => true]);

Route::get('/mail/send', [MailController::class, 'index']);

Route::get('/index', [CertificateController::class, 'index']);

Route::get('/generate', [CertificateController::class, 'generate']);

Route::get('/', [PageController::class, 'home']);

Route::get('/print/{author}', [FillController::class, 'process']);

Route::get('/downloads/paper/{paper}', [DownloadController::class, 'paper']);

Route::get('/downloads/paperTemplate', [DownloadController::class, 'paperTemplate']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [PageController::class, 'dashboard']);

    Route::resource('/papers', PaperController::class);

    Route::get('/payments', [PaymentController::class, 'index']);

    Route::get('/attendances', [AttendanceController::class, 'index']);

    Route::post('/attendances', [AttendanceController::class, 'store']);

    Route::post('/attend/{author}', [AttendanceController::class, 'attend']);

    Route::get('/paper/reviews/{paper}', [ReviewController::class, 'show']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// user routes
Route::middleware(['auth', 'role:author'])->group(function () {

    Route::get('/paper', [PageController::class, 'paper']);

    Route::get('/paper/detail', [PaperController::class, 'show']);

    Route::post('/payment/submit', [PaymentController::class, 'store']);

    // Route::get('/papers/author/{author}', [PageController::class, 'paperByAuthor']);
});

// admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('payment/confirmation/{payment}', [PaymentController::class, 'update']);

    Route::get('/download/paper/{paper}', [DownloadController::class, 'downloadPaper']);

    Route::resource('/reviewers', ReviewerController::class);

    Route::resource('/authors', AuthorController::class);

    Route::resource('/agendas', AgendaController::class);

    Route::resource('/speakers', SpeakerController::class);

    Route::resource('/costs', CostController::class);

    Route::get('/dates', [DateController::class, 'index']);

    Route::post('/dates', [DateController::class, 'store']);

    Route::put('/dates/{date}', [DateController::class, 'update']);

    Route::post('/selectReviewer/{paper}', [ReviewController::class, 'selectReviewer']);
});

// Reviewer Route
Route::middleware(['auth', 'role:reviewer'])->group(function () {

    Route::get('/reviews', [ReviewController::class, 'index']);

    Route::post('reviews/submit/{review}', [ReviewController::class, 'store']);
});

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
