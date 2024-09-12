<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arranges extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'arranges';

    // 主キーのカラム名
    protected $primaryKey = 'arrange_id';

    // 主キーが自動インクリメントするかどうか
    public $incrementing = true;

    // 主キーが整数であるかどうか
    protected $keyType = 'int';

    // モデルでホワイトリストに追加するカラム
    protected $fillable = [
        'cooking_id',
        'name',
        'description',
        'image_path',
        'impression'
    ];

    // モデルでブラックリストに追加するカラム
    protected $guarded = [
        // 例: 'created_at', 'updated_at' など
    ];

    // タイムスタンプの管理を有効にする
    public $timestamps = true;
    
    // 料理とのリレーションシップ
    public function cook()
    {
        return $this->belongsTo(Cook::class, 'cooking_id', 'cooking_id');
    }
}
