<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->id();
            $table->string('session');
            $table->string('term');
            $table->integer('year_status')->default(0);
            $table->integer('result_status')->default(0);
            $table->string('days_per_session')->nullable();
            $table->integer('admission_status')->nullable();
            $table->float('admission_score')->nullable();
            $table->string('year_slug');
            $table->softDeletes();
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
        Schema::dropIfExists('years');
    }
}
