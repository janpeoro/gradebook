<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradingComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grading_components', function (Blueprint $table) {
            $table->id();
            $table->string('class_standing')->default('Class Standing');
        $table->integer('percentage')->default(40);
            $table->string('assessment_type');
            $table->integer('assessment_percentage');
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
        Schema::table('grading_components', function (Blueprint $table) {
            $table->dropColumn(['class_standing', 'percentage']);
        });
    }
}