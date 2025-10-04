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
        Schema::table('inventarios', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at'); // agrega columna deleted_at
        });
    }

    public function down()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

};
