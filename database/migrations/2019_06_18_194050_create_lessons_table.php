<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->string('gradeLevel');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('lesson_standard', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('standard_id');
            $table->timestamps();

           $table->unique(['lesson_id', 'standard_id']);

           $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');

            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_standard');
        Schema::dropIfExists('lessons');
       
    }
}
