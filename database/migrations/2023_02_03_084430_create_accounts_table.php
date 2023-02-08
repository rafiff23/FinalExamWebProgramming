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
        Schema::create('account', function (Blueprint $table) {
            $table->id("account_id");
            $table->foreignId('role_id');
            $table->foreignId('gender_id');
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('email',100);
            $table->string('display_picture_link',100)->default('awik');
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
