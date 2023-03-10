<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('content');
            $table->datetime('posted_at');
            $table->timestamps();
        });
        DB::table('posts')->insert(
            [
                'user_id' => 1,
                'title' => 'Noteworthy technology acquisitions 2021',
                'content' => 'Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.',
                'posted_at' => '2023-03-08 17:46:11',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
