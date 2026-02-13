<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vision_mission', function (Blueprint $table) {
            $table->id();
            $table->string('visi_title')->nullable();
            $table->text('visi')->nullable();
            $table->string('misi_title')->nullable();
            $table->text('misi')->nullable();
            $table->text('intro')->nullable();
            $table->timestamps();
        });
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('org_intro')->nullable();
            $table->string('org_chart')->nullable();
            $table->string('founder_img')->nullable();
            $table->string('founder_name')->nullable();
            $table->string('founder_role')->nullable();
            $table->string('co_founder_img')->nullable();
            $table->string('co_founder_name')->nullable();
            $table->string('co_founder_role')->nullable();
            $table->string('team_img')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vision_mission');
        Schema::dropIfExists('organization');
    }
};
