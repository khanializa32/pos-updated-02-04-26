<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            if (! Schema::hasColumn('units', 'discount')) {
                $table->decimal('discount', 22, 4)->nullable()->after('base_unit_multiplier');
            }
        });
    }

    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            if (Schema::hasColumn('units', 'discount')) {
                $table->dropColumn('discount');
            }
        });
    }
};

