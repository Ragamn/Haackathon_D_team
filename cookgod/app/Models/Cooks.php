<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooks extends Model
{
    use HasFactory;

    // テーブル名がデフォルトのものと異なる場合は指定
    protected $table = 'cooks';

    // 主キーのカラム名がデフォルトの 'id' と異なる場合は指定
    protected $primaryKey = 'cooking_id';

    // 主キーが自動インクリメントするかどうかの指定
    public $incrementing = true;

    // 主キーが整数であるかどうか
    protected $keyType = 'int';

    // モデルでホワイトリストに追加するカラム（マスアサインメント）
    protected $fillable = [
        'name',
        'image_path',
        'impression'
    ];

    // モデルでブラックリストに追加するカラム（マスアサインメント）
    protected $guarded = [
        // 例: 'created_at', 'updated_at' など
    ];

    // タイムスタンプの管理を無効にする場合
    public $timestamps = true;

    // タイムスタンプのカラム名をカスタマイズする場合
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
