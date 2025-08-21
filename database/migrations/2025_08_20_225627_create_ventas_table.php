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
        Schema::create('ventas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo_factura', 50);
            $table->decimal('total', 10, 0)->nullable();
            $table->enum('tipo_pago', ['efectivo', 'tarjeta', 'otros'])->nullable();
            $table->dateTime('fecha_venta')->nullable();
            $table->integer('clientes_id')->index('fk_ventas_clientes1_idx');
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
        Schema::dropIfExists('ventas');
    }
};
