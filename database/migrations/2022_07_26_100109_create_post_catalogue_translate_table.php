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
        Schema::create('post_catalogue_translate', function (Blueprint $table) {
           $table->id();
           $table->bigInteger('post_catalogue_id')->unsigned();
           $table->bigInteger('translate_id')->index()->unsigned();
           $table->string('name');
           $table->string('canonical')->unique();
           $table->string('meta_title')->nullable();
           $table->string('meta_keyword')->nullable();
           $table->text('meta_description')->nullable();
           $table->bigInteger('viewed')->default('0');
           $table->longText('description')->nullable();
           $table->longText('content')->nullable();
           $table->string('template')->nullable();
           $table->unique(['post_catalogue_id','translate_id']);
           $table->foreign('post_catalogue_id')->references('id')->on('post_catalogues')->onDelete('cascade');
           $table->foreign('translate_id')->references('id')->on('translates')->onDelete('cascade');
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
        Schema::dropIfExists('post_catalogues_translates');
    }
};
