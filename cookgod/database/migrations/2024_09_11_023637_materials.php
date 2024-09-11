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
        Schema::create('materials', function (Blueprint $table) {
            $table->id('material_id'); // 主キー（自動インクリメント）
            $table->unsignedBigInteger('arrange_id')->nullable(); // 外部キーとして 'arranges' テーブルと同じデータ型を指定
            $table->string('material_name', 255); // 材料名
            $table->string('amount', 255); // 分量
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
        Schema::dropIfExists('materials');
    }
};
