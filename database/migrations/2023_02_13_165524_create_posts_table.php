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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('title');
            $table->text('content');
            $table->text('excerpt')->nullable();
            $table->string('cover_image');
            $table->string('slug');
            $table->enum('status', ['draft', 'published', 'deleted'])->default('published');
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->time('published_at')->nullable();
            $table->time('deleted_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
