<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\PerpusModel;
use App\Models\AduanModel;
use App\Models\CarouselModel;
use App\Models\SejarahdesaModel;
use App\Models\BeritaModel;
use App\Models\cobaberitaModel;
use App\Models\cobacategoriberitaModel;
use App\Models\cobacontenberitaModel;
use App\Models\Laporan_anggaranModel;
use App\Models\LembagaModel;
use App\Models\LayananModel;

use CodeIgniter\HTTP\Files\UploadedFile;

class Admin extends BaseController
{

    use ResponseTrait;
    protected $perpusmodel;
    protected $aduanmodel;
    protected $beritamodel;
    protected $carouselmodel;
    protected $sejarahdesamodel;
    protected $lembagamodel;
    protected $layananmodel;
    protected $laporan_anggaran;
    public function __construct()
    {
        $this->perpusmodel = new PerpusModel();
        $this->aduanmodel = new AduanModel();
        $this->carouselmodel = new CarouselModel();
        $this->beritamodel = new BeritaModel();
        $this->sejarahdesamodel = new SejarahdesaModel();
        $this->lembagamodel = new LembagaModel();
        $this->layananmodel = new LayananModel();
        $this->laporan_anggaran = new Laporan_anggaranModel();
        // coba berita
        $this->isiberitamodel = new cobaberitaModel();
        $this->contenberitamodel = new cobacontenberitaModel();
        $this->categoriberitamodel = new cobacategoriberitaModel();
    }
    public function index()
    {

        $data = [
            'judul' => 'Index utama',
            'carousel' => $this->carouselmodel->getCarousel(),
            'berita' => $this->contenberitamodel->get_contenberita()
            //'berita' => $this->isiberitamodel->get_isiberita()
        ];
        return view('Admin/Halaman_admin', $data);
    }

    public function edit_berita($id)
    {
        $data = [
            'id' => $id,
            'judul' => 'EDIT Berita',
            'validation' => \Config\Services::validation(),
            'berita' => $this->beritamodel->getBerita($id)
        ];
        session()->set($data);
        return view('Admin/Edit_berita', $data);
    }

