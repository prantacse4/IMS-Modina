<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Company;
use App\Models\Backend\Dealer;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use App\Models\Backend\SaveSaleRecords;
use App\Models\Backend\Showroom;
use App\Models\Backend\SoldProduct;

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

    public function sale_invoice($id)
    {
        $sale_records = SaveSaleRecords::where('id', $id)->get();
        $sold_products = SoldProduct::where('sale_id', $id)->get();
        $dealers = Dealer::all();
        $showrooms = Showroom::all();
        $companies = Company::all();
        $products = Product::all();
        return view('admin.pages.sale.sale_invoice', compact('sale_records', 'sold_products', 'dealers', 'showrooms', 'companies', 'products'));
    }
}
