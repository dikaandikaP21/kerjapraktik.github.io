<?php

namespace App\Controllers;

use App\Models\CaptchaModel;
use CodeIgniter\Controller;

class Captcha extends BaseController
{
    protected $captchamodel;
    public function __construct()
    {
        // $this->loadHelpers->library('session');
        $this->captchamodel = new CaptchaModel();
    }


    public function index()
    {

        $data = [
            'judul' => 'coba captcha'
        ];
        return view('Pages/coba', $data);
    }

    function validasi()
    {
        $captcha_response = trim($this->input->post('g-recaptcha-response'));

        if ($captcha_response != '') {
            $keySecret = '6LdE9GkaAAAAAP6U9Fl2Apzkd7JYzCq43jZoCXAI';
            $check = array(
                'secret' => $keySecret,
                'response' => $this->input->post('g-recaptcha-response')
            );
            $startprocess = curl_init();

            curl_setopt($startprocess, CURLOPT_URL, "https://www.google.com/recaptcha/api.js");
            curl_setopt($startprocess, CURL_POST, true);
            curl_setopt($startprocess, CURLOPT_POSTFIELDS, http_build_query($check));
            curl_setopt($startprocess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($startprocess, CURLOPT_RETURNTRANSFER, true);

            $receiveData = curl_exec($startprocess);
            $finalResponse = json_decode($receiveData, true);

            if ($finalResponse['success']) {
                $storeData = array();
                redirect('Pages');
            } else {
                $_SESSION->set_flasdata('pesan', 'coba lagi');
                redirect('Captcha');
            }
        } else {
            $_SESSION->set_flasdata('pesan', 'Coba Lagi');
            redirect('Captcha');
        }
    }
}
