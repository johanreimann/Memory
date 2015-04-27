<?php namespace App\Http\Controllers;



class gameController extends Controller {

	public function game()
	{
		$name = 'Johan Reimann';

		return view('game', compact('name'));
	}

}