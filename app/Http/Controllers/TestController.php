<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Response;



class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result=DB::table('ToDo')
      ->get();
      return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Input::get('todo') == null)
      {
          return response()->json('Bad Request',400);
      }
      $value = DB::table('ToDo')->insert([
        'todo' => Input::get('todo'),
        'flug' => false,
      ]);
      return response()->json('Store Complete',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $value=DB::table('ToDo')
    ->where('id', $id)
    ->first();
    if($value == null)
    {
        return response()->json('Bad Request',400);
    }
    return response()->json($value,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $result = 'EDIT';
    return response()->json($result);;
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
    $value = DB::table('ToDo')
    ->where('id', $id)
    ->get();

    if($value == null )
    {
        return response()->json('Bad Request',400);
    }
    $parms;
    if(Input::get['todo'] != null){
      $params['todo'] = Input::get['todo'];
    }
    if(Input::get['flug'] != null){
      $params['flug'] = Input::get['flug'];
    }
    DB::table('ToDo')
    ->where('id', $id)
    ->update($params);
    return response()->json('Update Complete',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $value = DB::table('ToDo')
    ->where('id', $id)
    ->get();

    if($value == null)
    {
        return response()->json('Bad Request',400);
    }

    DB::table('ToDo')
    ->where('id' ,$id )
    ->delete();

    return response()->json('Delete Complete',200);
    }

}
