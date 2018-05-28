<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HhController extends Controller
{
    //
    public function index(){
        $user = session('wechat.oauth_user');
        dd($user);exit;

    }





}
