<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\TempPSaleStock;
use Illuminate\Http\Request;

class TempPSaleStockController extends Controller
{
    public function getTempPSStockProduct()
    {
        $gettemps = TempPSaleStock::all();
        return  json_encode($gettemps);
    }

    public function getTempPSStockProductDelete($id)
    {
        $SaleProductTempID = TempPSaleStock::find($id);
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
    function getproductPsStock($id)
    {
        $getAllid = TempPSaleStock::where('product_id', '=', $id)->select('stock')->get();
        // $getAllid = $getAllid->count();
        return  json_encode($getAllid);
    }


    public function saveorupdatePSStock(Request $request)
    {
        // dd($request);
        $TempPSStock = TempPSaleStock::all();
        $product_id = $request->product_id;
        $stock = $request->stock;
        $findingProduct = TempPSaleStock::where('product_id', $product_id)->get();
        $howmany = $findingProduct->count();
        if($howmany>0){
            //Update
            foreach ($findingProduct as $temp ) {
                $thistable_id = $temp->id;
            }
            TempPSaleStock::where('id', $thistable_id)->update(['stock' => $stock]);
        }
        else{
            $temp = TempPSaleStock::create(['product_id'=>$product_id, 'stock' => $stock]);
        }

        // $temp = TempPSaleStock::create($request->all());
        return  response()->json($temp);

    }


    public function updatePSStockAfterDelete(Request $request)
    {
        // dd($request);
        $stock_id = $request->stock_id;
        $stock = $request->stock;
        $product_id = $request->product_id;
        $findingProduct = TempPSaleStock::where('product_id', $product_id)->get();
        $howmany = $findingProduct->count();
        if($howmany>0){
            //Update
            foreach ($findingProduct as $temp ) {
                $thistable_id = $temp->id;
            }
            TempPSaleStock::where('id', $thistable_id)->update(['stock' => $stock]);
        }
        else{
            $temp = TempPSaleStock::create(['product_id'=>$product_id, 'stock' => $stock]);
        }

        // $temp = TempPSaleStock::create($request->all());
        return  response()->json($temp);

    }

    public function getPSStockfromStockTemp($id)
    {
        $stock = TempPSaleStock::where('product_id',$id)->get();
        return json_encode($stock);
    }
}
