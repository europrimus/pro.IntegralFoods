<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use Illuminate\Support\Facades\DB;

class CoController extends Controller
{



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function index()
    {
		return view('auth/preinscription');
	}

	public function create()
    {
	}


    public function check(Request $request)
    {
		$userCo = DB::select('select id, login, password from utilisateur where login = ?', array($request->id));
		if(!empty($userCo) && $userCo[0]->login == $request->id && password_verify($request->password,$userCo[0]->password))
		{
			session(["UserId"=>$userCo[0]->id]);
			return redirect()->action('ArticleClientController@index');
		}
		else
		{
			echo "phô";
		}

	}

}
