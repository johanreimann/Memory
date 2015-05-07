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
		//shuffle($pokes);
		Session::put('key', $pokes);
		$count = 1;
		$score = 0;
		$check = 0;
		Session::put('count', $count);
		Session::put('score', $score);

		Session:put('name', 'hej');

		return view('game', compact('pokes'));
	}

	public function clicked()
	{
		$value = Session::get('key');
		$count = Session::get('count');
		$score = Session::get('score');
		$name = Session::get('name');
		$oldvalue = 0;
		
		 if(Request::ajax()) {
			 $count++;
     		 $data = Input::all();
			 $oldvalue = $value[intval($name)];
			 Session::put('name', $data['value']);
			 $check = 0;
			 if((strcmp($value[intval($data['value'])], $value[intval($name)]) == 0))
			 {
			 	$score++;
				$check = 1;	
			 }
			 
			 if($count == 2)
			 	$count = 0;
				 
			 Session::put('count', $count);
			 Session::put('score', $score);
     		 return response()->json(['name' => $value[intval($data['value'])], 'count' => $count, 
		  							  'score' => $score, 'test1' => $value[intval($data['value'])], 
									  'test2' => $value[intval($name)], 'check' => $check, 
									  'old' =>  $name]);
	  		
    	}	
	}
}


