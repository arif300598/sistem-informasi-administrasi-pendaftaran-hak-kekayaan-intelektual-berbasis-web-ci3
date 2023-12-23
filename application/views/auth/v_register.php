<div class="login-box">
    <div class="login-box-body">
        <h2>Pendaftaran Akun</h2>
        <form action="<?= base_url('Register/register')?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama">Nama Pengguna *</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nama">Email *</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="jk">Jenis Kelamin *</label>
                    <select name="jk" id="jk" class="form-control">
                        <option value="">-- Jenis Kelamin --</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <?= form_error('jk', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="hp">Nomor WhatsApps contoh 628xxxxxxxx</label>
                    <input type="number" name="hp" id="hp" class="form-control" autocomplete="off" value="62" required>
                    <?= form_error('hp', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" name="akses" id="akses" class="form-control" value="2" readonly>
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Tambah</button>
                    <a href="auth"><button type="button" class="btn btn-danger"><i class="fa fa-undo"></i>
                            Kembali</button></a>
                </div>
            </div>

        </form>
    </div>
</div>