<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arranges;
use App\Models\Materials;
use App\Models\Processes;
class ArrangeController extends Controller
{
    public function index(Request $requeat) {
        $arrange = Arranges::all();
        var_dump($arrange);
        return view('index',compact('arrange'));
    }
    public function arrangeregister(Request $request) {
        $validate_rule = [
            'id' => 'required',
            'name' => 'required',
            'img_pass' => 'required',
            'material' => 'required|array',
            'material.*' => 'required|string',
            'amount' => 'required|array',
            'amount.*' => 'required|string',
            'process' => 'required|array',
            'process.*' => 'required|string',
            'description' => 'required',
        ];
        $request->validate($validate_rule);
        $arrange = new Arranges();
        $arrange->id = $request->input('id');
        $arrange->name = $request->input('name');
        $arrange->description = $request->input('description');
        $arrange->img_pass = $request->input('img_pass');

        $arrange->save();
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
        // $request->session()->put('img', $path);
        $filename = pathinfo($path, PATHINFO_BASENAME);
    
        return view('arrange_confirm',['filename' => $filename]);
    }
}
