<?php

namespace App\Models;

use CodeIgniter\Model;

class PerpusModel extends Model
{
    protected $table = 'perpustakaan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul_buku', 'nomer_buku', 'sampul', 'kategori', 'status'];


    public function getPerpus($id = false)
    {
        if ($id == false) {
            return $this->orderBy('judul_buku', 'asc');
        }

        return $this->WHERE(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function search($keyword_perpustakaan)
    {
        // $builder = $this->table('perpustakaan');
        // $builder->like('nomer_buku', $keyword_perpustakaan);

        // return $builder;

        return $this->table('perpustakaan')->like('nomer_buku', $keyword_perpustakaan)->orLike('kategori', $keyword_perpustakaan)->orLike('judul_buku', $keyword_perpustakaan)->orLike('status', $keyword_perpustakaan);
    }

    public function ascending()
    {
        return $this->table('perpustakaan')->orderBy('judul_buku', 'asc');
    }
    public function descending()
    {
        return $this->table('perpustakaan')->orderBy('judul_buku', 'desc');
    }
}
