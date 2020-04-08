<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('address',200);
            $table->string('district',50)->nullable();
            $table->string('province',50)->nullable();
            $table->string('tel',15);
            $table->string('bankAccountName');
            $table->string('bankName');
            $table->string('bankNumber');
            $table->text('description1')->nullable();
            $table->text('description2')->nullable();
            $table->string('picture');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }
}
