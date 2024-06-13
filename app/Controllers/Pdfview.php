<?php

namespace App\Controllers;
// require_once 'vendor/autoload.php';

// use Dompdf\Dompdf;
// use Dompdf\Options;

class Pdfview extends BaseController
{
    public function generatePDF()
    {
        // Mengatur opsi dompdf
        // $options = new Options();
        // $options->set('isRemoteEnabled', true);

        // Inisialisasi dompdf dengan opsi yang telah ditentukan
        // $dompdf = new Dompdf($options);

        // Konten HTML yang akan diubah menjadi PDF
        $html = '<html><body><h1>Hello, World!</h1></body></html>';

        // Memuat konten HTML ke dompdf
        // $dompdf->loadHtml($html);

        // Proses rendering dokumen HTML ke PDF
        // $dompdf->render();

        // Menghasilkan nama file PDF
        $filename = 'Laporan Cakupan Sasaran Posyandu.pdf';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        // Mengunduh file PDF
        // $dompdf->stream($filename, $paper, $orientation, ['Attachment' => true]);
    }
}

