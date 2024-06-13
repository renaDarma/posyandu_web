<?php

namespace App\Controllers;

use App\Models\BumilModel;
use App\Models\KesbumilModel;
use App\Models\KbModel;
use App\Models\PenimbanganModel;
use App\Models\ImunisasiModel;
use Exception;

class Masyarakat extends BaseController
{
    protected $bumilModel;
    protected $kesbumilModel;
    protected $kbModel;
    protected $penimbanganModel;
    protected $imunisasiModel;
    public function __construct()
    {
        $this->bumilModel = new BumilModel();
        $this->kesbumilModel = new KesbumilModel();
        $this->kbModel = new KbModel();
        $this->penimbanganModel = new PenimbanganModel();
        $this->imunisasiModel = new ImunisasiModel();
    }

    public function index()
    {
        return view('masyarakat/index');
        
    }

    public function daftarbumil()
    {
        $data = [
            'title' => 'Pendaftaran Ibu Hamil',
            'validation' => \Config\Services::validation()
        ];
        return view('masyarakat/daftarbumil', $data);
        
    }

    public function riwayatkesbumil()
    {
        $currentPage = $this->request->getVar('page_kesbumil') ? $this->request->getVar('page_kesbumil') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kesbumil = $this->kesbumilModel->search($keyword);
        }else{
            $kesbumil = $this->kesbumilModel->getAllKesbumil();
        }
        
        $data  = [
            // 'kesbumil' => $kesbumil->paginate(5, 'kesbumil'),
            'pager' => $this->kesbumilModel->pager,
            'currentPage' => $currentPage,
        ];
        $data['bumil'] = $this->kesbumilModel->getDataBumil();
        $data['kesbumil'] = $kesbumil;
        $data['title'] = 'Riwayat Data Kesehatan Bumil';

