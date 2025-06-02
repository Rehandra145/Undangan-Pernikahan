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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('groom_name');
            $table->string('groom_daily_name');
            $table->string('groom_fathers_name');
            $table->string('groom_mothers_name');
            $table->string('bride_name');
            $table->string('bride_daily_name');
            $table->string('bride_fathers_name');
            $table->string('bride_mothers_name');
            $table->date('akad_date');
            $table->date('resepsi_date');
            $table->time('akad_time');
            $table->time('resepsi_time');
            $table->string('place');
            $table->string('maps');
            $table->longText('embed_maps');
            $table->string('surah');
            $table->integer('ayat');
            $table->string('imgBg');
            $table->string('MbImgBg');
            $table->string('CvImgBg');
            $table->string('bgm');
            $table->longText('tujuan');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
