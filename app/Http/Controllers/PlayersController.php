<?php namespace App\Http\Controllers;

use App\Player;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

use Illuminate\Http\Request;

class PlayersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			$players = Player::all();
			
			//Should this really be done in the controller? I'm not 100%
			$players = array_values(array_sort($players, function($value)
			{
				return $value['score'];
			}));
			
			//This is really a retarded way to do it, but could not figure out
			//how to sort the array by descending order in a nice way for the moment.
			$players = array_reverse($players);
			return view('players.index', compact('players'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('players.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		Player::create( $input );
 
		return Redirect::route('players.index')->with('message', 'Highscore stored');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
