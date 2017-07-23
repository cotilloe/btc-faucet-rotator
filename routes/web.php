<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::delete(
    'faucets/{slug}/delete-permanently',
    [
        'as' => 'faucets.delete-permanently',
        'uses' => 'FaucetController@destroyPermanently'
    ]
);

Route::patch(
    'faucets/{slug}/restore',
    [
        'as' => 'faucets.restore',
        'uses' => 'FaucetController@restoreDeleted'
    ]
);

Route::get('users/{userSlug}/faucets', ['as' => 'users.faucets', 'uses' => 'UserFaucetsController@index']);
Route::get('users/{userSlug}/faucets/create', ['as' => 'users.faucets.create', 'uses' => 'UserFaucetsController@create']);
Route::post('users/{userSlug}/faucets/store', ['as' => 'users.faucets.store', 'uses' => 'UserFaucetsController@store']);
Route::get('users/{userSlug}/faucets/{faucetSlug}', ['as' => 'users.faucets.show', 'uses' => 'UserFaucetsController@show']);
//Route::get('users/{userSlug}/faucets/{faucetSlug}/edit', ['as' => 'users.faucets.edit', 'uses' => 'UserFaucetsController@edit']);
Route::get('users/{userSlug}/payment-processors', ['as' => 'users.payment-processors', 'uses' => 'PaymentProcessorController@userPaymentProcessors']);
Route::get('users/{userSlug}/payment-processors/{paymentProcessorSlug}', function ($userSlug, $paymentProcessorSlug) {
    return redirect(route('users.payment-processors.faucets', ['userSlug' =>  $userSlug, 'paymentProcessorSlug' => $paymentProcessorSlug]));
});
Route::get('users/{userSlug}/payment-processors/{paymentProcessorSlug}/faucets', ['as' => 'users.payment-processors.faucets', 'uses' => 'PaymentProcessorController@userPaymentProcessorFaucets']);
Route::patch('users/{userSlug}/faucets/{faucetSlug}/update', ['as' => 'users.faucets.update', 'uses' => 'UserFaucetsController@update']);
Route::get('users/{userSlug}/faucets/{faucetSlug}/destroy', ['as' => 'users.faucets.destroy', 'uses' => 'UserFaucetsController@destroy']);
Route::get('users/{userSlug}/faucets/{faucetSlug}/delete-permanently', ['as' => 'users.faucets.delete-permanently', 'uses' => 'UserFaucetsController@destroyPermanently']);
Route::get('users/{userSlug}/faucets/{faucetSlug}/restore', ['as' => 'users.faucets.restore', 'uses' => 'UserFaucetsController@restoreDeleted']);
Route::patch('users/{userSlug}/faucets/update-multiple', ['as' => 'users.faucets.update-multiple', 'uses' => 'UserFaucetsController@updateMultiple']);

Route::resource('faucets', 'FaucetController');

Route::get('/users/{userSlug}/panel', ['as' => 'users.panel', 'uses' => 'UserPanelController@show']);

Route::delete(
    'payment-processors/{slug}/delete-permanently',
    [
        'as' => 'payment-processors.delete-permanently',
        'uses' => 'PaymentProcessorController@destroyPermanently'
    ]
);

Route::patch(
    'payment-processors/{slug}/restore',
    [
        'as' => 'payment-processors.restore',
        'uses' => 'PaymentProcessorController@restoreDeleted'
    ]
);

Route::get(
    'payment-processors/{slug}/faucets',
    [
        'as' => 'payment-processors.faucets',
        'uses' => 'PaymentProcessorController@faucets'
    ]
);

Route::resource('payment-processors', 'PaymentProcessorController');

Route::delete(
    'users/{slug}/delete-permanently',
        [
            'as' => 'users.delete-permanently',
            'uses' => 'UserController@destroyPermanently'
        ]
);

Route::patch(
    'users/{slug}/restore',
    [
        'as' => 'users.restore',
        'uses' => 'UserController@restoreDeleted'
    ]
);

Route::resource('users', 'UserController');

Route::resource('main-meta', 'MainMetaController');

Route::resource('ad-block', 'AdBlockController');

Route::resource('twitter-config', 'TwitterConfigController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');