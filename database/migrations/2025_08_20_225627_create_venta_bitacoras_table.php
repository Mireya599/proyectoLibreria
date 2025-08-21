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
        Schema::create('venta_bitacoras', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 150)->nullable();
            $table->dateTime('fecha')->nullable();
            $table->integer('ventas_id')->index('fk_venta_bitacoras_ventas1_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_bitacoras');
    }
};
