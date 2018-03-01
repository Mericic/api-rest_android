<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('notes', function (Blueprint $table) {
        $table->increments('id_note');
        $table->integer('id_user');
        $table->integer('id_matiere');
        $table->integer('coeff');
        $table->integer('quotient');
        $table->integer('note');
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
        //
    }
}
