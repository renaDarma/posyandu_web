<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\KesbumilModel;
use App\Models\BumilModel;
use Exception;
use App\Helpers\usia_helper;

class Kesbumil extends BaseController
{
    protected $kesbumilModel;
    public function __construct()
    {
        $this->kesbumilModel = new KesbumilModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_kesbumil') ? $this->request->getVar('page_kesbumil') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kesbumil = $this->kesbumilModel->search($keyword);
        }else{
            $kesbumil = $this->kesbumilModel->getAllData();
        }

        $data  = [
            'pager' => $this->kesbumilModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Data Kesbumil';
        $data['bumil'] = $this->kesbumilModel->getDataBumil();
        $data['kesbumil'] = $kesbumil;

        return view('kader/kesbumil/datakesbumil', $data);
    }

    public function notifikasiKehamilanawal()
    {
        $kesbumilModel = new KesbumilModel();
        $bumilData = $kesbumilModel->getBumil9Bulan();

        if (!empty($bumilData)) {
            $notification = generate_notifikasi($bumilData);
            echo $notification; // Tampilkan notifikasi di halaman web atau gunakan untuk notifikasi ke metode lain.
        }
    }

    public function notifikasiKehamilan()
    {
        $bumilData = bumilhpl();

        return view('template/topbar', ['bumilData' => $bumilData]);
    }

