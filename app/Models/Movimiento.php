<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimientos';
    public $timestamps = false ;
    protected $fillable = [
       'fecha',
       'descripcion',
       'debitos',
       'retiros'
    ];
}
