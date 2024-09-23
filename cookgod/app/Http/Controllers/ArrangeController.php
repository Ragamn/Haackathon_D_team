<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arranges;
use App\Models\Cooks;
use App\Models\Materials;
use App\Models\Processes;
class ArrangeController extends Controller
{
    public function index(Request $request) {
        $arrange = Arranges::all();
        var_dump($arrange);
        return view('index',compact('arrange'));
    }
  public function arrangeregister(Request $request) {
        try {
            // セッションからデータを取得
            $name = $request->session()->get('name');
            $cook_name = $request->session()->get('cookname');
            $material = $request->session()->get('material');
            $amount = $request->session()->get('amount');
            $step = $request->session()->get('step');
            $description = $request->session()->get('description');
            $logo_path = $request->session()->get('img');

            // 新しいArrangesモデルのインスタンスを作成
            $arrange = new Arranges();
            $arrange->cooking_id = $cook_name;
            $arrange->name = $name;
            $arrange->description = $description;
            $arrange->image_path = $logo_path; // 画像パスはセッションから取得

            // データベースに保存
            $arrange->save();

            // 登録したarrangeのIDを取得
            $arrange_id = Arranges::where('image_path', $logo_path)->value('arrange_id');

            // MaterialsとProcessesの保存処理
            foreach ($material as $index => $mat) {
                $newMaterial = new Materials();
                $newMaterial->arrange_id = $arrange_id;
                $newMaterial->material_name = $mat;
                $newMaterial->amount = $amount[$index];
                $newMaterial->save();
            }

            foreach ($step as $index => $stp) {
                $newProcess = new Processes();
                $newProcess->arrange_id = $arrange_id;
                $newProcess->step_number = $index + 1;
                $newProcess->description = $stp;
                $newProcess->save();
            }

            // セッションのデータを削除
            $request->session()->forget(['name', 'cookname', 'material', 'amount', 'step', 'description', 'img']);

            // 正常に処理が完了した場合のリダイレクト
            return redirect('/')->with('msg', '正しく登録されました！');
        } catch (\Exception $e) {
            // エラーメッセージを表示
            return redirect('/')->with('msg', '登録中にエラーが発生しました: ' . $e->getMessage());
        }
    }


    public function arrange_confirm(Request $request) {
        // バリデーションルールの設定
        $validate_rule = [
            'name' => 'required',
            'cookname' => 'required',
            'img' => 'required|image',
            'material' => 'required|array',
            'material.*' => 'required|string',
            'amount' => 'required|array',
            'amount.*' => 'required|string',
            'step' => 'required|array',
            'step.*' => 'required|string',
            'description' => 'required|string',
        ];
    
        // リクエストデータのバリデーション
        $request->validate($validate_rule);
    
        $name = $request->input('name');
        $cook_name = $request->input('cookname');
        $material = $request->input('material');
        $amount = $request->input('amount');
        $step = $request->input('step');
        $description = $request->input('description');

        // 各フィールドの値をセッションに保存
        $request->session()->put([
            'name' => $name,
            'cookname' => $cook_name,
            'material' => $material,
            'amount' => $amount,
            'step' => $step,
            'description' => $description,
        ]);

        // リクエストから画像ファイルを取得
        $logo = $request->file('img');

        // 画像を一時ディレクトリに保存し、パスを取得
        $path = $logo->store('public/tmp');
    
        // セッションに画像のパスを保存
        $request->session()->put('img', $path);
        $filename = pathinfo($path, PATHINFO_BASENAME);
    
        return view('arrange_confirm',['filename' => $filename]);
    }
}
