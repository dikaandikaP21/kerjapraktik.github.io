<?php

namespace App\Models;

use CodeIgniter\Model;

class cobacategoriberitaModel extends Model
{
    protected $table = 'categori_berita';
    protected $primaryKey = 'id_categori';
    protected $useTimestamps = true;
    protected $allowedFields = ['kategori'];


    public function get_categoriberita($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->WHERE(['id_categori' => $id])->first();
    }

    public function search($keyword_berita)
    {
        return $this->table('categori_berita')
            ->like('kategori', $keyword_berita)->get()->getResultArray();
    }
    public function update_kategoriberita($data, $id)
    {
        $this->db->table('categori_berita')->update($data, ['id_categori' => $id]);
    }
}
