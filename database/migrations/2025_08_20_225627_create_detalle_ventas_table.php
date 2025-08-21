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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('cantidad')->nullable();
            $table->decimal('precio_unitario', 10, 0)->nullable();
            $table->decimal('subtotal', 10, 0)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('ventas_id')->index('fk_detalle_ventas_ventas1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
