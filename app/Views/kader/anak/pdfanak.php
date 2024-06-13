<!DOCTYPE html>
<html  lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Print Daftar Data Anak</title>
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
    <div class="kop">
      <table width="100%">
            <tr>
                <td style="border:none" class="tengah">
                    <h3>POS PELAYANAN TERPADU DESA SILIR</h3>
                    <h3>KABUPATEN KEDIRI</h3>
                    <h5>Jln. Maskumambang, Ds. Silir, Kec. Wates</h5>
                    <h5>Telp : 0812-5253-2437, Email : posyandusilir@gmail.com</h5>
                </td>
            </tr>
        </table>
    </div>
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
    <h5 align="center"><b>
        DAFTAR DATA ANAK
      </b></h5></br>
      <div class="isi">
        <div class="data">
          <table width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Anak</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <!-- <th>Nama tmpt lahir</th>
                    <th>Jenis Lahir</th> -->
                    <th>BB lahir</th>
                    <th>TB lahir</th>
                    <th>LK lahir</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($anak as $key => $value):?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $value->nik ?></td>
                      <td><?= $value->anaknama ?></td>
                      <td><?= $value->tmptlhr ?></td>
                      <td><?= $value->tgllhr ?></td>
                      <td><?= $value->jk ?></td>
                      <!-- <td><?= $value->namatmptlhr ?></td>
                      <td><?= $value->jeniskelahiran ?></td> -->
                      <td><?= $value->bblahir ?> kg</td>
                      <td><?= $value->tblahir ?> cm</td>
                      <td><?= $value->lklahir ?> cm</td>
                      <td><?= $value->ayahnama ?></td>
                      <td><?= $value->ibunama ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
        </div>
      <div class="keterangan">
        <br><br><br><br><br><br>
          <!-- <p>
            Catatan : <br>
            *    Coret uang tidak perlu <br>
            **   Pilih salah satu dengan tanda centang <br>
            ***  Diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti <br>
            **** Diberikan tanda centang dan alasanya <br>
            N    = Cuti tahun berjalan <br>
            N-1  = Sisa cuti 1 tahum sebelumnya <br>
            N-2  = Ssisa cuti 2 tahun sebelumnya <br>
          </p> -->
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
  </body>
</html>
