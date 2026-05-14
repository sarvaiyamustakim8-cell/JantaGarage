<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookServiceController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductItemController;
use App\Http\Controllers\Admin\DownloedController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Admin\OrderChartController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('about')->controller(AboutController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::prefix('price')->controller(PriceController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::prefix('services')->controller(ServicesController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::prefix('contact')->controller(ContactController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });
    Route::prefix('bookService')->controller(BookServiceController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });
    Route::prefix('purchasePlan')->controller(SubscriptionController::class)->group(function () {
        Route::get('/', 'index')->name('purchasePlan.index');
        Route::post('/', 'store')->name('purchasePlan.store');
    });
    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::get('/index', 'index')->name('admin.index');
    });

    Route::prefix('admin')->controller(BookingController::class)->group(function () {
        Route::get('/orders', 'show')->name('admin.orders');
        Route::get('/editorder', 'index')->name('admin.editorder');
        Route::get('/editorder/{id}/edit', 'edit')->name('admin.editorder.edit');
        Route::put('/editorder/{id}', 'update')->name('admin.editorder.update');
        Route::delete('/orders/{id}', 'destory')->name('admin.orders.destroy');
    });

    Route::prefix('admin')->controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin.user');
        Route::delete('/user/{id}', 'destroy')->name('admin.user.destroy');
    });

    Route::prefix('admin')->controller(InvoicesController::class)->group(function () {
        Route::get('/invoices', 'index')->name('admin.invoices');
        Route::post('/invoices', 'store')->name('admin.invoices.store');
        Route::get('/list', 'list')->name('admin.list');
        Route::delete('/list/{id}', 'destory')->name('admin.list.destory');
        Route::get('/view/{id}', 'show')->name('admin.view');
        Route::get('/product', 'product')->name('admin.product');
    });

    Route::prefix('admin')->controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('admin.product');
        Route::post('/product', 'store')->name('admin.product.store');
    });
    Route::prefix('admin')->controller(ProductItemController::class)->group(function () {
        Route::get('/productItem', 'index')->name('admin.productItem');
        Route::post('/productItem', 'store')->name('admin.productItem.store');
    });
    Route::prefix('admin')->controller(DownloedController::class)->group(function () {
        Route::get('/admin/downloedpdf/{id}', 'show')->name('admin.downloedpdf');
        Route::get('/admin/download-invoice/{id}', 'downloadPdf')->name('admin.invoice.pdf');
    });
    Route::prefix('admin')->controller(OrderChartController::class)->group(function () {
        Route::get('/orderchart', 'show')->name('admin.orderchart');
    });
    Route::get('/get-posts', [ApiController::class, 'getPosts']);
    Route::get('/track-service/{id}', [ServicesController::class, 'trackService']);
});

require __DIR__ . '/auth.php';
