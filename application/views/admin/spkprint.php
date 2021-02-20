<html>
<style>
  #nilaitable, #nilaitable tr, #nilaitable th {
    border: 1px solid #aaa;
  }
  table{
    width: 100%;
  }
  th{
    text-align: left;
  }
  .pelajaran{
    width: 30%
  }
</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <table style="width: 100%">
          <tr>
            <td>Nama Siswa <br>
              <strong><?= $input['nama_siswa'] ?></strong>
            </td>
            <td rowspan="4" style="text-align: center">
              <strong>Jurusan Disarankan</strong><br>
                <?php if ($result['klasifikasi'][0]['prediksi'] == "MIPA") { ?>
                  <img src="<?= base_url('assets/media/MIPA.PNG') ?>" alt="">
                <?php } else { ?>
                  <img src="<?= base_url('assets/media/IPS.PNG') ?>" alt="">
                <?php } ?>
            </td>
          </tr>
          <tr>
            <td>
              NIS <br>
              <strong><?= $input['nis'] ?></strong>
            </td>
          </tr>
          <tr>
            <td>
              Minat <br>
              <strong><?= $input['minat'] ?></strong>
            </td>
          </tr>
          <tr>
            <td>
              IQ <br>
              <strong><?= $input['nilai_iq'] ?></strong>
            </td>
          </tr>
        </table>
        <table id="nilaitable">
          <tbody>
            <tr>
              <th class="pelajaran">Pelajaran</th>
              <th>Nilai Rapor</th>
              <th>Nilai USBN</th>
            </tr>
            <tr>
              <td>Bahasa Indonesia</td>
              <td><?= $input['rapor_ind'] ?></td>
              <td><?= $input['usbn_ind'] ?></td>
            </tr>
            <tr>
              <td>Bahasa Inggris</td>
              <td><?= $input['rapor_ing'] ?></td>
              <td><?= $input['usbn_ing'] ?></td>
            </tr>
            <tr>
              <td>Matematika</td>
              <td><?= $input['rapor_mtk'] ?></td>
              <td><?= $input['usbn_mtk'] ?></td>
            </tr>
            <tr>
              <td>IPA</td>
              <td><?= $input['rapor_ipa'] ?></td>
              <td><?= $input['usbn_ipa'] ?></td>
            </tr>
            <tr>
              <td>IPS</td>
              <td><?= $input['rapor_ips'] ?></td>
              <td><?= $input['usbn_ips'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>