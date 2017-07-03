<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LicencaRequest;
use App\Licenca;

class LicencaController extends Controller
{
    public function index()
    {
      $licencas = Licenca::all();

      return ($licencas->count() === 0) ? ['empty' => true] : $licencas;
    }


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
    public function store(LicencaRequest $request)
    {
      try {
        $licenca = Licenca::create($request->all());
      } catch (\Exception $e) {
        return response(['error' => true], 403);
      }

      return $licenca;
    }

    public function show($id)
    {
      try{
        $licenca = Licenca::findOrFail($id);
      } catch (\Exception $e) {
        return response(['error' => true], 403);
      }

      return $licenca;
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
    public function update(LicencaRequest $request, $id)
    {
      try {
        $licenca = Licenca::findOrFail($id);
        $licenca->update($request->all());
      } catch (\Exception $e) {
        return response(['error' => true], 403);
      }

      return $licenca;
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
