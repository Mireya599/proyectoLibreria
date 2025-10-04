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
        Schema::create('inventario_movimientos', function (Blueprint $table) {
            $table->id();

            $table->integer('producto_id'); // << INT firmado
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');

            // si ventas.id y detalle_ventas.id son INT firmados, usa integer() también;
            // si son BIGINT, usa unsignedBigInteger()/foreignId() para esos dos.
            $table->integer('venta_id')->nullable();
            $table->integer('detalle_venta_id')->nullable();

            $table->enum('tipo', ['ENTRADA','SALIDA']);
            $table->decimal('cantidad', 12, 2);
            $table->decimal('costo_unitario', 12, 2)->nullable();
            $table->decimal('stock_antes', 12, 2)->nullable();
            $table->decimal('stock_despues', 12, 2)->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();

            $table->index(['producto_id','tipo']);
            $table->index('venta_id');
            $table->index('detalle_venta_id');
            $table->index('created_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario_movimientos');
    }
};
