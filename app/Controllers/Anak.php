<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Myth\Auth\Models\UserModel;
use App\Models\AnakModel;
use App\Models\OrtuModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

class Anak extends BaseController
{
    protected $anakModel;
    public function __construct()
    {
        $this->anakModel = new AnakModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_anak') ? $this->request->getVar('page_anak') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $anak = $this->anakModel->search($keyword);
        } else {
            $anak = $this->anakModel;
        }

        $data = [
            'pager' => $this->anakModel->pager,
            'currentPage' => $currentPage
        ];
        $data['anak'] = $this->anakModel->getAllData();
        $data['title'] = 'Data Anak';

        return view('kader/anak/dataanak', $data);
    }

    public function tambahanak()
    {
        $ortu = new OrtuModel();
        $users = new UserModel();

        $data = [
            'ortu' => $ortu->findAll(),
            'users' => $users->findAll(),
            'anak' => $this->anakModel->getAllData(),
            'user' => $this->anakModel->getAllUsers(),
            'title' => 'Tambah Data Anak',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/anak/tambahanak', $data);
    }

    public function save()
    {
        $data = [
            'idortu' => $this->request->getVar('idortu'),
            'iduser' => $this->request->getVar('iduser'),
            'anaknama' => $this->request->getVar('anaknama'),
            'nik' => $this->request->getVar('nik'),
            'tmptlhr' => $this->request->getVar('tmptlhr'),
            'tgllhr' => $this->request->getVar('tgllhr'),
            'jk' => $this->request->getVar('jk'),
            'namatmptlhr' => $this->request->getVar('namatmptlhr'),
            'jeniskelahiran' => $this->request->getVar('jeniskelahiran'),
            'bblahir' => $this->request->getVar('bblahir'),
            'tblahir' => $this->request->getVar('tblahir'),
            'lklahir' => $this->request->getVar('lklahir'),

        ];
        //validasi input
        if (
            !$this->validate([
                'nik' => [
                    'rules' => 'required|is_unique[ortu.nokk] 
                            |is_unique[ortu.ayahnik]|is_unique[ortu.ibunik]
                            |is_unique[anak.nik]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                // 'anaknama' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} harus diisi.'
                //     ]
                // ],
                'tmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'jk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'namatmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'jeniskelahiran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'bblahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tblahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'lklahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'ayahnama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'ibunama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
            ])
        )
            if (!$this->anakModel->validate($data)) {
                session()->setFlashdata('error', 'Mohon cek kembali data Anda!');
                return redirect()->to('/tambahanak')->withInput()->with('errors', $this->anakModel->errors());
            }

        try {
            $this->anakModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/tambahanak')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/dataanak');
    }

    public function detailanak($idanak)
    {
        $data = [
            'ortu' => $this->anakModel->getIdOrtu($idanak),
            'users' => $this->anakModel->getIdOrtu($idanak),
            'title' => 'Detail Data Anak',
            'anak' => $this->anakModel->find($idanak),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/anak/detailanak', $data);
    }

    public function editanak($idanak)
    {
        $ortu = new OrtuModel();
        $users = new UserModel();
        $anak = $this->anakModel->getIdAnak($idanak);
        $data = [
            'ortu' => $ortu->findAll(),
            'users' => $users->findAll(),
            'user' => $this->anakModel->getAllUsers(),
            'title' => 'Edit Data Anak',
            'anak' => $anak,
            'validation' => \Config\Services::validation()
        ];

        return view('kader/anak/editanak', $data);
    }

    public function update($idanak)
    {
        $data = [
            'idanak' => $idanak,
            'idortu' => $this->request->getVar('idortu'),
            'iduser' => $this->request->getVar('userid'),
            'anaknama' => $this->request->getVar('fullname'),
            'nik' => $this->request->getVar('nik'),
            'tmptlhr' => $this->request->getVar('tmptlhr'),
            'tgllhr' => $this->request->getVar('tgllhr'),
            'jk' => $this->request->getVar('jk'),
            'namatmptlhr' => $this->request->getVar('namatmptlhr'),
            'jeniskelahiran' => $this->request->getVar('jeniskelahiran'),
            'bblahir' => $this->request->getVar('bblahir'),
            'tblahir' => $this->request->getVar('tblahir'),
            'lklahir' => $this->request->getVar('lklahir'),
        ];

        //cek nik
        $nikLama = $this->anakModel->getIdAnak($this->request->getVar('idanak'));
        if ($nikLama['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = 'required|is_unique[ortu.nokk]|is_unique[ortu.ayahnik]|is_unique[ortu.ibunik]|is_unique[anak.nik]';
        }

        $idanak = $this->request->getVar('idanak');
        if (
            !$this->validate([
                'nik' => [
                    'rules' => $rule_nik,
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                // 'anaknama' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} harus diisi.'
                //     ]
                // ],
                'tmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'jk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'namatmptlhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'jeniskelahiran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'bblahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'tblahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'lklahir' => [
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
            ])
        )
            if (!$this->anakModel->validate($data)) {
                session()->setFlashdata('error', 'Mohon cek kembali data Anda!');
                return redirect()->to('/editanak/' . $idanak)->with('errors', $this->anakModel->errors());
            } else {
                $this->anakModel->save([
                    'idanak' => $idanak,
                    'idortu' => $this->request->getVar('idortu'),
                    'iduser' => $this->request->getVar('userid'),
                    'anaknama' => $this->request->getVar('fullname'),
                    'nik' => $this->request->getVar('nik'),
                    'tmptlhr' => $this->request->getVar('tmptlhr'),
                    'tgllhr' => $this->request->getVar('tgllhr'),
                    'jk' => $this->request->getVar('jk'),
                    'namatmptlhr' => $this->request->getVar('namatmptlhr'),
                    'jeniskelahiran' => $this->request->getVar('jeniskelahiran'),
                    'bblahir' => $this->request->getVar('bblahir'),
                    'tblahir' => $this->request->getVar('tblahir'),
                    'lklahir' => $this->request->getVar('lklahir'),
                ]);
                session()->setFlashdata('pesan', 'Data berhasil diedit.');

                return redirect()->to('/dataanak');
            }
    }

    public function hapusanak($idanak)
    {
        $this->anakModel->delete($idanak);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/dataanak');
    }

    public function kmsanak($idanak)
    {
        $data = [
            'detail' => $this->anakModel->get_detail_anak($idanak),
            'title' => 'Lihat KMS Anak',
            'anak' => $this->anakModel->find($idanak),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/anak/kmsanak', $data);
    }

    public function pdf()
    {
        // Mengambil data anak dari model
        $ortu = new OrtuModel();
        $data = [
            'ortu' => $ortu->findAll(),
            'anak' => $this->anakModel->getAllData(),
            'title' => 'PDF Daftar Data Anak',
        ];

        // $filename = 'Daftar Data Anak ('. date('d-m-y').')';
        $filename = 'Daftar Data Anak';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('kader/anak/pdfanak', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

    public function excel()
    {
        // Mengambil data anak dari model
        $ortu = new OrtuModel();
        $data = [
            'ortu' => $ortu->findAll(),
            'anak' => $this->anakModel->getAllData(),
            'title' => 'Excel Daftar Data Anak',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'Nama Anak')
            ->setCellValue('D1', 'Tempat Lahir')
            ->setCellValue('E1', 'Tanggal Lahir')
            ->setCellValue('F1', 'Jenis Kelamin')
            ->setCellValue('G1', 'Nama Tempat Persalinan')
            ->setCellValue('H1', 'Jenis Kelahiran')
            ->setCellValue('I1', 'BB Lahir')
            ->setCellValue('J1', 'TB Lahir')
            ->setCellValue('K1', 'LK Lahir')
            ->setCellValue('L1', 'Nama Ayah')
            ->setCellValue('M1', 'Nama Ibu');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['anak'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->nik)
                ->setCellValue('C' . $column, $nak->fullname)
                ->setCellValue('D' . $column, $nak->tmptlhr)
                ->setCellValue('E' . $column, $nak->tgllhr)
                ->setCellValue('F' . $column, $nak->jk)
                ->setCellValue('G' . $column, $nak->namatmptlhr)
                ->setCellValue('H' . $column, $nak->jeniskelahiran)
                ->setCellValue('I' . $column, $nak->bblahir)
                ->setCellValue('J' . $column, $nak->tblahir)
                ->setCellValue('K' . $column, $nak->lklahir)
                ->setCellValue('L' . $column, $nak->ayahnama)
                ->setCellValue('M' . $column, $nak->ibunama);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Anak ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Anak';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}