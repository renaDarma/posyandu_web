<?php

namespace App\Controllers;

use App\Models\BumilModel;
use App\Models\KbModel;
use Exception;
class Home extends BaseController
{
    protected $bumilModel;
    protected $kbModel;
    public function __construct()
    {
        $this->bumilModel = new BumilModel();
        $this->kbModel = new KbModel();
    }

    public function index()
    {
        $session = session();
        $session->remove(['id', 'username', 'fullname', 'email', 'usernohp', 'isLoggedIn' => FALSE]);
        $data  = [
            'title' => 'Beranda',
        ];
        return view('welcome/index', $data);
    }

    // public function about()
    // {
    //     $data  = [
    //         'title' => 'Tentang Posyandu',
    //     ];
    //     return view('welcome/about', $data);
    // }

    // public function blogs()
    // {
    //     $data  = [
    //         'title' => 'Layanan Posyandu',
    //     ];
    //     return view('welcome/blogs', $data);
        
    // }
    
    public function daftarbumil()
    {
        $data = [
            'title' => 'Pendaftaran Bumil',
            'validation' => \Config\Services::validation()
        ];
        return view('welcome/daftarbumil', $data);
        
    }
    
    public function submitbumil()
    {
        $data = [
            'nokk' => $this->request->getVar('nokk'),
            'ayahnik' => $this->request->getVar('ayahnik'),
            'ayahnama' => $this->request->getVar('ayahnama'),
            'ayahtmptlhr' => $this->request->getVar('ayahtmptlhr'),
            'ayahtgllhr' => $this->request->getVar('ayahtgllhr'),
            'ayahagama' => $this->request->getVar('ayahagama'),
            'ayahpendidikan' => $this->request->getVar('ayahpendidikan'),
            'ayahpekerjaan' => $this->request->getVar('ayahpekerjaan'),
            'ayahnohp' => $this->request->getVar('ayahnohp'),
            'ibunik' => $this->request->getVar('ibunik'),
            'ibunama' => $this->request->getVar('ibunama'),
            'ibutmptlhr' => $this->request->getVar('ibutmptlhr'),
            'ibutgllhr' => $this->request->getVar('ibutgllhr'),
            'ibuagama' => $this->request->getVar('ibuagama'),
            'ibupendidikan' => $this->request->getVar('ibupendidikan'),
            'ibupekerjaan' => $this->request->getVar('ibupekerjaan'),
            'ibunohp' => $this->request->getVar('ibunohp'),
            'alamat' => $this->request->getVar('alamat'),
            'jmlhanak' => $this->request->getVar('jmlhanak'),
            'anakke' => $this->request->getVar('anakke')
        ];

        if(!$this->validate([
                'nokk' => [
                    'rules' => 'required|is_unique[bumil.nokk]
                    |is_unique[bumil.ayahnik]|is_unique[bumil.ibunik]
                    |is_unique[anak.nik]',
                    'errors' => [
                        'required' => '{field} wajib diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'ayahnik' => [
                    'rules' => 'required|is_unique[bumil.ayahnik]|is_unique[bumil.nokk]
                    |is_unique[bumil.ibunik]|is_unique[anak.nik]',
                    'errors' => [
                        'required' => '{field} wajib diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'ayahnama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ayahtmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ayahtgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ayahagama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ayahpendidikan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ayahpekerjaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ayahnohp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibunik' => [
                    'rules' => 'required|is_unique[bumil.ibunik]
                    |is_unique[bumil.ayahnik]|is_unique[bumil.nokk]
                    |is_unique[anak.nik]',
                    'errors' => [
                        'required' => '{field} wajib diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'ibunama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibutmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibutgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibuagama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibupendidikan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibupekerjaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'ibunohp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ], 
                'jmlhanak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'anakke' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ]
            ]))
            if (!$this->bumilModel->validate($data)) {
                session()->setFlashdata('error','Mohon cek kembali data Anda!');
                return redirect()->to('/home/daftarbumil')->withInput()->with('errors', $this->bumilModel->errors());
            }
            
            try {
                $this->bumilModel->protect(false)->insert($data);
            } catch (Exception $e) {
                return redirect()->to('/home/daftarbumil')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            session()->setFlashdata('pesan', 'Pendaftaran berhasil.');
            return redirect()->to('/home/daftarbumil');

    }

    public function daftarkb()
    {
        $data = [
            'title' => 'Pendaftaran KB',
            'validation' => \Config\Services::validation()
        ];
        return view('welcome/daftarkb', $data);
        
    }
    
    public function submitkb()
    {
        $data = [
            'namasuami' => $this->request->getVar('namasuami'),
            'namaistri' => $this->request->getVar('namaistri'),
            'nohp' => $this->request->getVar('nohp')
        ];

        if(!$this->validate([
                'namasuami' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ],
                'namaistri' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ]
                ], 
                'nohp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi.'
                    ] 
                ]
            ]))
            if (!$this->kbModel->validate($data)) {
                session()->setFlashdata('error','Mohon cek kembali data Anda!');
                return redirect()->to('/home/daftarkb')->withInput()->with('errors', $this->kbModel->errors());
            }
            
            try {
                $this->kbModel->protect(false)->insert($data);
            } catch (Exception $e) {
                return redirect()->to('/home/daftarkb')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            session()->setFlashdata('pesan', 'Pendaftaran berhasil.');
            return redirect()->to('/home/daftarkb');
    }

    // public function login()
    // {
    //     $data = [
    //         'title'  => 'Login',
    //         'config' => config('Auth'),
    //     ];
    //     return view('auth/login, $data');
        
    // }

}
