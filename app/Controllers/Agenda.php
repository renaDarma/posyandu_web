<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\AgendaModel;

use Config\Kint;
use Exception;

class Agenda extends BaseController
{
    protected $agendaModel;
    protected $format    = 'json';
    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_agenda') ? $this->request->getVar('page_agenda') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $agenda = $this->agendaModel->search($keyword);
        }else{
            $agenda = $this->agendaModel->getAllData();
        }

        $data  = [
            'agenda' => $agenda,
            'pager' => $this->agendaModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Data Agenda';
        $data['agenda'] = $agenda;

        
        return view('admin/agenda/dataagenda', $data);
    }

    public function tambahagenda()
    {
        $data  = [
            'title' => 'Tambah Data Agenda',
            'agenda' => $this->agendaModel->getAllData(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/agenda/tambahagenda', $data);
    }

    public function save()
    {
        $data  = [
            'namaagenda' => $this->request->getVar('namaagenda'),
            'kategoriagenda' => $this->request->getVar('kategoriagenda'),
            'tglagenda' => $this->request->getVar('tglagenda'),
            'waktuagenda' => $this->request->getVar('waktuagenda'),
            'tempatagenda' => $this->request->getVar('tempatagenda'),
            'alamatagenda' => $this->request->getVar('alamatagenda')
        ];

        //validasi input
        if(!$this->validate([
           'namaagenda' => [
               'rules' => 'required',
               'errors' => [
                   'required' => 'nama agenda harus diisi.'
                ]
            ],
            'kategoriagenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori harus diisi.'
                ]
            ],
            'tglagenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus diisi.'
                ]
            ],
            'waktuagenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jam harus diisi.'
                ]
            ],
            'tempatagenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'lokasi harus diisi.'
                ]
            ],
            'alamatagenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus diisi.'
                ]
            ],
        ])) 
        if (!$this->agendaModel->validate($data)) {
            session()->setFlashdata('error','Mohon cek kembali data Anda!');
            return redirect()->to('/tambahagenda')->withInput()->with('errors', $this->agendaModel->errors());
        }
            
        try {
            $this->agendaModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/tambahagenda')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data agenda berhasil ditambahkan.');
        return redirect()->to('/dataagenda');
    }

    public function detailagenda($idagenda)
    {
        $data  = [
            'title'   => 'Detail Data Agenda',
            'agenda'  => $this->agendaModel->find($idagenda),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/agenda/detailagenda', $data);
    }

    public function editagenda($idagenda)
    {
        $data  = [
            'title' => 'Edit Data Agenda',
            'agenda' => $this->agendaModel->getIdAgenda($idagenda),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/agenda/editagenda', $data);
    }

    public function update($idagenda)
    {
        $idagenda = $this->request->getVar('idagenda');
        
        if(!$this->validate([
            'namaagenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama agenda harus diisi.'
                 ]
            ],
            'kategoriagenda' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'kategori harus diisi.'
                 ]
             ],
             'tglagenda' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'tanggal harus diisi.'
                 ]
             ],
             'waktuagenda' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'jam harus diisi.'
                 ]
             ],
             'tempatagenda' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'lokasi harus diisi.'
                 ]
             ],
             'alamatagenda' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'alamat harus diisi.'
                 ]
             ],
         ])
         ){
            session()->setFlashdata('error','Mohon cek kembali data Anda!');
            return redirect()->to('/editagenda/' . $idagenda)->with('errors', $this->agendaModel->errors());
         }

        $this->agendaModel->save([
            'idagenda' => $idagenda,
            'namaagenda' => $this->request->getVar('namaagenda'),
            'kategoriagenda' => $this->request->getVar('kategoriagenda'),
            'tglagenda' => $this->request->getVar('tglagenda'),
            'waktuagenda' => $this->request->getVar('waktuagenda'),
            'tempatagenda' => $this->request->getVar('tempatagenda'),
            'alamatagenda' => $this->request->getVar('alamatagenda')
        ]);
           
            session()->setFlashdata('pesan', 'Data agenda berhasil diedit.');
            return redirect()->to('/dataagenda');
    }

    public function hapusagenda($idagenda)
    {
        $this->agendaModel->delete($idagenda);
        session()->setFlashdata('pesan', 'Data agenda berhasil dihapus.');
        return redirect()->to('/dataagenda');
    }

    public function pdf()
    {
        // Mengambil data kader dari model
        $data  = [
            'agenda' => $this->agendaModel->getAllData(),
            'title' => 'PDF Daftar Data Agenda',
        ];

        // $filename = 'Daftar Data Agenda ('. date('d-m-y').')';
        $filename = 'Daftar Data Agenda';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('admin/agenda/pdfagenda', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }


    public function viewexcel()
    {
        return view('admin/agenda/dataagenda');
    }

    public function excel()
    {
        // Mengambil data agenda dari model
        $data  = [
            'agenda' => $this->agendaModel->getAllData(),
            'title' => 'Excel Daftar Data Agenda',
        ];

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Agenda')
            ->setCellValue('C1', 'Kategori')
            ->setCellValue('D1', 'Tanggal')
            ->setCellValue('E1', 'Jam')
            ->setCellValue('F1', 'Lokasi')
            ->setCellValue('G1', 'Alamat');

        $no = 1;
        $column = 2;
        
        foreach ($data['agenda'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->namaagenda)
                ->setCellValue('C' . $column, $nak->kategoriagenda)
                ->setCellValue('D' . $column, $nak->tglagenda)
                ->setCellValue('E' . $column, $nak->waktuagenda)
                ->setCellValue('F' . $column, $nak->tempatagenda)
                ->setCellValue('G' . $column, $nak->alamatagenda);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Agenda ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Agenda';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}