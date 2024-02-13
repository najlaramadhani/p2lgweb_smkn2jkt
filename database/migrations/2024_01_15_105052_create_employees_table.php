<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('uid')->unique();
            $table->string('fullname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->bigInteger('id_departement')->unsigned();
            $table->bigInteger('id_jabatan')->unsigned();
            $table->bigInteger('id_status')->unsigned();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('citizen')->nullable();
            $table->string('city')->nullable();
            $table->string('blood_group')->nullable();
            $table->boolean('married');
            $table->bigInteger('id_user')->unsigned();

            $table->foreign('id_departement')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('employee_statuses')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
