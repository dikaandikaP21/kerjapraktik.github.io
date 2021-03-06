<?php

namespace App\Models;

use CodeIgniter\Model;

class cobacontenberitaModel extends Model
{
    protected $table = 'conten_berita';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_categori', 'id_berita'];


    public function get_contenberita($id = false)
    {
        if ($id == false) {
            return $this->db->table('conten_berita')
                ->join('categori_berita', 'categori_berita.id_categori = conten_berita.id_categori')
                ->join('isi_berita', 'isi_berita.id_berita = conten_berita.id_berita')
                ->get()->getResultArray();
        }

        return $this->WHERE(['id' => $id])->first();
    }
    public function detail_contenberita($id)
    {
        return $this->db->table('conten_berita')
            ->join('categori_berita', 'categori_berita.id_categori = conten_berita.id_categori')
            ->join('isi_berita', 'isi_berita.id_berita = conten_berita.id_berita')
            ->WHERE(['id' => $id])
            ->get()->getResultArray();
    }
}
