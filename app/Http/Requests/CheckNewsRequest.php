<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckNewsRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|unique:news|min:6',
			'image'      => 'required',
			'created_at' =>'required|date'
		];
	}

}
