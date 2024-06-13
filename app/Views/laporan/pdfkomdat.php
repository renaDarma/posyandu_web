<!DOCTYPE html>
<html  lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Data Laporan Komdat</title>
    <style type="text/css">
      body {
        font-family: arial;
        background-color: #fff;
      }
      .kop {
        width: 700px;
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
    </style>
  </head>
  <body>
    <div class="kop">
      <table width="100%">
            <tr>
                <td style="border:none" class="tengah">
                    <h3>CAKUPAN SASARAN POSYANDU SILIR</h3>
                    <h3>DATA KOMDAT TAHUN <?php echo date('Y'); ?></h3>
                </td>
            </tr>
        </table>
    </div>
    <div>
    <br>
    <h4 align="right">Kediri, <?= date('d - m - Y', strtotime($laporan['tgl'])) ?></h4><br>
      <div>
        <div class="data">
          <h4>1. KIA (KESEHATAN IBU DAN ANAK)</h4>
          <p>Cakupan Ibu hamil yang datang ke Posyandu/fasyankes mendapatkan KIA
            (Penimbangan BB/Ukur TB/Ukur LILA/KIE/Mengikuti kelas ibu hamil)
          </p>
          <h5 align="center">
            <b>
              <?= $laporan['kia1'] ?>   
            </b><b>/</b><?= $laporan['kia2'] ?><b> X 100% =</b> <?= $laporan['perkia'] ?><b>%</b>
          </h5></br>
          <h4>2. GIZI</h4>
          <p>Cakupan balita yang berusia 0-59 bulan yang ditimbang di posyandu/kunjungan
              rumah/mandiri/fasyankes
          </p>
          <h5 align="center">
            <b>
              <?= $laporan['gizi1'] ?>   
            </b><b>/</b><?= $laporan['gizi2'] ?><b> X 100% =</b> <?= $laporan['pergizi'] ?><b>%</b>
          </h5></br>
          <h4>3. IMUNISASI</h4>
          <p>Cakupan balita yang berusia 0-24 bulan yang mendapatkan layanan imunisasi dasar
            dan lanjutan di Posyandu/puskesma/fasyankes,dll
          </p>
          <h5 align="center">
            <b>
              <?= $laporan['imun1'] ?>   
            </b><b>/</b><?= $laporan['imun2'] ?><b> X 100% =</b> <?= $laporan['perimun'] ?><b>%</b>
          </h5></br>
          <h4>4. KB (Keluarga Berencana)</h4>
          <p>Setiap pasangan usia subur mendapatkan layanan KIE/layanan KB (baik datang ke
              posyandu, puskesmas, secara mandiri, dll)
          </p>
          <h5 align="center">
            <b>
              <?= $laporan['kb1'] ?>   
            </b><b>/</b><?= $laporan['kb2'] ?><b> X 100% =</b> <?= $laporan['perkb'] ?><b>%</b>
          </h5></br>
     
        </div>
      </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
  </body>
</html>