    public function update_berita($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,4024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ],
            'isi_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/edit_berita/' . $id)->withInput();
        }

        $gambar = $this->request->getFile('gambar');

        //cek gambar, apakah tetap gambar lama
        if ($gambar->getError() == 4) {
            $namagambar = $this->request->getVar('gambarlama');
        } else {
            //generate nama file random
            $namagambar = $gambar->getName();
            //pindahkan gambar
            $gambar->move('berita', $namagambar);
            //hapus file yang lama
            unlink('berita/' . $this->request->getVar('gambarlama'));
        }

        $this->beritamodel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'gambar' => $namagambar,
            'isi_berita' => $this->request->getVar('isi_berita'),
            'link'  => $this->request->getVar('link')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin');
    }

    public function Aduan()
    {

        $currentPage = $this->request->getVar('page_aduan') ? $this->request->getVar('page_aduan') : 1;
        //membuat search form
        $keyword_aduan = $this->request->getVar('keyword-aduan');
        if ($keyword_aduan) {
            $aduan = $this->aduanmodel->search($keyword_aduan);
        } else {
            $aduan = $this->aduanmodel->getAduan();
        }

        $data = [
            'judul' => 'Aduan',
            'aduan' => $aduan->paginate(6, 'aduan'),
            'pager' => $this->aduanmodel->pager,
            'currentPage' => $currentPage
        ];

        return view('Admin/Aduan', $data);
    }

    // public function pencarian_perpus()
    // {
    //     $keyword_perpustakaan = $this->request->getVar('keyword-perpustakaan');
    //     if ($keyword_perpustakaan) {

    //         $perpustakaan = $this->perpusmodel->search($keyword_perpustakaan);
    //     } else {
    //         $perpustakaan = $this->perpusmodel;
    //     }
    //     $currentPage = $this->request->getVar('page_perpustakaan') ? $this->request->getVar('page_perpustakaan') : 1;
    //     //d($this->request->getVar('keyword-perpustakaan'));
    //     $data = [
    //         'judul' => 'Perpustakaan',
    //         // 'perpus' => $this->perpusmodel->getPerpus()
    //         'perpus' => $perpustakaan->getPerpus()->paginate(6, 'perpustakaan'),
    //         'pager' => $this->perpusmodel->pager,
    //         'currentPage' => $currentPage
    //     ];

    //     //jika buku tidak ada dalam tabel
    //     if (empty($data['perpus'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku' . 'Tidak Ada');
    //     }


    //     echo view('Admin/Perpustakaan', $data);
    // }

    public function descending()
    {

        $currentPage = $this->request->getVar('page_perpustakaan') ? $this->request->getVar('page_perpustakaan') : 1;
        //d($this->request->getVar('keyword-perpustakaan'));
        $data = [
            'judul' => 'Perpustakaan',
            // 'perpus' => $this->perpusmodel->getPerpus()
            'perpus' => $this->perpusmodel->descending()->paginate(6, 'perpustakaan'),
            'pager' => $this->perpusmodel->pager,
            'currentPage' => $currentPage
        ];

        //jika buku tidak ada dalam tabel
        echo view('Admin/Perpustakaan', $data);
    }

    public function Perpustakaan()
    {

        // d($this->request->getVar('keyword-perpustakaan'));
        // $table = 'perpustakaan';
        // $data['buku'] = $model->perpus()->getResult();

        //$perpus = $this->perpusmodel->findAll();
        //dd($perpus);

        //membuat search form
        $keyword_perpustakaan = $this->request->getVar('keyword-perpustakaan');
        if ($keyword_perpustakaan) {

            $perpustakaan = $this->perpusmodel->search($keyword_perpustakaan);
        } else {
            $perpustakaan = $this->perpusmodel;
        }
        $currentPage = $this->request->getVar('page_perpustakaan') ? $this->request->getVar('page_perpustakaan') : 1;
        //d($this->request->getVar('keyword-perpustakaan'));
        $data = [
            'judul' => 'Perpustakaan',
            'perpus' => $perpustakaan->getAll(),
            // 'perpus' => $this->perpusmodel->getPerpus()
            //'perpus' => $perpustakaan->getPerpus()->paginate(6, 'perpustakaan'),
            // 'pager' => $this->perpusmodel->pager,
            // 'currentPage' => $currentPage
        ];

        //jika buku tidak ada dalam tabel
        if (empty($data['perpus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku' . 'Tidak Ada');
        }


        return view('Admin/Perpustakaan', $data);
    }

    public function tambah_data()
    {
        session();
        $data = [
            'judul' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('Admin/Tambah_Data', $data);
    }

    public function saveperpus()
    {

        //validasi input
        if (!$this->validate([
            'judul_buku' => [
                'rules' => 'required|is_unique[perpustakaan.judul_buku]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'nomer_buku' => [
                'rules' => 'required|is_unique[perpustakaan.nomer_buku]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'kategori' => [
                'rules' => 'required[perpustakaan.kategori]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'status' => [
                'rule' => 'required[perpustakaan.status]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,4024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar sampul',
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ]
        ])) {


            // $validation = \Config\Services::validation();
            // return redirect()->to('/Admin/tambah_data')->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/tambah_data')->withInput();
        }

        // ambil gambar
        $filesampul = $this->request->getFile('sampul');

        // ngecek jika user tidak upload gambar maka di set name sampul ke default + ubah rules hapus uploaded
        // if($filesampul->getError()== 4){
        //     $namasampul = 'default.jpg';
        // }else{
        //      //1.ambil nama file dan di rename random
        // $namasampul = $filesampul->getRandomName();
        // //2. pindahkan file ke folder img
        // $filesampul->move('image-perpustakaan', $namasampul);
        // }

        //kalau dengan cara biasa, nama file akan sesuai di database tanpa generate

        //1. pindahkan file ke folder img
        //$filesampul->move('image-perpustakaan');

        //2.ambil nama file sesuai gambar
        //$namasampul = $filesampul->getName();

        //kalau mau  generate nama sampul random
        //1.ambil nama file dan di rename random
        $namasampul = $filesampul->getRandomName();
        //2. pindahkan file ke folder img
        $filesampul->move('image-perpustakaan', $namasampul);



        $this->perpusmodel->save([
            'judul_buku' => $this->request->getVar('judul_buku'),
            'nomer_buku' => $this->request->getVar('nomer_buku'),
            'sampul'     => $namasampul,
            'kategori'   => $this->request->getVar('kategori'),
            'status'     => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('Perpustakaan');
    }

    public function edit_data($id)
    {
        //var_dump($id);
        session();
        $data = [
            'id' => $id,
            'judul' => 'EDIT Data Perpus',
            'validation' => \Config\Services::validation(),
            'perpus' => $this->perpusmodel->getPerpus($id)
        ];
        session()->set($data);
        return view('Admin/Edit_Data', $data);
    }

    public function edit_data_aduan($id)
    {
        //var_dump($id);
        session();
        $data = [
            'id' => $id,
            'judul' => 'EDIT Data',
            'validation' => \Config\Services::validation(),
            'aduan' => $this->aduanmodel->getAduan($id)
        ];
        session()->set($data);
        return view('Admin/Edit_Data_Aduan', $data);
    }

    public function edit_carousel($id)
    {
        session();
        $data = [
            'id' => $id,
            'judul' => 'EDIT Carousel',
            'validation' => \Config\Services::validation(),
            'carousel' => $this->carouselmodel->getCarousel($id)
        ];
        session()->set($data);
        return view('Admin/Edit_carousel', $data);
    }

    public function update_carousel($id)
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,4024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ]

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/edit_carousel/' . $id)->withInput();
        }

        $gambar = $this->request->getFile('gambar');

        //cek gambar, apakah tetap gambar lama
        if ($gambar->getError() == 4) {
            $namagambar = $this->request->getVar('gambarlama');
        } else {
            //generate nama file random
            $namagambar = $gambar->getName();
            //pindahkan gambar
            $gambar->move('carousel', $namagambar);
            //hapus file yang lama
            unlink('carousel/' . $this->request->getVar('gambarlama'));
        }

        $this->carouselmodel->save([
            'id' => $id,
            'gambar' => $namagambar
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/index');
    }

    public function update_perpus($id)
    {
        //cek judul
        $bukulama = $this->perpusmodel->getPerpus($id);

        if ($bukulama['judul_buku'] == $this->request->getVar('judul_buku')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[perpustakaan.judul_buku]';
        }
        if ($bukulama['nomer_buku'] == $this->request->getVar('nomer_buku')) {
            $rule_nomer = 'required';
        } else {
            $rule_nomer = 'required|is_unique[perpustakaan.judul_buku]';
        }
        // $validate = 
        //validasi input
        if (!$this->validate([
            'judul_buku' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'nomer_buku' => [
                'rules' => $rule_nomer,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'kategori' => [
                'rules' => 'required[perpustakaan.kategori]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required[perpustakaan.kategori]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,4024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ]
        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/edit_data/' . $id)->withInput();
        }

        $filesampul = $this->request->getFile('sampul');

        //cek gambar, apakah tetap gambar lama
        if ($filesampul->getError() == 4) {
            $namasampul = $this->request->getVar('sampullama');
        } else {
            //generate nama file random
            $namasampul = $filesampul->getRandomName();
            //pindahkan gambar
            $filesampul->move('image-perpustakaan', $namasampul);
            //hapus file yang lama
            unlink('image-perpustakaan/' . $this->request->getVar('sampullama'));
        }

        $this->perpusmodel->save([
            'id' => $id,
            'judul_buku' => $this->request->getVar('judul_buku'),
            'nomer_buku' => $this->request->getVar('nomer_buku'),
            'sampul'     => $namasampul,
            'kategori'   => $this->request->getVar('kategori'),
            'status'     => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/Perpustakaan');
    }

    public function update_aduan($id)
    {
        //cek judul
        // $bukulama = $this->perpusmodel->getPerpus($id);

        // if ($bukulama['judul_buku'] == $this->request->getVar('judul_buku')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required|is_unique[perpustakaan.judul_buku]';
        // }
        // if ($bukulama['nomer_buku'] == $this->request->getVar('nomer_buku')) {
        //     $rule_nomer = 'required';
        // } else {
        //     $rule_nomer = 'required|is_unique[perpustakaan.judul_buku]';
        // }
        // $validate = 
        //validasi input
        if (!$this->validate([
            'judul_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus diisi'
                ]
            ],
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required[aduan.lokasi]',
                'errors' => [
                    'required' => 'field harus diisi'
                ]
            ]

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/edit_data_aduan/' . $id)->withInput();
        }

        $filebukti = $this->request->getFile('bukti');

        //cek gambar, apakah tetap gambar lama
        if ($filebukti->getError() == 4) {
            $namabukti = $this->request->getVar('buktilama');
        } else {
            //generate nama file random
            $namabukti = $filebukti->getRandomName();
            //pindahkan gambar
            $filebukti->move('image-bukti', $namabukti);
            //hapus file yang lama
            unlink('image-bukti/' . $this->request->getVar('buktilama'));
        }

        $this->aduanmodel->save([
            'id' => $id,
            'judul_laporan' => $this->request->getVar('judul_laporan'),
            'isi_laporan' => $this->request->getVar('isi_laporan'),
            'tanggal'   => $this->request->getVar('tanggal'),
            'lokasi'   => $this->request->getVar('lokasi'),
            'instansi_terkait'   => $this->request->getVar('instansi_terkait'),
            'bukti'     => $namabukti,
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/Aduan');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $perpus = $this->perpusmodel->find($id);

        if ($perpus['sampul'] != 'default.jpg') {

            unlink('image-perpustakaan/' . $perpus['sampul']);
        }

        $this->perpusmodel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/Admin/Perpustakaan');
    }
    public function delete_aduan($id)
    {
        //cari gambar berdasarkan id
        $aduan = $this->aduanmodel->find($id);

        if ($aduan['bukti'] != NULL) {

            unlink('image-bukti/' . $aduan['bukti']);
        }

        //var_dump($id);
        $this->aduanmodel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/Admin/Aduan');
    }

    public function Sejarah_desa()
    {
        $data = [
            'judul' => 'Sejarah Desa',
            'sejarah' => $this->sejarahdesamodel->getSejarah()
        ];
        return view('Admin/Sejarah_desa', $data);
    }

    public function Edit_sejarahdesa($id)
    {
        $data = [
            'id' => $id,
            'judul' => 'EDIT sejarah',
            'validation' => \Config\Services::validation(),
            'sejarah' => $this->sejarahdesamodel->getSejarah($id)
        ];
        session()->set($data);
        return view('Admin/Edit_sejarahdesa', $data);
    }

    public function update_sejarahdesa($id)
    {
        if (!$this->validate([
            'text_sejarah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'visi_misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'keterangan_wilayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'data_penduduk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'program_desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ]
        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/Edit_sejarahdesa/' . $id)->withInput();
        }

        $this->sejarahdesamodel->save([
            'id' => $id,
            'text_sejarah' => $this->request->getVar('text_sejarah'),
            'visi_misi' => $this->request->getVar('visi_misi'),
            'keterangan_wilayah' => $this->request->getVar('keterangan_wilayah'),
            'data_penduduk' => $this->request->getVar('data_penduduk'),
            'program_desa' => $this->request->getVar('program_desa')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/Sejarah_desa');
    }


    public function Layanan()
    {

        $data = [
            'judul' => 'Layanan',
            'layanan' => $this->layananmodel->getLayanan()
        ];
        return view('Admin/Layanan', $data);
    }

    public function Edit_layanan($id)
    {
        $data = [
            'id' => $id,
            'judul' => 'EDIT layanan',
            'validation' => \Config\Services::validation(),
            'layanan' => $this->layananmodel->getLayanan($id)
        ];
        session()->set($data);
        return view('Admin/Edit_layanan', $data);
    }

    public function update_layanan($id)
    {
        if (!$this->validate([
            'layanan_kia' => [
                'rules' => 'max_size[layanan_kia,4024]|is_image[layanan_kia]|mime_in[layanan_kia,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ],
            'layanan_ktp' => [
                'rules' => 'max_size[layanan_ktp,4024]|is_image[layanan_ktp]|mime_in[layanan_ktp,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ]

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/Edit_layanan/' . $id)->withInput();
        }

        $layanan_kia = $this->request->getFile('layanan_kia');
        $layanan_ktp = $this->request->getFile('layanan_ktp');

        if ($layanan_kia->getError() == 4 && $layanan_ktp->getError() == 4) {

            $namagambar_kia = $this->request->getVar('gambarlama_kia');
            $namagambar_ktp = $this->request->getVar('gambarlama_ktp');
        } else if ($layanan_kia->getError() != 4 && $layanan_ktp->getError() == 4) {
            $namagambar_ktp = $this->request->getVar('gambarlama_ktp');
            $namagambar_kia = $layanan_kia->getRandomName();

            //pindahkan gambar
            $layanan_kia->move('layanan', $namagambar_kia);

            //hapus file yang lama
            unlink('layanan/' . $this->request->getVar('gambarlama_kia'));
        } else if ($layanan_kia->getError() == 4 && $layanan_ktp->getError() != 4) {
            $namagambar_kia = $this->request->getVar('gambarlama_kia');
            $namagambar_ktp = $layanan_ktp->getRandomName();
            //pindahkan gambar

            $layanan_ktp->move('layanan', $namagambar_ktp);
            //hapus file yang lama

            unlink('layanan/' . $this->request->getVar('gambarlama_ktp'));
        } else {
            //generate nama file random
            $namagambar_kia = $layanan_kia->getRandomName();
            $namagambar_ktp = $layanan_ktp->getRandomName();
            //pindahkan gambar
            $layanan_kia->move('layanan', $namagambar_kia);
            $layanan_ktp->move('layanan', $namagambar_ktp);
            //hapus file yang lama
            unlink('layanan/' . $this->request->getVar('gambarlama_kia'));
            unlink('layanan/' . $this->request->getVar('gambarlama_ktp'));
        }

        $this->layananmodel->save([
            'id' => $id,
            'layanan_ktp' => $namagambar_ktp,
            'layanan_kia' => $namagambar_kia

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/Layanan');
    }

    public function Lembaga()
    {
        $data = [
            'judul' => 'Lembaga',
            'lembaga' => $this->lembagamodel->getLembaga()
        ];
        return view('Admin/Lembaga', $data);
    }
    public function Edit_lembaga($id)
    {
        $data = [
            'id' => $id,
            'judul' => 'EDIT Lembaga',
            'validation' => \Config\Services::validation(),
            'lembaga' => $this->lembagamodel->getLembaga($id)
        ];
        session()->set($data);
        return view('Admin/Edit_lembaga', $data);
    }

    public function update_lembaga($id)
    {
        if (!$this->validate([
            'karangtaruna' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'bumdes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'tp_pkk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'lpmd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
            'rt_rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ]
        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/Edit_lembaga/' . $id)->withInput();
        }

        $this->lembagamodel->save([
            'id' => $id,
            'karangtaruna' => $this->request->getVar('karangtaruna'),
            'bumdes' => $this->request->getVar('bumdes'),
            'tp_pkk' => $this->request->getVar('tp_pkk'),
            'lpmd' => $this->request->getVar('lpmd'),
            'rt_rw' => $this->request->getVar('rt_rw')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/Lembaga');
    }
    public function Laporan_anggaran()
    {
        $data = [
            'judul' => 'Laporan_anggaran',
            'laporan_anggaran' => $this->laporan_anggaran->getLaporan_anggaran(),

        ];
        return view('Admin/Laporan_anggaran', $data);
    }
    public function Tambah_data_anggaran()
    {
        session();
        $data = [
            'judul' => 'Tambah File Anggaran',
            'validation' => \Config\Services::validation()
        ];
        return view('Admin/Tambah_data_anggaran', $data);
    }

    public function save_anggaran()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus di isi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus di isi'
                ]
            ],

            'file_anggaran' => [
                'rules' => 'max_size[file_anggaran,4024]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ]

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/Tambah_data_anggaran/')->withInput();
        }

        $file = $this->request->getFile('file_anggaran');

        //menggambil nama file
        $namafile = $file->getRandomName();
        //pindahkan file
        $file->move('anggaran', $namafile);



        $this->laporan_anggaran->save([
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'file_anggaran' => $namafile
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambah.');
        return redirect()->to('/Admin/Laporan_anggaran');
    }
    public function delete_file_anggaran($id)
    {
        //cari gambar berdasarkan id
        $laporan_anggaran = $this->laporan_anggaran->find($id);

        if ($laporan_anggaran['file_anggaran'] != 'default.jpg') {

            unlink('anggaran/' . $laporan_anggaran['file_anggaran']);
        }

        $this->laporan_anggaran->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/Admin/Laporan_anggaran');
    }
    public function viewpdf($id)
    {
        $data = [
            'judul' => 'Tampil File',
            'laporan_anggaran' => $this->laporan_anggaran->getLaporan_anggaran($id),
            'isi' => 'Admin/tampil_file_pdf'

        ];
        return view('Admin/Tampil_file_anggaran', $data);
    }

    // ======================================================================================================
    // UJI COBA BERITA
    // ======================================================================================================

    public function isiberita()
    {
        $keyword_berita = $this->request->getVar('keyword-berita');
        if ($keyword_berita) {

            $berita = $this->isiberitamodel->search($keyword_berita);
        } else {
            $berita = $this->isiberitamodel->get_isiberita();
        }
        //  $currentPage = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;
        $data = [
            'judul' => 'Coba Berita',
            'isiberita' => $berita,
            'pager' => $this->isiberitamodel->pager,
            //'isiberita' => $this->isiberitamodel->get_isiberita(),
            // 'curenpage' => $currentPage
        ];
        return view('Admin/isiberita', $data);
    }

    public function Tambah_isiberita()
    {
        session();
        $data = [
            'judul' => 'Tambah Berita',
            'categori' => $this->categoriberitamodel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('Admin/Tambah_isiberita', $data);
    }


    public function save_isiberita()
    {
        if (!$this->validate([
            'judulberita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus di isi'
                ]
            ],
            'isiberita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus di isi'
                ]
            ],

            'file_isiberita' => [
                'rules' => 'max_size[file_isiberita,4024]|is_image[file_isiberita]|mime_in[file_isiberita,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ],
            'categoriberita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'field harus di isi'
                ]
            ],

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/Tambah_isiberita/')->withInput();
        }


        $file = $this->request->getFile('file_isiberita');

        //menggambil nama file
        $namafile = $file->getRandomName();
        //pindahkan file
        $file->move('berita', $namafile);



        $this->isiberitamodel->save([
            'judul' => $this->request->getVar('judulberita'),
            'gambar' => $namafile,
            'isi_berita' => $this->request->getVar('isiberita'),
            'id_categori' => $this->request->getVar('categoriberita'),

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambah.');
        return redirect()->to('/Admin/isiberita');
    }


    public function Edit_Data_berita($id)
    {
        //var_dump($id);
        session();
        $data = [
            'id_berita' => $id,
            'judul' => 'EDIT Berita',
            'validation' => \Config\Services::validation(),

            'berita' => $this->isiberitamodel->get_isiberita($id),
            'categori' => $this->categoriberitamodel->findAll($id),
            'join' => $this->isiberitamodel->edit_isiberita($id)

        ];
        session()->set($data);
        return view('Admin/Edit_Data_berita', $data);
    }
    public function update_isiberita($id)
    {
        // if (!$this->validate([
        //     'judul' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'

        //         ]
        //     ],
        //     'gambar' => [
        //         'rules' => 'max_size[gambar,4024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        //         'errors' => [
        //             'max_size' => 'Gambar lebih dari 4mb',
        //             'is_image' => 'Yang anda pilih bukan gambar',
        //             'mime_in'  => 'Harus JPG/JPEG/PNG'
        //         ]
        //     ],
        //     'isi_berita' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ],
        //     'id_categori' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi'
        //         ]
        //     ]

        // ])) {
        //     //  $validation = \Config\Services::validation();
        //     //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
        //     return redirect()->to('/Admin/Edit_Data_berita/' . $id)->withInput();
        // }

        $gambar = $this->request->getFile('gambar');

        //cek gambar, apakah tetap gambar lama
        if ($gambar->getError() == 4) {
            $namagambar = $this->request->getVar('gambarlama');
        } else {
            //generate nama file random
            $namagambar = $gambar->getName();
            //pindahkan gambar
            $gambar->move('berita', $namagambar);
            //hapus file yang lama
            unlink('berita/' . $this->request->getVar('gambarlama'));
        }



        $data = [
            'id_berita' => $id,
            'judul' => $this->request->getVar('judul'),
            'gambar' => $namagambar,
            'isi_berita' => $this->request->getVar('isi_berita'),
            'id_categori'  => $this->request->getVar('categoriberita')
        ];
        $simpan = $this->isiberitamodel->update_berita($data, $id);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
            return redirect()->to('/Admin/isiberita');
        }
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/isiberita');
    }

    public function delete_berita($id)
    {
        //cari gambar berdasarkan id
        $cobaberita = $this->isiberitamodel->get_isiberita($id);

        if ($cobaberita['gambar'] != NULL) {

            unlink('berita/' . $cobaberita['gambar']);
        }

        //var_dump($id);
        $this->isiberitamodel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/Admin/isiberita');
    }

    public function conten_berita()
    {
        $data = [
            'judul' => 'Content Berita',
            'conten_berita' => $this->contenberitamodel->get_contenberita(),
            // 'coba_categoriberita' => $this->coba_categoriberita->findAll()
        ];
        return view('Admin/conten_berita', $data);
    }
    public function Tambah_conten_berita()
    {
        session();
        $data = [
            'judul' => 'Tambah Berita',
            // 'conten_berita' => $this->coba_contenberita->findAll(),
            //  'categori' => $this->contenberitamodel->get_contenberita(),
            'categori' => $this->categoriberitamodel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('Admin/Tambah_conten_berita', $data);
    }
    public function getautoselect()
    {
        $id_categoriberita = $this->request->getpost('id');
        $data = $this->isiberitamodel->get_beritaberdasarkan_kategori($id_categoriberita);
        $output = '<option> chose... </option>';
        foreach ($data as $row) {
            $output .= ' <option value="' . $row['id_berita'] . '">' . $row['judul'] . ' </option>';
        }
        return  $this->response->setJSON(json_encode($output));
    }
    public function save_contenberita()
    {

        $this->contenberitamodel->save([
            'id_categori' => $this->request->getVar('categori_berita'),
            'id_berita' => $this->request->getVar('conten_isiberita'),

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambah.');
        return redirect()->to('/Admin/conten_berita');
    }

    public function delete_contenberita($id)
    {

        $this->contenberitamodel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/Admin/conten_berita');
    }

    public function detail_contenberita($id)
    {
        $data = [
            'id' => $id,
            'judul' => 'DETAIL BERITA',
            'validation' => \Config\Services::validation(),
            // 'contenberita' => $this->coba_contenberita->detail_contenberita($id),
            'berita' => $this->isiberitamodel->get_isiberita($id),
            //  'categori' => $this->coba_categoriberita->findAll($id),
            'join' => $this->isiberitamodel->edit_isiberita($id)
        ];
        session()->set($data);
        return view('Admin/detail_contenberita', $data);
    }

    public function kategori_berita()
    {
        $keyword_kategori = $this->request->getVar('keyword-kategori');
        if ($keyword_kategori) {

            $kategori = $this->categoriberitamodel->search($keyword_kategori);
        } else {
            $kategori = $this->categoriberitamodel->get_categoriberita();
        }
        $data = [
            'judul' => 'Kategori Berita',
            'kategori' => $kategori
        ];
        return view('Admin/kategori_berita', $data);
    }

    public function Tambah_kategoriberita()
    {
        session();
        $data = [
            'judul' => 'Tambah Kategori Berita',
            //'categori' => $this->categoriberitamodel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('Admin/Tambah_kategoriberita', $data);
    }
    public function save_kategoriberita()
    {

        $this->categoriberitamodel->save([
            'kategori' => $this->request->getVar('kategoriberita'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Di Tambah.');
        return redirect()->to('/Admin/kategori_berita');
    }

    public function edit_kategoriberita($id)
    {
        session();
        $data = [
            'judul' => 'Edit Kategori Berita',
            'kategori' => $this->categoriberitamodel->get_categoriberita($id),
            'validation' => \Config\Services::validation()
        ];
        return view('Admin/edit_kategori_berita', $data);
    }

    public function update_kategori_berita($id)
    {

        if (!$this->validate([
            'kategori_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],

        ])) {
            //  $validation = \Config\Services::validation();
            //  return redirect()->to('/Admin/edit_data/' . $id)->withInput()->with('validation', $validation);
            return redirect()->to('/Admin/edit_kategoriberita/' . $id)->withInput();
        }


        $data = [
            'id_categori' => $id,
            'kategori'  => $this->request->getVar('kategori_berita')
        ];
        $simpan = $this->categoriberitamodel->update_kategoriberita($data, $id);
        // if ($simpan->getError() == 4) {
        //     session()->setFlashdata('pesan', 'Gagal Diubah.');
        //     return redirect()->to('/Admin/kategori_berita');
        // }
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/Admin/kategori_berita');
    }

    public function tampil_berita($id)
    {
        session();
        $data = [
            'judul' => 'Berita',
            'berita' => $this->isiberitamodel->get_isiberita($id),
            'kategori' => $this->categoriberitamodel->get_categoriberita($id),
            'conten' => $this->contenberitamodel->detail_contenberita($id),
        ];
        return view('Admin/tampil_berita', $data);
    }
}
