<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Books extends BaseController
{

  protected $booksModel;
  public function __construct()
  {

    $this->booksModel = new BooksModel();
  }


  public function index()
  {
    // $books = $this->booksModel->findAll(); //kayak select * all
    $data = [
      'title' => 'Daftar Buku',
      'books' => $this->booksModel->getBook() //enggak pakai parameter karena ingin find all
    ];

    return view('books/index', $data);
  }

  public function detail($slug)  //ambil data dari slug biasanya id
  {
    // $books = $this->booksModel->getBook($slug); //kalau yang ini butuh parameter buat nampilin dital

    $data = [
      'title' => 'Detail Buku',
      'books' => $this->booksModel->getBook($slug) //kalau yang ini butuh parameter buat nampilin detaill
    ];

    return view('books/detail', $data);
  }

  // Menambahkan data baru
  public function create()
  {
    $data = [
      'title' => 'Form Tambah Buku',
      'books' => $this->booksModel->getBook() //kalau yang ini butuh parameter buat nampilin detaill
    ];

    return view('books/create', $data);
  }

  public function save(){
    $this->request->getVar() //buat dapetin semua mau pos ataupun get
  }
}
