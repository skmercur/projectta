<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories;
use Illuminate\Support\Facades\DB;
class CategoriesController extends Controller
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
public function addCat(Request $request){
if(!empty($request->name)){
    Categories::create([
        'name_categorie' => $request->name, 
        'confirmed'=>0,
    ]);
    return response()->json(["status"=>"ok"]);
}
   
}
public function getCat(Request $request){
   $cat = DB::table('categories')->orderBy('name_categorie','asc')->get();
       
        return response()->json($cat);
    }
    public function upCat(Request $request){
        $id = $request->id;
        $name = $request->name;
        $confirmed = $request->confirmed;
        if(!empty($name) && !empty($confirmed) ){
      DB::table('categories')->where('id_categorie',$id)->update(['name_categorie'=>$name,'confirmed'=>$confirmed]);
        }else{
            DB::table('categories')->where('id_categorie',$id)->update(['confirmed'=>$confirmed]);
        }
             return response()->json(['state'=>'sucess']);
         }
         public function delCat(Request $request){
         $id = $request->id;
             DB::table('categories')->where('id_categorie',$id)->delete();
                
                 return response()->json(['state'=>'sucess']);
             }
       
             public function getConfirmedCats(Request $request){

                $arr = array();
                
                    $cats = DB::table('categories')->where('confirmed',1)->orderBy('created_at','asc')->get();
                    foreach($cats as $ca){
                        $products = DB::table('products')->where('name_categorie',$ca->name_categorie)->get();
                        if($products->count() > 0){
                        $arr[] = $ca->name_categorie;
                        }
                    }
                
                
               return response()->json($arr);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
