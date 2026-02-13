<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('chatbot_intents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('response_type', ['text', 'link'])->default('text');
            $table->text('response_text')->nullable();
            $table->string('response_url')->nullable();
            $table->json('response_json')->nullable();
            $table->enum('status', ['aktif', 'draft'])->default('aktif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('chatbot_intents');
    }
};
