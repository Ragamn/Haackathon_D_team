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
        // 新しいCooksモデルのインスタンスを作成
        $cook = new Cooks();
        
        // フォームから送信されたデータをモデルに設定
        $cook->name = $request->session()->get('name');
        $cook->image_path = $request->session()->get('img');

        try {
            // データベースに保存
            $cook->save();
        } catch (\Exception $e) {
            // データベース保存時にエラーが発生した場合のエラーハンドリング
            return redirect('/')->with('msg', '投稿に失敗しました');
        }

        // 画像のパスを取得
        $imagePath = storage_path('app/' . $request->session()->get('img'));
        $newPath = storage_path('app/public/img/' . basename($imagePath));

        // セッションからデータを削除
        $request->session()->forget('name');
        $request->session()->forget('img');
    
        // 画像を新しいフォルダに移動
        if (file_exists($imagePath)) {
            if (!rename($imagePath, $newPath)) {
                // 画像の移動に失敗した場合のエラーハンドリング
                return redirect('/')->with('msg', '画像の移動に失敗しました。');
            }
            return redirect('/')->with('msg', '成功');
        } else {
            // 画像が存在しない場合のエラーハンドリング
            return redirect('/')->with('msg', '画像が見つかりませんでした。');
        }
    }
    public function cook_confirm(Request $request){
        // バリデーションルールの設定
        $validate_rule = [
            'name' => 'required',
            'img' => 'required',
        ];
    
        // リクエストデータのバリデーション
        $request->validate($validate_rule);

        $name = $request->input('name');
        $request -> session() -> put('name', $name);

        // リクエストから画像ファイルを取得
        $document = $request->file('img');

        // 画像を一時ディレクトリに保存し、パスを取得
        $path = $document->store('public/tmp');

        // セッションに画像のパスを保存
        $request->session()->put('img', $path);
        $filename = pathinfo($path, PATHINFO_BASENAME);

        return view('cook_confirm', ['filename' => $filename]);
    }
    
}
