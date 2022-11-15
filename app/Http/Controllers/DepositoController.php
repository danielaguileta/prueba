<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionRequest;
use App\Models\Deposito;
use App\Models\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('deposito.index');
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
        $depositos = Deposito::create([
            'cantidad' => $request->cantidad,
            'descripcion' => $request->desc,
            'fecha' => Carbon::now()
        ]);

        $depositos = Movimiento::create([
            'retiros' => 0.00,
            'debitos' => $request->cantidad,
            'descripcion' => $request->desc,
            'fecha' => Carbon::now()
        ]);
        return redirect()->route('dashboard.index')->with('agregado', 'Transaccion exitosa');
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
