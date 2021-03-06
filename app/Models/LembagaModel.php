<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaModel extends Model
{
    protected $table = 'lembaga';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['karangtaruna', 'bumdes', 'tp_pkk', 'lpmd', 'rt_rw'];


    public function getLembaga($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->WHERE(['id' => $id])->first();
    }
}
