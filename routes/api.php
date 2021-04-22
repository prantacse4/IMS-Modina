<?php

use App\Http\Controllers\Backend\PurchaseProductController;
use App\Http\Controllers\Backend\SaleProductController;
use App\Http\Controllers\Backend\SavePurchaseRecordsController;
use App\Http\Controllers\Backend\SaveSaleRecordsController;
use App\Http\Controllers\Backend\SoldProductController;
use App\Http\Controllers\Backend\TempPPStockController;
use App\Http\Controllers\Backend\TempProductStockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/post/sale/condition', [SaleProductController::class, 'salecondition'])->name('admin.salecondition.save');
Route::post('/admin/postProductDetails/save', [SaleProductController::class, 'postProductDetails']);
Route::delete('/admin/getTempSaleProduct/delete/{id}', [SaleProductController::class, 'getTempSaleProductDelete']);
Route::delete('/admin/deleteTempSaleProduct/delete/{product_id}', [SaleProductController::class, 'deleteTempSaleProduct']);
Route::post('/admin/saveSaleRecords/save', [SaveSaleRecordsController::class, 'saveSaleRecords']);
Route::post('/admin/saveSoldData/save', [SoldProductController::class, 'savesolddata']);

Route::delete('/admin/getTempStockProduct/delete/{id}', [TempProductStockController::class, 'getTempStockProductDelete']);
Route::delete('/admin/salecondition/delete/{id}', [SaleProductController::class, 'getSaleconditiondelete']);
Route::post('/admin/saveorupdate/stock', [TempProductStockController::class, 'saveorupdateStock']);
Route::post('/admin/updateStockAfterDelete', [TempProductStockController::class, 'updateStockAfterDelete']);

Route::delete('/admin/purchasecondition/delete/{id}', [PurchaseProductController::class, 'getPurchaseconditiondelete']);
Route::post('/post/purchase/condition', [PurchaseProductController::class, 'purchasecondition'])->name('admin.purchasecondition.save');
Route::delete('/admin/getTempPurchaseProduct/delete/{id}', [PurchaseProductController::class, 'getTempPurchaseProduct']);
Route::delete('/admin/getTempPStockProduct/delete/{id}', [TempPPStockController::class, 'getTempPStockProductDelete']);
Route::post('/admin/postPurchaseProductDetails/save', [PurchaseProductController::class, 'postPurchaseProductDetails']);
Route::post('/admin/saveorupdate/Pstock', [TempPPStockController::class, 'saveorupdatePStock']);
Route::post('/admin/updatePStockAfterDelete', [TempPPStockController::class, 'updatePStockAfterDelete']);
Route::delete('/admin/deleteTempPurchaseProduct/delete/{product_id}', [PurchaseProductController::class, 'deleteTempPurchaseProduct']);
Route::post('/admin/savePurchaseRecords/save', [SavePurchaseRecordsController::class, 'savePurchaseRecords']);
Route::post('/admin/savePurchaseddata/save', [SavePurchaseRecordsController::class, 'savePurchaseddata']);
