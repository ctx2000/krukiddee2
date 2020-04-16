<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistrictAndProvinceAndSlugAndZipcodeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('district')->nullable()->after('sub_district');
            $table->string('province')->nullable()->after('sub_district');
            $table->string('zipcode')->nullable()->after('sub_district');
            $table->string('slug')->nullable()->after('status')->unique();
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
            $table->dropColumn('district');
            $table->dropColumn('province');
            $table->dropColumn('zipcode');
            $table->dropColumn('slug');
        });
    }
}
