<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => ['json.response']], function () {
    Route::prefix('auth')->group(function () {
        Route::delete('reset_password', 'api\v1\AuthController@resetPassword');
    });

    Route::group(['middleware' => 'auth:api'], function () {
        // authenticated account needed
        Route::get('logout', 'api\v1\AuthController@logout');
        Route::get('user/details', 'api\v1\AuthController@details');

        Route::group(['prefix' => 'consumer', 'middleware' => ['role:konsumen']], function () {
            Route::post('profile/edit/', 'api\v1\KonsumenController@update');
            Route::get('profile', 'api\v1\KonsumenController@details');

            // shipping addresses route
            Route::get('addresses', 'api\v1\ShippingAddressController@index');
            Route::get('addresses/{address}', 'api\v1\ShippingAddressController@show');
            Route::post('addresses', 'api\v1\ShippingAddressController@store');
            Route::match(['put', 'patch'], 'addresses/{address}', 'api\v1\ShippingAddressController@update');
            Route::delete('addresses/{address}', 'api\v1\ShippingAddressController@destroy');
        });

        Route::group(['prefix' => 'umkm'], function () {
            Route::group(['middleware' => ['role:umkm']], function () {
                Route::post('profile/edit/', 'api\v1\UmkmController@update');
            });


            Route::group(['middleware' => ['role:pengelola']], function () {
                Route::post('/approve', 'api\v1\UmkmController@approveRegister');
            });
        });

        Route::group(['prefix' => 'umkm-registration'], function () {
           Route::get('/', 'api\v1\PendaftaranUmkmController@index');
           Route::post('/', 'api\v1\PendaftaranUmkmController@store');
        });

        Route::group(['middleware' => ['role:kasir']], function () {
            Route::post('createTransaksiKasir', 'api\v1\KasirTransactionController@store');
        });

        Route::group(['middleware' => ['role:konsumen']], function () {
            // favorite product route
            Route::get('favorite-product', 'api\v1\ProdukFavoritController@index');
            Route::post('favorite-product', 'api\v1\ProdukFavoritController@store');

            // cart route
            Route::get('cart', 'api\v1\CartController@index');
            Route::post('cart', 'api\v1\CartController@store');
            Route::delete('cart/{cart}', 'api\v1\CartController@destroy');

            // order route
            Route::post('createTransaksiKonsumen', 'api\v1\KonsumenTransactionController@store');
        });

        Route::group(['prefix' => 'employees'], function () {
            // employees route
            Route::group(['middleware' => ['role:umkm,cabang,pengelola']], function () {
                Route::get('/', 'api\v1\KaryawanController@index');
                Route::get('/{employees}/detail', 'api\v1\KaryawanController@show');
                Route::get('/all', 'api\v1\KaryawanController@getAll');
            });
            Route::group(['middleware' => ['role:umkm']], function () {
                Route::post('/', 'api\v1\KaryawanController@store');
                Route::post('/{employees}', 'api\v1\KaryawanController@update');
                Route::delete('/{employees}', 'api\v1\KaryawanController@destroy');
            });
        });

        Route::group(['prefix' => 'branches', 'middleware' => ['role:umkm']], function () {
            // branches route
            Route::get('/', 'api\v1\CabangController@index');
            Route::get('/{branches}', 'api\v1\CabangController@show');
            Route::post('/', 'api\v1\CabangController@store');
            Route::post('/{branches}', 'api\v1\CabangController@update');
            Route::delete('/{branches}', 'api\v1\CabangController@destroy');
        });

        Route::group(['prefix' => 'cashier', 'middleware' => ['role:cabang']], function () {
            // cashier route
            Route::get('/', 'api\v1\KasirController@index');
            Route::get('/{cashier}', 'api\v1\KasirController@show');
            Route::post('/', 'api\v1\KasirController@store');
            Route::match(['put', 'patch'], '/{cashier}', 'api\v1\KasirController@update');
            Route::delete('/{cashier}', 'api\v1\KasirController@destroy');
        });

        Route::group(['prefix' => 'stock', 'middleware' => ['role:cabang']], function () {
            // cashier route
            Route::get('/', 'api\v1\StokController@index');
            Route::post('/', 'api\v1\StokController@store');
            Route::match(['put', 'patch'], '/{stock}', 'api\v1\StokController@update');
            Route::get('/{stock}', 'api\v1\StokController@show');
        });

        Route::group(['prefix' => 'stock-opname', 'middleware' => ['role:cabang']], function () {
            // cashier route
            Route::get('/', 'api\v1\StokOpnameController@index');
            Route::post('/', 'api\v1\StokOpnameController@store');
            Route::match(['put', 'patch'], '/{stockOpname}', 'api\v1\StokOpnameController@update');
            Route::get('/{stockOpname}', 'api\v1\StokOpnameController@show');
        });
    });

    Route::group(['prefix' => 'product'], function () {
        // branches route
        Route::get('/', 'api\v1\ProdukController@index');
        Route::get('/{product}', 'api\v1\ProdukController@show');
        Route::group(['middleware' => ['auth:api', 'role:umkm']], function () {
            Route::post('/', 'api\v1\ProdukController@store');
            Route::post('/{product}', 'api\v1\ProdukController@update');
            Route::delete('/{product}', 'api\v1\ProdukController@destroy');
        });
    });

    Route::group(['prefix' => 'category'], function () {
        // product categories route
        Route::get('/', 'api\v1\KategoriProdukController@index');
        Route::get('/{category}', 'api\v1\KategoriProdukController@show');

        Route::group(['middleware' => ['auth:api', 'role:umkm']], function () {
            Route::post('/', 'api\v1\KategoriProdukController@store');
            Route::match(['put', 'patch'], '/{category}', 'api\v1\KategoriProdukController@update');
            Route::delete('/{category}', 'api\v1\KategoriProdukController@destroy');
        });
    });

    Route::group(['prefix' => 'umkm'], function () {
        Route::get('/profile/{umkm}', 'api\v1\UmkmController@profile');
        Route::post('register', 'api\v1\UmkmController@register');
    });

    Route::post('login', 'api\v1\AuthController@login');

    Route::post('users', 'api\v1\UserController@store');
    Route::match(['put', 'patch'], 'users', 'api\v1\UserController@update');

    Route::group(['prefix' => 'consumer'], function () {
        Route::post('register', 'api\v1\KonsumenController@register');
    });
});
