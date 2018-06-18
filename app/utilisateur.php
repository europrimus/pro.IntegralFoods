<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
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
				return $info->entreprise;
			}
}
