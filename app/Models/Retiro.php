<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory;

    protected $table = 'retiros';
    public $timestamps = false;

    protected $fillable = [
        'cantidad',
        'descripcion',
        'fecha'
    ];
}
