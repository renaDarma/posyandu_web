<?php

namespace App\Controllers;

use App\Models\LaporankomdatModel;
use App\Models\KaderModel;
use App\Models\AgendaModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

class Laporankomdat extends BaseController
{
    protected $laporankomdatModel;
    public function __construct()
    {
        $this->laporankomdatModel = new LaporankomdatModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_laporankomdat') ? $this->request->getVar('page_laporankomdat') : 1;
        $laporankomdat = new LaporankomdatModel();
        
        $data  = [
            // 'laporan' => $laporan->paginate(5, 'laporan'),
            'pager' => $this->laporankomdatModel->pager,
            'currentPage' => $currentPage,
            // 'validation' => \Config\Services::validation()
        ];
        $data['title'] = 'Data Laporan Komdat';
        $data['laporankomdat'] = $laporankomdat->getAllData();

        return view('laporan/datalaporankomdat', $data);
    }

    public function filter()
    {
        $tanggalawal = $this->request->getPost('tanggalawal');
        $tanggalakhir = $this->request->getPost('tanggalakhir');

        $laporan = $this->laporankomdatModel->filterByTanggal($tanggalawal, $tanggalakhir);

        $data = [
            'title' => 'Filter Laporan Komdat',
            'tanggalawal' => $tanggalawal,
            'tanggalakhir' => $tanggalakhir,
            'laporankomdat' => $laporan
        ];

        // $filename = 'Daftar Data Anak ('. date('d-m-y').')';
        $filename = 'Daftar Data Laporan Komdat'. date('Y');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml(view('laporan/pdfkomdatall', $data));  

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

    public function hitung()
    {
        // KIA
        $totalIbuHamilDatang = $this->request->getPost('kia1');
        $totalIbuHamilDesa = $this->request->getPost('kia2');
        $persentaseKIA = ($totalIbuHamilDatang / $totalIbuHamilDesa) * 100;

        // Menyimpan persentase dalam session
        session()->setFlashdata('perkia', $persentaseKIA);

        // GIZI
        $totalbalita5thnDatang = $this->request->getPost('gizi1');
        $totalbalita5thnDesa = $this->request->getPost('gizi2');
        $persentaseGIZI = ($totalbalita5thnDatang / $totalbalita5thnDesa) * 100;

        session()->setFlashdata('pergizi', $persentaseGIZI);


        // IMUNISASI
        $totalbalita2thnDatang = $this->request->getPost('imun1');
        $totalbalita2thnDesa = $this->request->getPost('imun2');
        $persentaseIMUN = ($totalbalita2thnDatang / $totalbalita2thnDesa) * 100;
 
        session()->setFlashdata('perimun', $persentaseIMUN);

        // KB
        $totalkbDatang = $this->request->getPost('kb1');
        $totalkbDesa = $this->request->getPost('kb2');
        $persentaseKB = ($totalkbDatang / $totalkbDesa) * 100;
   
        session()->setFlashdata('perkb', $persentaseKB);
    

        return redirect()->to('/laporankomdat');
    }

    public function save()
    {
        // KIA
        $totalIbuHamilDatang = $this->request->getPost('kia1');
        $totalIbuHamilDesa = $this->request->getPost('kia2');
        $persentaseKIA = ($totalIbuHamilDatang / $totalIbuHamilDesa) * 100;

        // Menyimpan persentase dalam session
        session()->setFlashdata('perkia', $persentaseKIA);

        // GIZI
        $totalbalita5thnDatang = $this->request->getPost('gizi1');
        $totalbalita5thnDesa = $this->request->getPost('gizi2');
        $persentaseGIZI = ($totalbalita5thnDatang / $totalbalita5thnDesa) * 100;

        session()->setFlashdata('pergizi', $persentaseGIZI);

        // IMUNISASI
        $totalbalita2thnDatang = $this->request->getPost('imun1');
        $totalbalita2thnDesa = $this->request->getPost('imun2');
        $persentaseIMUN = ($totalbalita2thnDatang / $totalbalita2thnDesa) * 100;

        session()->setFlashdata('perimun', $persentaseIMUN);

        // KB
        $totalkbDatang = $this->request->getPost('kb1');
        $totalkbDesa = $this->request->getPost('kb2');
        $persentaseKB = ($totalkbDatang / $totalkbDesa) * 100;

        session()->setFlashdata('perkb', $persentaseKB);

        $data = [
            'tgl' => $this->request->getVar('tgl'),
            'kia1' => $this->request->getVar('kia1'),
            'kia2' => $this->request->getVar('kia2'),
            'gizi1' => $this->request->getVar('gizi1'),
            'gizi2' => $this->request->getVar('gizi2'),
            'imun1' => $this->request->getVar('imun1'),
            'imun2' => $this->request->getVar('imun2'),
            'kb1' => $this->request->getVar('kb1'),
            'kb2' => $this->request->getVar('kb2'),
            'perkia' => $persentaseKIA,
            'pergizi' => $persentaseGIZI,
            'perimun' => $persentaseIMUN,
            'perkb' => $persentaseKB,
            'status' => $this->request->getVar('status'),
        ];
        
        try {
            $this->laporankomdatModel->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('/laporankomdat')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->setFlashdata('pesan', 'Data laporan komdat berhasil disimpan dan dihitung.');
        return redirect()->to('/laporankomdat');
    }

    public function detaillaporankomdat($idlaporankomdat)
    {
        $data  = [
            'title' => 'Detail Data laporan',
            'laporankomdat' => $this->laporankomdatModel->getLaporan($idlaporankomdat),
            // 'validation' => \Config\Services::validation()
        ];

        return view('laporan/detaillaporankomdat', $data);
    }

    public function editlaporankomdat($idlaporankomdat)
    {
        $data  = [
            'laporankomdat' => $this->laporankomdatModel->getIdLaporan($idlaporankomdat),
            'title' => 'Edit Data laporan',
            'validation' => \Config\Services::validation()
        ];

        return view('laporan/editlaporankomdat', $data);
    }

    public function update($idlaporankomdat)
    {
        $data = [
            'idlaporan' => $idlaporankomdat,
            'tgl' => $this->request->getVar('tgl'),
            'kia1' => $this->request->getVar('kia1'),
            'kia2' => $this->request->getVar('kia2'),
            'gizi1' => $this->request->getVar('gizi1'),
            'gizi2' => $this->request->getVar('gizi2'),
            'imun1' => $this->request->getVar('imun1'),
            'imun2' => $this->request->getVar('imun2'),
            'kb1' => $this->request->getVar('kb1'),
            'kb2' => $this->request->getVar('kb2'),
            'status' => $this->request->getVar('status'),
        ];

        $idlaporankomdat = $this->request->getVar('idlaporan');
      
        session()->setFlashdata('pesan', 'Data laporan komdat berhasil diedit.');
        return redirect()->to('/laporankomdat');
    }

    public function hapuslaporankomdat($idlaporankomdat)
    {
        $this->laporankomdatModel->delete($idlaporankomdat);
        session()->setFlashdata('pesan', 'Data laporan komdat berhasil dihapus.');
        return redirect()->to('/laporankomdat');
    }

    public function pdf($idlaporankomdat)
    {
        // Mengambil data anak dari model
        // $data  = [
        //     'laporankomdat' => $this->laporankomdatModel->getLaporan($idlaporankomdat),
        //     'title' => 'Data Laporan Komdat',
        // ];

    // Mengambil data laporan komdat dari model berdasarkan ID
    $laporan = $this->laporankomdatModel->find($idlaporankomdat);

    // Cek apakah laporan ditemukan
    if ($laporan) {
        $data = [
            'laporan' => $laporan,
            'title' => 'Data Laporan Komdat',
        ];

        // $filename = 'Daftar Data Anak ('. date('d-m-y').')';
        $filename = 'Data Laporan Komdat ('. date('M-Y').')';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

         // Load HTML content
        $dompdf->loadHtml(view('laporan/pdfkomdat', $data));  

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
        
            // Mengirimkan PDF ke browser
            $dompdf->stream('Laporan Komdat.pdf', ['Attachment' => false]);
    } else {
            // Jika laporan tidak ditemukan, redirect atau tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Laporan Komdat tidak ditemukan.');
        }
    }
    
    public function pdfall()
    {
        // Mengambil data anak dari model
        $data  = [
            'laporankomdat' => $this->laporankomdatModel->getAllData(),
            'title' => 'Daftar Data Laporan Komdat',
        ];

        // $filename = 'Daftar Data Anak ('. date('d-m-y').')';
        $filename = 'Daftar Data Laporan Komdat'. date('Y');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Mengatur opsi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf dengan opsi yang telah ditentukan
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml(view('laporan/pdfkomdatall', $data));  

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, ['Attachment' => false]);
    }

}