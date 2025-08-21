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
        Schema::table('venta_bitacoras', function (Blueprint $table) {
            $table->foreign(['ventas_id'], 'fk_venta_bitacoras_ventas1')->references(['id'])->on('ventas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta_bitacoras', function (Blueprint $table) {
            $table->dropForeign('fk_venta_bitacoras_ventas1');
        });
    }
};
