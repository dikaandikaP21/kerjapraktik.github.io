<?php

namespace App\Models;

use CodeIgniter\Model;

class SejarahdesaModel extends Model
{
    protected $table = 'sejarah_desa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['text_sejarah', 'visi_misi', 'keterangan_wilayah', 'data_penduduk', 'program_desa'];


    public function getSejarah($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->WHERE(['id' => $id])->first();
    }
}
