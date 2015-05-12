<?php namespace App\Http\Controllers;
use Input;
use Response;
use Request;
use Session;
use Redirect;
use App\Player;


class gameController extends Controller {
	
	public function index()
	{
		return view('name');
	}
	public function test()
	{

		
		
		$pokes = array('images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 'images/G.png', 'images/H.png',
					   'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 'images/O.png', 'images/P.png',
					   'images/Q.jpg', 'images/R.png', 'images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 
					   'images/G.png', 'images/H.png', 'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 
					   'images/O.png', 'images/P.png', 'images/Q.jpg', 'images/R.png');
		//shuffle($pokes);
		Session::put('key', $pokes);
		$count = 1;
		$score = 0;
		$check = 0;
		$attempt = 0;
		$tilesDone = -1;
		$done = array();
		
		Session::put('count', $count);
		Session::put('score', $score);
		Session::put('nrattempt', $attempt);
		Session::put('done', $done);
		Session::put('name', ' ');
		
		Session::put('tilesDone', $tilesDone);

		return view('game', compact('pokes'));
	}

	public function clicked()
	{
		$value = Session::get('key');
		$count = Session::get('count');
		$score = Session::get('score');
		$name = Session::get('name');
		$attempt = Session::get('nrattempt');
		$done = Session::get('done');
		$tilesDone = Session::get('tilesDone');
		$oldvalue = -1;
		
		 if(Request::ajax()) {
     		 $data = Input::all();

     		 // pressed earlier?
     		 if(array_search($data['value'], $done) != FALSE)
     		 	return response()->json();

			 $count++;
			 if($count == 1)
			 	$oldvalue = $value[intval($name)];

			 Session::put('name', $data['value']);
			 $check = 0;
			 if((strcmp($value[intval($data['value'])], $value[intval($name)]) == 0))
			 {
			 	$score += GameController::calculateScore($attempt);
			 	if($score < 1)
			 		$score = 1;
				$tilesDone++;
				$check = 1;
				$attempt = 0;
				$done[] = $data['value'];
			 	$done[] = $oldvalue;
			 }
		  	 
			 if($count == 2)
			 {
			 	$count = 0;
				 if($check != 1)
				 	$attempt++; 
			 }	 
			 
			 if($tilesDone === 2)
			 {
				$input['name'] = Session::get('nick');
				$input['score'] = $score;
				Player::create($input);



			 }
			 Session::put('tilesDone', $tilesDone);
			 Session::put('done', $done);
			 Session::put('count', $count);
			 Session::put('score', $score);
			 Session::put('nrattempt', $attempt);
     		 return response()->json(['name' => $value[intval($data['value'])], 'count' => $count, 
		  							  'score' => $score, 'check' => $check, 'old' =>  $name,
									  'attempt' => $attempt, 'done' => $tilesDone]);
	  		
    	}	
		
		
		
		
		
	}
	
	public function calculateScore($attempt)
		{
			return  (10-$attempt*2);
		}
}


