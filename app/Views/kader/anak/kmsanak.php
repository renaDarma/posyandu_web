<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Anak</h3>
            </div>
        </div>

        <div class="clearfix">

        </div>

        <script>
            var data_bb = [];
            var bb = [];
            var lebih = [4.0, 5.2, 6.4, 7.3, 7.9, 8.5, 8.9];
            var normal = [3.0, 4.0, 5.0, 6.0, 7.0, 8.0, 8.9];
            var kurang = [2.4, 3.3, 4.2, 4.9, 5.5, 5.9, 6.3];
        </script>
        <?php for ($i = 0; $i < count($detail); $i++) { ?>
            <script>
                bb.push(<?= $detail[$i]->bb; ?>);
                var newData = {
                    y: "Bulan ke "+<?= ($i+1) ?>,
                    a: lebih[<?= $i ?>],
                    b: normal[<?= $i ?>],
                    c: kurang[<?= $i ?>],
                    d: <?= $detail[$i]->bb; ?>
                };
                data_bb.push(newData);
            </script>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body" style="text-align: center;">

                        <h3 class="mt-0 header-title">Kartu Menuju Sehat</h3>
                        <p class="text-muted m-b-30 font-14 d-inline-block text-truncate w-100">
                            Timbanglah Anak Anda Setiap Bulan <br> Anak Sehat, Tambah Umur, Tambah Berat, Tambah Pandai
                        </p>

                        <div id="morris-line-example" style="height: 300px"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php if (session()->get('role') == 'kader'): ?>
                <a href="/dataanak" class="btn btn-primary">Kembali</a>
            <?php endif; ?>
            <?php if (session()->get('role') == 'admin'): ?>
                <a href="/anakdata" class="btn btn-primary">Kembali</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>