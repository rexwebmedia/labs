<?php

use App\Enums\UserRoleEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary;
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('role')->default(UserRoleEnum::ADMIN);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->rememberToken();
            $table->foreignUuid('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
