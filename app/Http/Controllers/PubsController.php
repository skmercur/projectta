<?php

namespace App\Http\Controllers;

use App\Pubs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PubsController extends Controller
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

    public function addPub(Request $request){
$pubs = DB::table('pubs')->get();
if($pubs->count() > 0){
    DB::table('pubs')->where('id',1)->update([
        'photo1'=>$request->photo1,
        'photo2'=>$request->photo2,
        'photo3'=>$request->photo3,
        'photo4'=>$request->photo4,
        'photo5'=>$request->photo5,
    ]);
}else{
    Pubs::create([
        'photo1'=>$request->photo1,
        'photo2'=>$request->photo2,
        'photo3'=>$request->photo3,
        'photo4'=>$request->photo4,
        'photo5'=>$request->photo5,
    ]);
}
    }

    public function getPubs(Request $request){
        $pubs = DB::table('pubs')->first();
        return response()->json($pubs);
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
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function show(Pubs $pubs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function edit(Pubs $pubs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pubs $pubs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pubs  $pubs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pubs $pubs)
    {
        //
    }
}
