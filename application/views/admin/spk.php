<div class="content">
    <h2 class="content-heading">SPK Penentuan Jurusan</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Form Penentuan</h3>
        </div>
        <?= form_open('Spk/index', ['class' => 'formsimpan'])?>
            <div class="pesan" style="display: none;"></div>
            <div class="modal-body">
                <?php if(isset($result)){ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <tr>
                               <td rowspan="4" class="text-center">
                                   <strong>Jurusan Disarankan</strong>
                                   <h1>
                                        <?php if($result['klasifikasi'][0]['prediksi'] == "MIPA"){ ?>   
                                        <i class="fa fa-flask"></i> MIPA
                                        <?php } else { ?>
                                        <i class="fa fa-university"></i> IPS
                                        <?php } ?>
                                    </h1>
                               </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php } ?>
                
                <div class="form-group row">
                    <label for="nobp" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="nis" id="nis" class="form-control" maxlength="10" value="<?= isset($input['nis']) ? $input['nis'] : '' ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nobp" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= isset($input['nama_siswa']) ? $input['nama_siswa'] : '' ?>">
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="nobp" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-6">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option selected disabled>-Pilih-</option>
                            <option value="L" <?= isset($input['jenkel']) ? ($input['jenkel'] == 'L' ? 'selected' : '') : '' ?> >Laki-Laki</option>
                            <option value="P" <?= isset($input['jenkel']) ? ($input['jenkel'] == 'P' ? 'selected' : '') : '' ?>>Perempuan</option>
                        </select>
                    </div>
                </div> -->

                <div class="row form-group">
                    <label for="nobp" class="col-sm-2 col-form-label">Nilai Rapor dan USBN</label>
                    <div class="col-sm-6">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Nilai Rapor</th>
                                <th>Nilai USBN</th>
                            </tr>
                            <tr>
                                <td>Bahasa Indonesia</td>
                                <td>
                                    <input type="number" name="rapor_ind" id="rapor_ind" class="form-control" min="0" max="100" value="<?= isset($input['rapor_ind']) ? $input['rapor_ind'] : '' ?>">
                                </td>
                                <td>
                                    <input type="number" name="usbn_ind" id="usbn_ind" class="form-control" min="0" max="100" value="<?= isset($input['usbn_ind']) ? $input['usbn_ind'] : '' ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Bahasa Inggris</td>
                                <td>
                                    <input type="number" name="rapor_ing" id="rapor_ing" class="form-control" min="0" max="100" value="<?= isset($input['rapor_ing']) ? $input['rapor_ing'] : '' ?>">
                                </td>
                                <td>
                                    <input type="number" name="usbn_ing" id="usbn_ing" class="form-control" min="0" max="100" value="<?= isset($input['usbn_ing']) ? $input['usbn_ing'] : '' ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Matematika</td>
                                <td>
                                    <input type="number" name="rapor_mtk" id="rapor_mtk" class="form-control" min="0" max="100" value="<?= isset($input['rapor_mtk']) ? $input['rapor_mtk'] : '' ?>">
                                </td>
                                <td>
                                    <input type="number" name="usbn_mtk" id="usbn_mtk" class="form-control" min="0" max="100" value="<?= isset($input['usbn_mtk']) ? $input['usbn_mtk'] : '' ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>IPA</td>
                                <td>
                                    <input type="number" name="rapor_ipa" id="rapor_ipa" class="form-control" min="0" max="100" value="<?= isset($input['rapor_ipa']) ? $input['rapor_ipa'] : '' ?>">
                                </td>
                                <td>
                                    <input type="number" name="usbn_ipa" id="usbn_ipa" class="form-control" min="0" max="100" value="<?= isset($input['usbn_ipa']) ? $input['usbn_ipa'] : '' ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>IPS</td>
                                <td>
                                    <input type="number" name="rapor_ips" id="rapor_ips" class="form-control" min="0" max="100" value="<?= isset($input['rapor_ips']) ? $input['rapor_ips'] : '' ?>">
                                </td>
                                <td>
                                    <input type="number" name="usbn_ips" id="usbn_ips" class="form-control" min="0" max="100" value="<?= isset($input['usbn_ips']) ? $input['usbn_ips'] : '' ?>">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nobp" class="col-sm-2 col-form-label">Minat</label>
                    <div class="col-sm-6">
                        <select name="minat" id="minat" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="MIPA" <?= isset($input['minat']) ? ($input['minat'] == 'MIPA' ? 'selected' : '') : '' ?>>MIPA</option>
                            <option value="IPS" <?= isset($input['minat']) ? ($input['minat'] == 'IPS' ? 'selected' : '') : '' ?>>IPS</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nobp" class="col-sm-2 col-form-label">Nilai IQ</label>
                    <div class="col-sm-4">
                        <input type="number" name="nilai_iq" id="nilai_iq" class="form-control" min="60" max="300" value="<?= isset($input['nilai_iq']) ? $input['nilai_iq'] : '' ?>">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="actname" value="calculate" class="btn btn-alt-success">
                    <i class="fa fa-check"></i> Mulai Klasifikasi
                </button>
                <?php if(isset($result)){ ?>
                <button type="submit" class="btn btn-alt-secondary" name="actname" value="savepdf">Simpan ke PDF</button>
                <button type="submit" class="btn btn-alt-secondary" name="actname" value="savelog">Simpan ke Riwayat</button>
                <?php } ?>
            </div>
        <?= form_close() ?>
    </div>
</div>