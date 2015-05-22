<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;//thêm vào dùng để set format date
class news extends Model {
	//protected $guarded = array();
	protected $fillable = [
		'title',
		'description',
		'content',
		'image',
		'created_at',
		'updated_at'
	];


	public function setCreatedAtAttribute($date)
	{
		$this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d',$date);
	}


	

	//

}
