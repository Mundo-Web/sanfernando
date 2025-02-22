<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AttempController as AdminAttempController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AttempController;
use App\Http\Controllers\AttempDetailController;
use App\Http\Controllers\AttempSimulationController;
use App\Http\Controllers\AttempSimulationDetailController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products/paginate', [ProductsController::class, 'paginate'])->name('products.paginate');
Route::post('/ofertas/paginate', [ProductsController::class, 'paginateOffers'])->name('ofertas.paginate');

Route::post('/payment/culqi', [PaymentController::class, 'culqi'])->name('payment.culqi');

Route::get('/offers/{id}', [OfferController::class, 'get'])->name('offers.get');

Route::post('/messages', [MessageController::class, 'save'])->name('messages.save');
Route::post('/products/AddOrder', [ProductsController::class, 'AddOrder'])->name('products.AddOrder');

Route::get('/certificate/{attempId}', [CertificateController::class, 'generateCertificate']);

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard/top-products/{orderBy}', [DashboardController::class, 'topProducts'])->name('dashboard.top-products');

    Route::post('/savePerfil',[IndexController::class, 'savePerfil'] );
    Route::post('/savePassword',[IndexController::class, 'actualizarPerfil'] );


    Route::post('/address', [AddressController::class, 'save'])->name('address.save');
    Route::delete('/address/{id}', [AddressController::class, 'delete'])->name('address.delete');
    Route::patch('/address/markasfavorite', [AddressController::class, 'markasfavorite'])->name('address.markasfavorite');

    Route::post('/sales/paginate', [SaleController::class, 'paginate'])->name('sales.paginate');
    Route::post('/sales/confirmation', [SaleController::class, 'confirmation'])->name('sales.confirmation');
    Route::patch('/sales/status', [SaleController::class, 'status'])->name('sales.status');
    Route::get('/saledetails/{sale}', [SaleDetailController::class, 'bySale'])->name('sale.bySale');

    Route::get('/offers', [OfferController::class, 'all'])->name('offers.all');
    Route::patch('/offers', [OfferController::class, 'save'])->name('offers.save');
    Route::delete('/offers/{offer_id}', [OfferController::class, 'delete'])->name('offers.delete');

    Route::get('/modules/{course}', [ModuleController::class, 'byCourse']);
    Route::post('/modules', [ModuleController::class, 'save']);
    Route::post('/modules/paginate', [ModuleController::class, 'paginate']);
    Route::patch('/modules/status', [ModuleController::class, 'status']);
    Route::delete('/modules/{id}', [ModuleController::class, 'delete']);

    Route::get('/sources/{source}', [SourceController::class, 'get']);
    Route::post('/sources', [SourceController::class, 'save']);
    Route::post('/sources/paginate', [SourceController::class, 'paginate']);
    Route::patch('/sources/status', [SourceController::class, 'status']);
    Route::delete('/sources/{id}', [SourceController::class, 'delete']);

    Route::post('/questions', [QuestionController::class, 'save']);
    Route::post('/questions/paginate', [QuestionController::class, 'paginate']);
    Route::patch('/questions/status', [QuestionController::class, 'status']);
    Route::delete('/questions/{id}', [QuestionController::class, 'delete']);

    Route::get('/answers/{question}', [AnswerController::class, 'byQuestion']);
    Route::post('/answers', [AnswerController::class, 'save']);
    Route::post('/answers/paginate', [AnswerController::class, 'paginate']);
    Route::patch('/answers/status', [AnswerController::class, 'status']);
    Route::delete('/answers/{id}', [AnswerController::class, 'delete']);

    Route::post('/attemps', [AttempController::class, 'save']);
    Route::post('/attemps/paginate', [AttempController::class, 'paginate']);
    Route::delete('/attemps/{id}', [AttempController::class, 'delete']);
    // Route::get('/certificate/{attempId}', [AttempController::class, 'certificate']);
    // Route::get('/certificate/{attempId}', [CertificateController::class, 'generateCertificate']);
    Route::post('/attemp-details', [AttempDetailController::class, 'save']);
    
    Route::post('/attemps-simulation', [AttempSimulationController::class, 'save']);
    Route::post('/attemps-simulation/paginate', [AttempSimulationController::class, 'paginate']);
    Route::delete('/attemps-simulation/{id}', [AttempSimulationController::class, 'delete']);

    Route::post('/attemps-detail-simulation', [AttempSimulationDetailController::class, 'save']);



    Route::post('/signs', [SignController::class, 'save']);

    Route::middleware(['can:Admin'])->prefix('admin')->group(function () {
        Route::post('/consumers/paginate', [ConsumerController::class, 'paginate']);
        
        Route::post('/courses/paginate', [CourseController::class, 'paginate']);
        Route::post('/courses/assign', [CourseController::class, 'assign']);

        Route::post('/certificates/assign', [AdminAttempController::class, 'assign']);
    });
});
