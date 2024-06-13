<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\AnakModel;
use App\Models\OrtuModel;
use App\Models\ImunisasiModel;
use Exception;

class Imunisasi extends BaseController
{
    protected $imunisasiModel;
    public function __construct()
    {
        $this->imunisasiModel = new ImunisasiModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_imunisasi') ? $this->request->getVar('page_imunisasi') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $imunisasi = $this->imunisasiModel->search($keyword);
        }else{
            $imunisasi = $this->imunisasiModel->getAllData();
        }
        
        $data  = [
            // 'imunisasi' => $imunisasi->paginate(5, 'imunisasi'),
            'pager' => $this->imunisasiModel->pager,
            'currentPage' => $currentPage,
        ];
        $data['anak'] = $this->imunisasiModel->getDataAnak();
        $data['imunisasi'] = $imunisasi;
        $data['title'] = 'Data Imunisasi';

        return view('kader/imun/dataimunanak', $data);
    }

    public function tambahimunanak()
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->findAll(),
            'ortu' => $ortu->findAll(),
            'imunisasi' => $this->imunisasiModel->getAllData(),
            'title' => 'Tambah Data Imunisasi',
        ];

        return view('kader/imun/dataimunanak', $data);
    }

    public function save()
    {
        $data = [
            'idanak' => $this->request->getVar('idanak'),
            'idortu' => $this->request->getVar('idortu'),
            'usia' => $this->request->getVar('usia'),
            'tglimun' => $this->request->getVar('tglimun'),
            'jenisimun' => $this->request->getVar('jenisimun'),
            'namavit' => $this->request->getVar('namavit'),
            'obatcacing' => $this->request->getVar('obatcacing'),
            'ket' => $this->request->getVar('ket'),
        ];

        $getExistingData = $this->imunisasiModel->getExisting($this->request->getVar('jenisimun'),$this->request->getVar('idanak'));

        if($getExistingData != null){
            return "Imunisasi " . $this->request->getVar('jenisimun') . " sudah pernah dilakukan";
        }

        // 1
        if($this->request->getVar('jenisimun') == "Hepatitis B"){
            if(in_array($this->request->getVar('usia'), [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 2
        if($this->request->getVar('jenisimun') == "BCG"){
            if(in_array($this->request->getVar('usia'), [18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 3
        if($this->request->getVar('jenisimun') == "Polio tetes 1"){
            if(in_array($this->request->getVar('usia'), [18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 4
        if($this->request->getVar('jenisimun') == "DPT 1, Polio tetes 2 dan PCV 1"){
            if(in_array($this->request->getVar('usia'), [0,1,18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 5
        if($this->request->getVar('jenisimun') == "DPT 2, Polio tetes 3 dan PCV 2"){
            if(in_array($this->request->getVar('usia'), [0,1,2,18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 6
        if($this->request->getVar('jenisimun') == "DPT 3, Polio tetes 4 dan Polio suntik (IPV)"){
            if(in_array($this->request->getVar('usia'), [0,1,2,3,18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 7
        if($this->request->getVar('jenisimun') == "Campak dan rubella (MR)"){
            if(in_array($this->request->getVar('usia'), [0,1,2,3,4,5,6,7,8,10,11,13,14,15,16,17,18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 8
        if($this->request->getVar('jenisimun') == "PCV 3"){
            if(in_array($this->request->getVar('usia'), [0,1,2,3,4,5,6,7,8,9,10,11])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 9
        if($this->request->getVar('jenisimun') == "DPT Lanjutan"){
            if(in_array($this->request->getVar('usia'), [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }

        // 10
        if($this->request->getVar('jenisimun') == "Campak dan rubella (MR) Lanjutan"){
            if(in_array($this->request->getVar('usia'), [0,1,2,3,4,5,6,7,8,10,11,13,14,15,16,17,18,19,20,21,22,23,24])){
                return "Waktu Imunisasi ".$this->request->getVar('jenisimun') . " Tidak Tepat";
            }
        }
        
        try {
            $this->imunisasiModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return 'Terjadi kesalahan: ' . $e->getMessage();
        }
        return "Data imunisasi berhasil ditambahkan.";
    }

    public function detailimunanak($idimunisasi)
    {
        $data  = [
            'anak' => $this->imunisasiModel->getIdAnak($idimunisasi),
            'ortu' => $this->imunisasiModel->getIdOrtu($idimunisasi),
            'title' => 'Detail Data Imunisasi',
            'imunisasi' => $this->imunisasiModel->getIdImunisasi($idimunisasi),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/imun/detailimunanak', $data);
    }

    public function editimunanak($idimunisasi)
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->findAll(),
            'ortu' => $ortu->findAll(),
            'title' => 'Edit Data Imunisasi',
            'imunisasi' => $this->imunisasiModel->getIdImunisasi($idimunisasi),
            'validation' => \Config\Services::validation()
        ];

        return view('kader/imun/editimunanak', $data);
    }

    public function update($idimunisasi)
    {
        $data = [
            'idimunisasi' => $idimunisasi,
            'idanak' => $this->request->getVar('idanak'),
            'idortu' => $this->request->getVar('idortu'),
            'usia' => $this->request->getVar('usia'),
            'tglimun' => $this->request->getVar('tglimun'),
            'jenisimun' => $this->request->getVar('jenisimun'),
            'namavit' => $this->request->getVar('namavit'),
            'ket' => $this->request->getVar('ket')
        ];

        //validasi input
        $idimunisasi = $this->request->getVar('idimunisasi');
        if(!$this->validate([
            'usia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tglimun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jenisimun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'namavit' => [
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
            if (!$this->imunisasiModel->validate($data)) {
                session()->setFlashdata('error','Mohon cek kembali data Anda!');
                return redirect()->to('/editimunanak/' . $idimunisasi)->with('errors', $this->imunisasiModel->errors());
            }
            
            session()->setFlashdata('pesan', 'Data berhasil diedit.');
            return redirect()->to('/dataimunanak');
    }

    public function hapusimunanak($idimunisasi)
    {
        $this->imunisasiModel->delete($idimunisasi);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/dataimunanak');
    }

    
    public function pdf()
    {
        $anak = new AnakModel();
        $ortu = new OrtuModel();
        $data  = [
            'anak' => $anak->find(),
            'ortu' => $ortu->find(),
            'imunisasi' => $this->imunisasiModel->getAllData(),
            'title' => 'PDF Daftar Data Imunisasi Anak',
        ];

        // $filename = 'Daftar Data Imunisasi Anak ('. date('d-m-y').')';
        $filename = 'Daftar Data Imunisasi Anak';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // load HTML content
        $dompdf->loadHtml(view('kader/imun/pdfimun', $data));

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
            'imunisasi' => $this->imunisasiModel->getAllData(),
            'title' => 'Excel Daftar Data Imunisasi Anak',
        ];

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan lembar kerja aktif dan Menambahkan data ke sel 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Anak')
            ->setCellValue('C1', 'Jenis Kelamin')
            ->setCellValue('D1', 'Tanggal Lahir')
            ->setCellValue('E1', 'Usia')
            ->setCellValue('F1', 'Nama Ibu')
            ->setCellValue('G1', 'Tanggal Imunisasi')
            ->setCellValue('H1', 'Jenis Imunisasi')
            ->setCellValue('I1', 'Nama Vitamin')
            ->setCellValue('J1', 'Ket');

        $no = 1;
        $column = 2;

        // Mengatur lebar kolom A secara otomatis
        foreach ($data['imunisasi'] as $nak) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $nak->anaknama)
                ->setCellValue('C' . $column, $nak->jk)
                ->setCellValue('D' . $column, $nak->tgllhr)
                ->setCellValue('E' . $column, $nak->usia)
                ->setCellValue('F' . $column, $nak->ibunama)
                ->setCellValue('G' . $column, $nak->tglimun)
                ->setCellValue('H' . $column, $nak->jenisimun)
                ->setCellValue('I' . $column, $nak->namavit)
                ->setCellValue('J' . $column, $nak->ket);
        
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'Daftar Data Imunisasi Anak ('. date('y-m-d-H-i-s').')';
        $filename = 'Daftar Data Imunisasi Anak';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}