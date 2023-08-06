<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableFieldsInVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('title_en')->nullable()->change();
            $table->string('title_fa')->nullable()->change();
            $table->string('title_gr')->nullable()->change();
            $table->string('title_ar')->nullable()->change();

            $table->longText('description_en')->nullable()->change();
            $table->longText('description_fa')->nullable()->change();
            $table->longText('description_gr')->nullable()->change();
            $table->longText('description_ar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {

        });
    }
}
