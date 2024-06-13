<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\NotifModel;
use App\Models\AnakModel;
use App\Models\OrtuModel;
use App\Models\JenisImunModel;
use Exception;
class Notif extends BaseController
{
    protected $notifModel;
    public function __construct()
    {
        $this->notifModel = new NotifModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_notif') ? $this->request->getVar('page_notif') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $notif = $this->notifModel->search($keyword);
        }else{
            $notif = $this->notifModel;
        }

        $data  = [
            'notif' => $notif->paginate(5, 'notif'),
            'pager' => $this->notifModel->pager,
            'currentPage' => $currentPage,
            'notif' => $this->notifModel->getNotif()
        ];
        $data['title'] = 'Data Notif';

        return view('admin/notif/datanotif', $data);
    }

    public function tambahnotif()
    {
        $anak = new AnakModel();
        $jenisimun = new JenisImunModel();
        
        $data  = [
            'anak' => $anak->findAll(),
            'jenisimun' => $jenisimun->findAll(),
            'notif' => $this->notifModel->getNotif(),
            'title' => 'Tambah Data Notif',
            'validation' => \Config\Services::validation()
        ];
        // dd($data);

        return view('admin/notif/tambahnotif', $data);
    }

    public function save()
    {
        $data = [
            'idanak' => $this->request->getVar('idanak'),
            'idJenImun' => $this->request->getVar('idJenImun'),
            // 'tgllhr' => $this->request->getVar('tgllhr'),
            // 'tglimun' => $this->request->getVar('tglimun'),
            // 'umur' => $this->request->getVar('umur'),
        ];
        // dd($data);
        
        try {
            $this->notifModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/tambahnotif')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/datanotif');
    }

    public function hapusnotif($idnotif)
    {
        $this->notifModel->delete($idnotif);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/datanotif');
    }

 }