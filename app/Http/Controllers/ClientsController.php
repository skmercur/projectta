<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetNbrClients(Request $request){
$nbr = DB::table('clients')->get()->count();
return response()->json(["value"=>$nbr]);
    }

    public function newClient(Request $request){
        
        $url = "https://geocoder.api.here.com/6.2/geocode.json?app_id=BsNhpmthkn0bMKGMMMV7&app_code=AMDCR2_HijeOSo4pjRvjiw&searchtext=".urlencode($request->data['adresse'].' ,'.$request->data['location'])."";
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($cURL);
    
    curl_close($cURL);
    $res = json_decode($result);
    

$url2 = "https://route.api.here.com/routing/7.2/calculateroute.json?app_id=BsNhpmthkn0bMKGMMMV7&app_code=AMDCR2_HijeOSo4pjRvjiw&waypoint0=geo!36.0652953,4.73981&waypoint1=geo!".$res->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Latitude.",".$res->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Longitude."&mode=fastest;car;traffic:enabled";
$cURL1 = curl_init();
curl_setopt($cURL1, CURLOPT_URL, $url2);
curl_setopt($cURL1, CURLOPT_HTTPGET, true);
curl_setopt($cURL1,CURLOPT_RETURNTRANSFER,true);
$result1 = curl_exec($cURL1);

curl_close($cURL1);
$res1 = json_decode($result1);
$dist = $res1->response->route[0]->summary->distance;
if(empty($dist)){
$dist = 0;
}
$client = DB::table('clients')->where('id_facebook',$request->data['id'])->first();
if(!empty($client->name)){
if(!empty($request->data['adresse']) && !empty($request->data['location']) && !empty($request->data['phone']) ){
    DB::table('clients')->where('id_facebook',$request->data['id'])->update(["phone"=>$request->data['phone'],"location"=>$request->data['adresse'].' ,'.$request->data['location']]);
}
}else{
        Clients::create([
        'name' => $request->data['name'],
        'phone' => $request->data['phone'],
        'email'=> $request->data['email'],
        'id_facebook' =>$request->data['id'],
        'photo' => 'http://graph.facebook.com/'.$request->data['id'].'/picture?type=normal',
        'location' => $request->data['adresse'].' ,'.$request->data['location'],
        'distance' => $dist,
        ]);
}
        return response()->json(['state'=>'success']);
    }
    public function index()
    {
        //
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
public function login(Request $request){
    $fb = $request->fb;
   $client = DB::table('clients')->where('id_facebook',$fb)->first();
    if(!empty($client->name)){
        echo "Bienvenu ".$client->name;
        $req = DB::table('requests_to_buys')->where('id_facebook',$fb)->get();
    if($req->count() > 0){
        $arr = array();
        foreach($req as $request){
            $produitsClass = new \stdClass();
            $data = DB::table('products')->where('code',$request->productCode)->first();
            $produitsClass->name = $data->name_product;
            $produitsClass->prix = ($data->prix) - ($data->prix * $data->remise)/100;
            $produitsClass->status = $request->status;
            $produitsClass->fb = $fb;
            $produitsClass->code= $request->productCode;

            $arr[] = $produitsClass;
        }
        return view('buypage')->with(['requests'=>$arr,'client'=>$fb]);
    }else{
        $items = DB::table('items_boughts')->where('id_buyer',$client->id)->where('status','<',4)->get();
    
        if($items->count() > 0){
            $url = "http://localhost/fact?items=".base64_encode(json_encode($items));
            echo "<script>window.open('http://localhost/fact?items=".base64_encode(json_encode($items))."', '_blank')</script>";
            return view('myitems')->with(['items'=>$items,'link'=>$url]);
        }else{
            echo "You haven't bought or requested  a thing yet";
        }
    }
    }else{
        echo "it seems that you dont have an account";
    }
   
}

public function getDistance(Request $request){
    $id = $request->id;
    $user =DB::table('clients')->where('id_facebook',$id)->first();
    $dist = $user->distance;
    return response()->json($dist);
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
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
