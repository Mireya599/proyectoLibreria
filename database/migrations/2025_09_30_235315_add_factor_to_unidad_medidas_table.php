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
            if (!Schema::hasColumn('unidad_medidas','factor')) {
                $table->decimal('factor', 12, 4)->default(1)->after('equivalencia');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('unidad_medidas', function (Blueprint $table) {
            if (Schema::hasColumn('unidad_medidas','factor')) $table->dropColumn('factor');
        });
    }
};
