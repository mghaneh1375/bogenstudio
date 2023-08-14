<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDigestColumnsInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('digest_en', 1000)->nullable()->change();
            $table->string('digest_fa', 1000)->nullable()->change();
            $table->string('digest_ar', 1000)->nullable()->change();
            $table->string('digest_gr', 1000)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('digest_en')->nullable()->change();
            $table->string('digest_fa')->nullable()->change();
            $table->string('digest_ar')->nullable()->change();
            $table->string('digest_gr')->nullable()->change();
        });
    }
}
