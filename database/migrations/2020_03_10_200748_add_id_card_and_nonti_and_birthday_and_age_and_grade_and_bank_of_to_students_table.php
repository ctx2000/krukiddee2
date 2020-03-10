<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCardAndNontiAndBirthdayAndAgeAndGradeAndBankOfToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('id_card',13)->after('address');
            $table->date('birthday')->after('address');
            $table->integer('age')->after('address');
            $table->string('grade')->after('address');
            $table->string('bank_of')->after('tel');
            $table->string('nonti',10)->default('null')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('id_card');
            $table->dropColumn('birthday');
            $table->dropColumn('age');
            $table->dropColumn('grade');
            $table->dropColumn('bank_of');
            $table->dropColumn('nonti');
        });
    }
}