    public function tambahkesbumil()
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->findAll(),
            'kesbumil' => $this->kesbumilModel->getAllData(),
            'title' => 'Tambah Data Kesbumil',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/kesbumil/datakesbumil', $data);
    }

    public function save()
    {
        $umurkandungan = $this->kesbumilModel->getLastUmur($this->request->getVar('idbumil'));
        $data = [
            'idbumil' => $this->request->getVar('idbumil'),
            'tglperiksa' => $this->request->getVar('tglperiksa'),
            'umur' => $this->request->getVar('umur'),
            'umurkandungan' => $umurkandungan,
            'bb' => $this->request->getVar('bb'),
            'ketbb' => $this->request->getVar('ketbb'),
            'tb' => $this->request->getVar('tb'),
            'lila' => $this->request->getVar('lila'),
            'ketlila' => $this->request->getVar('ketlila'),
            'catatan' => $this->request->getVar('catatan'),
            'tinggifundus' => $this->request->getVar('tinggifundus'),
            'keluhan' => $this->request->getVar('keluhan'),
            'tekanandrh' => $this->request->getVar('tekanandrh'),
            'letakjanin' => $this->request->getVar('letakjanin'),
            'denyutjantung' => $this->request->getVar('denyutjantung'),
            'bengkakkaki' => $this->request->getVar('bengkakkaki'),
            'periksalabo' => $this->request->getVar('periksalabo'),
            'tindakan' => $this->request->getVar('tindakan'),
            'nasihatsaran' => $this->request->getVar('nasihatsaran'),
            'hasil_bb' => $this->request->getVar('hasil_bb'),
            'hasil_lila' => $this->request->getVar('hasil_lila'),
        ];
        
        //validasi input
        // if(!$this->validate([
        //     'ibunama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //          ]
        //      ],
        //     'ibutgllhr' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //          ]
        //      ],
        //     'tglperiksa' => [
        //        'rules' => 'required',
        //        'errors' => [
        //            'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'umur' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'umurkandungan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'bb' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'tb' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'keluhan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'lila' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'tekanandrh' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'tinggifundus' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'letakjanin' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'denyutjantung' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'bengkakkaki' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'periksalabo' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'tindakan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        //     'nasihatsaran' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        // ])
        // ){
        //     session()->setFlashdata('error','Mohon cek kembali data Anda!');
        //     return redirect()->to('/tambahkesbumil')->withInput()->with('errors', $this->kesbumilModel->errors());
        // }

        
        try {
            $this->kesbumilModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/datakesbumil')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data kesehatan bumil berhasil ditambahkan.');
        return redirect()->to('/datakesbumil');
    }

    public function detailkesbumil($idkesbumil)
    {
        $data  = [
            'bumil' => $this->kesbumilModel->getIdBumil($idkesbumil),
            'kesbumil' => $this->kesbumilModel->find($idkesbumil),
            'title'   => 'Detail Data Kesbumil',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/kesbumil/detailkesbumil', $data);
    }

    public function editkesbumil($idkesbumil)
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->findAll(),
            'title' => 'Edit Data Kesbumil',
            'kesbumil' => $this->kesbumilModel->getIdKesbumil($idkesbumil),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/kesbumil/editkesbumil', $data);
    }

    public function update($idkesbumil)
    {
        $idkesbumil = $this->request->getVar('idkesbumil');
        if(!$this->validate([
            'tglperiksa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                 ]
             ],
             'umur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
             'umurkandungan' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'bb' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'tb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
             'keluhan' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'lila' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'tekanandrh' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'tinggifundus' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'letakjanin' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'denyutjantung' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'bengkakkaki' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'periksalabo' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'tindakan' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'nasihatsaran' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
            'idbumil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
         ])
         ){
            session()->setFlashdata('error','Mohon cek kembali data Anda!');
            return redirect()->to('/editkesbumil/' . $idkesbumil)->with('errors', $this->kesbumilModel->errors());
         }

        $this->kesbumilModel->save([
            'idkesbumil' => $idkesbumil,
            'idbumil' => $this->request->getVar('idbumil'),
            'tglperiksa' => $this->request->getVar('tglperiksa'),
            'umur' => $this->request->getVar('umur'),
            'umurkandungan' => $this->request->getVar('umurkandungan'),
            'bb' => $this->request->getVar('bb'),
            'ketbb' => $this->request->getVar('ketbb'),
            'tb' => $this->request->getVar('tb'),
            'lila' => $this->request->getVar('lila'),
            'ketlila' => $this->request->getVar('ketlila'),
            'tinggifundus' => $this->request->getVar('tinggifundus'),
            'keluhan' => $this->request->getVar('keluhan'),
            'tekanandrh' => $this->request->getVar('tekanandrh'),
            'letakjanin' => $this->request->getVar('letakjanin'),
            'denyutjantung' => $this->request->getVar('denyutjantung'),
            'bengkakkaki' => $this->request->getVar('bengkakkaki'),
            'periksalabo' => $this->request->getVar('periksalabo'),
            'tindakan' => $this->request->getVar('tindakan'),
            'nasihatsaran' => $this->request->getVar('nasihatsaran'),
        ]);
           
            session()->setFlashdata('pesan', 'Data berhasil diedit.');
            return redirect()->to('/datakesbumil');
    }

    public function hapuskesbumil($idkesbumil)
    {
        $this->kesbumilModel->delete($idkesbumil);
        session()->setFlashdata('hapus', 'Data kesehata bumil berhasil dihapus.');
        return redirect()->to('/datakesbumil');
    }

    public function pdf()
    {
        $bumil = new BumilModel();
        $data  = [
            'bumil' => $bumil->find(),
            'kesbumil' => $this->kesbumilModel->getAllData(),
            'title' => 'PDF Daftar Data Kes Bumil',
        ];

        // $filename = 'Daftar Data Kes Bumil ('. date('d-m-y').')';
        $filename = 'Daftar Data Kesehatan Bumil';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('kader/kesbumil/pdfkesbumil', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

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
            'kesbumil' => $this->kesbumilModel->getAllData(),
            'title' => 'Excel Daftar Data Kesehatan Bumil',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Bumil')
            ->setCellValue('C1', 'Nama Suami')
            ->setCellValue('D1', 'Tanggal Lahir Bumil')
            ->setCellValue('E1', 'Umur Bumil')
            ->setCellValue('F1', 'Kandungan Ke')
            ->setCellValue('G1', 'Tanggal Periksa')
            ->setCellValue('H1', 'Umur Kandungan')
            ->setCellValue('I1', 'BB')
            ->setCellValue('J1', 'Ket BB')
            ->setCellValue('K1', 'Hasil BB')
            ->setCellValue('L1', 'Lila')
            ->setCellValue('M1', 'Ket Lila')
            ->setCellValue('N1', 'Hasil Lila')
            ->setCellValue('O1', 'Tinggi Fundus')
            ->setCellValue('P1', 'Letak Janin')
            ->setCellValue('Q1', 'Tekanan Darah')
            ->setCellValue('R1', 'Denyut Jantung')
            ->setCellValue('S1', 'Keluhan')
            ->setCellValue('T1', 'Bengkak Kaki')
            ->setCellValue('U1', 'Perikda Labo')
            ->setCellValue('V1', 'Tindakan')
            ->setCellValue('W1', 'Nasihat Dan Saran')
            ->setCellValue('X1', 'Catatan');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['kesbumil'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->ibunama)
                ->setCellValue('C' . $column, $nak->ayahnama)
                ->setCellValue('D' . $column, $nak->ibutgllhr)
                ->setCellValue('E' . $column, $nak->umur)
                ->setCellValue('F' . $column, $nak->anakke)
                ->setCellValue('G' . $column, $nak->tglperiksa)
                ->setCellValue('H' . $column, $nak->umurkandungan)
                ->setCellValue('I' . $column, $nak->bb)
                ->setCellValue('J' . $column, $nak->ketbb)
                ->setCellValue('K' . $column, $nak->hasil_bb)
                ->setCellValue('L' . $column, $nak->lila)
                ->setCellValue('M' . $column, $nak->ketlila)
                ->setCellValue('N' . $column, $nak->hasil_lila)
                ->setCellValue('O' . $column, $nak->tinggifundus)
                ->setCellValue('P' . $column, $nak->letakjanin)
                ->setCellValue('Q' . $column, $nak->tekanandrh)
                ->setCellValue('R' . $column, $nak->denyutjantung)
                ->setCellValue('S' . $column, $nak->keluhan)
                ->setCellValue('T' . $column, $nak->bengkakkaki)
                ->setCellValue('U' . $column, $nak->periksalabo)
                ->setCellValue('V' . $column, $nak->tindakan)
                ->setCellValue('W' . $column, $nak->nasihatsaran)
                ->setCellValue('X' . $column, $nak->catatan);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Kesehatan Bumil ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Kesehatan Bumil';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
}