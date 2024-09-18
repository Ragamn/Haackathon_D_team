<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * マイグレーションを実行します。
     */
    public function up(): void
    {
        Schema::create('cooks', function (Blueprint $table) {
            $table->id('cooking_id'); // 主キー（自動インクリメント）
            $table->string('name', 255); // 料理の名前
            $table->string('image_path', 255)->nullable(); // 画像パス
            $table->integer('impression')->default(0)->nullable(); // インプレッション数（デフォルト値0）
            $table->timestamps(); // created_atとupdated_at
        });
    }

    /**
     * マイグレーションをロールバックします。
     */
    public function down(): void
    {
        Schema::dropIfExists('cooks');
    }
};
