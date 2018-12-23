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
      DB::table('categories')->where('id_categorie',$id)->update(['name_categorie'=>$name,'confirmed'=>$confirmed]);
            
             return response()->json(['state'=>'sucess']);
         }
         public function delCat(Request $request){
         $id = $request->id;
             DB::table('categories')->where('id_categorie',$id)->delete();
                
                 return response()->json(['state'=>'sucess']);
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
