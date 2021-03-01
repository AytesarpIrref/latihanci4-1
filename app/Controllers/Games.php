<?php 

namespace App\Controllers;
use \App\Models\GamesModel;

class Games extends BaseController
{
  protected $gamesModel;
  public function __construct()
  {
    $this->gamesModel = new GamesModel();
  }

  public function index()
  {
    // $games = $this->gamesModel->findAll();

    $data= [
      'judul' => 'Daftar Game',
      'games' => $this->gamesModel->getGames()
    ];
    

		return view('games/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'judul' => 'Detail Game',
      'games' => $this->gamesModel->getGames($slug)
    ];

    // jika tidak ada di tabel
    if (empty($data['games'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Game ' . '"' . $slug . '"' . ' Tidak Ditemukan');
      
    }
    return view('games/detail', $data);
  }

  public function create()
  {
    $data = [
      'judul' => 'Tambah Daftar Game',
      'validation' => \Config\Services::validation()
    ];
    return view('games/create', $data);
  }

  public function save()
  {
    // validation
    if (!$this->validate([
      'nama' => [
        'rules' => 'required|is_unique[game.nama]',
        'errors' => [
          'required' => '{field} game harus diisi!',
          'is_unique' => '{field} game sudah ada, silakan masukkan game lain!'
        ]
        ],
      'img' => [
        'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar teralu besar, silakan pilih gambar dengan ukuran dibawah 1MB!',
          'is_image' => 'Yang anda pilih bukan gambar!',
          'mime_in' => 'Yang anda pilih bukan gambar!'
        ]
      ]
    ])) {
      // $validation = \Config\Services::validation();
      // return redirect()->to('/games/create')->withInput()->with('validation', $validation);
      return redirect()->to('/games/create')->withInput();
    }

    // ambil gambar
    $fileGambar = $this->request->getFile('img');
    if ($fileGambar->getError() == 4) {
      $namaGambar = 'default.jpg';
    } else {
      // pindahkan file
      $fileGambar->move('img');
      // ambil nama file
      $namaGambar = $fileGambar->getName();
    }

    $slug = url_title($this->request->getVar('nama'), '-', true);
    $this->gamesModel->save([
      'nama' => $this->request->getVar('nama'),
      'slug' => $slug,
      'genre' => $this->request->getVar('genre'),
      'dev' => $this->request->getVar('dev'),
      'rilis' => $this->request->getVar('rilis'),
      'versi' => $this->request->getVar('versi'),
      'img' => $namaGambar
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
    return redirect()->to('/games');
  }

  public function delete($id)
  {
    // cari gambar berdasarkan id
    $games = $this->gamesModel->find($id);
    
    // cek apakah gambar default
    if ($games['img'] != 'default.jpg') {
      // hapus gambar
      unlink('img/' . $games['img']);
    }
    
    $this->gamesModel->delete($id);
    session()->setFlashdata('pesan-hapus', 'Data Berhasil Dihapus!');
    return redirect()->to('/games');
  }

  public function edit($slug)
  {
    $data = [
      'judul' => 'Ubah Data Game',
      'validation' => \Config\Services::validation(),
      'games' => $this->gamesModel->getGames($slug)
    ];
    return view('games/edit', $data);
  }
  public function update($id)
  {
    // validasi
    // cek 
    $gamesLama = $this->gamesModel->getGames($this->request->getVar('slug'));
    if ($gamesLama['nama'] == $this->request->getVar('nama')) {
      $rule_nama = 'required';
    } else {
      $rule_nama = 'required|is_unique[game.nama]';
    }

    if (!$this->validate([
      'nama' => [
        'rules' => $rule_nama,
        'errors' => [
          'required' => '{field} game harus diisi!',
          'is_unique' => '{field} game sudah ada, silakan masukkan game lain!'
        ]
        ],
        'img' => [
        'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar teralu besar, silakan pilih gambar dengan ukuran dibawah 1MB!',
          'is_image' => 'Yang anda pilih bukan gambar!',
          'mime_in' => 'Yang anda pilih bukan gambar!'
        ]
      ]
    ])) {
      return redirect()->to('/games/edit/' . $this->request->getVar('slug'))->withInput();
    }

    // ambil gambar
    $fileGambar = $this->request->getFile('img');

    // cek gambar, baru/lama?
    if ($fileGambar->getError() == 4) {
      $namaGambar = $this->request->getVar('imgLama');
    } else {
      // ambil nama file
      $namaGambar = $fileGambar->getName();
      // pindahkan file
      $fileGambar->move('img', $namaGambar);
      unlink('img/' . $this->request->getVar('imgLama'));
    }

    $slug = url_title($this->request->getVar('nama'), '-', true);
    $this->gamesModel->save([
      'id' => $id,
      'nama' => $this->request->getVar('nama'),
      'slug' => $slug,
      'genre' => $this->request->getVar('genre'),
      'dev' => $this->request->getVar('dev'),
      'rilis' => $this->request->getVar('rilis'),
      'versi' => $this->request->getVar('versi'),
      'img' => $namaGambar
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
    return redirect()->to('/games');
  }
}