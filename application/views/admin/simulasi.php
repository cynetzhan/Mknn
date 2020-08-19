<link rel="stylesheet" href="<?= base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/rowReorder.dataTables.min.css">

<!-- Page JS Plugins -->
<script src="<?= base_url() ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/js/pages/be_tables_datatables.min.js"></script>

<div class="content">
        <h2 class="content-heading">Simulasi MKNN</h2>

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Parameter Simulasi</h3>
            </div>
            <?= form_open('Simulasi/index', ['class' => 'formsimulasi'])?>
            <div class="block-content block-content-full">
                <div class="form-group row">
                    <label for="nobp" class="col-sm-2 col-form-label">Nilai K</label>
                    <div class="col">
                        <input type="text" name="nilai_k" id="nilai_k" class="form-control" maxlength="2" value="<?= $nilai_k ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-play"></i> Mulai Simulasi
                    </button>
                </div>
            </div>
            <?= form_close() ?>

            <div class="block-header block-header-default">
                <h3 class="block-title">Hasil Simulasi</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-default">
                    <tr class="text-center">
                        <th>Akurasi</th>
                        <th>Jumlah Data Training</th>
                        <th>Jumlah Data Testing</th>
                        <th>Jumlah Terklasifikasi Benar</th>
                        <th>Jumlah Terklasifikasi Salah</th>
                    </tr>
                    <?php if($hasil == null){ ?>
                        <tr class="text-center display-4">
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    <?php } else { ?>
                        <tr class="text-center display-4">
                            <td><?= number_format($hasil['score'] * 100, 2) ?>%</td>
                            <td><?= $hasil['total_training'] ?></td>
                            <td><?= count($hasil['testing']) ?></td>
                            <td><?= $hasil['confmat'][0][0] + $hasil['confmat'][1][1] ?></td>
                            <td><?= $hasil['confmat'][0][1] + $hasil['confmat'][1][0] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-responsive table-hover display nowrap" style="width:100%" id="datatesting">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Rapor IND</th>
                            <th>USBN IND</th>
                            <th>Rapor ING</th>
                            <th>USBN ING</th>
                            <th>Rapor MTK</th>
                            <th>USBN MTK</th>
                            <th>Rapor IPA</th>
                            <th>USBN IPA</th>
                            <th>Minat</th>
                            <th>Nilai IQ</th>
                            <th>Kelas</th>
                            <th>Prediksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php if($hasil == null){ ?>
                        <tr class="text-center">
                            <td colspan="16">Tidak Ada Data</td>
                        </tr>
                       <?php } else { ?>
                        <?php foreach($hasil['testing'] as $x=>$row){ ?>
                            <tr>
                                <td><?= $row['id_test'] ?></td>
                                <td><?= $row['nis'] ?></td>
                                <td><?= $row['nama_siswa'] ?></td>
                                <td><?= $row['jenkel'] ?></td>
                                <td><?= $row['rapor_ind'] ?></td>
                                <td><?= $row['usbn_ind'] ?></td>
                                <td><?= $row['rapor_ing'] ?></td>
                                <td><?= $row['usbn_ing'] ?></td>
                                <td><?= $row['rapor_mtk'] ?></td>
                                <td><?= $row['usbn_mtk'] ?></td>
                                <td><?= $row['rapor_ipa'] ?></td>
                                <td><?= $row['usbn_ipa'] ?></td>
                                <td><?= $row['minat'] ?></td>
                                <td><?= $row['nilai_iq'] ?></td>
                                <td><?= $hasil['klasifikasi'][$x]['kelas'] ?></td>
                                <td class="<?= ($hasil['klasifikasi'][$x]['kelas'] == $hasil['klasifikasi'][$x]['prediksi']) ? "bg-success" : "bg-danger" ?>">
                                    <?= $hasil['klasifikasi'][$x]['prediksi'] ?>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatesting').DataTable({
            responsive: true
        });
    });
</script>