<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('complainant_name');
            $table->string('phone_number');
            $table->string('subcounty');
            $table->string('ward')->nullable();
            $table->string('new_area')->nullable();
            $table->string('infrastructure_type');
            $table->text('damage_description');
            $table->string('severity_level');
            $table->string('location_details');
            $table->string('status')->default('Pending Review'); // Add status column
            $table->unsignedBigInteger('user_id'); // Foreign key to link to users
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}