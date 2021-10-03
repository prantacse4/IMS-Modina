<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BalanceDue;
use App\Models\Backend\Category;
use App\Models\Backend\Company;
use App\Models\Backend\Dealer;
use App\Models\Backend\Product;
use App\Models\Backend\PurchaseProductTemp;
use App\Models\Backend\SaleProductTemp;
use App\Models\Backend\Showroom;
use App\Models\Backend\TempPurchaseCondition;
use App\Models\Backend\TempSaleCondition;
use Illuminate\Http\Request;

class PurchaseProductController extends Controller
{
    public function purchaseproduct()
    {

        $temptabledata = PurchaseProductTemp::all();
        $dealers = Dealer::all();
        $showroom = Showroom::all();
        $categories = Category::all();
        $salecondition = TempPurchaseCondition::all()->count();
        if ($salecondition>0) {
            $tempselect = TempPurchaseCondition::all();
            foreach ($tempselect as $temp ) {
                $com_id = $temp->com_id;
            }
            $company = Company::where('id', $com_id)->get();
            $products = Product::where('com_id', $com_id)->get();
            $balancedue = BalanceDue::where('com_id', $com_id)->get();
            $balanceduecount = $balancedue->count();
            return view('admin.pages.purchase.purchaseproduct', compact('balanceduecount','balancedue','showroom','products','company', 'categories','temptabledata', 'dealers'));
        }
        else{
            $company = Company::all();
            $categories = Category::all();
            return redirect()->route('admin.selectpurchasecompany');
        }

    }

    public function selectpurchasecompany()
    {
        $company = Company::all();
        $categories = Category::all();
        return view('admin.pages.purchase.select_company', compact('company', 'categories'));
    }

    public function getpurchasecondition()
    {
        $gettemps = TempPurchaseCondition::all();
        return  json_encode($gettemps);
    }

    public function purchasecondition(Request $request)
    {
        // dd($request);
        $temp = TempPurchaseCondition::create($request->all());
        return  response()->json($temp);

    }

    public function getPurchaseconditiondelete($id)
    {
        $SaleProductTempID = TempPurchaseCondition::find($id);
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



    //PurchaseProductTemp
    public function getTempPurchaseProduct()
    {
        $gettemps = PurchaseProductTemp::all();
        return  json_encode($gettemps);
    }

    

    public function getTempPurchaseProductDelete($id)
    {
        $SaleProductTempID = PurchaseProductTemp::find($id);
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


    //Getting Product And Category Details for Purchase
    public function getPurchaseProduct($id)
    {

        $tempselect = TempPurchaseCondition::all();
        foreach ($tempselect as $temp ) {
            $com_id = $temp->com_id;
        }
        $products = Product::where('com_id', $com_id)->where('cat_id',$id)->pluck('pro_name', 'id');
        return json_encode($products);
    }

    public function getPurchaseCategory($id)
    {
        $cat_id = Product::where('id',$id)->pluck('cat_id');
        $category = Category::where('id',$cat_id)->pluck('cat_name', 'id');
        return json_encode($category);
    }

    public function getAllPurchaseProductDetails($id)
    {
        $productsdetails = Product::where('id',$id)->get();
        return json_encode($productsdetails);
    }

    public function getAllPurchaseProduct()
    {
        $products = Product::all()->pluck('pro_name', 'id');
        return json_encode($products);

    }
    public function getAllPurchaseCategory()
    {
        $categories = Category::all()->pluck('cat_name', 'id');
        return json_encode($categories);
    }

    public function postPurchaseProductDetails(Request $request)
    {
        // dd($request);
        $temp = PurchaseProductTemp::create($request->all());
        return  response()->json($temp);

    }

    public function getTempPurProductID($id)
    {
        $pro_id = PurchaseProductTemp::where('id',$id)->get();
        return json_encode($pro_id);
    } 

    public function deleteTempPurchaseProduct($product_id)
    {
        $PurchaseProductTempID = PurchaseProductTemp::where('id',$product_id);
        if($PurchaseProductTempID){
            $PurchaseProductTempID->delete();
            $notify = 'Data Deleted';
            return response()->json($notify);
        }
        else{
            $er = 'Data Not Found';
            return response()->json($er);
        }
    }
}
