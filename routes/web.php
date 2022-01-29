<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/','AdminController@loginAdmin');
Route::post('/','AdminController@postloginAdmin');
Route::get('admin.logout','AdminController@logoutAdmin')->name('admin.logout');
Route::get('/home', function () {
    return view('home');
});
Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
        Route::prefix('loaisanphams')->group(function () {

            Route::get('/', [
                'as' => 'loaisanphams.trangchu',
                'uses' => 'LoaiSanPhamController@trangchu',
                'middleware' => 'can:category-list'
            ]);
            Route::get('/themmoi', [
                'as' => 'loaisanphams.themmoi',
                'uses' => 'LoaiSanPhamController@themmoi',
                'middleware' => 'can:category-add'
            ]);
            Route::post('/themmoi_gui', [
                'as' => 'loaisanphams.themmoi_gui',
                'uses' => 'LoaiSanPhamController@themmoi_gui'

            ]);

            Route::get('/sua/{id}', [
                'as' => 'loaisanphams.sua',
                'uses' => 'LoaiSanPhamController@sua',
                'middleware' => 'can:category-update'
            ]);
            Route::post('/sua_gui/{id}', [
                'as' => 'loaisanphams.sua_gui',
                'uses' => 'LoaiSanPhamController@sua_gui'
            ]);
            Route::get('/xoa/{id}', [
                'as' => 'loaisanphams.xoa',
                'uses' => 'LoaiSanPhamController@xoa',
                'middleware' => 'can:category-delete'
            ]);
        });
        Route::prefix('hangsanxuats')->group(function () {
            Route::get('/', [
                'as' => 'hangsanxuats.trangchu',
                'uses' => 'HangSanXuatController@trangchu',
                'middleware' => 'can:branch-list'
            ]);
            Route::get('/themmoi', [
                'as' => 'hangsanxuats.themmoi',
                'uses' => 'HangSanXuatController@themmoi',
                'middleware' => 'can:branch-add'
            ]);
            Route::post('/themmoi_gui', [
                'as' => 'hangsanxuats.themmoi_gui',
                'uses' => 'HangSanXuatController@themmoi_gui'
            ]);

            Route::get('/sua/{id}', [
                'as' => 'hangsanxuats.sua',
                'uses' => 'HangSanXuatController@sua',
                'middleware' => 'can:branch-update'
            ]);
            Route::post('/sua_gui/{id}', [
                'as' => 'hangsanxuats.sua_gui',
                'uses' => 'HangSanXuatController@sua_gui'
            ]);
            Route::get('/xoa/{id}', [
                'as' => 'hangsanxuats.xoa',
                'uses' => 'HangSanXuatController@xoa',
                'middleware' => 'can:branch-delete'
            ]);
        });
        //sanpham
        Route::prefix('sanphams')->group(function () {
            Route::get('/', [
                'as' => 'sanphams.trangchu',
                'uses' => 'AdminSanPhamController@trangchu',
                'middleware' => 'can:product-list'
            ]);
            Route::get('/themmoi', [
                'as' => 'sanphams.themmoi',
                'uses' => 'AdminSanPhamController@themmoi',
                'middleware' => 'can:product-add'
            ]);
            Route::post('/themmoi_gui', [
                'as' => 'sanphams.themmoi_gui',
                'uses' => 'AdminSanPhamController@themmoi_gui'
            ]);
            Route::get('/sua/{id}', [
                'as' => 'sanphams.sua',
                'uses' => 'AdminSanPhamController@sua',
                'middleware' => 'can:product-update'
            ]);
            Route::post('/sua_gui/{id}', [
                'as' => 'sanphams.sua_gui',
                'uses' => 'AdminSanPhamController@sua_gui'
            ]);
            Route::get('/xoa/{id}', [
                'as' => 'sanphams.xoa',
                'uses' => 'AdminSanPhamController@xoa',
                'middleware' => 'can:product-delete'
            ]);
            Route::get('/chitiet/{id}', [
                'as' => 'sanphams.chitiet',
                'uses' => 'AdminSanPhamController@chitiet',
                'middleware' => 'can:product-detail'
            ]);

        });
        //Anh Quang Cao
        Route::prefix('sliders')->group(function () {
            Route::get('/', [
                'as' => 'sliders.trangchu',
                'uses' => 'AdminSliderController@trangchu',
                'middleware' => 'can:slider-list'
            ]);
            Route::get('/themmoi', [
                'as' => 'sliders.themmoi',
                'uses' => 'AdminSliderController@themmoi',
                'middleware' => 'can:slider-add'
            ]);
            Route::post('/themmoi_gui', [
                'as' => 'sliders.themmoi_gui',
                'uses' => 'AdminSliderController@themmoi_gui'
            ]);
            Route::get('/sua/{id}', [
                'as' => 'sliders.sua',
                'uses' => 'AdminSliderController@sua',
                'middleware' => 'can:slider-update'
            ]);
            Route::post('/sua_gui/{id}', [
                'as' => 'sliders.sua_gui',
                'uses' => 'AdminSliderController@sua_gui'
            ]);
            Route::get('/xoa/{id}', [
                'as' => 'sliders.xoa',
                'uses' => 'AdminSliderController@xoa',
                'middleware' => 'can:slider-delete'
            ]);

        });
        //User
        Route::prefix('users')->group(function () {
            Route::get('/', [
                'as' => 'users.trangchu',
                'uses' => 'AdminUserController@trangchu',
                'middleware' => 'can:user-list'
            ]);
            Route::get('/themmoi', [
                'as' => 'users.themmoi',
                'uses' => 'AdminUserController@themmoi',
                'middleware' => 'can:user-add'

            ]);
            Route::post('/themmoi_gui', [
                'as' => 'users.themmoi_gui',
                'uses' => 'AdminUserController@themmoi_gui',

            ]);
            Route::get('/sua/{id}', [
                'as' => 'users.sua',
                'uses' => 'AdminUserController@sua',
                'middleware' => 'can:user-update'

            ]);
            Route::post('/sua_gui/{id}', [
                'as' => 'users.sua_gui',
                'uses' => 'AdminUserController@sua_gui',
            ]);

            Route::get('/xoa/{id}', [
                'as' => 'users.xoa',
                'uses' => 'AdminUserController@xoa',
                'middleware' => 'can:user-delete'

            ]);
        });
        //Roles
        Route::prefix('roles')->group(function () {
            Route::get('/', [
                'as' => 'roles.trangchu',
                'uses' => 'AdminRoleController@trangchu',
                'middleware' => 'can:role-list'
            ]);
            Route::get('/themmoi', [
                'as' => 'roles.themmoi',
                'uses' => 'AdminRoleController@themmoi',
                'middleware' => 'can:role-add'
            ]);
            Route::post('/themmoi_gui', [
                'as' => 'roles.themmoi_gui',
                'uses' => 'AdminRoleController@themmoi_gui'
            ]);
            Route::get('/sua/{id}', [
                'as' => 'roles.sua',
                'uses' => 'AdminRoleController@sua',
                'middleware' => 'can:role-update'
            ]);
            Route::post('/sua_gui/{id}', [
                'as' => 'roles.sua_gui',
                'uses' => 'AdminRoleController@sua_gui'
            ]);
            Route::get('/xoa/{id}', [
                'as' => 'roles.xoa',
                'uses' => 'AdminRoleController@xoa',
                'middleware' => 'can:role-delete'
            ]);

        });

});
Route::get('cart','AdminSanPhamController@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'AdminSanPhamController@addToCart')->name('add.to.cart');
Route::get('update-cart', 'AdminSanPhamController@updatecart')->name('update.to.cart');
Route::delete('remove-from-cart', 'AdminSanPhamController@remove')->name('remove.from.cart');

