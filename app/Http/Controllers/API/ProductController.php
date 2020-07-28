<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public $successStatus = 200;
    //
    public function product(){
        // data products
        $products = Product::all();

        if(count($products) == 0){
            $products = 'Data tidak ditemukan.';
            $this->successStatus = 404;
        }

        return response()->json(['products'=>$products], $this->successStatus);
    }

    // create product
    public function saveProduct(Request $req)
    {
        // run validation
        $validation = Validator::make($req->all(), [
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        // is_fail
        if($validation->fails()){
            return response()->json([
                'error' => $validation->errors()
            ], 401);
        }

        $product = new Product;
        $product->name = $req->name;
        $product->category = $req->category;
        $product->price = $req->price;

        if($product->save()){
            $msg = 'Data Berhasil ditambahkan';
        }else{
            $msg = 'Gagal menyimpnan Data';
            $this->successStatus = 404;
        }

        return response()->json(['product'=>$product], $this->successStatus);
    }

    public function updateProduct(Request $req)
    {
        // return $req->input();
        $product = Product::find($req->id);

        $product->category = $req->category;

        if($product->save())
        {
            return response()->json(['msg'=>'Data berhasil diupdated','product'=>$product], $this->successStatus);
        }
    }
}
