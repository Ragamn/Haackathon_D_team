<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arrange;
class ArrangeController extends Controller
{
    public function index() {
        $arrange = Arrange::all();
        var_dump($arrange);
        return view('index',compact('arrange'));
    }
}
