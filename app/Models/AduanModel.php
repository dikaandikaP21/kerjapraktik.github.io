<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul_laporan', 'isi_laporan', 'tanggal', 'lokasi', 'instansi_terkait', 'bukti', 'status'];


    public function getAduan($id = false)
    {
        if ($id == false) {
            return $this->table('aduan')->orderBy('tanggal', 'asc');
        }

        return $this->WHERE(['id' => $id])->first();
    }
    public function search($keyword_aduan)
    {
        // $builder = $this->table('aduan');
        // $builder->like('nomer_buku', $keyword_aduan);

        // return $builder;

        return $this->table('aduan')->like('judul_laporan', $keyword_aduan)->orLike('isi_laporan', $keyword_aduan)
            ->orLike('tanggal', $keyword_aduan)->orLike('lokasi', $keyword_aduan)
            ->orLike('tanggal', $keyword_aduan)->orLike('instansi_terkait', $keyword_aduan)
            ->orLike('tanggal', $keyword_aduan)->orLike('status', $keyword_aduan);
    }
}
