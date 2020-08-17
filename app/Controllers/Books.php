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

    // jika buku tidak ada di tabel
    if (empty($data['books'])) {
      // buat nampilin page 404 - Not Found
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan');
    }

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


  // Menegelola data dari create untuk ditambahkan ke tabel
  public function save()
  {
    //dd($this->request->getVar()); //buat dapetin semua mau pos ataupun get

    // tampung slug sebagai judul
    $slug = url_title($this->request->getVar('judul'), '-', true);

    $this->booksModel->save([
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $this->request->getVar('sampul')
    ]);

    // flash message jika data berhasil ditampilkan
    session()->setFlashData('pesan', 'Data berhasil ditambahkan!');

    return redirect()->to('/books');
  }
}
