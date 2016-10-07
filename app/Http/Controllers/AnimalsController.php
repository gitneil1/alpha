<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AnimalsController extends Controller
{
	public function test(){
		return view('pages.tests.test');
	}
}	