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
    // session(); // fungsi penyimpanan disimpan di base controller
    $data = [
      'title' => 'Form Tambah Buku',
      // mengirim validation ke create
      'validation' => \Config\Services::validation()
    ];

    return view('books/create', $data);
  }


  // Menegelola data dari create untuk ditambahkan ke tabel
  public function save()
  {
    //dd($this->request->getVar()); //buat dapetin semua mau pos ataupun get

    // validasi input
    // if (!$this->validate([
    //   'judul' => 'required|is_unique[books.judul]',
    //   'penulis' => 'required',
    //   'penerbit' => 'required',
    //   'sampul' => 'required'
    // ])) {


    if (!$this->validate([
      'judul' => [
        'rules' => 'required|is_unique[books.judul]',
        'errors' => [
          'required' => '{field} buku harus diisi',
          'is_unique' => '{field} buku sudah terdaftar'
        ]
      ],
      'penulis' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} buku harus diisi'
        ]
      ],
      'penerbit' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} buku harus diisi'
        ]
      ],
      'sampul' => [
        'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        'error' => [
          'max_size' => 'ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'memi_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ])) {
      // // mengambil pesan kesalahan
      // $validation = \Config\Services::validation();
      // // input ini akan di simpan ke session
      // return redirect()->to('/books/create')->withInput()->with('validation', $validation);
      return redirect()->to('/books/create')->withInput();
    }

    //ambil sampul atau gambar
    $fileSampul = $this->request->getFile('sampul');
    //apakah tidak ada gambar yang diupload
    if ($fileSampul->getError() == 4) {
      //maka sampul yang akan dipakai adalah default
      $namaSampul = 'default.jpg';
    } else {
      // generate nama sampul randum
      $namaSampul = $fileSampul->getRandomName();
      //pindahkan ke folder img
      $fileSampul->move('img', $namaSampul);
    }

    // KALAU NAMA GGAMBARNYA MAU SAMA KAYAK FILE
    //pindahkan file ke folder img di publik
    // $fileSampul->move('img');
    // //menggambil nama file menjadi isi dari sampul
    // $namaSampul = $fileSampul->getName();


    // tampung slug sebagai judul
    $slug = url_title($this->request->getVar('judul'), '-', true);

    $this->booksModel->save([
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $namaSampul
    ]);

    // flash message jika data berhasil ditampilkan
    session()->setFlashData('pesan', 'Data berhasil ditambahkan!');

    return redirect()->to('/books');
  }

  // fungsi delete

  public function delete($id)
  {
    $this->booksModel->delete($id);
    session()->setFlashData('pesan', 'Data berhasil dihapus!');
    return redirect()->to('/books');
  }

  // fungsi edit

  public function edit($slug)
  {
    // session(); // fungsi penyimpanan disimpan di base controller
    $data = [
      'title' => 'Form Edit Buku',
      // mengirim validation ke create
      'validation' => \Config\Services::validation(),
      'books' => $this->booksModel->getBook($slug)
    ];

    return view('books/edit', $data);
  }

  // FUNGSI UPDATE
  public function update($id)
  {
    // cek judul
    // slug dari input hidden
    $bukulama = $this->booksModel->getBook($this->request->getVar('slug'));
    // kalau judulnya sama
    if ($bukulama['judul'] == $this->request->getVar('judul')) {
      //harus beda
      $rule_judul = 'required';
    } else {
      // kalau diganti harus beda sama unique
      $rule_judul = 'required|is_unique[books.judul]';
    }

    if (!$this->validate([
      'judul' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => '{field} buku harus diisi',
          'is_unique' => '{field} buku sudah terdaftar'
        ]
      ],
      'penulis' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} buku harus diisi'
        ]
      ],
      'penerbit' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} buku harus diisi'
        ]
      ],
      'sampul' => [
        'rules' => 'uploaded[sampul]',
        'errors' => [
          'uploaded' => '{field} buku harus diupload'
        ]
      ]
    ])) {
      // mengambil pesan kesalahan
      // $validation = \Config\Services::validation();
      // input ini akan di simpan ke session
      // return redirect()->to('/books/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
      return redirect()->to('/books/edit/' . $this->request->getVar('slug'))->withInput();
    }

    // tampung slug sebagai judul

    $slug = url_title($this->request->getVar('judul'), '-', true);

    $this->booksModel->save([
      'id' => $id,
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $this->request->getVar('sampul')
    ]);

    // flash message jika data berhasil ditampilkan
    session()->setFlashData('pesan', 'Data berhasil diubah!');

    return redirect()->to('/books');
  }
}
