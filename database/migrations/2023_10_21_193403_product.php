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
        Schema::Create('product', function(Blueprint $table){
            $table->id();
            $table->string('name',255);
            $table->string('description',1000);
            $table->float('price', 15,2);
            $table->float('promotional_price', 15,2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
