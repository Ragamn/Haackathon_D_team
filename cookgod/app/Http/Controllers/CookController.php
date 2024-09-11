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
    public function cookregister() {
        
    }
}
