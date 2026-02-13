<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Kolom slug dihapus
            $table->string('category')->nullable();
            $table->string('main_image'); // foto utama
            $table->string('code')->nullable();
            $table->string('stock')->nullable();
            $table->string('certification')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('product_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_galleries');
        Schema::dropIfExists('products');
    }
};
