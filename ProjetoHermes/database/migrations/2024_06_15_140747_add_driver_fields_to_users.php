<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriverFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('driver')->default(false);
            $table->string('cnh')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('vehicle_doc')->nullable();
            $table->integer('passenger_capacity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('driver');
            $table->dropColumn('cnh');
            $table->dropColumn('vehicle');
            $table->dropColumn('vehicle_doc');
            $table->dropColumn('passenger_capacity');
        });
    }
}

