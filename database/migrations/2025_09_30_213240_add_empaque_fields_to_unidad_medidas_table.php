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
        Schema::table('unidad_medidas', function (Blueprint $table) {
            if (!Schema::hasColumn('unidad_medidas', 'nombre')) {
                $table->string('nombre', 100)->after('id');
            }
            if (!Schema::hasColumn('unidad_medidas', 'categoria')) {
                $table->string('categoria', 60)->nullable()->after('nombre');
            }
            if (!Schema::hasColumn('unidad_medidas', 'unidad_comercial')) {
                $table->string('unidad_comercial', 120)->nullable()->after('categoria');
            }
            if (!Schema::hasColumn('unidad_medidas', 'equivalencia')) {
                $table->string('equivalencia', 120)->nullable()->after('unidad_comercial');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidad_medidas', function (Blueprint $table) {
            foreach (['equivalencia','unidad_comercial','categoria','nombre'] as $col) {
                if (Schema::hasColumn('unidad_medidas', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
