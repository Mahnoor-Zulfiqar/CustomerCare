<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCCDResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_c_d_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('EmployeeId')->unique();
            $table->unsignedBigInteger('CallTypeId')->unique();
            $table->unsignedBigInteger('DispositionId')->unique();
            $table->unsignedBigInteger('DispositionDetailId')->unique();
            $table->String('ClientName')->unique();
            $table->String('ContactNumber')->unique();
            $table->String('Address');
            $table->String('Comment');
            $table->String('Property');
            $table->String('FutureInvestment');
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
        Schema::dropIfExists('c_c_d_responses');
    }
}
