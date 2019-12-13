<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockController extends Controller
{
    public function index(){
        return view('lock.index');
    }
}
