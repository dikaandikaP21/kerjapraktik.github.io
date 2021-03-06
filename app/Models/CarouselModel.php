<?php

namespace App\Models;

use CodeIgniter\Model;

class CarouselModel extends Model
{
    protected $table = 'carousel';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['gambar'];

    public function getRow()
    {
        return $this->get()->getRow();
    }
    public function getCarousel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->WHERE(['id' => $id])->first();
    }
}
