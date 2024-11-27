<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    if(Auth::user()->hasAnyRoles(['Professor'])){
      return redirect()->route('alunos.index');

    }
    return view('admins.index');
  }

  public function video()
  {
      return view('layouts.videoPopup');
  }
}
