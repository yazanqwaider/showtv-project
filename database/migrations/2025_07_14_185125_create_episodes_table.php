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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Show::class, 'show_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->integer('duration')->nullable();
            $table->dateTime('airing_dt');
            $table->text('thumbnail_url');
            $table->text('video_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
