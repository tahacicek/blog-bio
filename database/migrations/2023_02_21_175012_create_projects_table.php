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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('category', ['personal', 'work', 'other']);
            $table->text('description');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('color')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('status', ['active', 'star', 'completed'])->default('active');
            $table->boolean('is_public')->default(false);
            $table->string('invite_code')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
};
