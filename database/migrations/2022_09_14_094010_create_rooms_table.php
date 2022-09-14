<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->tinyText('name')->unique();
            $table->unsignedTinyInteger('floor')->default(1);
            $table->float('actual_temp', 3, 1)->nullable();
            $table->float('goal_temp', 3, 1)->default(18);
            $table->unsignedTinyInteger('humidity')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
