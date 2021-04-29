<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(Request $request){

        if(auth()->user()->role == "admin"){
            return redirect('/admin/');
        }

        $grades = auth()->user()->grades()->get();

        return view("dashboard.home", compact('grades'));

    }
}
