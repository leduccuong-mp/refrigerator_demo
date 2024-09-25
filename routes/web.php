<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\BannerController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\MaintainController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\RfidController;
use App\Http\Controllers\Admins\StoreController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\VendingMachineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\VersionController;
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
Route::middleware(['admin.auth'])
     ->group(function () {
         Route::get('/', [
             DashboardController::class,
             'index'
         ])->name('admin.dashboard');

         // Banner
         Route::prefix('admin')->group(function () {
            Route::resource('banner', BannerController::class)->names([
                'index' => 'admin.banner.index',
                'store' => 'admin.banner.store',
                'create' => 'admin.banner.create',
                'show' => 'admin.banner.show',
                'update' => 'admin.banner.update',
                'edit' => 'admin.banner.edit',
                'destroy' => 'admin.banner.destroy',
            ]);
         });

         // Store
         Route::prefix('store')->group(function () {
            Route::get('/', [
                StoreController::class,
                'index'
            ])->name('admin.store');
            Route::get('/create', [
                StoreController::class,
                'create'
            ])->name('admin.store.create');
            Route::post('/store', [
                StoreController::class,
                'store'
            ])->name('admin.store.store');
            Route::get('/edit/{id}', [
                StoreController::class,
                'edit'
            ])->name('admin.store.edit');
            Route::post('/update/{id}', [
                StoreController::class,
                'update'
            ])->name('admin.store.update');
            Route::post('/remove/{id}', [
                StoreController::class,
                'remove'
            ])->name('admin.store.remove');
         });

         // Vending Machines
         Route::prefix('admin')->group(function () {
            Route::resource('vending-machine', VendingMachineController::class)->names([
                'index' => 'admin.vending-machine.index',
                'store' => 'admin.vending-machine.store',
                'create' => 'admin.vending-machine.create',
                'show' => 'admin.vending-machine.show',
                'update' => 'admin.vending-machine.update',
                'edit' => 'admin.vending-machine.edit',
                'destroy' => 'admin.vending-machine.destroy',
            ]);
            
            Route::post('/remove/image/{id}', [
                VendingMachineController::class,
                'removeImage'
            ])->name('admin.vending-machine.removeImage');
         });

         // Product
         Route::prefix('admin')->group(function () {
            Route::resource('product', ProductController::class)->names([
                'index' => 'admin.product.index',
                'store' => 'admin.product.store',
                'create' => 'admin.product.create',
                'show' => 'admin.product.show',
                'update' => 'admin.product.update',
                'edit' => 'admin.product.edit',
                'destroy' => 'admin.product.destroy',
            ]);
         });

         // Banner
         Route::prefix('admin')->group(function () {
             Route::prefix('user')->group(function () {
                Route::get('/', [
                    UserController::class,
                    'index'
                ])->name('admin.user.index');
                Route::get('/create', [
                    UserController::class,
                    'create'
                ])->name('admin.user.create');
                Route::post('/store', [
                    UserController::class,
                    'store'
                ])->name('admin.user.store');
                Route::get('/edit/{id}', [
                    UserController::class,
                    'edit'
                ])->name('admin.user.edit');
                Route::post('/update/{id}', [
                    UserController::class,
                    'update'
                ])->name('admin.user.update');
                Route::get('/view/{id}', [
                    UserController::class,
                    'show'
                ])->name('admin.user.show');
                Route::post('/remove/{id}', [
                    UserController::class,
                    'remove'
                ])->name('admin.user.remove');
                Route::get('/password/{id}', [
                    UserController::class,
                    'password'
                ])->name('admin.user.password');
                Route::post('/change-password/{id}', [
                    UserController::class,
                    'changePassword'
                ])->name('admin.user.changePassword');
             });
         });
         // Admin
         Route::prefix('admin')->group(function () {
            Route::resource('admin_manage', AdminController::class)->names([
                'index' => 'admin.admin.index',
                'store' => 'admin.admin.store',
                'create' => 'admin.admin.create',
                'show' => 'admin.admin.show',
                'update' => 'admin.admin.update',
                'edit' => 'admin.admin.edit',
                'destroy' => 'admin.admin.destroy',
            ]);
            Route::get('/admin_manage/password/{id}', [
                AdminController::class,
                'password'
            ])->name('admin.admin.password');
            Route::post('/admin_manage/change-password/{id}', [
                AdminController::class,
                'changePassword'
            ])->name('admin.admin.changePassword');
         });

         // Version
         Route::prefix('admin')->group(function () {
            Route::resource('version', VersionController::class)->names([
                'index' => 'admin.version.index',
                'store' => 'admin.version.store',
                'create' => 'admin.version.create',
                'show' => 'admin.version.show',
                'update' => 'admin.version.update',
                'edit' => 'admin.version.edit',
                'destroy' => 'admin.version.destroy',
            ]);
        });
         // Maintain
         Route::prefix('admin')->group(function () {
            Route::resource('maintain', MaintainController::class)->names([
                'index' => 'admin.maintain.index',
                'store' => 'admin.maintain.store',
                'create' => 'admin.maintain.create',
                'show' => 'admin.maintain.show',
                'update' => 'admin.maintain.update',
                'edit' => 'admin.maintain.edit',
                'destroy' => 'admin.maintain.destroy',
            ]);
        });

        // Category
        Route::prefix('admin')->group(function () {
            Route::resource('category', CategoryController::class)->names([
                'index' => 'admin.category.index',
                'store' => 'admin.category.store',
                'create' => 'admin.category.create',
                'show' => 'admin.category.show',
                'update' => 'admin.category.update',
                'edit' => 'admin.category.edit',
                'destroy' => 'admin.category.destroy',
            ]);
        });

        // Rfid
        Route::prefix('admin')->group(function () {
            Route::resource('rfid', RfidController::class, ['except' => ['store,create,show,update,edit,destroy']])->names([
                'index' => 'admin.rfid.index',
            ]);
         });
     });

require __DIR__ . '/auth.php';
