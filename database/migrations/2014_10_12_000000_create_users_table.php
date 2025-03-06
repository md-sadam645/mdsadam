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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role')->nullable()->comment('1=admin;2=super_admin;4=customer');
            $table->string('password');
            $table->integer('status')->nullable()->comment('0=inactive;1=active');
            $table->string('image')->nullable();
            $table->string('adhaar')->nullable();
            $table->string('gst')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('admin_name')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
