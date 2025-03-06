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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->integer('price');
            $table->mediumText('serviceOne');
            $table->mediumText('serviceTwo');
            $table->mediumText('description');
            $table->string('recommended');
            $table->integer('status')->default(1);  
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
        Schema::dropIfExists('pricings');
    }
};
