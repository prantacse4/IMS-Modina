<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\SoldProduct;

class SoldProductController extends Controller
{
    public function savesolddata(Request $request)
    {
        // dd($request);
        $temp = SoldProduct::create($request->all());
        return  response()->json($temp);

    }
}
