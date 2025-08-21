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
        Schema::create('productos', function (Blueprint $table) {
            $table->comment('	');
            $table->integer('id', true);
            $table->string('codigo', 100);
            $table->string('descripcion')->nullable();
            $table->decimal('cantidad', 10)->nullable();
            $table->decimal('precio_fabrica', 12)->nullable();
            $table->decimal('total_fabrica', 12)->nullable();
            $table->decimal('precio_libreria', 12)->nullable();
            $table->decimal('total_libreria', 12)->nullable();
            $table->decimal('ganancia', 12)->nullable();
            $table->integer('categorias_id')->index('fk_productos_categorias1_idx');
            $table->integer('proveedores_id')->index('fk_productos_proveedores1_idx');
            $table->integer('unidad_medidas_id')->index('fk_productos_unidad_medidas1_idx');
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
        Schema::dropIfExists('productos');
    }
};
