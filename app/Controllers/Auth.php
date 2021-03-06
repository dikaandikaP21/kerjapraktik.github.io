<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Login Form';

        return view('Pages/Loginform', $data);
    }

    public function login_action()
    {
        $model = new AuthModel;
        $table = 'admin';

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $row = $model->get_data($username, $table);


        // var_dump($row);
        if ($row == null) {
            session()->setFlashdata('Pesan', 'Username tidak ada');
            return redirect()->to(base_url('Auth'));
        }

        if ($password == $row->password) {
            $data = array(
                'log' => true,
                'nama' => $row->Nama_admin,
                'username' => $row->username,

            );
            session()->set($data);
            session()->setFlashdata('Pesan', 'Berhasil Login Sebagai Admin');
            return redirect()->to(base_url('Admin'));
        } else {
            session()->setFlashdata('Pesan', 'Password salah');
            return redirect()->to(base_url('Auth'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Auth'));
    }
}
