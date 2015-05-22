<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

	public function index()
	{
		return view('formbootstrap');
	}

	public function showlist()
	{
		return view('contact_showlist');
	}



}
