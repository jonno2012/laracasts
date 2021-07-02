<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDibblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dibbles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nick_id');
            $table->foreign('nick_id')->references('id')->on('nicks');
            $table->integer('number')->unique();
            $table->string('call_sign')->unique();
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
        Schema::dropIfExists('dibbles');
    }
}
