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
        Schema::table('detalle_compras', function (Blueprint $table) {
            $table->foreign(['compras_id'], 'fk_detalle_compras_compras1')->references(['id'])->on('compras')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['productos_id'], 'fk_detalle_compras_productos1')->references(['id'])->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_compras', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_compras_compras1');
            $table->dropForeign('fk_detalle_compras_productos1');
        });
    }
};
