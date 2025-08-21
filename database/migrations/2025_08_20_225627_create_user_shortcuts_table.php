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
        Schema::create('user_shortcuts', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id')->index('fk_options_has_users_options1_idx');
            $table->unsignedBigInteger('user_id')->index('fk_options_has_users_users1_idx');
            $table->string('color')->nullable();
            $table->integer('orden')->nullable();

            $table->primary(['option_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_shortcuts');
    }
};
