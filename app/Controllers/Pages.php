<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function home()
	{
    $data= [
      'judul' => 'Home'
    ];
		return view('pages/home', $data);
	}
  
  public function about()
  {
    $data= [
      'judul' => 'About'
    ];
    return view('pages/about', $data);
  }

  public function contact()
  {
    $data= [
      'judul' => 'Contact'
    ];
    return view('pages/contact', $data);
  }
}
