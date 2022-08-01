<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_catalogues', function (Blueprint $table) {
            $table->id();
            $table->integer('parentid')->default('0');
            $table->integer('lft')->default('0');
            $table->integer('rgt')->default('0');
            $table->integer('level')->default('0');
            $table->integer('order')->default('0');
            $table->string('image')->nullable();
            $table->longText('album')->nullable();
            $table->string('script')->nullable();
            $table->tinyInteger('publish')->default('0');
            $table->bigInteger('userid_created')->default('0');
            $table->bigInteger('userid_updated')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('post_catalogues');
    }
};
