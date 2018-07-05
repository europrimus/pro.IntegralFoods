<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;


class utilisateur extends Model implements CanResetPasswordContract
{
	//use Notifiable;
	protected $table = 'utilisateur';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'civilite',
		'nom',
		'prenom',
		'entreprise',
		'etablissement',
		'tel',
		'email',
		'siret',
		'kbis',
		'login',
		'password',
		'commentaire'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function adresse()
      {
        return $this->hasMany('adresse');
      }

	public static function getEntreprise($id) {
		$info = utilisateur::find($id);
		if( !empty($info) ){
			return $info->entreprise;
		}else{
			return "non connecté";
		}
	}

	public static function getMyRole($id) {
		$info = utilisateur::find($id);
		//dd($info);
		if( !empty($info) ){
			return $info->role;
		}else{
			return "gest";
		}
	}

  public function getEmailForPasswordReset()
    {


	  }

	  public function sendPasswordResetNotification($token)
      {
		  $this->notify(new ResetPassword($token));
	  }
}
