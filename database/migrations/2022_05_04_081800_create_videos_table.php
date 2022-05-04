<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('preview');
            $table->string('file');
            $table->unsignedInteger('priority');
            $table->string('title_en');
            $table->longText('description_en');
            $table->string('title_fa');
            $table->longText('description_fa');
            $table->string('title_ar');
            $table->longText('description_ar');
            $table->string('title_gr');
            $table->longText('description_gr');
            $table->boolean('visibility')->default(true);
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
        Schema::dropIfExists('videos');
    }
}
