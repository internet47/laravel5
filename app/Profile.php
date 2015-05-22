<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	public function user()
	{
		# code...return $this->hasOne('Profiles');
		return $this->hasOne('Users');
	}

}
