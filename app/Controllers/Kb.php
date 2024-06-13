<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\KbModel;
use App\Models\BumilModel;
use Exception;

class Kb extends BaseController
{
    protected $kbModel;
    public function __construct()
    {
        $this->kbModel = new KbModel();
    }

    public function index()
    {
        // $kb = $this->kbModel->findAll();
        $currentPage = $this->request->getVar('page_kb') ? $this->request->getVar('page_kb') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kb = $this->kbModel->search($keyword);
        }else{
            $kb = $this->kbModel->getAllData();
        }
        
        $data  = [
            'pager' => $this->kbModel->pager,
            'currentPage' => $currentPage
        ];
        $data['bumil'] = $this->kbModel->getDataBumil();
        $data['kb'] = $kb;
        $data['title'] = 'Data KB';

        return view('kader/kb/datakb', $data);
    }

    public function tambahkb()
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->findAll(),
            'kb' => $this->kbModel->getAllData(),
            'title' => 'Tambah data KB',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/kb/tambahkb', $data);
    }

    public function save()
    {
        $data = [
            'idbumil' => $this->request->getVar('idbumil'),
            'tglkb' => $this->request->getVar('tglkb'),
            'jeniskb' => $this->request->getVar('jeniskb'),
            'usia' => $this->request->getVar('usia'),
        ];

        try {
            $this->kbModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/datakb')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('simpan', 'Data Kb berhasil ditambahkan.');
        return redirect()->to('/datakb');
    }

    public function detailkb($idkb)
    {
        $data  = [
            'bumil' => $this->kbModel->getIdBumil($idkb),
            'title' => 'Detail Data KB',
            'kb' => $this->kbModel->find($idkb),
        ];

        return view('kader/kb/detailkb', $data);
    }

    public function editkb($idkb)
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->findAll(),
            'title' => 'Edit Data KB',
            'kb' => $this->kbModel->getIdKb($idkb),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/kb/editkb', $data);
    }

    public function update($idkb)
    {
        $data = [
            'idkb' => $idkb,
            'idbumil' => $this->request->getVar('idbumil'),
            'tglkb' => $this->request->getVar('tglkb'),
            'jeniskb' => $this->request->getVar('jeniskb'),
            'usia' => $this->request->getVar('usia'),
        ];

        $idkb = $this->request->getVar('idkb');
        if(!$this->validate([
            'tglkb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jeniskb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'usia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'idbumil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
        ]))
            if (!$this->kbModel->validate($data)) {
                session()->setFlashdata('error','Mohon cek kembali data Anda!');
                return redirect()->to('/editkb/' . $idkb)->with('errors', $this->kbModel->errors());
            }
            
            session()->setFlashdata('pesan', 'Data berhasil diedit.');
            return redirect()->to('/datakb');
    }

    public function hapuskb($idkb)
    {
        $this->kbModel->delete($idkb);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/datakb');
    }

    public function pdf()
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->find(),
            'kb' => $this->kbModel->getAllData(),
            'title' => 'PDF Daftar Data KB',
        ];

        // $filename = 'Daftar Data KB ('. date('d-m-y').')';
        $filename = 'Daftar Data KB';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('kader/kb/pdfkb', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

    public function excel()
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->find(),
            'kb' => $this->kbModel->getAllData(),
            'title' => 'Excel Daftar Data KB',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Suami')
            ->setCellValue('C1', 'Nama Istri')
            ->setCellValue('D1', 'Tanggal Lahir Istri')
            ->setCellValue('E1', 'Usia Istri')
            ->setCellValue('F1', 'Tanggal Mulai KB')
            ->setCellValue('G1', 'Jenis KB');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['kb'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->ayahnama)
                ->setCellValue('C' . $column, $nak->ibunama)
                ->setCellValue('D' . $column, $nak->ibutgllhr)
                ->setCellValue('E' . $column, $nak->usia)
                ->setCellValue('F' . $column, $nak->tglkb)
                ->setCellValue('G' . $column, $nak->jeniskb);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data KB ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data KB';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}