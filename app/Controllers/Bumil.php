<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\BumilModel;
use Exception;

class Bumil extends BaseController
{
    protected $bumilModel;
    protected $db;
    protected $user;
    public function __construct()
    {
        $this->bumilModel = new BumilModel();
        $this->db = \Config\Database::connect();
        $this->user = $this->db->table('users');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_bumil') ? $this->request->getVar('page_bumil') : 1;

        $bumil = new BumilModel();
      
        $data  = [
            'pager' => $this->bumilModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Data Bumil';
        $data['bumil'] = $bumil->getAllData(); 

        return view('kader/bumil/databumil', $data);
    }

    public function lahir()
    {
        $currentPage = $this->request->getVar('page_bumil') ? $this->request->getVar('page_bumil') : 1;

        $bumil = new BumilModel();
      
        $data  = [
            'pager' => $this->bumilModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Data Bumil';
        $data['bumil'] = $bumil->getAllMelahirkan(); 

        return view('kader/bumil/databumillahir', $data);
    }


    public function tambahbumil()
    {
        $data  = [
            'title' => 'Tambah Data Bumil',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/bumil/tambahbumil', $data);
    }

    public function save()
    {
        $data_user = [
            'username' => $this->request->getVar('ibunik'),
            'email' => $this->request->getVar('ibunik') . '@mail.com',
            'password_hash' => password_hash($this->request->getVar('ibunik'), PASSWORD_BCRYPT),
            'fullname' => $this->request->getVar('ibunama'),
            'usernohp' => str_replace("-","", $this->request->getVar('ibunohp')),
            'active' => '1',
            'role'  => 'masyarakat',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $this->user->insert($data_user);

        $user_id = $this->user->orderBy('id', 'desc')->get()->getRow();
        $data = [
            'id_user' => $user_id->id,
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
                return redirect()->to('/tambahbumil')->withInput()->with('errors', $this->bumilModel->errors());
            }
            
            try {
                $this->bumilModel->protect(false)->insert($data);
            } catch (Exception $e) {
                return redirect()->to('/tambahbumil')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/databumil');
    }

    public function detailbumil($idbumil)
    {
        $data  = [
            'title' => 'Detail Data Bumil',
            'bumil' => $this->bumilModel->getBumil($idbumil),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/bumil/detailbumil', $data);
    }

    public function editbumil($idbumil)
    {
        $data  = [
            'title' => 'Edit Data Bumil',
            'bumil' => $this->bumilModel->getBumil($idbumil),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/bumil/editbumil', $data);
    }

    public function update($idbumil)
    {
        //cek nokk
        $nokkLama = $this->bumilModel->getBumil($this->request->getVar('idbumil'));
        if($nokkLama['nokk'] == $this->request->getVar('nokk')){
            $rule_nokk = 'required';
        }else{
            $rule_nokk = 'required|is_unique[bumil.nokk] 
            |is_unique[bumil.ayahnik]|is_unique[bumil.ibunik]
            |is_unique[anak.nik]';
        }

         //cek nokk
         $ayahnikLama = $this->bumilModel->getBumil($this->request->getVar('idbumil'));
         if($ayahnikLama['ayahnik'] == $this->request->getVar('ayahnik')){
             $rule_ayahnik = 'required';
         }else{
            $rule_ayahnik = 'required|is_unique[bumil.nokk] 
            |is_unique[bumil.ayahnik]|is_unique[bumil.ibunik]
            |is_unique[anak.nik]';
         }

          //cek nokk
        $ibunikLama = $this->bumilModel->getBumil($this->request->getVar('idbumil'));
        if($ibunikLama['ibunik'] == $this->request->getVar('ibunik')){
            $rule_ibunik = 'required';
        }else{
            $rule_ibunik = 'required|is_unique[bumil.nokk]
            |is_unique[bumil.ayahnik]|is_unique[bumil.ibunik]
            |is_unique[anak.nik]';
        }

        $idbumil = $this->request->getVar('idbumil');
        if(!$this->validate([
            'nokk' => [
                'rules' => $rule_nokk,
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ayahnik' => [
                'rules' => $rule_ayahnik,
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
                'rules' => $rule_ibunik,
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
            ])
            ){
                return redirect()->to('/editbumil/' . $idbumil)->withInput();
            }
    
            $this->bumilModel->save([
                'idbumil' => $idbumil,
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
            ]);
         session()->setFlashdata('pesan', 'Data berhasil diedit.');
 
         return redirect()->to('/databumil');
    }

    public function hapusbumil($idbumil)
    {
        $this->bumilModel->delete($idbumil);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/databumil');
    }
    
    public function riwayatcekkes()
    {
        $data = [
            'title' => 'Riwayat Kesehatan Ibu Hamil',
            'riwayat' => $this->bumilModel->getRiwayat()
        ];

        return view('masyarakat/riwayatbumil', $data);
    }

    public function pdf()
    {
        $data  = [
            'bumil' => $this->bumilModel->getAllData(),
            'title' => 'PDF Daftar Data Bumil',
        ];

        // $filename = 'Daftar Data Bumil ('. date('d-m-y').')';
        $filename = 'Daftar Data Bumil';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('kader/bumil/pdfbumil', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

    // public function viewexcel()
    // {
    //     return view('kader/bumil/databumil');
    // }

    public function excel()
    {
        $data  = [
            'bumil' => $this->bumilModel->getAllData(),
            'title' => 'Excel Daftar Data Bumil',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No KK')
            ->setCellValue('C1', 'NIK Suami')
            ->setCellValue('D1', 'Nama Suami')
            ->setCellValue('E1', 'Tempat Lahir Suami')
            ->setCellValue('F1', 'Tanggal Lahir Suami')
            ->setCellValue('G1', 'Agama Suami')
            ->setCellValue('H1', 'Pendidikan Terakhir Suami')
            ->setCellValue('I1', 'Pekerjaan Suami')
            ->setCellValue('J1', 'No HP Suami')
            ->setCellValue('K1', 'NIK Istri')
            ->setCellValue('L1', 'Nama Istri')
            ->setCellValue('M1', 'Tempat Lahir Istri')
            ->setCellValue('N1', 'Tanggal Lahir Istri')
            ->setCellValue('O1', 'Agama Istri')
            ->setCellValue('P1', 'Pendidikan Terakhir Istri')
            ->setCellValue('Q1', 'Pekerjaan Istri')
            ->setCellValue('R1', 'No HP Istri')
            ->setCellValue('S1', 'Alamat')
            ->setCellValue('T1', 'Jmlh Anak')
            ->setCellValue('U1', 'Kandungan ke');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['bumil'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->nokk)
                ->setCellValue('C' . $column, $nak->ayahnik)
                ->setCellValue('D' . $column, $nak->ayahnama)
                ->setCellValue('E' . $column, $nak->ayahtmptlhr)
                ->setCellValue('F' . $column, $nak->ayahtgllhr)
                ->setCellValue('G' . $column, $nak->ayahagama)
                ->setCellValue('H' . $column, $nak->ayahpendidikan)
                ->setCellValue('I' . $column, $nak->ayahpekerjaan)
                ->setCellValue('J' . $column, $nak->ayahnohp)
                ->setCellValue('K' . $column, $nak->ibunik)
                ->setCellValue('L' . $column, $nak->ibunama)
                ->setCellValue('M' . $column, $nak->ibutmptlhr)
                ->setCellValue('N' . $column, $nak->ibutgllhr)
                ->setCellValue('O' . $column, $nak->ibuagama)
                ->setCellValue('P' . $column, $nak->ibupendidikan)
                ->setCellValue('Q' . $column, $nak->ibupekerjaan)
                ->setCellValue('R' . $column, $nak->ibunohp)
                ->setCellValue('S' . $column, $nak->alamat)
                ->setCellValue('T' . $column, $nak->jmlhanak)
                ->setCellValue('U' . $column, $nak->anakke);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Bumil ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Bumil';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    

}