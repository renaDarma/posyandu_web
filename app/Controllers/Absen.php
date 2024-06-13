<?php

namespace App\Controllers;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Dompdf\Dompdf;
// use Dompdf\Options;
// use App\Models\AbsenbumilModel;
use App\Models\AbsenanakModel;
use App\Models\AgendaModel;
// use App\Models\KesbumilModel;
use App\Models\KbModel;
use App\Models\OrtuModel;
use App\Models\PenimbanganModel;
use App\Models\ImunisasiModel;
use Exception;

class Absen extends BaseController
{
    // protected $absenbumilModel;
    protected $absenanakModel;
    public function __construct()
    {
        // $this->absenbumilModel = new AbsenbumilModel();
        $this->absenanakModel = new AbsenanakModel();
    }

    // public function absenbumil()
    // {
    //     $currentPage = $this->request->getVar('page_absen') ? $this->request->getVar('page_absen') : 1;

    //     $agenda = new agendaModel();
    //     $data = [
    //         'bumil' => $this->absenbumilModel->getDataBumil(),
    //         'agenda' => $agenda->findAll(),
    //         'absenbumil' => $this->absenbumilModel->getDataAllBumil(),
    //         'pager' => $this->absenbumilModel->pager,
    //         'currentPage' => $currentPage,
    //         'title' => 'Data Absen Bumil'
    //     ];

    //     return view('kader/absen/absenbumil', $data);
    // }

    // public function saveabsenbumil()
    // {
    //     // Tangkap nilai dari checkbox "timbang" dan "imun"
    //     // $timbang = $this->request->getPost('timbang') ? 1 : 0;
    //     // $imun = $this->request->getPost('imun') ? 1 : 0;

    //     $data = [
    //         'idbumil' => $this->request->getVar('idbumil'),
    //         'idagenda' => $this->request->getVar('idagenda'),
    //         'kesbumil' => $this->request->getVar('kesbumil'),
    //         'kb' => $this->request->getVar('kb'),
    //     ];
     
    //     try {
    //         $this->absenbumilModel->protect(false)->insert($data);
    //     } catch (Exception $e) {
    //         return redirect()->to('/absenbumil')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    //     session()->setFlashdata('simpan', 'Data absen bumil berhasil ditambahkan.');
    //     return redirect()->to('/absenbumil');
    // }

    public function absenanak()
    {
        $currentPage = $this->request->getVar('page_absen') ? $this->request->getVar('page_absen') : 1;

        $agenda = new agendaModel();
        $data = [
            'anak' => $this->absenanakModel->getDataAnak(),
            'agenda' => $agenda->getAllData(),
            'absenanak' => $this->absenanakModel->getDataAllAnak(),
            'pager' => $this->absenanakModel->pager,
            'currentPage' => $currentPage,
            'title' => 'Data Absen Anak'
        ];

        return view('kader/absen/absenanak', $data);
    }

    public function saveabsenanak()
    {
        $data = [
            'idanak' => $this->request->getVar('idanak'),
            'idortu' => $this->request->getVar('idortu'),
            'idagenda' => $this->request->getVar('idagenda'),
            'timbang' => $this->request->getVar('timbang'),
            'imun' =>$this->request->getVar('imun'),
        ];
     
        try {
            $this->absenanakModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/absenanak')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('simpan', 'Data absen anak berhasil ditambahkan.');
        return redirect()->to('/absenanak');
    }

    public function filteranak()
    {
        $currentPage = $this->request->getVar('page_absen') ? $this->request->getVar('page_absen') : 1;

        $tglagenda = $this->request->getVar('tglagenda');

        // $tgl = $this->absenanakModel->where('tglagenda',$tglagenda)->findAll();

        $agenda = new agendaModel();
        $data = [
            'tglagenda' => $tglagenda,
            'agenda' => $agenda->getAllData(),
            'anak' => $this->absenanakModel->getDataAnak(),
            'pager' => $this->absenanakModel->pager,
            'currentPage' => $currentPage,
            'title' => 'Data Absen Anak',
        ];
        $data['absenanak'] = $this->absenanakModel->filter($tglagenda);

        return view('kader/absen/absenanak', $data);
    }


}