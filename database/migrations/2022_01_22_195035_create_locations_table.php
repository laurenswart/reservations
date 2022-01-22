<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('slug',60)->unique();
            $table->string('designation',60);
            $table->string('address',255);
            $table->foreignId('locality_id');
            $table->string('website',255)->nullable();
            $table->string('phone',30)->nullable();
            
            $table->foreign('locality_id')->references('id')->on('localities')
                    ->onDelete('restrict')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
