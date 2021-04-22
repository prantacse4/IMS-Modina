<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\TempProductStock;

class TempProductStockController extends Controller
{
    public function getTempStockProduct()
    {
        $gettemps = TempProductStock::all();
        return  json_encode($gettemps);
    }

    public function getTempStockProductDelete($id)
    {
        $SaleProductTempID = TempProductStock::find($id);
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
    function getproductstock($id)
    {
        $getAllid = TempProductStock::where('product_id', '=', $id)->select('stock')->get();
        // $getAllid = $getAllid->count();
        return  json_encode($getAllid);
    }


    public function saveorupdateStock(Request $request)
    {
        // dd($request);
        $tempProductStock = TempProductStock::all();
        $product_id = $request->product_id;
        $stock = $request->stock;
        $findingProduct = TempProductStock::where('product_id', $product_id)->get();
        $howmany = $findingProduct->count();
        if($howmany>0){
            //Update
            foreach ($findingProduct as $temp ) {
                $thistable_id = $temp->id;
            }
            TempProductStock::where('id', $thistable_id)->update(['stock' => $stock]);
        }
        else{
            $temp = TempProductStock::create(['product_id'=>$product_id, 'stock' => $stock]);
        }

        // $temp = TempProductStock::create($request->all());
        return  response()->json($temp);

    }


    public function updateStockAfterDelete(Request $request)
    {
        // dd($request);
        $stock_id = $request->stock_id;
        $stock = $request->stock;
        $product_id = $request->product_id;
        $findingProduct = TempProductStock::where('product_id', $product_id)->get();
        $howmany = $findingProduct->count();
        if($howmany>0){
            //Update
            foreach ($findingProduct as $temp ) {
                $thistable_id = $temp->id;
            }
            TempProductStock::where('id', $thistable_id)->update(['stock' => $stock]);
        }
        else{
            $temp = TempProductStock::create(['product_id'=>$product_id, 'stock' => $stock]);
        }

        // $temp = TempProductStock::create($request->all());
        return  response()->json($temp);

    }

    public function getStockfromStockTemp($id)
    {
        $stock = TempProductStock::where('product_id',$id)->get();
        return json_encode($stock);
    }
}
