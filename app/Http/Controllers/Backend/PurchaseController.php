<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Company;
use App\Models\Backend\Dealer;
use App\Models\Backend\SavePurchaseRecords;
use App\Models\Backend\SaveSaleRecords;
use App\Models\Backend\Showroom;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // purchase selectpurchasecompany purchaseproduct

    public function purchase()
    {
        $dealers = Dealer::all();
        $showrooms = Showroom::all();
        $companies = Company::all();
        $records = SavePurchaseRecords::orderBy('id','DESC')->get();
        return view('admin.pages.purchase.purchase', compact('records', 'dealers', 'showrooms', 'companies'));
    }
}
