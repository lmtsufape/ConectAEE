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
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    if(Auth::user()->hasAnyRoles(['Professor'])){
      return redirect()->route('aluno.index');

    }
    return redirect()->route('escola.index');
  }

  public function video()
  {
      return view('layouts.videoPopup');
  }
}
