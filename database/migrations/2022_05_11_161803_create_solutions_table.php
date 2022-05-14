<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title_en')->nullable();
            $table->string('digest_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('tags_en')->nullable();
            $table->string('sub_tags_en')->nullable();

            $table->string('title_fa')->nullable();
            $table->string('digest_fa')->nullable();
            $table->longText('description_fa')->nullable();
            $table->string('tags_fa')->nullable();
            $table->string('sub_tags_fa')->nullable();

            $table->string('title_ar')->nullable();
            $table->string('digest_ar')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('tags_ar')->nullable();
            $table->string('sub_tags_ar')->nullable();

            $table->string('title_gr')->nullable();
            $table->string('digest_gr')->nullable();
            $table->longText('description_gr')->nullable();
            $table->string('tags_gr')->nullable();
            $table->string('sub_tags_gr')->nullable();

            $table->string('pic');
            $table->enum('default_lang', ['en', 'fa', 'gr', 'ar']);
            $table->unsignedInteger('priority');
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
        Schema::dropIfExists('solutions');
    }
}
