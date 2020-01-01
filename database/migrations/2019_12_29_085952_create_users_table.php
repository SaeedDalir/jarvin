<?php

use App\Utilities\Constants\UserLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('family',50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_token')->unique()->nullable();
            $table->unsignedInteger('level')->default(UserLevel::user);
            $table->unsignedTinyInteger('active')->default(0);
            $table->string('mobile')->nullable();
            $table->longText('address')->nullable();

            $table->string('last_login')->nullable();
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
}
