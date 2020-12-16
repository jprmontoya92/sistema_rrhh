<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifierValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifier_validations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier_id',255);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreign('identifier_id')->references('id')->on('identifiers');
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
        Schema::dropIfExists('identifier_validations');
    }
}
