<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\SaveSaleRecords;

class SaveSaleRecordsController extends Controller
{
    public function saveSaleRecords(Request $request)
    {
        // dd($request);
        $temp = SaveSaleRecords::create($request->all());
        return  response()->json($temp);

    }

    public function getLatestSavedID()
    {
        $gettemps = SaveSaleRecords::orderBy('id', 'desc')->first();
        return  json_encode($gettemps);
    }
}
