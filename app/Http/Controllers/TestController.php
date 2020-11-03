<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function greetings($user = null) {
        return view('greeting', ['user' => $user]);
    }
}
