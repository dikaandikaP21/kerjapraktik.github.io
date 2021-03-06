<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function get_data($username, $tbl)
    {
        $builder = $this->db->table($tbl);
        $builder->where('username', $username);
        $log = $builder->get()->getRow();
        return $log;
    }
}
