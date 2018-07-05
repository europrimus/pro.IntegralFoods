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
			session()->flush();
			session(["UserId"=>$userCo[0]->id]);

			if(utilisateur::getMyRole(session("UserId")) == "administrateur"){
        return redirect()->action('AdminController@listeClients');
      }elseif (utilisateur::getMyRole(session("UserId")) == "client") {
        return redirect()->action('ArticleClientController@index');
      }else{
        return view('auth/errlogin');
      }
		}
		else
		{
			return view('auth/errlogin');
		}

	}

}
