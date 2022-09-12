<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
	 * Método que recebe o post de login e tenta logar o usuário
	 * @param \Illuminate\Http\Request  $request
	 * @return mixed
	 */
	public function home (Request $request)
	{
		return view('home',[]);
	}
}
