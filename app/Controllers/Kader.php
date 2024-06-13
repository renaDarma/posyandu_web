<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

use App\Models\kaderModel;

class Kader extends BaseController
{
    protected $kaderModel;
    protected $db;
    protected $user;
    public function __construct()
    {
        $this->kaderModel = new KaderModel();  
        $this->db = \Config\Database::connect();
        $this->user = $this->db->table('users');
    }

    public function umur(){
        helper(['usia_helper']);
    }

    public function dashboard()
    {
        $data  = [
            'title' => 'Dashboard',
        ];
        return view('kader/dashboardkader', $data);
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_kader') ? $this->request->getVar('page_kader') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kader = $this->kaderModel->search($keyword);
        }else{
            $kader = $this->kaderModel;
        }

        $data  = [
            'kader' => $kader->paginate(5, 'kader'),
            'pager' => $this->kaderModel->pager,
            'currentPage' => $currentPage,
            'kader' => $this->kaderModel->getKader()
        ];
        $data['title'] = 'Data Kader';

        return view('admin/kader/datakader', $data);
    }

    public function tambahkader()
    {
        $data  = [
            'title' => 'Tambah data kader',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/kader/tambahkader', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'kadernama' => [
                'rules' => 'required|is_unique[kader.kadernama]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'kadertmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'kadertgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'kaderpendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'kadertugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'lamakerja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])
        ){
            session()->setFlashdata('error','Mohon cek kembali data Anda!');
            return redirect()->to('/tambahkader')->withInput()->with('errors', $this->kaderModel->errors());
        }

        try {
            $this->kaderModel->save([
                'kadernama' => $this->request->getVar('kadernama'),
                'kadertmptlhr' => $this->request->getVar('kadertmptlhr'),
                'kadertgllhr' => $this->request->getVar('kadertgllhr'),
                'kaderpendidikan' => $this->request->getVar('kaderpendidikan'),
                'jabatan' => $this->request->getVar('jabatan'),
                'kadertugas' => $this->request->getVar('kadertugas'),
                'lamakerja' => $this->request->getVar('lamakerja'),
                'alamat' => $this->request->getVar('alamat'),
                'nohp' => $this->request->getVar('nohp')
            ]);
            $tolower = strtolower(str_replace(' ', '', $this->request->getVar('kadernama')));
            $data_user = [
                'username' => $tolower,
                'email' => $tolower . '@mail.com',
                'password_hash' => password_hash($tolower, PASSWORD_BCRYPT),
                'fullname' => $this->request->getVar('kadernama'),
                'usernohp' => str_replace("-","", $this->request->getVar('nohp')),
                'active' => '1',
                'role'  => 'kader',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $this->user->insert($data_user);

        } catch (Exception $e) {
            return redirect()->to('/tambahkader')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/datakader');
    }

    public function detailkader($kadernama)
    {
        $data  = [
            'title' => 'Detail Data Kader',
            'kader' => $this->kaderModel->getKader($kadernama),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kader/detailkader', $data);
    }

    public function editkader($idkader)
    {
        $data  = [
            'title' => 'Edit Data Kader',
            'kader' => $this->kaderModel->getIdKader($idkader),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kader/editkader', $data);
    }

    public function update()
    {
        $idkader = $this->request->getVar('idkader');
        if(!$this->validate([
            'kadernama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'kadertmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'kadertgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'kadertugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'lamakerja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])
        ){
            session()->setFlashdata('error','Mohon cek kembali data Anda!');
            return redirect()->to('/editkader/' . $idkader)->with('errors', $this->kaderModel->errors());
        }

        $this->kaderModel->save([
           'idkader'   => $idkader,
           'kadernama' => $this->request->getVar('kadernama'),
           'kadertmptlhr' => $this->request->getVar('kadertmptlhr'),
           'kadertgllhr' => $this->request->getVar('kadertgllhr'),
           'kaderpendidikan' => $this->request->getVar('kaderpendidikan'),
           'jabatan' => $this->request->getVar('jabatan'),
           'kadertugas' => $this->request->getVar('kadertugas'),
           'lamakerja' => $this->request->getVar('lamakerja'),
           'alamat' => $this->request->getVar('alamat'),
           'nohp' => $this->request->getVar('nohp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/datakader');
    }

    public function hapuskader($idkader)
    {
        $this->kaderModel->delete($idkader);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/datakader');
    }

    public function pdf()
    {
        $data  = [
            'kader' => $this->kaderModel->getAllData(),
            'title' => 'PDF Daftar Data Kader',
        ];

        // $filename = 'Daftar Data kader ('. date('d-m-y').')';
        $filename = 'Daftar Data Kader';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('admin/kader/pdfkader', $data));

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
            'kader' => $this->kaderModel->getAllData(),
            'title' => 'Excel Daftar Data Kader',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Kader')
            ->setCellValue('C1', 'Tempat Lahir')
            ->setCellValue('D1', 'Tanggal Lahir')
            ->setCellValue('E1', 'Pendidikan Terakhir')
            ->setCellValue('F1', 'Jabatan')
            ->setCellValue('G1', 'Tugas Pokok')
            ->setCellValue('H1', 'Lama Kerja')
            ->setCellValue('I1', 'Alamat')
            ->setCellValue('J1', 'No HP');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['kader'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->kadernama)
                ->setCellValue('C' . $column, $nak->kadertmptlhr)
                ->setCellValue('D' . $column, $nak->kadertgllhr)
                ->setCellValue('E' . $column, $nak->kaderpendidikan)
                ->setCellValue('F' . $column, $nak->jabatan)
                ->setCellValue('G' . $column, $nak->kadertugas)
                ->setCellValue('H' . $column, $nak->lamakerja)
                ->setCellValue('I' . $column, $nak->alamat)
                ->setCellValue('J' . $column, $nak->nohp);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Kader ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Kader';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}