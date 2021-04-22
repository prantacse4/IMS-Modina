<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BalanceDue;
use App\Models\Backend\Category;
use App\Models\Backend\Company;
use App\Models\Backend\Product;
use App\Models\Backend\Dealer;
use App\Models\Backend\Payment;
use App\Models\Backend\SaleProductTemp;
use App\Models\Backend\Showroom;
use App\Models\Backend\TempSaleCondition;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    public function saleproduct()
    {

        $temptabledata = SaleProductTemp::all();
        $dealers = Dealer::all();
        $showroom = Showroom::all();
        $categories = Category::all();
        $salecondition = TempSaleCondition::all()->count();
        if ($salecondition>0) {
            $tempselect = TempSaleCondition::all();

            foreach ($tempselect as $temp ) {
                $com_id = $temp->com_id;

            }

            $company = Company::where('id', $com_id)->get();
            $products = Product::where('com_id', $com_id)->get();
            $balancedue = BalanceDue::where('com_id', $com_id)->get();
            $balanceduecount = $balancedue->count();
            return view('admin.pages.sale.saleproduct', compact('balanceduecount','balancedue','showroom','products','company', 'categories','temptabledata', 'dealers'));
        }
        else{
            $company = Company::all();
            $categories = Category::all();
            return redirect()->route('admin.selectcompany');
        }

    }


    public function getsalecondition()
    {
        $gettemps = TempSaleCondition::all();
        return  json_encode($gettemps);
    }

    public function salecondition(Request $request)
    {
        // dd($request);
        $temp = TempSaleCondition::create($request->all());
        return  response()->json($temp);

    }



    public function saleprocess(Request $request)
    {
        $com_id = $request->com_id;
        $cat_id = $request->cat_id;
        $product = Product::where('com_id', $com_id)->where('cat_id', $cat_id)->get();
        $products = $product;
        $temptabledata = SaleProductTemp::all();
        $dealers = Dealer::all();

        $categories = Category::all(); //delete this line
        return view('admin.pages.sale.saleproduct', compact('products','temptabledata', 'dealers', 'categories'));
    }



    public function selectcompany()
    {
        $company = Company::all();
        $categories = Category::all();
        return view('admin.pages.sale.select_company', compact('company', 'categories'));
    }


    public function getSaleProduct($id)
    {

        $tempselect = TempSaleCondition::all();
        foreach ($tempselect as $temp ) {
            $com_id = $temp->com_id;
        }
        $products = Product::where('com_id', $com_id)->where('cat_id',$id)->pluck('pro_name', 'id');
        return json_encode($products);
    }

    public function getSaleCategory($id)
    {
        $cat_id = Product::where('id',$id)->pluck('cat_id');
        $category = Category::where('id',$cat_id)->pluck('cat_name', 'id');
        return json_encode($category);
    }

    public function getAllSaleProductDetails($id)
    {
        $productsdetails = Product::where('id',$id)->get();
        return json_encode($productsdetails);
    }


    public function getTempProductID($id)
    {
        $pro_id = SaleProductTemp::where('id',$id)->get();
        return json_encode($pro_id);
    }












    public function getAllSaleProduct()
    {
        $products = Product::all()->pluck('pro_name', 'id');
        return json_encode($products);

    }
    public function getAllSaleCategory()
    {
        $categories = Category::all()->pluck('cat_name', 'id');
        return json_encode($categories);
    }

    public function postProductDetails(Request $request)
    {
        // dd($request);
        $temp = SaleProductTemp::create($request->all());
        return  response()->json($temp);

    }

    public function getTempSaleProduct()
    {
        $gettemps = SaleProductTemp::all();
        return  json_encode($gettemps);
    }

    public function getTempSaleProductDelete($id)
    {
        $SaleProductTempID = SaleProductTemp::find($id);
        if($SaleProductTempID){
            $SaleProductTempID->delete();
            $notify = 'Data Deleted';
            return response()->json($notify);
        }
        else{
            $er = 'Data Not Found';
            return response()->json($er);
        }
    }

    public function deleteTempSaleProduct($product_id)
    {
        $SaleProductTempID = SaleProductTemp::where('id',$product_id);
        if($SaleProductTempID){
            $SaleProductTempID->delete();
            $notify = 'Data Deleted';
            return response()->json($notify);
        }
        else{
            $er = 'Data Not Found';
            return response()->json($er);
        }
    }

    public function getSaleconditiondelete($id)
    {
        $SaleProductTempID = TempSaleCondition::find($id);
        if($SaleProductTempID){
            $SaleProductTempID->delete();
            $notify = 'Data Deleted';
            return response()->json($notify);
        }
        else{
            $er = 'Data Not Found';
            return response()->json($er);
        }
    }


}
