<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {

    $data = [
      'title' => 'Home | Web Tanty'
    ];

    return view('pages/home', $data);
  }

  public function about()
  {

    $data = [
      'title' => 'About | Web Tanty'
    ];

    return view('pages/about', $data);
  }

  public function contact()
  {

    $data = [
      'title' => 'Contact Us | Web Tanty'
    ];

    return view('pages/contact', $data);
  }






  //--------------------------------------------------------------------

}
