<?php

namespace App\Models;

use CodeIgniter\Model;

class CaptchaModel extends Model
{

    public $validationRules = [
        'reCaptcha2' => 'required|reCaptcha2[]',
        // 'reCaptcha3' => 'required|reCaptcha3[contactForm,0.9]'

    ];
}
