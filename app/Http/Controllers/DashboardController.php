<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $usertype = Auth::user()->usertype;

        if($usertype === 'admin'){
            return redirect('/admin');

        }else if($usertype === 'dasawisma'){
            return redirect('/dasawisma');

        }else{
            return redirect('/user');
        }
    }
}
