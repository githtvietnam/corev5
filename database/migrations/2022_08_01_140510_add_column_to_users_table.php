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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('publish')->after('remember_token')->default('0');
            $table->longText('permissions_in')->nullable()->after('password');
            $table->longText('permission_out')->nullable()->after('permissions_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('publish');
            $table->dropColumn('permissions_in');
            $table->dropColumn('permission_out');
        });
    }
};
