<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function flushSession(){
        Session::flush();

        return redirect('/');
    }
}
