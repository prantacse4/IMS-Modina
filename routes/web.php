<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DealerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\PurchaseProductController;
use App\Http\Controllers\Backend\SoldProductController;
use App\Http\Controllers\Backend\TempProductStockController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\SaleProductController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\SaveSaleRecordsController;
use App\Http\Controllers\Backend\SavePurchaseRecordsController;
use App\Http\Controllers\Backend\ShowroomController;
use App\Http\Controllers\Backend\TempPPStockController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/getProducts/{id}', [SearchController::class, 'getProducts'])->name('getProducts');
Route::get('/getSaleCategory/{id}', [SearchController::class, 'getSaleCategory'])->name('getSaleCategorySearch');
Route::post('/search/fetch', [SearchController::class, 'fetch'])->name('search.fetch');
Route::post('/searchresult', [SearchController::class, 'searchresult'])->name('searchresult');






Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/login', [AdminController::class, 'loginpage'])->name('admin.loginpage');

    Route::get('/product', [ProductController::class, 'product'])->name('admin.product');
    Route::get('/product/add', [ProductController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/product/add/store', [ProductController::class, 'store'])->name('admin.addproduct.store');
    Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('admin.deleteproduct');
    Route::get('/product/view/{id}', [ProductController::class, 'productviewer'])->name('admin.productviewer');
    Route::get('/product/edit/{id}', [ProductController::class, 'editproduct'])->name('admin.editproduct');
    Route::put('/product/update/{product}', [ProductController::class, 'updateproduct'])->name('admin.updateproduct.update');


    Route::get('/category', [CategoryController::class, 'category'])->name('admin.category');
    Route::get('/category/add', [CategoryController::class, 'addcategory'])->name('admin.addcategory');
    Route::post('/category/add/store', [CategoryController::class, 'store'])->name('admin.addcategory.store');
    Route::delete('/category/delete/{category}', [CategoryController::class, 'delete'])->name('admin.deletecategory');
    Route::get('/category/view/{id}', [CategoryController::class, 'categoryviewer'])->name('admin.categoryviewer');
    Route::get('/category/edit/{id}', [CategoryController::class, 'editcategory'])->name('admin.editcategory');
    Route::put('/category/update/{category}', [CategoryController::class, 'updatecategory'])->name('admin.updatecategory.update');


    Route::get('/company', [CompanyController::class, 'company'])->name('admin.company');
    Route::get('/company/add', [CompanyController::class, 'addcompany'])->name('admin.addcompany');
    Route::post('/company/add/store', [CompanyController::class, 'store'])->name('admin.addcompany.store');
    Route::delete('/company/delete/{company}', [CompanyController::class, 'delete'])->name('admin.deletecompany');
    Route::get('/company/view/{id}', [CompanyController::class, 'companyviewer'])->name('admin.companyviewer');
    Route::get('/company/edit/{id}', [CompanyController::class, 'editcompany'])->name('admin.editcompany');
    Route::put('/company/update/{company}', [CompanyController::class, 'updatecompany'])->name('admin.updatecompany.update');


    Route::get('/unit', [UnitController::class, 'unit'])->name('admin.unit');
    Route::get('/unit/add', [UnitController::class, 'addunit'])->name('admin.addunit');
    Route::post('/unit/add/store', [UnitController::class, 'store'])->name('admin.addunit.store');
    Route::delete('/unit/delete/{unit}', [UnitController::class, 'delete'])->name('admin.deleteunit');
    Route::get('/unit/view/{id}', [UnitController::class, 'unitviewer'])->name('admin.unitviewer');
    Route::get('/unit/edit/{id}', [UnitController::class, 'editunit'])->name('admin.editunit');
    Route::put('/unit/update/{unit}', [UnitController::class, 'updateunit'])->name('admin.updateunit.update');


    Route::get('/showroom', [ShowroomController::class, 'showroom'])->name('admin.showroom');
    Route::get('/showroom/add', [ShowroomController::class, 'addshowroom'])->name('admin.addshowroom');
    Route::post('/showroom/add/store', [ShowroomController::class, 'store'])->name('admin.addshowroom.store');
    Route::delete('/showroom/delete/{showroom}', [ShowroomController::class, 'delete'])->name('admin.deleteshowroom');
    Route::get('/showroom/view/{id}', [ShowroomController::class, 'showroomviewer'])->name('admin.showroomviewer');
    Route::get('/showroom/edit/{id}', [ShowroomController::class, 'editshowroom'])->name('admin.editshowroom');
    Route::put('/showroom/update/{showroom}', [ShowroomController::class, 'updateshowroom'])->name('admin.updateshowroom.update');


    Route::get('/dealer', [DealerController::class, 'dealer'])->name('admin.dealer');
    Route::get('/dealer/add', [DealerController::class, 'adddealer'])->name('admin.adddealer');
    Route::post('/dealer/add/store', [DealerController::class, 'store'])->name('admin.adddealer.store');
    Route::delete('/dealer/delete/{dealer}', [DealerController::class, 'delete'])->name('admin.deletedealer');
    Route::get('/getdealerdetails/{id}', [DealerController::class, 'getdealerdetails'])->name('admin.getdealerdetails');
    Route::get('/dealer/view/{id}', [DealerController::class, 'dealerviewer'])->name('admin.dealerviewer');
    Route::get('/dealer/edit/{id}', [DealerController::class, 'editdealer'])->name('admin.editdealer');
    Route::put('/dealer/update/{dealer}', [DealerController::class, 'updatedealer'])->name('admin.updatedealer.update');



    Route::get('/dealer/payment', [PaymentController::class, 'dealerpayment'])->name('admin.dealerpayment');
    Route::get('/dealer/payment/add', [PaymentController::class, 'dealeraddpayment'])->name('admin.dealeraddpayment');
    Route::post('/dealer/payment/add/store', [PaymentController::class, 'dealerstore'])->name('admin.dealeraddpayment.store');
    // Route::delete('/payment/delete/{payment}', [PaymentController::class, 'delete'])->name('admin.deletepayment');
    Route::get('/dealer/payment/view/{id}', [PaymentController::class, 'dealerpaymentviewer'])->name('admin.dealerpaymentviewer');
    // Route::get('/balance/edit/{id}', [PaymentController::class, 'editbalance'])->name('admin.editbalance');
    // Route::put('/balance/update/{balance}', [PaymentController::class, 'updatebalance'])->name('admin.updatebalance.update');
    Route::get('/dealer/payment/viewallpayments', [PaymentController::class, 'dealerviewallpayments'])->name('admin.dealerviewallpayments');
    // Route::delete('/payment/delete/history/{payment}', [PaymentController::class, 'deletepaymenthistory'])->name('admin.deletepaymenthistory');



    Route::get('/payment', [PaymentController::class, 'payment'])->name('admin.payment');
    Route::get('/payment/add', [PaymentController::class, 'addpayment'])->name('admin.addpayment');
    Route::post('/payment/add/store', [PaymentController::class, 'store'])->name('admin.addpayment.store');
    Route::delete('/payment/delete/{payment}', [PaymentController::class, 'delete'])->name('admin.deletepayment');
    Route::get('/payment/view/{id}', [PaymentController::class, 'paymentviewer'])->name('admin.paymentviewer');
    Route::get('/balance/edit/{id}', [PaymentController::class, 'editbalance'])->name('admin.editbalance');
    Route::put('/balance/update/{balance}', [PaymentController::class, 'updatebalance'])->name('admin.updatebalance.update');
    Route::get('/payment/viewallpayments', [PaymentController::class, 'viewallpayments'])->name('admin.viewallpayments');
    Route::delete('/payment/delete/history/{payment}', [PaymentController::class, 'deletepaymenthistory'])->name('admin.deletepaymenthistory');



    Route::get('/getProduct/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::get('/getCategory/{id}', [ProductController::class, 'getCategory'])->name('getCategory');
    Route::get('/getAllProduct', [ProductController::class, 'getAllProduct'])->name('getAllProduct');
    Route::get('/getAllProductDetails/{id}', [ProductController::class, 'getAllProductDetails'])->name('getAllProductDetails');
    Route::get('/getAllCategory', [CategoryController::class, 'getAllCategory'])->name('getAllCategory');




    Route::get('/purchase', [PurchaseController::class, 'purchase'])->name('admin.purchase');
    Route::get('/select/purchase/company', [PurchaseProductController::class, 'selectpurchasecompany'])->name('admin.selectpurchasecompany');
    Route::get('/purchaseproduct', [PurchaseProductController::class, 'purchaseproduct'])->name('admin.purchaseproduct');
    Route::get('/gettemp/purchasecondition', [PurchaseProductController::class, 'getpurchasecondition'])->name('getpurchasecondition');
    Route::get('/getTempPurchaseProduct', [PurchaseProductController::class, 'getTempPurchaseProduct'])->name('getTempPurchaseProduct');
    Route::get('/getTempPStockProduct', [TempPPStockController::class, 'getTempPStockProduct'])->name('getTempPStockProduct');
    Route::get('/getPurchaseProduct/{id}', [PurchaseProductController::class, 'getPurchaseProduct'])->name('getPurchaseProduct');
    Route::get('/getPurchaseCategory/{id}', [PurchaseProductController::class, 'getPurchaseCategory'])->name('getPurchaseCategory');
    Route::get('/getAllPurchaseProduct', [PurchaseProductController::class, 'getAllPurchaseProduct'])->name('getAllPurchaseProduct');
    Route::get('/getAllPurchaseCategory', [PurchaseProductController::class, 'getAllPurchaseCategory'])->name('getAllPurchaseCategory');
    Route::get('/getAllPurchaseProductDetails/{id}', [PurchaseProductController::class, 'getAllPurchaseProductDetails'])->name('getAllPurchaseProductDetails');
    Route::get('/getTempPurProductID/{id}', [PurchaseProductController::class, 'getTempPurProductID'])->name('getTempPurProductID');
    Route::get('/getPStockfromStockTemp/{id}', [TempPPStockController::class, 'getPStockfromStockTemp'])->name('getPStockfromStockTemp');
    Route::get('/getLatestSavedIDPurchase', [SavePurchaseRecordsController::class, 'getLatestSavedIDPurchase'])->name('getLatestSavedIDPurchase');



    Route::get('/sale', [SaleController::class, 'sale'])->name('admin.sale');
    Route::get('/sale/invoice/{id}', [SaleController::class, 'sale_invoice'])->name('admin.sale_invoice');
    Route::get('/gettemp/salecondition', [SaleProductController::class, 'getsalecondition'])->name('getsalecondition');
    Route::post('/sale/process/product', [SaleProductController::class, 'saleprocess'])->name('admin.saleprocess.process');
    Route::get('/select/company', [SaleProductController::class, 'selectcompany'])->name('admin.selectcompany');
    Route::get('/saleproduct', [SaleProductController::class, 'saleproduct'])->name('admin.saleproduct');
    Route::get('/getSaleProduct/{id}', [SaleProductController::class, 'getSaleProduct'])->name('getSaleProduct');
    Route::get('/getSaleCategory/{id}', [SaleProductController::class, 'getSaleCategory'])->name('getSaleCategory');
    Route::get('/getAllSaleProduct', [SaleProductController::class, 'getAllSaleProduct'])->name('getAllSaleProduct');
    Route::get('/getAllSaleCategory', [SaleProductController::class, 'getAllSaleCategory'])->name('getAllSaleCategory');
    Route::get('/getAllSaleProductDetails/{id}', [SaleProductController::class, 'getAllSaleProductDetails'])->name('getAllSaleProductDetails');
    Route::get('/getTempSaleProduct', [SaleProductController::class, 'getTempSaleProduct'])->name('getTempSaleProduct');


    Route::get('/getTempProductID/{id}', [SaleProductController::class, 'getTempProductID'])->name('getTempProductID');
    Route::get('/getStockfromStockTemp/{id}', [TempProductStockController::class, 'getStockfromStockTemp'])->name('getStockfromStockTemp');
    Route::get('/getTempStockProduct', [TempProductStockController::class, 'getTempStockProduct'])->name('getTempStockProduct');

    Route::get('/getproductstock/{id}', [TempProductStockController::class, 'getproductstock'])->name('getproductstock');

    Route::get('/getLatestSavedID', [SaveSaleRecordsController::class, 'getLatestSavedID'])->name('getLatestSavedID');





});
