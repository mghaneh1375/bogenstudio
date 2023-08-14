<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page')->unique();
            $table->string('keyword_en')->nullable();
            $table->string('article_tag_en')->nullable();
            $table->string('description_en')->nullable();
            $table->string('keyword_fa')->nullable();
            $table->string('article_tag_fa')->nullable();
            $table->string('description_fa')->nullable();
            $table->string('keyword_gr')->nullable();
            $table->string('article_tag_gr')->nullable();
            $table->string('description_gr')->nullable();
            $table->string('keyword_ar')->nullable();
            $table->string('article_tag_ar')->nullable();
            $table->string('description_ar')->nullable();
            
            $table->enum('default_lang', ['en', 'fa', 'gr', 'ar']);
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
        Schema::dropIfExists('seo');
    }
}
