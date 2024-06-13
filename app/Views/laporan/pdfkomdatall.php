<!DOCTYPE html>
<html  lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Rekap Data Laporan Komdat</title>
    <style type="text/css">
      body {
        font-family: arial;
        background-color: #fff;
      }
      .kop {
        width: 1000px;
        margin: 0 auto;
        padding: 10px;
        border-bottom: 4px solid #000;
        padding: 2px;
      }
      .logo {
        padding-left: 30px;
      }
      .tengah {
        text-align: center;
        line-height: 5px;
      }
      .isi {
        width: 1000px;
        margin: 0 auto;
        padding: 10px;
        padding: 2px;
      }
      th,
      td {
        border: 1px solid #666;
        text-align: center;
      }
    </style>
  </head>
  <body>
  <p>Filter Laporan Periode: <?= $tanggalawal ?> sampai <?= $tanggalakhir ?><p>
    <div class="kop">
      <table width="100%">
            <tr>
                <td style="border:none" class="tengah">
                    <h3>CAKUPAN SASARAN POSYANDU SILIR</h3>
                    <h3>REKAP DATA KOMDAT PADA TAHUN <?php echo date('Y'); ?></h3>
                    <h5>Jln. Maskumambang, Ds. Silir, Kec. Wates</h5>
                    <h5>Telp : 0819-1116-2972, Email : posyandusilir@gmail.com</h5>
                </td>
            </tr>
        </table>
    </div>
    <div>
      <div class="isi">
      <?php
    function tgl_indo($tanggal){
	$bulan = array (
		1 =>'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
	    );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }      
    ?>
   
    <p align="right">Kediri, <?php echo tgl_indo(date('Y-m-d')); ?></p>
    <h5 align="center">
        DAFTAR DATA LAPORAN KOMDAT
    </h5></br>
        <div class="data">
          <table  width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>KIA (pos)</th>
                <th>KIA (desa)</th>
                <th>GIZI (pos)</th>
                <th>GIZI (desa)</th>
                <th>IMUNISASI (pos)</th>
                <th>IMUNISASI (desa)</th>
                <th>KB (pos)</th>
                <th>KB (desa)</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($laporankomdat)): ?>
              <tr>
                <td colspan="9">Data laporan komdat kosong</td>
              </tr>
            <?php else: ?>
              <?php foreach ($laporankomdat as $key => $value):?>
                <tr>
                  <td><?= $key+1 ?></td>
                  <td><?= $value['kia1'] ?></td>
                  <td><?= $value['kia2'] ?></td>
                  <td><?= $value['gizi1'] ?></td>
                  <td><?= $value['gizi2'] ?></td>
                  <td><?= $value['imun1'] ?></td>
                  <td><?= $value['imun2'] ?></td>
                  <td><?= $value['kb1'] ?></td>
                  <td><?= $value['kb2'] ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
  </body>
</html>
