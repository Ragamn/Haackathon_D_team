<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'materials';

    // 主キーのカラム名
    protected $primaryKey = 'material_id';

    // 主キーが自動インクリメントするかどうか
    public $incrementing = true;

    // 主キーが整数であるかどうか
    protected $keyType = 'int';

    // モデルでホワイトリストに追加するカラム
    protected $fillable = [
        'arrange_id',
        'material_name',
        'amount'
    ];

    // モデルでブラックリストに追加するカラム
    protected $guarded = [
        // 例: 'created_at', 'updated_at' など
    ];

    // タイムスタンプの管理を有効にする
    public $timestamps = true;
    
    // アレンジとのリレーションシップ
    public function arrange()
    {
        return $this->belongsTo(Arrange::class, 'arrange_id', 'arrange_id');
    }
}
