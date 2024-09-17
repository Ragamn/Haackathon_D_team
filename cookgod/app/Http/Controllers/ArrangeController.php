<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arrange;
use App\Models\Materials;
use App\Models\Processes;
class ArrangeController extends Controller
{
    public function index(Request $requeat) {
        $arrange = Arrange::all();
        var_dump($arrange);
        return view('index',compact('arrange'));
    }
    public function arrangeregister(Request $requeat) {
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
        $arrange = new Arrange();
        $arrange->id = $request->input('id');
        $arrange->name = $request->input('name');
        $arrange->description = $request->input('description');
        $arrange->img_pass = $request->input('img_pass');

        $arrange->save();

        $arrange_id = Arrange::where('image_path',$imgPath)->first();
        $arrange_id = $record->id;
    }
}
