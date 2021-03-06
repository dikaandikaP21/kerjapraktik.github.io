<?php

namespace App\Models;

use CodeIgniter\Model;

class cobaberitaModel extends Model
{
    //protected SET FOREIGN_KEY_CHECKS=0;
    protected $table = 'isi_berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'gambar', 'isi_berita', 'id_categori', 'updated_at'];


    public function get_isiberita($id = false)
    {
        if ($id == false) {
            return $this->db->table('isi_berita')
                ->join('categori_berita', 'categori_berita.id_categori = isi_berita.id_categori')
                ->orderBy('isi_berita.updated_at', 'asc')->get()->getResultArray();
        }

        return $this->WHERE(['id_berita' => $id])->first();
    }

    public function edit_isiberita($id)
    {
        return $this->db->table('isi_berita')
            ->join('categori_berita', 'categori_berita.id_categori = isi_berita.id_categori')
            ->WHERE(['id_berita' => $id])->get()->getResultArray();
    }
    public function search($keyword_berita)
    {
        return $this->db->table('isi_berita')
            ->join('categori_berita', 'categori_berita.id_categori = isi_berita.id_categori')
            ->like('judul', $keyword_berita)->orLike('categori_berita.id_categori', $keyword_berita)
            ->get()->getResultArray();
    }

    public function update_berita($data, $id)
    {
        $this->db->table('isi_berita')->update($data, ['id_berita' => $id]);
    }

    public function get_beritaberdasarkan_kategori($id_categoriberita)
    {
        return $this->WHERE(['id_categori' => $id_categoriberita])->get()->getResultArray();
    }
}
