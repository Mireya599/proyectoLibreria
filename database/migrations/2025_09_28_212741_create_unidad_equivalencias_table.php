<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidad_equivalencias', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('unidad_id');
            $table->integer('unidad_base_id');

            $table->decimal('factor', 12, 4);
            $table->string('nombre_presentacion', 60)->nullable();
            $table->boolean('es_default')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['unidad_id']);
            $table->index(['unidad_base_id']);

            $table->foreign('unidad_id')
                ->references('id')->on('unidad_medidas')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('unidad_base_id')
                ->references('id')->on('unidad_medidas')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->unique(['unidad_id','unidad_base_id','factor'], 'uq_equiv_unidad_base_factor');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_equivalencias');
    }
};
