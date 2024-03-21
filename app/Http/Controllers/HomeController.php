<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\MatchModel;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('dashboard');
            } else if ($usertype == 'admin') {
                $matches = MatchModel::all();
                return view('admin.adminhome', compact('matches'));
                // return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }

    // public function match()
    // {
    //     $matches = MatchModel::all();
    //     return view('admin.adminhome', compact('matches'));
    // }
}
