<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    public function index (){
        $products = Product::orderBy('created_at', 'desc')->paginate(5);


        return ProductResource::collection($products);
    }

    function base64ToImage($base64_string, $output_file) {
        $file = fopen($output_file, "wb");
    
        $data = explode(',', $base64_string);
    
        fwrite($file, base64_decode($data[1]));
        fclose($file);
    
        return $output_file;
    }
    public function addProduct(Request $request){

        $imageData = $request->get('image');
        
      $name = $request->name;
      $price = $request->price;
      $quantity = $request->quantity;
      $reduction = $request->reduction;
      $cat = $request->cat;
      $showFirst = $request->showFirst;
      $summery = $request->summery;
      $pro = 0;
      if($showFirst){
$pro = 1;
      }
      $path = "uploads/".md5(mt_rand(0,99999).$name.$summery).".jpg";
        $this->base64ToImage($imageData,$path);
       $products =  DB::table('products')->where('name_product',$name)->first();
      $code = strtoupper(substr(md5(time().mt_rand(0,9999).$name),0,6));
       if(!empty($products->name_product)){
        DB::table('products')->where('name_product',$name)->update(["images"=>$products->images.$path.","]);
       }else{
      Product::create([
        'name_product'=>$name,
        'name_categorie'=>$cat,
        'code'=>$code,
         'prix'=>$price,
         'remise'=>$reduction,
         'sells'=>0,
         'promote'=>$pro,
         'disponible'=>1,
         'quantity'=>$quantity,
         'summery'=>$summery,
         'images'=>$path.',',
         'active'=>0,
         'last_time_bought' => ""
      ]);
       }
        return response()->json(["status"=>"success","code"=>$code]);
       
  

    }
    public function confirmeProduct(Request $request){
        $name = $request->name;
        DB::table('products')->where('name_product',$name)->update(["active"=>1]);
        return response()->json(["status"=>"success"]);
    }
}
