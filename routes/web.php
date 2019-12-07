<?php

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



Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('auth.getLogin');
    Route::post('login', 'LoginController@login')->name('auth.postLogin');
    Route::get('logout', 'LoginController@logout')->name('auth.postLogout');

    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('auth.getForgotPassword');
    Route::post('forgot-password', 'ForgotPasswordController@resetPassword')->name('auth.sendMail');

    Route::get('reset-password/{token}', 'ForgotPasswordController@getFormResetPassword')->name('auth.getRecoverPassword');
    Route::post('reset-password/{token}', 'ForgotPasswordController@resetPasswordChange')->name('auth.postRecoverPassword');
});

Route::group(['middleware' => ['check-login'], 'prefix' => '/'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/map', function () {
        return view('map');
    })->name('admin.map');

    Route::get('/get-art-for-chart', function () {
        $data = [];
        $arts = \App\Models\Art::count();
        for ($i = 1; $i <= count(config('base.art_category')); $i++) {
            $data[$i] = (\App\Models\Art::where('category', '=' ,$i)->count() / $arts) * 100;
        }
        return Response::json($data);
    });

    Route::get('/get-costume-for-chart', function () {
        $data = [];
        $costume = \App\Models\Costume::count();
        for ($i = 1; $i <= count(config('base.costume_category')); $i++) {
            $data[$i] = (\App\Models\Costume::where('category', '=' ,$i)->count() / $costume) * 100;
        }
        return Response::json($data);
    });

    Route::get('/get-cuisine-for-chart', function () {
        $data = [];
        $cuisine = \App\Models\Cuisine::count();
        for ($i = 1; $i <= count(config('base.cuisine_category')); $i++) {
            $data[$i] = (\App\Models\Cuisine::where('category', '=' ,$i)->count() / $cuisine) * 100;
        }
        return Response::json($data);
    });

    Route::get('/get-festival-for-chart', function () {
        $data = [];
        $festival = \App\Models\Festival::count();
        for ($i = 1; $i <= count(config('base.festival_category')); $i++) {
            $data[$i] = (\App\Models\Festival::where('category', '=' ,$i)->count() / $festival) * 100;
        }
        return Response::json($data);
    });

    Route::get('/get-crafts-for-chart', function () {
        $data = [];
        $crafts = \App\Models\Crafts::count();
        for ($i = 1; $i <= count(config('base.crafts_category')); $i++) {
            $data[$i] = (\App\Models\Crafts::where('category', '=' ,$i)->count() / $crafts) * 100;
        }
        return Response::json($data);
    });

    Route::get('/get-relics-for-chart', function () {
        $objData = [];
        $objData['relics'] = [];
        $objData['year'] = [];

        $now = \Carbon\Carbon::now();
        for($i = ($now->year - 10); $i <= $now->year; $i++ ){
            array_push($objData['relics'], \App\Models\Relics::where('year_of_recognition', '=' ,$i)->count());
            array_push($objData['year'], $i);
        }
        return Response::json($objData);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.list');
        Route::get('/detail', 'UserController@detail')->name('admin.user.detail');
        Route::get('/form', 'UserController@getForm')->name('admin.user.form.get');
        Route::post('/form', 'UserController@saveForm')->name('admin.user.form.post');
        Route::get('/edit/{id}', 'UserController@editForm')->name('admin.user.form.edit');
        Route::post('/update/{id}', 'UserController@updateForm')->name('admin.user.form.update');
        Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
    });

    Route::group(['prefix' => 'art'], function () {
        Route::get('/', 'ArtController@index')->name('admin.art.list');
        Route::get('/filter', 'ArtController@filter')->name('admin.art.filter');
        Route::get('/form', 'ArtController@getForm')->name('admin.art.form.get');
        Route::post('/form', 'ArtController@saveForm')->name('admin.art.form.post');
        Route::get('/edit/{id}', 'ArtController@editForm')->name('admin.art.form.edit');
        Route::post('/update/{id}', 'ArtController@updateForm')->name('admin.art.form.update');
        Route::get('/detail/{id}', 'ArtController@detail')->name('admin.art.detail');
        Route::get('/delete/{id}', 'ArtController@delete')->name('admin.art.delete');
        Route::get('/export', 'ArtController@exportData')->name('admin.art.export');
    });

    Route::group(['prefix' => 'costume'], function () {
        Route::get('/', 'CostumeController@index')->name('admin.costume.list');
        Route::get('/filter', 'CostumeController@filter')->name('admin.costume.filter');
        Route::get('/form', 'CostumeController@getForm')->name('admin.costume.form.get');
        Route::post('/form', 'CostumeController@saveForm')->name('admin.costume.form.post');
        Route::get('/edit/{id}', 'CostumeController@editForm')->name('admin.costume.form.edit');
        Route::post('/update/{id}', 'CostumeController@updateForm')->name('admin.costume.form.update');
        Route::get('/detail/{id}', 'CostumeController@detail')->name('admin.costume.detail');
        Route::get('/delete/{id}', 'CostumeController@delete')->name('admin.costume.delete');
        Route::get('/export', 'CostumeController@exportData')->name('admin.costume.export');
    });

    Route::group(['prefix' => 'crafts'], function () {
        Route::get('/', 'CraftsController@index')->name('admin.crafts.list');
        Route::get('/filter', 'CraftsController@filter')->name('admin.crafts.filter');
        Route::get('/form', 'CraftsController@getForm')->name('admin.crafts.form.get');
        Route::post('/form', 'CraftsController@saveForm')->name('admin.crafts.form.post');
        Route::get('/edit/{id}', 'CraftsController@editForm')->name('admin.crafts.form.edit');
        Route::post('/update/{id}', 'CraftsController@updateForm')->name('admin.crafts.form.update');
        Route::get('/detail/{id}', 'CraftsController@detail')->name('admin.crafts.detail');
        Route::get('/delete/{id}', 'CraftsController@delete')->name('admin.crafts.delete');
        Route::get('/export', 'CraftsController@exportData')->name('admin.crafts.export');
    });

    Route::group(['prefix' => 'cuisine'], function () {
        Route::get('/', 'CuisineController@index')->name('admin.cuisine.list');
        Route::get('/filter', 'CuisineController@filter')->name('admin.cuisine.filter');
        Route::get('/form', 'CuisineController@getForm')->name('admin.cuisine.form.get');
        Route::post('/form', 'CuisineController@saveForm')->name('admin.cuisine.form.post');
        Route::get('/edit/{id}', 'CuisineController@editForm')->name('admin.cuisine.form.edit');
        Route::post('/update/{id}', 'CuisineController@updateForm')->name('admin.cuisine.form.update');
        Route::get('/detail/{id}', 'CuisineController@detail')->name('admin.cuisine.detail');
        Route::get('/delete/{id}', 'CuisineController@delete')->name('admin.cuisine.delete');
        Route::get('/export', 'CuisineController@exportData')->name('admin.cuisine.export');
    });

    Route::group(['prefix' => 'festival'], function () {
        Route::get('/', 'FestivalController@index')->name('admin.festival.list');
        Route::get('/filter', 'FestivalController@filter')->name('admin.festival.filter');
        Route::get('/form', 'FestivalController@getForm')->name('admin.festival.form.get');
        Route::post('/form', 'FestivalController@saveForm')->name('admin.festival.form.post');
        Route::get('/edit/{id}', 'FestivalController@editForm')->name('admin.festival.form.edit');
        Route::post('/update/{id}', 'FestivalController@updateForm')->name('admin.festival.form.update');
        Route::get('/detail/{id}', 'FestivalController@detail')->name('admin.festival.detail');
        Route::get('/delete/{id}', 'FestivalController@delete')->name('admin.festival.delete');
        Route::get('/export', 'FestivalController@exportData')->name('admin.festival.export');
    });

    Route::group(['prefix' => 'relics'], function () {
        Route::get('/', 'RelicsController@index')->name('admin.relics.list');
        Route::get('/filter', 'RelicsController@filter')->name('admin.relics.filter');
        Route::get('/form', 'RelicsController@getForm')->name('admin.relics.form.get');
        Route::post('/form', 'RelicsController@saveForm')->name('admin.relics.form.post');
        Route::get('/edit/{id}', 'RelicsController@editForm')->name('admin.relics.form.edit');
        Route::post('/update/{id}', 'RelicsController@updateForm')->name('admin.relics.form.update');
        Route::get('/detail/{id}', 'RelicsController@detail')->name('admin.relics.detail');
        Route::get('/delete/{id}', 'RelicsController@delete')->name('admin.relics.delete');
        Route::get('/export', 'RelicsController@exportData')->name('admin.relics.export');
    });
});
