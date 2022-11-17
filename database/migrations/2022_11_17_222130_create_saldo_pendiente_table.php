<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_pendiente', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cantidad',10,2);
            $table->string('descripcion', 255)->nullable();
            $table->date('fecha')->format('d/m/Y');
            $table->string('status',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldo_pendiente');
    }
};
