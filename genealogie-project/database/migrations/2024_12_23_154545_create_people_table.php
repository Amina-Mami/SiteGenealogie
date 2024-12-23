<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birth_name')->nullable();
            $table->string('middle_names')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();
            
            $table->primary('id');
            $table->index('created_by');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};