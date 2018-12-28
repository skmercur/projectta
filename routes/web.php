<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    $k=0;
    $cat = DB::table('categories')->where('confirmed',1)->orderBy('name_categorie','asc')->get();
    
    $arr = array();
    $arrPro = array();
    $nbr = DB::table('products')->get()->count();
    $mostSelled = DB::table('products')->where('quantity','>',0)->where('active',1)->orderBy('sells','desc')->first();
    $mostViewed= DB::table('products')->where('quantity','>',0)->where('active',1)->orderBy('views','desc')->first();
    $mostRecent= DB::table('products')->where('quantity','>',0)->where('active',1)->orderBy('created_at','desc')->first();
    
    foreach ($cat as $ncat) {
      
        $prod = DB::table('products')->where('name_categorie',$ncat->name_categorie)->where('quantity','>',0)->where('active',1)->orderBy('promote','desc')->get();
        if($k < $nbr){
           $Categorie = new stdClass;
            
           $Categorie->name = $ncat->name_categorie;
           $Categorie->most_selled = $mostSelled;
           $Categorie->most_viewed = $mostViewed;
           $Categorie->most_recent = $mostRecent;
          foreach($prod as $pro){
           $Produit = new stdClass;
        if($prod->count()>0){
           $Produit->product = $pro;
           $arrPro[] = $Produit;
           
           
            
           $Categorie->produit = $arrPro;
      
        }
       
       }
   
        unset($arrPro);    
       
       $arr[] = $Categorie;
   
        $k++;
       
        }else{
            continue;
        }
        
   
    
    } 
    return view('welcome')->with('data',$arr);
});
Route::get('/test', function () {
    return view('test');
});

$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 $this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', function(){
    return view('admin');
});
Route::get('/products',function(){
    return view('products');
});
Route::get('/admin',function(){
    return view('admin');
});
Route::post('/test',function(){
    return response()->json(["value"=>mt_rand(0,200)]);
});
Route::post('/addCat',"CategoriesController@addCat");
Route::post('/getCat',"CategoriesController@getCat");
Route::post('/addProduct','ProductsController@addProduct');
Route::post('/ConfirmProduct','ProductsController@confirmeProduct');
Route::post('/getComments','CommentsController@getComments');
Route::post('/getProduct','ProductsController@getProduct');
Route::post('/delProduct','ProductsController@delProduct');
Route::post('/upProduct','ProductsController@upProduct');
Route::get('/test',function(){
    return view('test');
});
Route::post('/LogoutA','\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/delCat','CategoriesController@delCat');
Route::post('/upCat','CategoriesController@upCat');
Route::post('/GetSells','ProductsController@GetSells');
Route::post('/GetSellsDzd','ProductsController@GetSellsDzd');
Route::post('/getImages','ProductsController@getImages');
Route::post('/getNumberOfViews','ProductsController@getNumberOfViews');
Route::post('/GetNbrClients','ClientsController@GetNbrClients');
Route::post('/nc','ClientsController@newClient');
Route::get('/corr',function(){
  /*  $url = "https://geocoder.api.here.com/6.2/geocode.json?app_id=BsNhpmthkn0bMKGMMMV7&app_code=AMDCR2_HijeOSo4pjRvjiw&searchtext=22+rue+Ah+240+lot+bc+Bordj+Bou+Arreridj";
    $cURL = curl_init();
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($cURL);

curl_close($cURL);
$res = json_decode($result);
print_r($res->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Longitude);
$url2 = "https://route.api.here.com/routing/7.2/calculateroute.json?app_id=BsNhpmthkn0bMKGMMMV7&app_code=AMDCR2_HijeOSo4pjRvjiw&waypoint0=geo!36.0652953,4.73981&waypoint1=geo!".$res->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Latitude.",".$res->Response->View[0]->Result[0]->Location->NavigationPosition[0]->Longitude."&mode=fastest;car;traffic:enabled";
$cURL1 = curl_init();
curl_setopt($cURL1, CURLOPT_URL, $url2);
curl_setopt($cURL1, CURLOPT_HTTPGET, true);
curl_setopt($cURL1,CURLOPT_RETURNTRANSFER,true);
$result1 = curl_exec($cURL1);

curl_close($cURL1);
$res1 = json_decode($result1);
 print_r($res1->response->route[0]->summary->distance);*/
 
});
Route::post('/book','RequestsToBuyController@book');
Route::get('/login',function(){
    return view('login');
});
Route::get('/client',function(){
    $req = DB::table('requests_to_buys')->get();
    
    $arr = array();
    foreach($req as $request){
        $produitsClass = new stdClass;
        $data = DB::table('products')->where('code',$request->productCode)->first();
        $produitsClass->name = $data->name_product;
        $produitsClass->prix = ($data->prix) - ($data->prix * $data->remise)/100;
        $produitsClass->status = $request->status;
        $arr[] = $produitsClass;
    }
    return view('buypage')->with('requests',$arr);
});
Route::post('/login','ClientsController@login');
Route::post('/buy','ItemsBoughtController@BuyFunction');
Route::get('/fact',function(){
return view('facture');
});
Route::post('/getReq','RequestsToBuyController@getRequests');
Route::post('/upReq','RequestsToBuyController@upRequests');
Route::post('/delReq','RequestsToBuyController@delRequests');

