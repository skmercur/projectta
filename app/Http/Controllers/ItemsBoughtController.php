<?php

namespace App\Http\Controllers;

use App\ItemsBought;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ItemsBoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



public function numberOfBuyers(Request $request){
$num = DB::table('items_boughts')->get()->count();
return response()->json($num);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemsBought  $itemsBought
     * @return \Illuminate\Http\Response
     */
    public function show(ItemsBought $itemsBought)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemsBought  $itemsBought
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemsBought $itemsBought)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemsBought  $itemsBought
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemsBought $itemsBought)
    {
        //
    }

public function BuyFunction(Request $request){
    if(!empty($request->id) && !empty($request->code)){
        $fb = $request->id;
        $file = $request->file('image');
        $fileArray = array('image' => $file);
        $rules = array(
          'image' => 'mimes:jpeg,jpg,png,gif|required|max:5000' // max 10000kb
        );
     $validator = Validator::make($fileArray, $rules);
     if($validator->fails()){
        echo "sorry your file is not supported";
        return back();
     
    }else{
        $client = DB::table('clients')->where('id_facebook',$fb)->first();
        $reqTobuy = DB::table('requests_to_buys')->where('id_facebook',$fb)->first();
        $prix = $reqTobuy->prix;
   $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
   $destinationPath = "usersdata/".md5('uploads'.$fb)."/";
   $file->move($destinationPath,$hash);
   $arrCode = explode(",",$request->code);
   
   foreach($arrCode as $code){
    $codeCommentaire =strtoupper(substr(md5(time().mt_rand(0,2000)),0,8));
   ItemsBought::create([
    'id_buyer'=>$client->id,
    'code_product'=>$code,'image_ccp'=>$destinationPath.$hash,'code_commentaire' =>$codeCommentaire ,
    'status'=>0,'prix'=>$prix
   ]);
   }

  $requests =  DB::table('requests_to_buys')->where('id_facebook',$fb)->get();
  foreach($requests as $req){
    DB::table('requests_to_buys')->where('id_facebook',$fb)->delete();
  }
return response()->json(['status'=>'success']);

    }
}
}

public function getItems(Request $request){
    $cat = DB::table('items_boughts')->orderBy('created_at','desc')->get();
            
    return response()->json($cat);
}
public function upItems(Request $request){
    $id = $request->id;
   
    $status = $request->status;
  
        DB::table('items_boughts')->where('id',$id)->update(['status'=>$status]);
    
         return response()->json(['state'=>'sucess']);
     }
     public function delItems(Request $request){
     $id = $request->id;
         DB::table('items_boughts')->where('id',$id)->delete();
            
             return response()->json(['state'=>'sucess']);
         }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemsBought  $itemsBought
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemsBought $itemsBought)
    {
        //
    }
}
