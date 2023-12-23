<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?= base_url('pengguna/tambah'); ?>" class="btn btn-success pull-right"><i
                    class="fa fa-user-plus"></i> Tambah</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="table">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Akses</th>
                                <th>Username</th>
                                <th>No.WhatsApps</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
                            </thead>
                            <tfoot>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Akses</th>
                                <th>Username</th>
                                <th>No.WhatsApps</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($getall_pengguna as $x) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $x->nama; ?></td>
                                    <?php if ($x->akses_id == '1') : ?>
                                    <td><i class="label label-success"><?= $x->akses; ?></i></td>
                                    <?php else : ?>
                                    <td><i class="label label-warning"><?= $x->akses; ?></i></td>
                                    <?php endif; ?>
                                    <td><?= $x->username; ?></td>
                                    <td><?= $x->hp; ?></td>
                                    <td><?= $x->email; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('pengguna/hapus?id=' . $x->id_user); ?>"
                                            class="label label-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        <a href="<?= base_url('pengguna/edit?id=' . $x->id_user); ?>"
                                            class="label label-success"><i class="fa fa-pen"></i> Edit</a>
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