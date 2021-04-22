<?php

namespace App\Http\Controllers;

use App\Models\Backend\Category;
use App\Models\Backend\Company;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function search()
    {
        $categories = Category::all();
        $products = Product::all();
        return view ( 'search', compact('products','categories'));
    }

    public function getProducts($id)
    {
        $products = Product::where('cat_id',$id)->pluck('pro_name', 'id');
        return json_encode($products);
    }

    public function getSaleCategory($id)
    {
        $cat_id = Product::where('id',$id)->pluck('cat_id');
        $category = Category::where('id',$cat_id)->pluck('cat_name', 'id');
        return json_encode($category);
    }


    public function searchresult(Request $request)
    {
        $categoriesall = Category::all();
        $cat_id = $request->input('category');
        $pro_id = $request->input('product');
        $productsall = Product::where('cat_id',$cat_id)->get();
        $companies = Company::all();

        if($pro_id != "" && $cat_id!="")
        {
            $products = Product::where( 'id',$pro_id)->get();

            if (count ( $products ) > 0)
            {
                return view ( 'searchresult', compact('products', 'pro_id','cat_id','categoriesall', 'productsall', 'companies'));
            }
            else
            {
                $products = 0;
                return view ( 'searchresult', compact('products', 'pro_id','cat_id','categoriesall', 'productsall', 'companies'));
            }
        }
        else{

            $products = 0;
            return view ( 'searchresult', compact('products', 'pro_id','cat_id','categoriesall', 'productsall', 'companies'));
        }

    }




}
