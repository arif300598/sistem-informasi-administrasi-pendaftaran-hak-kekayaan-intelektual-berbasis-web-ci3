<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <th width="5%">No</th>
                                <th>Nama Pemohon</th>
                                <th>Email Pemohon</th>
                                <th>Nomor Telephone Pemohon</th>
                                <th>Hari/Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Jenis Permohonan</th>
                                <th>Jenis Sub Ciptaan</th>
                                <th>judul</th>
                                <th>KTP</th>
                                <th>Bukti Pengalihan</th>
                                <th>Data Pencipta</th>
                                <th>Contoh Ciptaan</th>
                                <th>Contoh Link</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                <th>
                            </thead>
                            <tfoot>
                                <th>No</th>
                                <th>Nama Pemohon</th>
                                <th>Email Pemohon</th>
                                <th>Nomor Telephone Pemohon</th>
                                <th>Hari/Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Jenis Permohonan</th>
                                <th>Jenis Sub Ciptaan</th>
                                <th>Judul</th>
                                <th>KTP</th>
                                <th>Bukti Pengalihan</th>
                                <th>Data Pencipta</th>
                                <th>Contoh Ciptaan</th>
                                <th>Contoh Link</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($surat as $srt) : ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>
                                    </td>

                                    <td>
                                        <?= $srt->nama_pemegang; ?>
                                    </td>

                                    <td>
                                        <?= $srt->email_pemegang; ?>
                                    </td>

                                    <td>
                                        <a href="https://api.whatsapp.com/send/?phone=<?= $srt->no_tlp_pemegang; ?>&text=Isi+Pesan&type=phone_number&app_absent=0"
                                            target="_blank">Chat
                                            Via WhatsApp</a>
                                    </td>

                                    <td>
                                        <?= $srt->hari_tanggal; ?>
                                    </td>

                                    <td>
                                        <?= $srt->deskripsi; ?>
                                    </td>

                                    <td>
                                        <?= $srt->nama_jenis_permohonan; ?>
                                    </td>

                                    <td>
                                        <?= $srt->nama_sub; ?>
                                    </td>

                                    <td>
                                        <?= $srt->judul; ?>
                                    </td>

                                    <td>
                                        <a href="<?=base_url('aset/'.$srt->ktp)?>"
                                            <?= ($srt->ktp) ? '': 'style="display:none"'?> target="_blank">Download</a>
                                    </td>

                                    <td>
                                        <a href="<?=base_url('aset/'.$srt->bukti_pengalihan)?>"
                                            <?= ($srt->bukti_pengalihan) ? '' : 'style="display:none;"'?>
                                            target="_blank">Download</a>
                                    </td>

                                    <td>
                                        <a href="<?=base_url('aset/'.$srt->data_pencipta)?>"
                                            <?= ($srt->data_pencipta) ? '' : 'style="display:none;"'?>
                                            target="_blank">Download</a>
                                    </td>

                                    <td>
                                        <a href="<?=base_url('aset/'.$srt->contoh_ciptaan)?>"
                                            <?= ($srt->contoh_ciptaan) ? '' : 'style="display:none;"'?>
                                            target="_blank">Download</a>
                                    </td>

                                    <td>
                                        <?= $srt->contoh_link; ?>
                                    </td>

                                    <?php if ($srt->status == 0) : ?>
                                    <td><span class="label label-warning">Belum disetujui</span></td>

                                    <?php elseif ($srt->status == 2) : ?>
                                    <td><span class="label label-danger">Dokumen Tidak Lengkap, Input ulang dan Lengkapi
                                            Dokumen Anda</span></td>

                                    <?php elseif($srt->status == 3 ) : ?>
                                    <td><span class="label label-warning">Dokumen Anda Sedang dalam Proses</span></td>

                                    <?php else : ?>
                                    <td><span class="label label-success">Sertifikat Telah Selesai</span></td>
                                    <?php endif; ?>


                                    <td>
                                        <a href="<?= base_url('surat/hapus?id=' . $srt->id_surat . '&nama_pemegang=' . $srt->nama_pemegang); ?>"
                                            class="label label-danger"><i class="fa fa-trash"></i> Hapus</a>

                                        <?php if ($srt->status == 0 && $user['akses'] == 1) : ?>
                                        <a href="<?= base_url('surat/setuju?id=' . $srt->id_surat); ?>"
                                            class="label label-success"
                                            onclick="return confirm('Yakin Ingin Menyetujui Surat Ini');"><i
                                                class="fa fa-check"></i> Setuju</a>


                                        <a href="<?= base_url('surat/tolak?id=' . $srt->id_surat); ?>"
                                            class="label label-danger"><i></i><i class="fa fa-close"></i>
                                            Dokumen Tidak Lengkap</a>

                                        <a href="<?= base_url('surat/dokumenProses?id=' . $srt->id_surat); ?>"
                                            class="label label-warning"><i></i><i class="fa fa-close"></i>
                                            Dokumen Sedang di Proses</a>


                                        <?php else :
                                            if($user['akses'] == 1) { ?>
                                        <a href="<?= base_url('surat/batal?id=' . $srt->id_surat); ?>"
                                            class="label label-warning"><i class="fa fa-undo"></i> Batal</a>
                                        <?php } ?>
                                        <?php if($user['akses'] == 1) { ?>
                                        <a href="<?= base_url('surat/setuju?id=' . $srt->id_surat); ?>"
                                            class="label label-success"><i class="fa fa-undo"></i> Setuju</a>
                                        <?php } ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>