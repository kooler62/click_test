<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->nullable()->unique();
            $table->string('user_agent')->nullable();
            $table->string('ip')->nullable();
            $table->string('referer')->nullable();
            $table->string('param1')->nullable();
            $table->string('param2')->nullable();
            $table->integer('errors')->nullable()->default(0);
            $table->integer('bad_domains')->nullable()->default(0);
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
        Schema::dropIfExists('clicks');
    }
}
