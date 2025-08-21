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
        Schema::create('producto_bitacoras', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 45)->nullable();
            $table->dateTime('fecha')->nullable();
            $table->integer('productos_id')->index('fk_producto_bitacoras_productos1_idx');
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
        Schema::dropIfExists('producto_bitacoras');
    }
};
