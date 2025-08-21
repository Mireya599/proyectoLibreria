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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->integer('id', true);
            $table->decimal('cantidad', 10)->nullable();
            $table->decimal('precio_unitario', 12)->nullable();
            $table->decimal('subtotal', 12)->nullable();
            $table->integer('compras_id')->index('fk_detalle_compras_compras1_idx');
            $table->integer('productos_id')->index('fk_detalle_compras_productos1_idx');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('update_at')->nullable();
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
        Schema::dropIfExists('detalle_compras');
    }
};
