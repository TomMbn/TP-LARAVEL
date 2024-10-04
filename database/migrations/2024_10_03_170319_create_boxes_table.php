<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->string('address');
            $table->string('city');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boxes');
    }
}

