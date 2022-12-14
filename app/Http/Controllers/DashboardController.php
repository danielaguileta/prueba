<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Retiro;
use App\Models\SaldoPendiente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saldo = Movimiento::select(DB::raw('SUM(debitos-retiros) as total'))
                    ->get();
       /*  $retiros = Movimiento::count(); */
        $retiros = Movimiento::select(DB::raw('SUM(retiros) as total'))
        ->get();
        $depositos = Movimiento::select(DB::raw('SUM(debitos) as total'))
        ->get();
        $pendiente = DB::table('saldo_pendiente')
        ->where('status', '=', 'Pendiente')
        ->get();
        $pendientes = SaldoPendiente::select(DB::raw('SUM(cantidad) as total'))
        ->where('status' ,'=', 'Pendiente')
        ->get();
        return view('dash.index', compact('saldo','retiros','depositos','pendientes','pendiente'));
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
