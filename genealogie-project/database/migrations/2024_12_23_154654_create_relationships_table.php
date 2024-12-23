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
        Schema::create('relationships', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('parent_id')->constrained('people')->onDelete('cascade');
            $table->foreignId('child_id')->constrained('people')->onDelete('cascade');
            $table->timestamps();
            
            $table->primary('id');
            $table->index('created_by');
            $table->index('parent_id');
            $table->index('child_id');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
