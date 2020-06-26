<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id');
            $table->string('employee')->nullable();
            $table->string('personalnummer');
            $table->string('status')->default('checked-in');
            $table->datetime('start');
            $table->datetime('end')->nullable();
            $table->string('start_foto')->nullable();
            $table->string('end_foto')->nullable();
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
        Schema::dropIfExists('times');
    }
}
