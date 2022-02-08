<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->integer('maths_mark');
            $table->integer('history_mark');
            $table->integer('science_mark');
            $table->string('term');
            $table->timestamps();
            $table->index('student_id');

        });
        Schema::table(
            'marks',
            function (Blueprint $table) {
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
