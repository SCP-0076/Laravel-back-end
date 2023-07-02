<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id');
            $table->string('animal_number');
            $table->string('type_name');
            $table->integer('years')->nullable();
            $table->timestamps();
            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('animals');
    }
}