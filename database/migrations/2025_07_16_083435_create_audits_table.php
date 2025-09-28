<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // who did the action
            $table->string('action'); // e.g. create_user, update_user, deactivate_user
            $table->string('target_type'); // e.g. User
            $table->unsignedBigInteger('target_id'); // e.g. user id
            $table->text('details')->nullable(); // optional JSON or text
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('audits');
    }
};
