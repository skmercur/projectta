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
    if(!empty($request->id)){
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

        
   $hash = md5($file->getClientOriginalName()."theghost").".".$file->getClientOriginalExtension();
   $destinationPath = "usersdata/".md5('uploads'.$fb)."/";
   $file->move($destinationPath,$hash);



   
    }
}
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
