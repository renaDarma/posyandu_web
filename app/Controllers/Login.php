<?php

namespace App\Controllers;
use Myth\Auth\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function store()
    {
        $session = session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $query   = $builder->getWhere(['email' => $this->request->getPost('login')])->getRow();
        // var_dump($query);die;

        
        if(!$query){
            session()->setFlashdata('pesan_error', 'Email anda tidak terdaftar!');
            return redirect()->to('/login');
        }else{
            if($query->role == 'masyarakat') {
                return redirect()->to('/login_user');
            }
            if(password_verify($this->request->getPost('password'), $query->password_hash)){
                $ses_data = [
                    'id' => $query->id,
                    'username' => $query->username,
                    'fullname' => $query->fullname,
                    'email' => $query->email,
                    'usernohp' => $query->usernohp,
                    'role' => $query->role,
                    'isLoggedIn' => TRUE
                ];
                // var_dump($ses_data);die;
                $session->set($ses_data);
                return redirect()->to('/admin')->with('pesan', 'Berhasil Login');
            }else{
                session()->setFlashdata('pesan_error', 'Password anda salah!');
                return redirect()->to('/login');
            }
        }
    }

    public function login_user()
    {
        return view('auth/login2');
    }

    public function login_action()
    {
        $session = session();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $query   = $builder->getWhere(['username' => $this->request->getPost('login')])->getRow();
        // var_dump($query);die;

        
        if(!$query){
            session()->setFlashdata('pesan_error', 'NIK anda tidak terdaftar!');
            return redirect()->to('/login_user');
        }else{
            if($query->role != 'masyarakat') {
                return redirect()->to('/login');
            }
            if(password_verify($this->request->getPost('password'), $query->password_hash)){
                $ses_data = [
                    'id' => $query->id,
                    'username' => $query->username,
                    'fullname' => $query->fullname,
                    'email' => $query->email,
                    'usernohp' => $query->usernohp,
                    'role' => $query->role,
                    'isLoggedIn' => TRUE
                ];
                // var_dump($ses_data);die;
                $session->set($ses_data);
                return redirect()->to('/admin')->with('pesan', 'Berhasil Login');
            }else{
                session()->setFlashdata('pesan_error', 'Password anda salah!');
                return redirect()->to('/login_user');
            }
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function register_action()
    {
        $db      = \Config\Database::connect();
        $this->users = $db->table('users');
        date_default_timezone_set('Asia/Jakarta');

        $validasi = $this->validate([
            'username'      => ['rules' => 'required', 'errors' => ['required' => 'username harus diisi']],
            'email'         => ['rules' => 'required|valid_email', 'errors' => ['required' => 'email harus diisi', 'valid_email' => 'email anda tidak valid']],
            'usernohp'      => ['rules' => 'required|numeric|max_length[13]', 'errors' => ['required' => 'email harus diisi', 'numeric' => 'email harus berupa angka', 'max_length' => 'no telp maksimal 13 angka']],
            'password'      => ['rules' => 'required', 'errors' => ['required' => 'password harus diisi']],
            'pass_confirm'  => ['rules' => 'required|matches[password]', 'errors' => ['required' => 'konfirmasi password harus diisi', 'matches' => 'konfirmasi password anda salah']]
        ]);

        if(!$validasi) {
            $var['validasi'] = $this->validator;
            return view('auth/register', $var);
        }

        $kader = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'fullname' => 'Kader Posyandu',
            'usernohp' => $this->request->getPost('usernohp'),
            'active' => '1',
            'role'  => 'kader',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $this->users->insert($kader);
        session()->setFlashdata('pesan', 'Anda berhasil registrasi.');
        return redirect()->to('/login');
    }
}