        return view('masyarakat/riwayatkesbumil', $data);
    }

    public function riwayatkb()
    {
        $currentPage = $this->request->getVar('page_kb') ? $this->request->getVar('page_kb') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kb = $this->kbModel->search($keyword);
        }else{
            $kb = $this->kbModel->getAllData();
        }
        
        $data  = [
            'pager' => $this->kbModel->pager,
            'currentPage' => $currentPage,
        ];
        $data['bumil'] = $this->kbModel->getDataBumil();
        $data['kb'] = $kb;
        $data['title'] = 'Riwayat Data KB';

        return view('masyarakat/riwayatkb', $data);
    }

    public function riwayatpenimbangan()
    {
        $currentPage = $this->request->getVar('page_penimbangan') ? $this->request->getVar('page_penimbangan') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $penimbangan = $this->penimbanganModel->search($keyword);
        }else{
            $penimbangan = $this->penimbanganModel->getAllPenimbangan();
        }
        
        $data  = [
            // 'penimbangan' => $penimbangan->paginate(5, 'penimbangan'),
            'pager' => $this->penimbanganModel->pager,
            'currentPage' => $currentPage,
        ];
        $data['anak'] = $this->penimbanganModel->getDataAnak();
        $data['penimbangan'] = $penimbangan;
        $data['title'] = 'Riwayat Data Penimbangan';

        return view('masyarakat/riwayatpenimbangan', $data);
    }

    public function riwayatimunisasi()
    {
        $currentPage = $this->request->getVar('page_imunisasi') ? $this->request->getVar('page_imunisasi') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $imunisasi = $this->imunisasiModel->search($keyword);
        }else{
            $imunisasi = $this->imunisasiModel->getAllImunisasi();
        }
        
        $data  = [
            // 'imunisasi' => $imunisasi->paginate(5, 'imunisasi'),
            'pager' => $this->imunisasiModel->pager,
            'currentPage' => $currentPage,
        ];
        $data['anak'] = $this->imunisasiModel->getDataAnak();
        $data['imunisasi'] = $imunisasi;
        $data['title'] = 'Riwayat Data Imunisasi';

        return view('masyarakat/riwayatimunisasi', $data);
    }
    

    // public function submitbumil()
    // {
    //     $data = [
    //         'nokk' => $this->request->getVar('nokk'),
    //         'ayahnik' => $this->request->getVar('ayahnik'),
    //         'ayahnama' => $this->request->getVar('ayahnama'),
    //         'ayahtmptlhr' => $this->request->getVar('ayahtmptlhr'),
    //         'ayahtgllhr' => $this->request->getVar('ayahtgllhr'),
    //         'ayahagama' => $this->request->getVar('ayahagama'),
    //         'ayahpendidikan' => $this->request->getVar('ayahpendidikan'),
    //         'ayahpekerjaan' => $this->request->getVar('ayahpekerjaan'),
    //         'ayahnohp' => $this->request->getVar('ayahnohp'),
    //         'ibunik' => $this->request->getVar('ibunik'),
    //         'ibunama' => $this->request->getVar('ibunama'),
    //         'ibutmptlhr' => $this->request->getVar('ibutmptlhr'),
    //         'ibutgllhr' => $this->request->getVar('ibutgllhr'),
    //         'ibuagama' => $this->request->getVar('ibuagama'),
    //         'ibupendidikan' => $this->request->getVar('ibupendidikan'),
    //         'ibupekerjaan' => $this->request->getVar('ibupekerjaan'),
    //         'ibunohp' => $this->request->getVar('ibunohp'),
    //         'alamat' => $this->request->getVar('alamat'),
    //         'jmlhanak' => $this->request->getVar('jmlhanak'),
    //         'anakke' => $this->request->getVar('anakke')
    //     ];

    //     if(!$this->validate([
    //             'nokk' => [
    //                 'rules' => 'required|is_unique[bumil.nokk]
    //                 |is_unique[bumil.ayahnik]|is_unique[bumil.ibunik]
    //                 |is_unique[anak.nik]',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.',
    //                     'is_unique' => '{field} sudah terdaftar.'
    //                 ]
    //             ],
    //             'ayahnik' => [
    //                 'rules' => 'required|is_unique[bumil.ayahnik]|is_unique[bumil.nokk]
    //                 |is_unique[bumil.ibunik]|is_unique[anak.nik]',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.',
    //                     'is_unique' => '{field} sudah terdaftar.'
    //                 ]
    //             ],
    //             'ayahnama' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ayahtmptlhr' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ayahtgllhr' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ayahagama' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ayahpendidikan' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ayahpekerjaan' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ayahnohp' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibunik' => [
    //                 'rules' => 'required|is_unique[bumil.ibunik]
    //                 |is_unique[bumil.ayahnik]|is_unique[bumil.nokk]
    //                 |is_unique[anak.nik]',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.',
    //                     'is_unique' => '{field} sudah terdaftar.'
    //                 ]
    //             ],
    //             'ibunama' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibutmptlhr' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibutgllhr' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibuagama' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibupendidikan' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibupekerjaan' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'ibunohp' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'alamat' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ], 
    //             'jmlhanak' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'anakke' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ]
    //         ]))
    //         if (!$this->bumilModel->validate($data)) {
    //             session()->setFlashdata('error','Mohon cek kembali data Anda!');
    //             return redirect()->to('/daftarbumil')->withInput()->with('errors', $this->bumilModel->errors());
    //         }
            
    //         try {
    //             $this->bumilModel->protect(false)->insert($data);
    //         } catch (Exception $e) {
    //             return redirect()->to('/daftarbumil')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //         }
    //         session()->setFlashdata('pesan', 'Pendaftaran berhasil.');
    //         return redirect()->to('/daftarbumil');

    // }

    // public function daftarkb()
    // {
    //     $data = [
    //         'title' => 'Pendaftaran KB',
    //         'validation' => \Config\Services::validation()
    //     ];
    //     return view('masyarakat/daftarkb', $data);
        
    // }
    
    // public function submitkb()
    // {
    //     $data = [
    //         'namasuami' => $this->request->getVar('namasuami'),
    //         'namaistri' => $this->request->getVar('namaistri'),
    //         'nohp' => $this->request->getVar('nohp')
    //     ];

    //     if(!$this->validate([
    //             'namasuami' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ],
    //             'namaistri' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ]
    //             ], 
    //             'nohp' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} wajib diisi.'
    //                 ] 
    //             ]
    //         ]))
    //         if (!$this->kbModel->validate($data)) {
    //             session()->setFlashdata('error','Mohon cek kembali data Anda!');
    //             return redirect()->to('/daftarkb')->withInput()->with('errors', $this->kbModel->errors());
    //         }
            
    //         try {
    //             $this->kbModel->protect(false)->insert($data);
    //         } catch (Exception $e) {
    //             return redirect()->to('/daftarkb')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //         }
    //         session()->setFlashdata('pesan', 'Pendaftaran berhasil.');
    //         return redirect()->to('/daftarkb');

    // }
}
