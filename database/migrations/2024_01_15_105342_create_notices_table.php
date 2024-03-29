<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_employee')->unsigned();
            $table->text('note')->nullable();
            $table->date('hrd_meet_start');
            $table->date('hrd_meet_end');
            $table->string('about');
            $table->timestamps();

            $table->foreign('id_employee')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
