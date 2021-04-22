<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\TempPPStock;
use Illuminate\Http\Request;

class TempPPStockController extends Controller
{
    public function getTempPStockProduct()
    {
        $gettemps = TempPPStock::all();
        return  json_encode($gettemps);
    }

    public function getTempPStockProductDelete($id)
    {
        $SaleProductTempID = TempPPStock::find($id);
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
    function getproductPstock($id)
    {
        $getAllid = TempPPStock::where('product_id', '=', $id)->select('stock')->get();
        // $getAllid = $getAllid->count();
        return  json_encode($getAllid);
    }


    public function saveorupdatePStock(Request $request)
    {
        // dd($request);
        $TempPPStock = TempPPStock::all();
        $product_id = $request->product_id;
        $stock = $request->stock;
        $findingProduct = TempPPStock::where('product_id', $product_id)->get();
        $howmany = $findingProduct->count();
        if($howmany>0){
            //Update
            foreach ($findingProduct as $temp ) {
                $thistable_id = $temp->id;
            }
            TempPPStock::where('id', $thistable_id)->update(['stock' => $stock]);
        }
        else{
            $temp = TempPPStock::create(['product_id'=>$product_id, 'stock' => $stock]);
        }

        // $temp = TempPPStock::create($request->all());
        return  response()->json($temp);

    }


    public function updatePStockAfterDelete(Request $request)
    {
        // dd($request);
        $stock_id = $request->stock_id;
        $stock = $request->stock;
        $product_id = $request->product_id;
        $findingProduct = TempPPStock::where('product_id', $product_id)->get();
        $howmany = $findingProduct->count();
        if($howmany>0){
            //Update
            foreach ($findingProduct as $temp ) {
                $thistable_id = $temp->id;
            }
            TempPPStock::where('id', $thistable_id)->update(['stock' => $stock]);
        }
        else{
            $temp = TempPPStock::create(['product_id'=>$product_id, 'stock' => $stock]);
        }

        // $temp = TempPPStock::create($request->all());
        return  response()->json($temp);

    }

    public function getPStockfromStockTemp($id)
    {
        $stock = TempPPStock::where('product_id',$id)->get();
        return json_encode($stock);
    }
}
