<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('action', ['like', 'dislike'])->nullable();
            $table->enum('read_status', ['read', 'unread'])->nullable();
            $table->date('read_at')->nullable();
            $table->string('bookmark_url')->nullable();
            $table->string('report_reason')->nullable();
            $table->string('reblog')->nullable();
            $table->integer('reblog_count')->nullable()->default(0);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_actions');
    }
};
