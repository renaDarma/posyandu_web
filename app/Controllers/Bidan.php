<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\BidanModel;
use Exception;
class Bidan extends BaseController
{
    protected $bidanModel;
    public function __construct()
    {
        $this->bidanModel = new BidanModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_bidan') ? $this->request->getVar('page_bidan') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $bidan = $this->bidanModel->search($keyword);
        }else{
            $bidan = $this->bidanModel;
        }

        $data  = [
            'bidan' => $bidan->paginate(5, 'bidan'),
            'pager' => $this->bidanModel->pager,
            'currentPage' => $currentPage,
            'bidan' => $this->bidanModel->getBidan()
        ];
        $data['title'] = 'Data Bidan';

        return view('admin/bidan/databidan', $data);
    }

    public function tambahbidan()
    {
        $data  = [
            'title' => 'Tambah Data Bidan',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/bidan/tambahbidan', $data);
    }

    public function save()
    {
        //ambil gambar
        $fileFoto = $this->request->getFile('foto');

        // Cek apakah ada file yang diunggah
        if ($fileFoto->getError() == UPLOAD_ERR_NO_FILE) {
            $namaFoto = 'default.png';
        } else {
            // generate nama file foto random
            $namaFoto = $fileFoto->getRandomName();
            
            // pindahkan file ke folder images jika file berhasil diunggah
            if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
                $fileFoto->move('admin/images/foto', $namaFoto);
            } else {
                // Handle error jika file tidak dapat dipindahkan
                // atau tidak valid
                // misalnya:
                $namaFoto = 'default.png';
            }
        }
        

        $data =[
            'bidannama' => $this->request->getVar('bidannama'),
            'foto' => $namaFoto,
            'bidantmptlhr' => $this->request->getVar('bidantmptlhr'),
            'bidantgllhr' => $this->request->getVar('bidantgllhr'),
            'alamat' => $this->request->getVar('alamat'),
            'bidanpendidikan' => $this->request->getVar('bidanpendidikan'),
            'nohp' => $this->request->getVar('nohp'),
            'lamakerja' => $this->request->getVar('lamakerja'),
            'status' => $this->request->getVar('status'),
        ];
        //validasi input
        if(!$this->validate([
            'bidannama' => [
               'rules' => 'required',
               'errors' => [
                   'required' => 'Nama Bidan harus diisi.'
               ]
            ],
            'bidantmptlhr' => [
                'rules' => 'required',
                'errors' => [
                 'required' => 'Tempat Lahir harus diisi.'
                 ]
            ],
            'bidantgllhr' => [
                 'rules' => 'required',
                 'errors' => [
                      'required' => 'Tanggal Lahir harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                    ]
            ],
            'bidanpendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                    ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'No HP harus diisi.'
               ]
            ],
            'lamakerja' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Lama Kerja harus diisi.'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Status harus diisi.'
                ]
            ],    
        ]))
        if (!$this->bidanModel->validate($data)) {
                session()->setFlashdata('error','Mohon cek kembali data Anda!');
                return redirect()->to('/tambahbidan')->withInput()->with('errors', $this->bidanModel->errors());
            }
            
            try {
                $this->bidanModel->protect(false)->insert($data);
            } catch (Exception $e) {
                return redirect()->to('/databidan')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
            session()->setFlashdata('pesan', 'Data bidan berhasil ditambahkan.');
            return redirect()->to('/databidan');
    }

    public function detailbidan($idbidan)
    {

        $data['bidan'] = $this->bidanModel->getAllData();

        $data  = [
            'title' => 'Detail Data Bidan',
            'bidan' => $this->bidanModel->getIdBidan($idbidan),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/bidan/detailbidan', $data);
    }

    public function editbidan($idbidan)
    {
        $data  = [
            'title' => 'Edit Data Bidan',
            'bidan' => $this->bidanModel->getIdBidan($idbidan),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/bidan/editbidan', $data);
    }

    public function update()
    {
        $idbidan = $this->request->getVar('idbidan');
        if(!$this->validate([
                'bidannama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Bidan harus diisi.'
                    ]
                ],
                'bidantmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat Lahir harus diisi.'
                    ]
                ],
                'bidantgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir harus diisi.'
                    ]
                ],
                 'alamat' => [
                     'rules' => 'required',
                     'errors' => [
                         'required' => 'alamat harus diisi.'
                         ]
                 ],
                 'nohp' => [
                     'rules' => 'required',
                     'errors' => [
                     'required' => 'No HP harus diisi.'
                    ]
                ],
                'lamakerja' => [
                    'rules' => 'required',
                    'errors' => [
                    'required' => 'Lama Kerja harus diisi.'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                    'required' => 'Status harus diisi.'
                    ]
                ],    
             ])
             ){
                 return redirect()->to('/editbidan/' . $idbidan)->withInput();
            }

            $this->bidanModel->save([
            'idbidan'   => $idbidan,
            'bidannama' => $this->request->getVar('bidannama'),
            'bidantmptlhr' => $this->request->getVar('bidantmptlhr'),
            'bidantgllhr' => $this->request->getVar('bidantgllhr'),
            'alamat' => $this->request->getVar('alamat'),
            'bidanpendidikan' => $this->request->getVar('bidanpendidikan'),
            'nohp' => $this->request->getVar('nohp'),
            'lamakerja' => $this->request->getVar('lamakerja'),
            'status' => $this->request->getVar('status'),
         ]);
 
         session()->setFlashdata('pesan', 'Data bidan berhasil diedit.');
 
         return redirect()->to('/databidan');
    }

    public function hapusbidan($id)
    {
        //cari gambar berdasarkan id
        // $bidan = $this->bidanModel->find($id);

        //cek jika file gambarnya default.png
        // if($bidan['foto'] != 'default.png'){
        //     //hapus gambar
        //     unlink('admin/production/images/foto/' . $bidan['foto']);
        // }

        $this->bidanModel->delete($id);
        session()->setFlashdata('pesan', 'Data bidan berhasil dihapus.');
        return redirect()->to('/databidan');
    }

    public function pdf()
    {
        $data  = [
            'bidan' => $this->bidanModel->getAllData(),
            'title' => 'PDF Daftar Data Bidan',
        ];

        // $filename = 'Daftar Data Bidan ('. date('d-m-y').')';
        $filename = 'Daftar Data Bidan';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('admin/bidan/pdfbidan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

    public function excel()
    {
        $data  = [
            'bidan' => $this->bidanModel->getAllData(),
            'title' => 'Excel Daftar Data Bidan',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Bidan')
            ->setCellValue('C1', 'Tempat Lahir')
            ->setCellValue('D1', 'Tanggal Lahir')
            ->setCellValue('E1', 'Alamat')
            ->setCellValue('F1', 'Pendidikan Terakhir')
            ->setCellValue('G1', 'No HP')
            ->setCellValue('H1', 'Masa Kerja')
            ->setCellValue('I1', 'Status');


        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['bidan'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->bidannama)
                ->setCellValue('C' . $column, $nak->bidantmptlhr)
                ->setCellValue('D' . $column, $nak->bidantgllhr)
                ->setCellValue('E' . $column, $nak->alamat)
                ->setCellValue('F' . $column, $nak->bidanpendidikan)
                ->setCellValue('G' . $column, $nak->nohp)
                ->setCellValue('H' . $column, $nak->lamakerja)
                ->setCellValue('I' . $column, $nak->statusp);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Bidan ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Bidan';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}