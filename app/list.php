<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class list extends Model {

	//
	public function task()
	{
		return $this->belongsTo('List');
	}
}
