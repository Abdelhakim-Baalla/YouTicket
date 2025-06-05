<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ticket_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->engine = 'InnoDB';
            $table->timestamps();
            
            $table->unique(['ticket_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_tag');
    }
};