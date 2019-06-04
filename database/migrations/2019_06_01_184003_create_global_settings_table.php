<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promotion_title')->nullable();
            $table->string('promotion_sub_title')->nullable();
            $table->string('promotion_header_url')->nullable();
        });

        // Insert some stuff
        DB::table('global_settings')->insert(['promotion_title' => '']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_settings', function (Blueprint $table) {
            Schema::dropIfExists('global_settings');
        });
    }
}
