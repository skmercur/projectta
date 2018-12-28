<?php

namespace App\Http\Controllers;

use App\RequestsToBuy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestsToBuyController extends Controller
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
    public function book(Request $request){
        $fb = $request->id;
        $delivery = $request->delivery;
        $prix = $request->prix;
        $code = strtoupper(substr(md5(time().mt_rand(0,99999)),0,8));
        foreach($request->data as $data) {
           
       RequestsToBuy::create([
        'id_facebook'=>$fb,'codeRequest'=>$code,'productCode'=>$data['code'],'status'=>0
       ,'methode'=>$delivery,'prix'=>$prix]);
        }
        return response()->json(['Status'=>'success']);
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
    public function getRequests(Request $request){
        $cat = DB::table('requests_to_buys')->orderBy('created_at','desc')->get();
            
             return response()->json($cat);
         }
         public function upRequests(Request $request){
            $id = $request->id;
           
            $status = $request->status;
          
                DB::table('requests_to_buys')->where('id',$id)->update(['status'=>$status]);
            
                 return response()->json(['state'=>'sucess']);
             }
             public function delRequests(Request $request){
             $id = $request->id;
                 DB::table('requests_to_buys')->where('id',$id)->delete();
                    
                     return response()->json(['state'=>'sucess']);
                 }
                 public function GetRequestsAdmin(Request $request){
                    $requests = DB::table('requests_to_buys')->get()->count();
                    return response()->json($requests);
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
     * @param  \App\RequestsToBuy  $requestsToBuy
     * @return \Illuminate\Http\Response
     */
    public function show(RequestsToBuy $requestsToBuy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestsToBuy  $requestsToBuy
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestsToBuy $requestsToBuy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestsToBuy  $requestsToBuy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestsToBuy $requestsToBuy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestsToBuy  $requestsToBuy
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestsToBuy $requestsToBuy)
    {
        //
    }
}
