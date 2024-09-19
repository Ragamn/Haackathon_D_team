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
    Schema::create('arranges', function (Blueprint $table) {
        $table->id('arrange_id'); // 自動インクリメントの主キー
        $table->unsignedBigInteger('cooking_id'); // 'cooks'テーブルの主キーと一致する型
        $table->string('name', 255); // アレンジ名
        $table->string('description', 255)->nullable(); // 任意の説明
        $table->string('image_path', 255)->nullable(); // 任意の画像パス
        $table->integer('impression')->default(0)->nullable(); // デフォルト値0のインプレッション数
        $table->timestamps(); // created_atとupdated_at
        
        // 外部キー制約の定義
        $table->foreign('cooking_id')->references('cooking_id')->on('cooks')->onDelete('cascade');
    });
}

/**
 * マイグレーションをロールバックします。
 */
public function down(): void
{
    Schema::dropIfExists('arranges');
}
};
