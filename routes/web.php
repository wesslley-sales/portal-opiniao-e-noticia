<?php

use App\Http\Controllers\FroalaUploadController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::get('content-tags/search', 'ContentTagController@search')->name('content-tags.search');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Type Category
    Route::delete('type-categories/destroy', 'TypeCategoryController@massDestroy')->name('type-categories.massDestroy');
    Route::resource('type-categories', 'TypeCategoryController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Type Banner
    Route::delete('type-banners/destroy', 'TypeBannerController@massDestroy')->name('type-banners.massDestroy');
    Route::resource('type-banners', 'TypeBannerController');

    // Banner
    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannerController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannerController');

    // Video
    Route::delete('videos/destroy', 'VideoController@massDestroy')->name('videos.massDestroy');
    Route::post('videos/media', 'VideoController@storeMedia')->name('videos.storeMedia');
    Route::post('videos/ckmedia', 'VideoController@storeCKEditorImages')->name('videos.storeCKEditorImages');
    Route::resource('videos', 'VideoController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::post('cities/parse-csv-import', 'CityController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CityController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CityController');

    // State
    Route::delete('states/destroy', 'StateController@massDestroy')->name('states.massDestroy');
    Route::resource('states', 'StateController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::post('newsletters/parse-csv-import', 'NewsletterController@parseCsvImport')->name('newsletters.parseCsvImport');
    Route::post('newsletters/process-csv-import', 'NewsletterController@processCsvImport')->name('newsletters.processCsvImport');
    Route::resource('newsletters', 'NewsletterController');

    // Relatorios
    Route::delete('relatorios/destroy', 'RelatoriosController@massDestroy')->name('relatorios.massDestroy');
    Route::resource('relatorios', 'RelatoriosController');

    // Image
    Route::delete('images/destroy', 'ImageController@massDestroy')->name('images.massDestroy');
    Route::post('images/media', 'ImageController@storeMedia')->name('images.storeMedia');
    Route::post('images/ckmedia', 'ImageController@storeCKEditorImages')->name('images.storeCKEditorImages');
    Route::get('images/selectImage', 'ImageController@selectImage')->name('images.selectImage');
    Route::resource('images', 'ImageController');

    // Gallery Photo
    Route::delete('gallery-photos/destroy', 'GalleryPhotoController@massDestroy')->name('gallery-photos.massDestroy');
    Route::post('gallery-photos/media', 'GalleryPhotoController@storeMedia')->name('gallery-photos.storeMedia');
    Route::post('gallery-photos/ckmedia', 'GalleryPhotoController@storeCKEditorImages')->name('gallery-photos.storeCKEditorImages');
    Route::resource('gallery-photos', 'GalleryPhotoController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});

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

    Route::controller(\App\Http\Controllers\Site\PostController::class)->group(function () {
        Route::get('/noticias', 'index')->name('posts.index');
        Route::get('/noticias/{slug}/{post:id}', 'show')->name('posts.show');
        Route::get('amp/noticias/{slug}/{post:id}', 'show')->name('posts.showAmp');
        Route::get('/noticias/{categoryPost:slug}', 'category')->name('posts.category');
        Route::get('/{type}/{slug}.html', 'migratedPost')->where('type', '(noticia|blog)')->name('posts.migratedPost');
        Route::get('/blogs', 'blogs')->name('posts.blogs');
        Route::get('/buscar/noticias', 'search')->name('posts.search');
        Route::get('/feeds', 'feeds')->name('posts.feeds');
        Route::get('/noticia/autor/{slug}', 'user')->name('posts.user');
    });

    Route::controller(\App\Http\Controllers\Site\VideoController::class)->group(function () {
        Route::get('/videos', 'index')->name('videos.index');
        Route::get('/videos/{slug}/{video:id}', 'show')->name('videos.show');
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
    $url     = request('url');
    $width   = request('width', null);
    $height  = request('height', null);
    $quality = request('quality', 90);

    if (!$url) {
        return response()->json(['error' => 'URL not provided'], 400);
    }

    $cacheKey = md5($url . $width . $height . $quality);

    if (Cache::has($cacheKey)) {
        $cachedImage = Cache::get($cacheKey);
        $tempPath = tempnam(sys_get_temp_dir(), 'cached_image') . '.jpg';
        file_put_contents($tempPath, $cachedImage);
        return response()->file($tempPath, [
            'Content-Type' => 'image/jpeg',
        ])->deleteFileAfterSend(true);
    }

    try {
        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Unable to download image'], 500);
        }

        $imageContent = $response->body();
        $tempPath = tempnam(sys_get_temp_dir(), 'image');
        file_put_contents($tempPath, $imageContent);

        $image = Image::load($tempPath);

        if ($width || $height) {
            $image->fit(Fit::Crop, $width, $height);
        }

        $outputPath = tempnam(sys_get_temp_dir(), 'image_output') . '.jpg';
        $image->quality($quality)->save($outputPath);

        $cachedImageContent = file_get_contents($outputPath);
        Cache::put($cacheKey, $cachedImageContent, now()->addDays(7)); // Expira em 7 dias

        return response()->file($outputPath, [
            'Content-Type' => 'image/jpeg',
        ])->deleteFileAfterSend(true);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Unable to process image: ' . $e->getMessage()], 500);
    }
});
