<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoPendiente extends Model
{
    use HasFactory;
    protected $table = 'saldo_pendiente';
    public $timestamps = false ;
    protected $fillable = [
       'fecha',
       'descripcion',
       'cantidad',
       'status'
    ];
}
