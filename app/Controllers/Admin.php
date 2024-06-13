<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\AnakModel;
use App\Models\OrtuModel;
use App\Models\BumilModel;
use App\Models\KaderModel;
use App\Models\BidanModel;
use App\Models\AgendaModel;
use App\Models\KesbumilModel;
use App\Models\KbModel;
use App\Models\PenimbanganModel;
use App\Models\ImunisasiModel;
class Admin extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new \Myth\Auth\Models\UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        $bidan = new BidanModel();
        $kader = new KaderModel();
        $agenda = new AgendaModel();
        $bumil = new BumilModel();
        $ortu = new OrtuModel();
        $anak = new AnakModel();
        $kesbumil = new KesbumilModel();
        $kb = new KbModel();
        $timbang = new PenimbanganModel();
        $imun = new ImunisasiModel();
        $data['jumlah_bidan'] = $bidan->countAll();
        $data['jumlah_kader'] = $kader->countAll();
        $data['jumlah_agenda'] = $agenda->countAll();
        $data['jumlah_bumil'] = $bumil->countAll();
        $data['jumlah_ortu'] = $ortu->countAll();
        $data['jumlah_anak'] = $anak->countAll();
        $data['jumlah_kesbumil'] = $kesbumil->countAll();
        $data['jumlah_kb'] = $kb->countAll();
        $data['jumlah_timbang'] = $timbang->countAll();
        $data['jumlah_imun'] = $imun->countAll();

        // $bumil = new BumilModel();
        // $kesbumil = new KesbumilModel();
        // $kb = new KbModel();
        // $penimbangan = new PenimbanganModel();
        // $imunisasi = new ImunisasiModel();
        
        // $databumil  = [
        //     'kesbumil' => $kesbumil->find(),
        //     'kb' => $kb->find(),
        //     'penimbangan' => $penimbangan->find(),
        //     'imunisasi' => $imunisasi->find(),
        //     'bumil' => $bumil->getRiwayat(),
        // ];

        // // Perhitungan jumlah riwayat sesuai dengan user
        // // $userId = 4;
        // $data['jumlah_kesbumil'] = $bumil->where('id_user', $databumil)->countAllResults();
        // $data['jumlah_kb'] = $bumil->where('id_user', $databumil)->countAllResults();
        // $data['jumlah_penimbangan'] = $bumil->where('id_user', $databumil)->countAllResults();
        // $data['jumlah_imunisasi'] = $bumil->where('id_user', $databumil)->countAllResults();

        return view('dashboard', $data);
    }

    public function datauser()
    {
        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $users = $this->dataModel->search($keyword);
        }else{
            $users = $this->dataModel;
        }

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, username, email, fullname, role');
        $builder->whereIn('users.role', ['admin', 'kader']); // Menampilkan hanya level user admin dan kader
        $query = $builder->get();
        
        $data  = [
            'title' => 'Data User',
            'users' => $users->paginate(5, 'users'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        $data['users'] = $query->getResult();

        return view('admin/datauser', $data);
    }

    public function resetpass()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, password, pass_confirm');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data  = [
            'title' => 'Reset Password',
            'pager' => $this->dataModel->pager,
        ];
        $data['reset'] = $query->getResult();

        return view('profil/resetpass', $data);
    }

    // public function tambahuser()
    // {
    //     $data = [
    //         'title' => 'Tambah data user',
    //         'validation' => \Config\Services::validation()
    //     ];

    //     return view('admin/user/tambahuser', $data);
    // }

    // public function save()
    // {
    //     if(!$this->validate([
    //         'username' => [
    //             'rules' => 'required|is_unique[users.username]',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.',
    //                 'is_unique' => '{field} sudah terdaftar.'
    //             ]
    //         ],
    //         'email' => [
    //             'rules' => 'required|is_unique[users.email]',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.',
    //                 'is_unique' => '{field} sudah terdaftar.'
    //             ]
    //         ],
    //         'password_hash' => [
    //             'rules' => 'required|is_unique[users.password_hash]',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.',
    //                 'is_unique' => '{field} sudah terdaftar.'
    //             ]
    //         ],
    //         'fullname' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //             ]
    //         ],
    //         'usernohp' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //             ]
    //         ]
    //     ])
    //     ){
    //         return redirect()->to('/admin/tambahuser')->withInput();
    //     }

    //     $this->dataModel->save([
    //        'username' => $this->request->getVar('username'),
    //        'email' => $this->request->getVar('email'),
    //        'password_hash' => $this->request->getVar('password_hash'),
    //        'fullname' => $this->request->getVar('fullname'),
    //        'usernohp' => $this->request->getVar('usernohp')
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    //     return redirect()->to('/datauser');
    // }

    public function detailuser($id = 0)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, username, email, password_hash, fullname, usernohp, role, active');
        $builder->where('users.id', $id);
        $query = $builder->get();


        // Mengubah nilai field "active"
        foreach ($query->getResult() as $row) {
            if ($row->active == "1") {
                $row->active = "<span class='badge badge-success'>Active</span>";
            } else {
                $row->active = "<span class='badge badge-danger'>No Active</span>";
            }
        }

        $data['users'] = $query->getRow();

        $data = [
            'title' => 'Detail Data User',
            'validation' => \Config\Services::validation(),
            'users' => $query->getRow()
        ];

        return view('admin/detailuser', $data);
    }

    // public function edituser()
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('users');
    //     $builder->select('id');
    //     $query = $builder->get();

    //     $data  = [
    //         'title' => 'Edit Data Kader',
    //         'users' => $this->dataModel->findAll(),
    //         'validation' => \Config\Services::validation()
    //     ];
    //     $data['users'] = $query->getResult();

    //     return view('admin/user/edituser', $data);
    // }

    // public function update($id = 0)
    // {
    //     // cek username
    //     $userslama = $this->dataModel->getUsers($this->request->getVar('id'));
    //     if($userslama['username'] == $this->request->getVar('username')){
    //         $rule_username = 'required';
    //     }elseif($userslama['email'] != $this->request->getVar('email')){
    //         $rule_email = 'required';
    //     }else{
    //         $rule_username = 'required|is_unique[users.username]';
    //         $rule_email = 'required|is_unique[users.email]';
    //     }

    //     if(!$this->validate([
    //         'username' => [
    //             'rules' => $rule_username,
    //             'errors' => [
    //                 'required' => '{field} harus diisi.',
    //                 'is_unique' => '{field} sudah terdaftar.'
    //             ]
    //         ],
    //         'email' => [
    //             'rules' => $rule_email,
    //             'errors' => [
    //                 'required' => '{field} harus diisi.',
    //                 'is_unique' => '{field} sudah terdaftar.'
    //             ]
    //         ],
    //         'password_hash' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //             ]
    //         ],
    //         'fullname' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //             ]
    //         ],
    //         'usernohp' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //             ]
    //         ]
    //     ])
    //     ){
    //         return redirect()->to('/edituser')->withInput();
    //     }

    //     $this->dataModel->save([
    //         '$id' => $id,
    //         'username' => $this->request->getVar('username'),
    //         'email' => $this->request->getVar('email'),
    //         'password_hash' => $this->request->getVar('password_hash'),
    //         'fullname' => $this->request->getVar('fullname'),
    //         'usernohp' => $this->request->getVar('usernohp')
    //      ]);
 
    //      session()->setFlashdata('pesan', 'Data berhasil diedit.');

    //      return redirect()->to('/datauser');
    // }

    // public function hapususer($id)
    // {
    //     $this->dataModel->delete($id);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    //     return redirect()->to('/datauser');
    // }
}
