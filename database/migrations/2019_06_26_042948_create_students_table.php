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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('phone_num')->nullable;
            $table->string('email')->nullable;
            $table->integer('roll')->nullable;
            $table->integer('reg_no');
            $table->string('department_name');
            $table->string('class_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('address');
            $table->integer('guardian_num');
            $table->string('image');
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
