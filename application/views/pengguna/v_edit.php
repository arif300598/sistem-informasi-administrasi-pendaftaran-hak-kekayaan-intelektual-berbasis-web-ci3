<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <?= form_open('pengguna/edit?id=' . $get['id_user']); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $get['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            value="<?= $get['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="text" name="hp" id="hp" class="form-control" value="<?= $get['hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $get['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <?php if ($get['jk'] == 'L') : ?>
                            <option value="L" selected>Laki - Laki</option>
                            <option value="P">Perempuan</option>
                            <?php else : ?>
                            <option value="P" selected>Perempuan</option>
                            <option value="L">Laki - Laki</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="akses">Akses</label>
                        <select name="akses" id="akses" class="form-control">
                            <?php foreach ($akses as $aks) : ?>
                            <?php if ($get['akses'] == $aks->akses_id) : ?>
                            <option value="<?= $aks->akses_id; ?>" selected><?= $aks->akses; ?></option>
                            <?php else : ?>
                            <option value="<?= $aks->akses_id; ?>"><?= $aks->akses; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <a href="/siap"><button type="button" class="btn btn-danger"><i class="fa fa-undo"></i>
                                Kembali</button></a>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>