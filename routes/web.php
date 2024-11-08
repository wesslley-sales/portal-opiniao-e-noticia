<?php

use App\Http\Controllers\Crawler\Concursos\ConcursoNewsController;
use App\Http\Controllers\Crawler\Concursos\FolhaDirigidaController;
use App\Http\Controllers\Crawler\Novelas\TvPopController;
use App\Http\Controllers\FroalaUploadController;

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');

Auth::routes();

require_once __DIR__ . '/admin.php';

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});

Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});

Route::group(['namespace' => 'Site', 'as' => 'site.'], function () {

    Route::controller(\App\Http\Controllers\Site\HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home.index');
        Route::post('saveLead', 'saveLead')->name('home.saveLead');
    });

    Route::controller(\App\Http\Controllers\Site\PagesController::class)->group(function () {
        Route::get('pages/terms-of-use', 'termsOfUse')->name('pages.termsOfUse');
        Route::get('pages/privacy-policy', 'privacyPolicy')->name('pages.privacyPolicy');
    });

    Route::controller(\App\Http\Controllers\Site\VideoController::class)->group(function () {
        Route::get('/videos', 'index')->name('videos.index');
        Route::get('/videos/{slug}/{video:id}', 'show')->name('videos.show');
    });

    Route::controller(\App\Http\Controllers\Site\PostController::class)->group(function () {
        Route::get('/noticias', 'index')->name('posts.index');
        Route::get('{typeCategory}/{category}/{slug}', 'show')->name('posts.show');
        Route::get('amp/noticias/{slug}/{post:id}', 'show')->name('posts.showAmp');
        Route::get('noticias/{categoryPost:slug}', 'category')->name('posts.category');
        Route::get('blogs', 'blogs')->name('posts.blogs');
        Route::get('buscar/noticias', 'search')->name('posts.search');
        Route::get('feeds', 'feeds')->name('posts.feeds');
        Route::get('noticia/autor/{slug}', 'user')->name('posts.user');
    });

    Route::controller(\App\Http\Controllers\Site\GalleryPhotoController::class)->group(function () {
        Route::get('/gallery-photos/{galleryPhoto}/iframe', 'iframe')->name('gallery-photos.iframe');
    });

});

Route::group(['prefix' => 'froala-upload', 'as' => 'froala.'], function () {
    Route::post('/uploadFile', [FroalaUploadController::class, 'uploadFile'])->name('uploadFile');
    Route::post('uploadVideo', [FroalaUploadController::class, 'uploadVideo'])->name('uploadVideo');
});

Route::get('/resize-image', function () {
    $timthumbPath = public_path('timthumb.php');

    ob_start();
    include $timthumbPath;
    $content = ob_get_clean();

    return new \Symfony\Component\HttpFoundation\BinaryFileResponse($content);
});

Route::group(['namespace' => 'Crawler', 'as' => 'crawler.'], function () {

    Route::get('crawler-concursoNews', ConcursoNewsController::class)
        ->name('concursos.concursoNews');

    Route::get('crawler-folhaDirigida', FolhaDirigidaController::class)
        ->name('concursos.folhaDirigida');

    Route::get('crawler-tvPop', TvPopController::class)
        ->name('entretenimento.tvPop');

});
