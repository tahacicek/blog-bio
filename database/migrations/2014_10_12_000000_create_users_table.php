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
        Schema::create('users', function (Blueprint $table) {
            $planets = ['Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune', 'Pluto'];
            $coordinat = ['x-99', 'Y-99', 'Z-99', 'XY-99', 'YZ-99', 'ZX-99', 'XYZ-99', 'YZX-99', 'ZXY-99', 'XYZW-99', 'WXYZ-99'];
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('username')->unique();
            $table->string('avatar')->default('https://www.gravatar.com/avatar/'.md5(strtolower(trim(''.rand(1, 1000).' '))).'?s=200&d=mp');
            $table->string('bio')->default('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl nec ultricies ultricies, nisl nisl aliqua');

            $table->string('country')->default($planets[array_rand($planets)]);
            $table->string('city')->default($coordinat[array_rand($coordinat)]);

            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('tumblr')->nullable();

            $table->enum('role', ['admin', 'user', 'web'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->string('email')->unique();
            $table->string('invite_code')->unique()->default(substr(md5(microtime()),rand(0,26),9));
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
