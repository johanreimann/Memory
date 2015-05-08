<?php namespace App\Http\Controllers;
use Input;
use Response;
use Request;
use Session;

 

class gameController extends Controller {

	public function test()
	{

		$pokes = array('images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 'images/G.png', 'images/H.png',
					   'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 'images/O.png', 'images/P.png',
					   'images/Q.jpg', 'images/R.png', 'images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 
					   'images/G.png', 'images/H.png', 'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 
					   'images/O.png', 'images/P.png', 'images/Q.jpg', 'images/R.png');
		shuffle($pokes);
		Session::put('key', $pokes);
		$count = 1;
		$score = 0;
		$check = 0;
		$attempt = 0;
		Session::put('count', $count);
		Session::put('score', $score);
		Session::put('nrattempt', $attempt);

		Session::put('name', ' ');

		return view('game', compact('pokes'));
	}

	public function clicked()
	{
		$value = Session::get('key');
		$count = Session::get('count');
		$score = Session::get('score');
		$name = Session::get('name');
		$attempt = Session::get('nrattempt');
		$oldvalue = 0;
		
		 if(Request::ajax()) {
			 $count++;
     		 $data = Input::all();
			 $oldvalue = $value[intval($name)];
			 Session::put('name', $data['value']);
			 $check = 0;
			 if((strcmp($value[intval($data['value'])], $value[intval($name)]) == 0))
			 {
			 	$score += (10-$attempt*2);
			 	if($score < 1)
			 		$score = 1;
				$check = 1;
				$attempt = 0;
			 }
		  	 
			 if($count == 2)
			 {
			 	$count = 0;
				 if($check != 1)
				 {
				 	$attempt++;
				 }				 
			 }	 
			
			
			 Session::put('count', $count);
			 Session::put('score', $score);
			 Session::put('nrattempt', $attempt);
     		 return response()->json(['name' => $value[intval($data['value'])], 'count' => $count, 
		  							  'score' => $score, 'check' => $check, 'old' =>  $name,
									  'attempt' => $attempt]);
	  		
    	}	
	}
}


