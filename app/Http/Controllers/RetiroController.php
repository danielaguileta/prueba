<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionRequest;
use App\Models\Movimiento;
use App\Models\Retiro;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RetiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('retiro.index');
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
    public function store(ValidacionRequest $request)
    {
        $retiros = Retiro::create([
              'cantidad' => $request->cantidad,
              'descripcion'=> $request->desc,
              'fecha' => Carbon::now()
        ]);

        $retiros = Movimiento::create([
            'retiros' => $request->cantidad,
            'debitos' => 0,
            'descripcion'=> $request->desc,
            'fecha' => Carbon::now()
      ]);


        return redirect()-> route('dashboard.index')->with('agregado','Transaccion exitosa'); 
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
