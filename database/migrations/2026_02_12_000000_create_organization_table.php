<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('founder_name')->nullable();
            $table->string('founder_role')->nullable();
            $table->string('founder_img')->nullable();
            $table->string('co_founder_name')->nullable();
            $table->string('co_founder_role')->nullable();
            $table->string('co_founder_img')->nullable();
            $table->string('team_img')->nullable();
            $table->string('org_chart')->nullable();
            $table->text('org_intro')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('organization');
    }
};
