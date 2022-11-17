<?php

namespace App\Http\Controllers;

use App\Models\SaldoPendiente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SaldoPendienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  $movimientos = Movimiento::all(); */
        $pendientes = DB::table('saldo_pendiente')
        ->where('status', '=', 'Pendiente')
        ->get();
        return view('saldo_pendiente.index', compact('pendientes'));
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
        $pendientes = SaldoPendiente::create([
            'cantidad' => $request->cantidad_saldo,
            'descripcion' => $request->desc,
            'fecha' => Carbon::now(),
            'status' => 'Pendiente',
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
        $pendientes =SaldoPendiente::findorfail($id);
        $pendientes->status = 'Pagado';
        $pendientes->save();

       return redirect()-> route('dashboard.index')->with('agregado','Transaccion exitosa'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendientes = SaldoPendiente::find($id);
        $pendientes->status = 'Pago';
        $pendientes->save();
        return redirect()-> route('dashboard.index')->with('agregado','Transaccion exitosa'); 

    }
}
