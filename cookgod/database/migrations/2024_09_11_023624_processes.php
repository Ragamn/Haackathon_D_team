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
        Schema::create('processes', function (Blueprint $table) {
            $table->id('process_id'); // 主キー（自動インクリメント）
            $table->unsignedBigInteger('arrange_id')->nullable(); // 外部キーとして 'arranges' テーブルと同じデータ型を指定
            $table->integer('process_num'); // 手順番号
            $table->string('process', 255); // 手順の内容
            $table->timestamps(); // created_at と updated_at
            
            // 外部キー制約の定義
            $table->foreign('arrange_id')->references('arrange_id')->on('arranges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
