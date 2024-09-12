<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooks;
class CookController extends Controller
{
    public function index() {
        $cooks = Cooks::all();
        var_dump($cooks);
        return view('index',compact('cooks'));
    }
    public function cookregister(Request $request) {
        // バリデーションルールの設定
        $validate_rule = [
            'name' => 'required',
            'img_pass' => 'required',
        ];

        // リクエストデータのバリデーション
        $request->validate($validate_rule);
        
        // 新しいCooksモデルのインスタンスを作成
        $cook = new Cooks();
        
        // フォームから送信されたデータをモデルに設定
        $cook->name = $request->input('name');
        $cook->img_pass = $request->input('img_pass');
        
        // データベースに保存
        $cook->save();
        
        // ビューを返し、成功メッセージを表示
        return view('hello.index', ['msg' => '正しく登録されました！']);
    }
}
