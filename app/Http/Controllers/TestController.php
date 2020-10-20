<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        if (Auth::check()) echo "1";
        else echo "0";
    }
}
