<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processes extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'processes';

    // 主キーのカラム名
    protected $primaryKey = 'process_id';

    // 主キーが自動インクリメントするかどうか
    public $incrementing = true;

    // 主キーが整数であるかどうか
    protected $keyType = 'int';

    // モデルでホワイトリストに追加するカラム
    protected $fillable = [
        'arrange_id',
        'process_num',
        'process'
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
        return $this->belongsTo(Arranges::class, 'arrange_id', 'arrange_id');
    }
}
