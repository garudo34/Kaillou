<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('kanji');
            $table->text('notes');
            $table->timestamps();
        });

        Schema::create('anime_composer', function (Blueprint $table) {
            $table->integer('anime_id');
            $table->integer('composer_id');
            $table->primary(['anime_id', 'composer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composers');
        Schema::dropIfExists('anime_composer');
    }
}
