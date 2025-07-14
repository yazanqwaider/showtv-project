<?php

use App\Models\Show;
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
        Schema::create('show_airing_times', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Show::class, 'show_id')->constrained();
            $table->boolean('sat')->default(false);
            $table->boolean('sun')->default(false);
            $table->boolean('mon')->default(false);
            $table->boolean('tue')->default(false);
            $table->boolean('wed')->default(false);
            $table->boolean('thu')->default(false);
            $table->boolean('fri')->default(false);
            $table->dateTime('date_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_airing_times');
    }
};
