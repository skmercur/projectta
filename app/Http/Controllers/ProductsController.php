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
        $loc = $_SERVER['DOCUMENT_ROOT'].'/py/rescale.py';
        shell_exec("python $loc $path");
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
         'views'=>0,
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
    public function getProduct(Request $request){
        $products = DB::table('products')->get();
        return response()->json($products);
    }
    public function delProduct(Request $request){
        DB::table('products')->where('id_product',$request->id)->delete();
        return response()->json(["status"=>"success"]);
    }
    public function upProduct(Request $request){
        $name = $request->name;
        $price = $request->price;
      
        $quan = $request->quan;
        $cat = $request->cat;
        $summery = $request->summery;
        $active = $request->active;
        $remise = $request->remise;

        DB::table('products')->where('id_product',$request->id)->update(["name_product"=>$name,"prix"=>$price,"quantity"=>$quan,"name_categorie"=>$cat,'summery'=>$summery,'active'=>$active,'remise'=>$remise]);
        return response()->json(["status"=>"success"]);
    }
    public function GetSells(Request $request){
        $products = DB::table('products')->get();
        $sells = 0;
        foreach($products as $product){
            $sells += $product->sells; 
        }
        return response()->json($sells);
    }
    public function GetSellsDzd(Request $request){
        $products = DB::table('products')->get();
        $sells = 0;
        foreach($products as $product){
            $sells += $product->sells * $product->prix; 
        }
        return response()->json($sells);
    }
    public function getImages(Request $request){
        $name = $request->name;
        $data = DB::table('products')->where('name_product',$name)->first();
     
     return response()->json($data->images); 
    }

    public function getNumberOfViews(Request $request){
        
        $data = DB::table('products')->where('views','>',0)->get();
        $views = 0;
        foreach($data as $view){
$views += $view->views;
        }
     
     return response()->json(["value"=>$views]); 
    }

    public function addViews(Request $request){
        $name = $request->name;
        if(!empty($name)){
            $data = DB::table('products')->where('name_product',$name)->first();
            DB::table('products')->where('name_product',$name)->update(['views'=>$data->views +1]);

        }
    }

    public function getItemsForCat(Request $request){
        $cat = $request->cat;
      

            $items = DB::table('products')->where('name_categorie',$cat)->where('quantity','>',0)->where('active',1)->orderBy('created_at','desc')->get();
            $arr = array();
             
            foreach ($items as $item ) {
            
             
               $arr[] = $item;
            }
            return response()->json($arr);
        
    }
    public function getProductCode(Request $request){
        $value = $request['slug'];
        if(!empty($value)){
            $product = DB::table('products')->where('code',$value)->first();
if(!empty($product->code)){
            return view('productdetails')->with(['product'=>$product]);
}else{
    return redirect('/');
}
        }
    }
   
}
