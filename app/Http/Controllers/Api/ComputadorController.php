<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComputadorRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Computador;

class ComputadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $computadores = Computador::with('so')->get();

      if($computadores->count() === 0) return ['empty' => true];
      return $computadores;
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
    public function store(ComputadorRequest $request)
    {
      try {
        $computador = Computador::create($request->all());
      } catch (ModelNotFoundException $e){
        return response([
          'error' => true,
          'msg' => 'Id not found',
        ], 404);
      } catch (\Exception $e){
        return response([
          'error' => true,
          'msg' => 'Unknown error',
        ], 403);
      }

      return $computador;
    }

    public function show($id)
    {
      try{
        $computador = Computador::findOrFail($id);
      } catch (ModelNotFoundException $e){
        return response([
          'error' => true,
          'msg' => 'Id not found',
        ], 404);
      } catch (\Exception $e){
        return response([
          'error' => true,
          'msg' => 'Unknown error',
        ], 403);
      }

      return $computador;
    }

    public function edit($id)
    {
        //
    }

    public function update(ComputadorRequest $request, $id)
    {
      try {
        $computador = Computador::findOrFail($id);
        $computador->update($request->all());
      } catch (ModelNotFoundException $e){
        return response([
          'error' => true,
          'msg' => 'Id not found',
        ], 404);
      } catch (\Exception $e){
        return response([
          'error' => true,
          'msg' => 'Unknown error',
        ], 403);
      }

      return $computador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
        $computador = Computador::findOrFail($id);
        $computador->delete();
      } catch (ModelNotFoundException $e){
        return response([
          'error' => true,
          'msg' => 'Id not found',
        ], 404);
      } catch (\Exception $e){
        return response([
          'error' => true,
          'msg' => 'Unknown error',
        ], 403);
      }


      return ['deleted' => $computador->comp_id];
    }
}
