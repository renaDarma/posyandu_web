<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\AnakModel;
use App\Models\OrtuModel;
use App\Models\PenimbanganModel;
use Exception;

class Penimbangan extends BaseController
{
    protected $penimbanganModel;
    public function __construct()
    {
        $this->penimbanganModel = new PenimbanganModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_penimbangan') ? $this->request->getVar('page_penimbangan') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $penimbangan = $this->penimbanganModel->search($keyword);
        }else{
            $penimbangan = $this->penimbanganModel->getAllData();
        }
        
        $data  = [
            // 'penimbangan' => $penimbangan->paginate(5, 'penimbangan'),
            'pager' => $this->penimbanganModel->pager,
            'currentPage' => $currentPage,
        ];
        $data['anak'] = $this->penimbanganModel->getDataAnak();
        $data['penimbangan'] = $penimbangan;
        $data['title'] = 'Data Penimbangan';

        return view('kader/timbang/datapenimbanganak', $data);
    }

    public function tambahpenimbanganak()
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->findAll(),
            'ortu' => $ortu->findAll(),
            'penimbangan' => $this->penimbanganModel->getAllData(),
            'title' => 'Tambah Data Penimbangan',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/timbang/datapenimbanganak', $data);
    }

    public function save()
    {
        $data = [
            'idanak' => $this->request->getVar('idanak'),
            'idortu' => $this->request->getVar('idortu'),
            'tgltimbang' => $this->request->getVar('tgltimbang'),
            'bb' => $this->request->getVar('bb'),
            'ketbb' => $this->request->getVar('ketbb'),
            'usia' => $this->request->getVar('usia'),
            'tb' => $this->request->getVar('tb'),
            'kettb' => $this->request->getVar('kettb'),
            'lk' => $this->request->getVar('lk'),
            'ketlk' => $this->request->getVar('ketlk'),
            'lila' => $this->request->getVar('lila'),
            'ketlila' => $this->request->getVar('ketlila'),
            'ket' => $this->request->getVar('ket'),
            'hasil_bb' => $this->request->getVar('hasil_bb'),
            'hasil_tb' => $this->request->getVar('hasil_tb'),
            'hasil_lk' => $this->request->getVar('hasil_lk'),
            'hasil_lila' => $this->request->getVar('hasil_lila'),
        ];
        //validasi input
        // if(!$this->validate([
        //     'anaknama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} anak harus diisi.',
        //         ]
        //     ],
        //     'jk' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} anak harus diisi.',
        //         ]
        //     ],
        //     'tgllhr' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} anak harus diisi.',
        //         ]
        //     ],
        //     'ibunama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} bumil harus diisi.'
        //         ]
        //     ],
        //     'ayahnama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} bumil harus diisi.'
        //         ]
        //     ],
        //     'tgltimbang' => [
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
        //     'lk' => [
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
        //     'ket' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} harus diisi.'
        //         ]
        //     ],
        // ])) 
        // if (!$this->penimbanganModel->validate($data)) {
        //     session()->setFlashdata('error','Mohon cek kembali data Anda!');
        //     return redirect()->to('/tambahpenimbanganak')->withInput()->with('errors', $this->penimbanganModel->errors());
        // }
        
        try {
            $this->penimbanganModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/datapenimbanganak')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data penimbangan anak berhasil ditambahkan.');
        return redirect()->to('/datapenimbanganak');
    }

    public function detailpenimbanganak($idpenimbangan)
    {
        $data  = [
            'anak' => $this->penimbanganModel->getIdAnak($idpenimbangan),
            'ortu' => $this->penimbanganModel->getIdOrtu($idpenimbangan),
            'detail' => $this->penimbanganModel->get_detail_anak($idpenimbangan),
            'title' => 'Detail Data Penimbangan',
            'penimbangan' => $this->penimbanganModel->find($idpenimbangan),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/timbang/detailpenimbanganak', $data);
    }

    public function editpenimbanganak($idpenimbangan)
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->find(),
            'ortu' => $ortu->find(),
            'title' => 'Edit Data Penimbangan',
            'penimbangan' => $this->penimbanganModel->getIdPenimbangan($idpenimbangan),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/timbang/editpenimbanganak', $data);
    }

    public function update($idpenimbangan)
    {  
        $idpenimbangan = $this->request->getVar('idpenimbangan');
        $data = [
            'idpenimbangan' => $idpenimbangan,
            'idanak' => $this->request->getVar('idanak'),
            'idortu' => $this->request->getVar('idortu'),
            'tgltimbang' => $this->request->getVar('tgltimbang'),
            'bb' => $this->request->getVar('bb'),
            'tb' => $this->request->getVar('tb'),
            'usia' => $this->request->getVar('usia'),
            'lk' => $this->request->getVar('lk'),
            'lila' => $this->request->getVar('lila'),
            'ket' => $this->request->getVar('ket'),
        ];

        //validasi input
        if(!$this->validate([
            'tgltimbang' => [
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
            'lk' => [
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
            'ket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'idanak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'idortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
        ]))
            if (!$this->penimbanganModel->validate($data)) {
                session()->setFlashdata('error','Mohon cek kembali data Anda!');
                return redirect()->to('/editpenimbanganak/' . $idpenimbangan)->with('errors', $this->penimbanganModel->errors());
            }
       
            session()->setFlashdata('pesan', 'Data penimbangan berhasil diedit.');
            return redirect()->to('/datapenimbanganak');
    }

    public function hapuspenimbanganak($idpenimbangan)
    {
        $this->penimbanganModel->delete($idpenimbangan);
        session()->setFlashdata('hapus', 'Data penimbangan berhasil dihapus.');
        return redirect()->to('/datapenimbanganak');
    }

    public function pdf()
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->find(),
            'ortu' => $ortu->find(),
            'penimbangan' => $this->penimbanganModel->getAllData(),
            'title' => 'PDF Daftar Data Penimbangan',
        ];

        // $filename = 'Daftar Data Penimbangan ('. date('d-m-y').')';
        $filename = 'Daftar Data Penimbangan Anak';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('kader/timbang/pdftimbang', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

    public function excel()
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->find(),
            'ortu' => $ortu->find(),
            'penimbangan' => $this->penimbanganModel->getAllData(),
            'title' => 'Excel Daftar Data Penimbangan',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Anak')
            ->setCellValue('C1', 'Nama Ibu')
            ->setCellValue('D1', 'Nama Ayah')
            ->setCellValue('E1', 'Jenis Kelamin Anak')
            ->setCellValue('F1', 'Tanggal Lahir Anak')
            ->setCellValue('G1', 'Usia Anak')
            ->setCellValue('H1', 'Tanggal Timbang')
            ->setCellValue('I1', 'BB')
            ->setCellValue('J1', 'Ket BB')
            ->setCellValue('K1', 'Hasil BB')
            ->setCellValue('L1', 'TB')
            ->setCellValue('M1', 'Ket TB')
            ->setCellValue('N1', 'Hasil TB')
            ->setCellValue('O1', 'LK')
            ->setCellValue('P1', 'Ket LK')
            ->setCellValue('Q1', 'Hasil LK')
            ->setCellValue('O1', 'Lila')
            ->setCellValue('P1', 'Ket Lila')
            ->setCellValue('Q1', 'Hasil Lila');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['penimbangan'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->anaknama)
                ->setCellValue('C' . $column, $nak->ibunama)
                ->setCellValue('D' . $column, $nak->ayahnama)
                ->setCellValue('E' . $column, $nak->jk)
                ->setCellValue('F' . $column, $nak->tgllhr)
                ->setCellValue('G' . $column, $nak->usia)
                ->setCellValue('H' . $column, $nak->tgltimbang)
                ->setCellValue('I' . $column, $nak->bb)
                ->setCellValue('J' . $column, $nak->ketbb)
                ->setCellValue('K' . $column, $nak->hasil_bb)
                ->setCellValue('L' . $column, $nak->tb)
                ->setCellValue('M' . $column, $nak->kettb)
                ->setCellValue('N' . $column, $nak->hasil_tb)
                ->setCellValue('O' . $column, $nak->lk)
                ->setCellValue('P' . $column, $nak->ketlk)
                ->setCellValue('Q' . $column, $nak->hasil_lk)
                ->setCellValue('O' . $column, $nak->lila)
                ->setCellValue('P' . $column, $nak->ketlila)
                ->setCellValue('Q' . $column, $nak->hasil_lila);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Penimbangan Anak ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Penimbangan Anak';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}