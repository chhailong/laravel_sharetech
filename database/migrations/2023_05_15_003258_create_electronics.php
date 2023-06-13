<?php

use App\Models\Electronic;
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
        Schema::create('electronics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('accessories_id'); 
            $table->unsignedBigInteger('laptop_id'); 
            $table->unsignedBigInteger('electronic_type_id'); 
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->double('price');
            $table->text('description')->nullable();
            $table->string('major');
            $table->string('link_youtube')->nullable();
            $table->string('shop_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electronics');
    }
};



