<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposition_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CallTypeId')->unique();
            $table->foreignId('DispositionId')->unique();
            $table->String('Query');
            $table->String('Active');
            $table->String('EnterBy');
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
        Schema::dropIfExists('disposition_details');
    }
}
