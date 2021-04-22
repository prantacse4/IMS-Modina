<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PurchasedProducts;
use App\Models\Backend\SavePurchaseRecords;
use Illuminate\Http\Request;

class SavePurchaseRecordsController extends Controller
{
    public function savePurchaseRecords(Request $request)
    {
        // dd($request);
        $temp = SavePurchaseRecords::create($request->all());
        return  response()->json($temp);

    }

    public function getLatestSavedIDPurchase()
    {
        $gettemps = SavePurchaseRecords::orderBy('id', 'desc')->first();
        return  json_encode($gettemps);
    }

    public function savePurchaseddata(Request $request)
    {
        // dd($request);
        $temp = PurchasedProducts::create($request->all());
        return  response()->json($temp);

    }
}
