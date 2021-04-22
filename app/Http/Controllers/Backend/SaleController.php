<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Company;
use App\Models\Backend\Dealer;
use Illuminate\Http\Request;
use App\Models\Backend\SaveSaleRecords;
use App\Models\Backend\Showroom;

class SaleController extends Controller
{
    public function sale()
    {
        $dealers = Dealer::all();
        $showrooms = Showroom::all();
        $companies = Company::all();
        $records = SaveSaleRecords::orderBy('id','DESC')->get();
        return view('admin.pages.sale.sale', compact('records', 'dealers', 'showrooms', 'companies'));
    }
}
