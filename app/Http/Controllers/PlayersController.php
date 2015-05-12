<?php namespace App\Http\Controllers;

use App\Player;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Session;

use Illuminate\Http\Request;

class PlayersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	protected $rules = [
		'name' => ['required', 'min:3'],
		'score' => ['required'],
	];
	
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

	public function create()
	{
		return view('players.create');
	}
	
	public function store()
	{
		
		//$this->validate($request, $this->rules);
		$input = Input::all();
		
		$input['score'] = 55;
		//Player::create( $input );
 		Session::put('nick', $input['name']);
		return Redirect::to('game')->with('message', 'Highscore stored');
	}

}
