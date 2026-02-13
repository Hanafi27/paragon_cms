<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('chatbot_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intent_id');
            $table->string('keyword');
            $table->timestamps();
            $table->foreign('intent_id')->references('id')->on('chatbot_intents')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('chatbot_keywords');
    }
};
