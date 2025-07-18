<?php

use App\Models\Show;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_show_followings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained();
            $table->foreignIdFor(Show::class, 'show_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_show_followings');
    }
};
