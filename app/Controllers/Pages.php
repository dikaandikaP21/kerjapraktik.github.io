<?php

namespace App\Controllers;

use App\Models\PerpusModel;
use App\Models\AduanModel;
use App\Models\CarouselModel;
use App\Models\BeritaModel;
use App\Models\Laporan_anggaranModel;
use App\Models\LayananModel;
use App\Models\LembagaModel;
use App\Models\SejarahdesaModel;
use App\Models\cobacontenberitaModel;
use App\Models\cobacategoriberitaModel;
use App\Models\cobaberitaModel;
use CodeIgniter\HTTP\RequestInterface;

class Pages extends BaseController
{
    //  protected $perpusmodel;
    protected $aduanmodel;
    public function __construct()
    {
        //    $this->perpusmodel = new PerpusModel();
        $this->aduanmodel = new AduanModel();
    }

    public function index()
    {
        $this->CarouselModel = new CarouselModel();
        $this->contenberitamodel = new cobacontenberitamodel();
        $data = [
            'judul' => 'Index utama',
            'carousel' => $this->CarouselModel->getCarousel(),
            'berita' => $this->contenberitamodel->get_contenberita()
        ];

        return view('Pages/Index-utama', $data);
    }

    public function Berita($id)
    {
        $this->contenberitamodel = new cobacontenberitamodel();
        $this->isiberitamodel = new cobaberitaModel();
        $this->categoriberitamodel = new cobacategoriberitamodel();
        session();
        $data = [
            'judul' => 'Berita',
            'berita' => $this->isiberitamodel->get_isiberita($id),
            'kategori' => $this->categoriberitamodel->get_categoriberita($id),
            'conten' => $this->contenberitamodel->detail_contenberita($id),
        ];
        return view('Pages/Berita', $data);
    }

    public function Sejarah_desa()
    {
        $this->sejarah = new SejarahdesaModel();
        $data = [
            'judul' => 'Sejarah Desa',
            'sejarah' => $this->sejarah->getSejarah()
        ];
        return view('Pages/Sejarah_desa', $data);
    }

    public function Lembaga()
    {
        $this->lembagamodel = new LembagaModel();
        $data = [
            'judul' => 'Lembaga Desa',
            'lembaga' => $this->lembagamodel->getLembaga()
        ];

        return view('Pages/Lembaga', $data);
    }

    public function Layanan()
    {
        $this->layanan = new LayananModel();
        $data = [
            'judul' => 'Halaman Layanan',
            'layanan' => $this->layanan->getLayanan()
        ];
        return view('Pages/Layanan', $data);
    }

    //--------------------------------------------------------------------
    public function Laporan_anggaran()
    {
        $this->Laporan_anggaran = new Laporan_anggaranModel();
        $data = [
            'judul' => 'Laporan anggaran',
            'laporan_anggaran' => $this->Laporan_anggaran->getLaporan_anggaran()
        ];
        return view('Pages/Laporan_anggaran', $data);
    }
    public function viewpdf($id)
    {
        $data = [
            'judul' => 'Laporan_anggaran',
            'laporan_anggaran' => $this->laporan_anggaran->getLaporan_anggaran($id),

        ];
        return view('Pages/Laporan_anggaran', $data);
    }

    public function PortalAduan()
    {
        $data = [
            'judul' => 'Portal Aduan',
            'validation' => \Config\Services::validation()
        ];

        return view('Pages/PortalAduan', $data);
    }

    public function saveaduan()
    {


        //validasi input
        if (!$this->validate([
            'judul_laporan' => [
                'rules' => 'required[aduan.judul_laporan]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'isi_laporan' => [
                'rules' => 'required[aduan.isi_laporan]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required[aduan.tanggal]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'lokasi' => [
                'rule' => 'required[aduan.lokasi]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

            'instansi_terkait' => [
                'rule' => 'required[aduan.instansi_terkait]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'bukti' => [
                'rules' => 'is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]|max_size[bukti,4024]',
                'errors' => [
                    'max_size' => 'Gambar lebih dari 4mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Harus JPG/JPEG/PNG'
                ]
            ]
        ])) {


            // $validation = \Config\Services::validation();
            // return redirect()->to('/Admin/tambah_data')->withInput()->with('validation', $validation);
            return redirect()->to('/Pages/PortalAduan')->withInput();
        }

        // ambil gambar
        $filebukti = $this->request->getFile('bukti');

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
        $namabukti = $filebukti->getRandomName();
        //2. pindahkan file ke folder img
        $filebukti->move('image-bukti', $namabukti);

        // ========================

        // $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));

        // $userIp = $this->request->ip_address();

        $secret = '6LdE9GkaAAAAAP6U9Fl2Apzkd7JYzCq43jZoCXAI';

        $credential = array(
            'secret' => $secret,
            'response' => $this->request->getVar('g-recaptcha-response')
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);

        if ($status['success']) {
            $this->aduanmodel->save([
                'judul_laporan' => $this->request->getVar('judul_laporan'),
                'isi_laporan' => $this->request->getVar('isi_laporan'),
                'tanggal'   => $this->request->getVar('tanggal'),
                'lokasi'   => $this->request->getVar('lokasi'),
                'instansi_terkait'   => $this->request->getVar('instansi_terkait'),
                'tanggal'   => $this->request->getVar('tanggal'),
                'bukti'     => $namabukti,
                'status'    => 'Belum di Tanggapi'
            ]);
            session()->setFlashdata('pesan', 'Berhasil Terkirim');
        } else {
            session()->setFlashdata('pesan', 'Gagal Terkirim, Coba Lagi');
        }

        // ===========================

        // session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('PortalAduan');
    }


    public function Perpustakaan()
    {
        $this->perpusmodel = new PerpusModel();

        $currentPage = $this->request->getVar('page_perpustakaan') ? $this->request->getVar('page_perpustakaan') : 1;
        //membuat search form
        $keyword_perpustakaan = $this->request->getVar('keyword-perpustakaan');
        if ($keyword_perpustakaan) {
            $perpustakaan = $this->perpusmodel->search($keyword_perpustakaan);
        } else {
            $perpustakaan = $this->perpusmodel;
        }

        $data = [
            'judul' => 'Perpustakaan',
            // 'perpus' => $this->perpusmodel->getPerpus()
            'perpus' => $perpustakaan->getAll(),
        ];

        //jika buku tidak ada dalam tabel
        if (empty($data['perpus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku' . 'Tidak Ada');
        }


        return view('Pages/Perpustakaan', $data);
    }
    public function pencarian_perpus()
    {
        $this->perpusmodel = new PerpusModel();
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
            // 'perpus' => $this->perpusmodel->getPerpus()
            'perpus' => $perpustakaan->paginate(6, 'perpustakaan'),
            'pager' => $this->perpusmodel->pager,
            'currentPage' => $currentPage
        ];

        //jika buku tidak ada dalam tabel
        if (empty($data['perpus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku' . 'Tidak Ada');
        }


        echo view('Pages/Perpustakaan', $data);
    }
}
