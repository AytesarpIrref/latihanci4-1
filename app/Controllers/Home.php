<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function welcome()
	{
		$data= [
      'judul' => 'Welcome'
    ];
		return view('welcome_message', $data);
	}
}
