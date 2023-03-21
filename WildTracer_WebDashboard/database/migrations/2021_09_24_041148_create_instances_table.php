<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->string('file_size')->nullable();
            $table->string('gps_latitude')->nullable();
            $table->string('gps_longitude')->nullable();
            $table->string('animal_type');
            $table->string('location');
            $table->string('route');
            $table->string('month');
            $table->string('year');
            $table->string('submitted_by');
            $table->string('mobile');
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
        Schema::dropIfExists('instances');
    }
}
