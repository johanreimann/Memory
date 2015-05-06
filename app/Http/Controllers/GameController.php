<?php namespace App\Http\Controllers;
use Input;
use Response;
use Request;


class gameController extends Controller {

	public function test()
	{

		$pokes = array('images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 'images/G.png', 'images/H.png',
					   'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 'images/O.png', 'images/P.png',
					   'images/Q.jpg', 'images/R.png', 'images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 
					   'images/G.png', 'images/H.png', 'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 
					   'images/O.png', 'images/P.png', 'images/Q.jpg', 'images/R.png');
		shuffle($pokes);

		return view('game', compact('pokes'));
	}

	public function clicked()
	{
		 if(Request::ajax()) {
     		 $data = Input::all();
			  $pokes = array('images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 'images/G.png', 'images/H.png',
					   'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 'images/O.png', 'images/P.png',
					   'images/Q.jpg', 'images/R.png', 'images/A.png', 'images/B.png', 'images/C.jpg', 'images/D.jpg', 'images/E.png', 'images/F.jpg', 
					   'images/G.png', 'images/H.png', 'images/I.jpg', 'images/J.jpg', 'images/K.png', 'images/L.jpg', 'images/M.gif', 'images/N.gif', 
					   'images/O.png', 'images/P.png', 'images/Q.jpg', 'images/R.png');
			 
			 
     		 return response()->json(['name' => $pokes[intval($data['value'])]]);

    }
		
	}
}


