<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arranges;
use App\Models\Cooks;
use App\Models\Materials;
use App\Models\Processes;
use App\Models\Keys;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ArrangeController extends Controller
{
    public function index(Request $request) {
    // Arrangesモデルのデータをcreated_atの降順で取得
    $arranges = Arranges::orderBy('created_at', 'desc')->get();
    return view('arrange_list', compact('arranges'));
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
            $imgPath = $request->session()->get('img');
            $cleanedImgPath = str_replace('public/tmp/', '', $imgPath);

            // 新しいArrangesモデルのインスタンスを作成
            $arrange = new Arranges();
            $arrange->cooking_id = $cook_name;
            $arrange->name = $name;
            $arrange->description = $description;
            $arrange->image_path = $cleanedImgPath; // 画像パスはセッションから取得

            // データベースに保存
            $arrange->save();

            // 登録したarrangeのIDを取得
            $arrange_id = Arranges::where('image_path', $cleanedImgPath)->value('arrange_id');
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
                $newProcess->process_num = $index + 1;
                $newProcess->process = $stp;
                $newProcess->save();
            }
            // セッションのデータを削除
            $request->session()->forget(['name', 'cookking_name','cookname', 'material', 'amount', 'step', 'description', 'img']);

            // 画像のパスを取得
            $imagePath = storage_path('app/' . $imgPath);
            $newPath = storage_path('app/public/img/' . basename($imagePath));
            if (file_exists($imagePath)) {
                if (!rename($imagePath, $newPath)) {
                    // 画像の移動に失敗した場合のエラーハンドリング
                    Log::error('画像の移動に失敗しました。', ['imagePath' => $imagePath, 'newPath' => $newPath]);
                    return redirect('/')->with('msg', '画像の移動に失敗しました。');
                }
                return redirect('/')->with('msg', '成功');
            } else {
                // 画像が存在しない場合のエラーハンドリング
                Log::error('画像が見つかりませんでした。', ['imagePath' => $imagePath]);
                return redirect('/')->with('msg', '画像が見つかりませんでした。');
            }
        } catch (\Exception $e) {
            // 例外が発生した場合のエラーハンドリング
            Log::error('エラーが発生しました: ' . $e->getMessage(), ['exception' => $e]);
            return redirect('/')->with('msg', 'エラーが発生しました: ' . $e->getMessage());
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

        $cookking_name= Cooks::where('cooking_id', $cook_name)->value('name');
        // 各フィールドの値をセッションに保存
        $request->session()->put([
            'name' => $name,
            'cookname' => $cook_name,
            'cookking_name' => $cookking_name,
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
    public function getArrangesByCookingId(Request $request)
    {
      $cooking_id = $request->get('id');
      $cooks = Cooks::where('cooking_id', $cooking_id)->first();
      // cooking_idを条件にimpressionの降順で値を取得
      $arranges = Arranges::where('cooking_id', $cooking_id)
                            ->orderBy('created_at', 'desc')
                            ->get();
      return view('arrange_list',['arranges'=>$arranges,'cooks'=>$cooks]);
    
  }
      public function getArrangeById(Request $request)
    {
      $arrange_id = $request->get('id');
    
      // arrange_idを条件に一件データを取得
      $arrange = Arranges::where('arrange_id', $arrange_id)->first();

      // impressionをプラス1する
      if ($arrange) {
        $arrange->impression += 1;
        $arrange->save();
      }
    
      // arrange_idを条件にmaterialsとprocessesから値を取得
      $materials = Materials::where('arrange_id', $arrange_id)->orderBy('material_id','asc')->get();
      $processes = Processes::where('arrange_id', $arrange_id)->orderBy('process_id','asc')->get();
      
      return view('cook_detail', [
        'arrange' => $arrange,
        'materials' => $materials,
        'processes' => $processes
      ]);
    }
}
