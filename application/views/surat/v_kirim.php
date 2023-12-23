<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>

                </div>


                <div class="box-body">
                    <div class="tabel-responsive">
                        <table class="table table-bordered table-hover" id="table"">
                    <div class=" box-body">
                            <?php echo form_open_multipart('surat/kirim')?>
                            <?= form_open('surat/kirim'); ?>

                            <div class="form-group">
                                <label for="jenis_permohonan">Jenis Permohonan</label>
                                <select name="nama_jenis_permohonan" class="form-control">
                                    <option value="">---Silahkan Isi---</option>
                                    <?php foreach ($data_jenis_permohonan as $key): ?>
                                    <option value="<?php echo $key -> nama_jenis_permohonan?>">
                                        <?php echo $key -> nama_jenis_permohonan?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Jenis Ciptaan</label>
                                <select class="form-control" name="nama_sub">
                                    <option value="">--- Pilih Jenis Sub Ciptaan ---</option>
                                    <?php foreach ($data_subCiptaan as $key): ?>
                                    <option value="<?php echo $key -> nama_sub ?>">
                                        <?php echo $key -> nama_sub ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" id="judul" class="form-control" name="judul"
                                    placeholder="masukkan judul" required>
                            </div>

                            <div class="form-group">
                                <label for="ht">Hari/Tanggal</label>
                                <input type="text" name="ht" id="ht" class="form-control"
                                    value="<?= date('d F Y', time()); ?>" readonly>
                            </div>

                            <input type="hidden" name="nama" id="nama" class="form-control"
                                value="<?= $user['nama']; ?>" readonly></input>


                            <div class="form-group">
                                <label for="deskripsi">Uraian Singkat Ciptaan</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                                    class="form-control"></textarea>
                                <?= form_error('deskripsi', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                            <script type="text/javascript"
                                src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
                            <script type="text/javascript"></script>


                            <div class="form-group" style="margin-top: 10px;">
                                <label class="btn bg-green">
                                    <h4>Data Pemohon</h4>
                                </label>
                                <h5>Data pemohon merupakan data diri dari pencipta/pemohon yang melakukan pendaftaran
                                </h5>
                            </div>

                            <div class="form-group">
                                <label>Nama Pemohon</label>
                                <input type="text" id="nama_pemegang" class="form-control" name="nama_pemegang"
                                    placeholder="masukkan nama">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" id="alamat_pemegang" class="form-control" name="alamat_pemegang"
                                    placeholder="masukkan alamat">
                            </div>

                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" id="provinsi_pemegang" class="form-control" name="provinsi_pemegang"
                                    placeholder="masukkan provinsi">
                            </div>

                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" id="kota_pemegang" class="form-control" name="kota_pemegang"
                                    placeholder="masukkan kota">
                            </div>

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" id="kecamatan" class="form-control" name="kecamatan"
                                    placeholder="masukkan kecamatan">
                            </div>

                            <div class="form-group">
                                <label>kode Pos</label>
                                <input type="text" id="kode_pos_pemegang" class="form-control" name="kode_pos_pemegang"
                                    placeholder="masukkan kode pos">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" id="email_pemegang" class="form-control" name="email_pemegang"
                                    placeholder="masukkan email">
                            </div>

                            <div class="form-group">
                                <label for="hp">Nomor WhatsApps Pencipta contoh 628xxxxxxxx</label>
                                <input type="number" name="no_tlp_pemegang" id="no_tlp_pemegang" class="form-control"
                                    autocomplete="off" value="62" required>
                            </div>



                            <div class="form-group">
                                <label class="btn bg-green" style="margin-top: 10px;">
                                    <h4>Lampiran</h4>
                                </label>
                            </div>

                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-right: 100px;">
                                            <label>Contoh Ciptaan</label>
                                            <input type="file" name="contoh_ciptaan" class="form-control">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group" style="margin-right: 100px;">
                                            <label>Data Pencipta format pdf</label>
                                            <input type="file" name="data_pencipta" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-right: 100px;">
                                            <label>Scan KTP pemohon format pdf</label>
                                            <input type="file" name="ktp" class="form-control">
                                        </div>
                                    </td>



                                    <td>
                                        <div class="form-group" style="margin-right: 100px;">
                                            <label>Surat Pengalihan Hak Cipta format pdf</label>
                                            <input type="file" name="bukti_pengalihan" class="form-control">
                                        </div>
                                    </td>



                                </tr>
                            </table>

                            <!-- <div class="form-group">
                                <label>Bukti Pembayaran Rp 200.000 format pdf</label>
                                <input type="file" name="bukti_pembayaran" class="form-control">
                            </div>-->

                            <div class="form-group">
                                <label>Contoh Ciptaan (Link)</label>
                                <input type="text" name="contoh_link" class="form-control" placeholder="URL">
                            </div>

                            <div class="form-group">
                                <h5>Silahkan download template untuk data pencipta, isi dan simpan sebagai pdf</h5>
                                <a href="<?php echo base_url("template/format.docx"); ?>">Download Format</a>
                            </div>

                            <div class="form-group">
                                <h5>Silahkan download template Surat Pengalihan Hak Cipta, isi dan simpan sebagai pdf
                                </h5>
                                <a href="<?php echo base_url("template/template_SPH.doc"); ?>">Download Format</a>
                            </div>

                            <div class="g-recaptcha" data-callback="recaptchaCallback"
                                data-sitekey="6Ld33nYjAAAAADlHyzBoBXlHS5V8viCL6RQ_HDQh">
                            </div>

                            <div class="form-group" style="margin-top: 10px;">

                                <button type="submit" id="submitBtn" class="btn btn-success" disabled><i
                                        class="fa fa-paper-plane"></i>
                                    Kirim</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i>
                                    Reset</button>
                            </div>

                            <?= form_close(); ?>
                    </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>