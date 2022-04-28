<?php

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
    return view('brackets/admin-auth::admin.auth.login');
});


Route::get('/', 'App\Http\Controllers\Admin\HomeController@dashboard');

Route::get('cedula/{cedula}','App\Http\Controllers\Admin\HelpsController@cedula')->name('cedula');

Route::post('test/', 'App\Http\Controllers\Admin\HelpsController@store')->name('store');

//Route::get('/helps/{help}/show', 'App\Http\Controllers\Admin\HelpsController@show');




/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('helps')->name('helps/')->group(static function() {
            Route::get('/',                                             'HelpsController@index')->name('index');
            Route::get('/create',                                       'HelpsController@create')->name('create');
            // Route::post('/',                                          'HelpsController@store')->name('store');
            Route::get('/{help}/show',                                  'HelpsController@show')->name('show');
            Route::get('/{help}/createdetail',                          'HelpsController@createdetail')->name('createdetail');
            Route::get('/{help}/edit',                                  'HelpsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'HelpsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{help}',                                      'HelpsController@update')->name('update');
            Route::delete('/{help}',                                    'HelpsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('states')->name('states/')->group(static function() {
            Route::get('/',                                             'StatesController@index')->name('index');
            Route::get('/create',                                       'StatesController@create')->name('create');
            Route::post('/',                                            'StatesController@store')->name('store');
            Route::get('/{state}/edit',                                 'StatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{state}',                                     'StatesController@update')->name('update');
            Route::delete('/{state}',                                   'StatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('assists')->name('assists/')->group(static function() {
            Route::get('/',                                             'AssistsController@index')->name('index');
            Route::get('/create',                                       'AssistsController@create')->name('create');
            Route::post('/',                                            'AssistsController@store')->name('store');
            Route::get('/{assist}/edit',                                'AssistsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AssistsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{assist}',                                    'AssistsController@update')->name('update');
            Route::delete('/{assist}',                                  'AssistsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detail-assists')->name('detail-assists/')->group(static function() {
            Route::get('/',                                             'DetailAssistController@index')->name('index');
            Route::get('/create',                                       'DetailAssistController@create')->name('create');
            Route::post('/',                                            'DetailAssistController@store')->name('store');
            Route::get('/{detailAssist}/edit',                          'DetailAssistController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetailAssistController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detailAssist}',                              'DetailAssistController@update')->name('update');
            Route::delete('/{detailAssist}',                            'DetailAssistController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detail-assists')->name('detail-assists/')->group(static function() {
            Route::get('/',                                             'DetailAssistsController@index')->name('index');
            Route::get('/create',                                       'DetailAssistsController@create')->name('create');
            Route::post('/',                                            'DetailAssistsController@store')->name('store');
            Route::get('/{detailAssist}/edit',                          'DetailAssistsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetailAssistsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detailAssist}',                              'DetailAssistsController@update')->name('update');
            Route::delete('/{detailAssist}',                            'DetailAssistsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('s-i-g008-s')->name('s-i-g008-s/')->group(static function() {
            Route::get('/',                                             'SIG008Controller@index')->name('index');
            Route::get('/create',                                       'SIG008Controller@create')->name('create');
            Route::post('/',                                            'SIG008Controller@store')->name('store');
            Route::get('/{sIG008}/edit',                                'SIG008Controller@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SIG008Controller@bulkDestroy')->name('bulk-destroy');
            Route::post('/{sIG008}',                                    'SIG008Controller@update')->name('update');
            Route::delete('/{sIG008}',                                  'SIG008Controller@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detail-helps')->name('detail-helps/')->group(static function() {
            Route::get('/',                                             'DetailHelpsController@index')->name('index');
            Route::get('/create',                                       'DetailHelpsController@create')->name('create');
            Route::post('/',                                            'DetailHelpsController@store')->name('store');
            Route::get('/{detailHelp}/edit',                            'DetailHelpsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetailHelpsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detailHelp}',                                'DetailHelpsController@update')->name('update');
            Route::delete('/{detailHelp}',                              'DetailHelpsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detail-helps')->name('detail-helps/')->group(static function() {
            Route::get('/',                                             'DetailHelpsController@index')->name('index');
            Route::get('/create',                                       'DetailHelpsController@create')->name('create');
            Route::post('/',                                            'DetailHelpsController@store')->name('store');
            Route::get('/{detailHelp}/edit',                            'DetailHelpsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetailHelpsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detailHelp}',                                'DetailHelpsController@update')->name('update');
            Route::delete('/{detailHelp}',                              'DetailHelpsController@destroy')->name('destroy');
        });
    });
});
