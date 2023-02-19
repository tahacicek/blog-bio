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
        Schema::create('comment_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // This is the only difference from the post_actions table (and the reason for the new migration)
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('action', ['like', 'dislike'])->nullable();
            $table->string('report_reason')->nullable();
            $table->string('reblog')->nullable();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('comment_actions');
    }
};
