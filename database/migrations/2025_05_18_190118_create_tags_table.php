<?php

use App\Models\Jobs;
use App\Models\Tag;
use Illuminate\Contracts\Queue\Job; 
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('jobs_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Jobs::class, 'job_listing_id')->constrained()->cascadeOnDelete();;
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('jobs_tag');
    }
};
