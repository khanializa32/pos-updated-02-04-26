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
        Schema::table('business_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->nullable()->after('state');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('municipality_id')->nullable()->after('city');
            $table->foreign('municipality_id')->references('id')->on('municipalities');

            $table->unsignedBigInteger('country_id')->nullable()->after('country');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_locations', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');

            $table->dropForeign(['municipality_id']);
            $table->dropColumn('municipality_id');

            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');
        });
    }
};
