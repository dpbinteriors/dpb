<?php

use App\Http\Controllers\SampleController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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

//Samples
Route::localized(function () {
    Route::get('/', [WebController::class, 'home'])->name('home');

    Route::get(Lang::uri('about-us'), [WebController::class, 'aboutUs'])->name('about-us');
    Route::get(Lang::uri('residential'), [WebController::class, 'residential'])->name('residential');
    Route::get(Lang::uri('human-resources'), [WebController::class, 'humanResources'])->name('human-resources');
    Route::get(Lang::uri('contact'), [WebController::class, 'contact'])->name('contact');
    Route::get(Lang::uri('works'), [WebController::class, 'worksIndex'])->name('works-index');
    Route::get(Lang::uri('works/{slug}'), [WebController::class, 'worksDetail'])->name('works-detail');

    Route::get(Lang::get('/blog'), [WebController::class, 'blogIndex'])->name('blog');

    Route::get('/blog/{slug?}', [WebController::class, 'blogDetail'])->name('blog-detail');

    Route::get(Lang::uri('legal-pages/{slug}'), [WebController::class, 'legalPage'])->name('legal-page');

    Route::get(Lang::uri('documents/{category}'), [WebController::class, 'category'])->name('document-category');


    Route::post('save-service-form', [WebController::class, 'saveServiceForm'])->name('save-service-form');
    Route::post('save-spare-part-form', [WebController::class, 'saveSparePartForm'])->name('save-spare-part-form');
    Route::post('save-hr-form', [WebController::class, 'saveHrForm'])->name('save-hr-form');
    Route::post('save-contact-form', [WebController::class, 'saveContactForm'])->name('save-contact-form');

    //    Route::get(Lang::uri('application-category/{category}'), [WebController::class, 'category'])->name('application-category');

});

Route::post('sample-form-post', [SampleController::class, 'sampleFormPost'])->name('sample-form-post')->middleware(ProtectAgainstSpam::class);





