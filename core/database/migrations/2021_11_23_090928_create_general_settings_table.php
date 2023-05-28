<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename')->nullable();
            $table->string('site_email')->nullable();
            $table->string('email_method')->default('php')->nullable();
            $table->text('email_config')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();           
            $table->string('default_image')->nullable();           
            $table->tinyInteger('preloader')->nullable();          
            $table->tinyInteger('analytics_status')->nullable();
            $table->string('analytics_key')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
