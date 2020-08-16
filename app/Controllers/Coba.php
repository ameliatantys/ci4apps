<?php

namespace App\Controllers;

class Coba extends BaseController
{
  public function index()
  {
    echo "Ino controller coba method index $this->nama";
  }

  public function about($nama = '', $tahun = 0)
  {
    echo "Halo nama aku $nama umur $tahun";
  }




  //--------------------------------------------------------------------

}
