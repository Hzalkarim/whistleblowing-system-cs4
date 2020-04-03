<div class="row">
    <div class="col"></div>
    <div class="col-sm-12 col-md-8 col-lg-6 bg-light mt-5 rounded">
        <div class="text-center my-4">
            <h4>Form Pendaftaran Akun Mahasiswa</h4>
        </div>
        <form class="mt-4">
            <div class="form-group">
                <label for="nama-lengkap">Nama Lengkap</label>
                <input type="email" name="nama" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="nama-lengkap">NIM</label>
                <input type="email" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select class="form-control" name="prodi">
                    <option value="bm">Bisnis Manajemen</option>
                    <option value="si">Sistem Informasi</option>
                    <option value="cs">Ilmu Komputer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat-email">Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group my-3">
                <label class="mr-5" for="jenis-kel">Jenis Kelamin</label>
                <div class="form-check-inline">
                    <label for="pria">
                        <input type="radio" name="jk" value="l"> Laki - Laki
                    </label>
                </div>
                <div class="form-check-inline">
                    <label for="wanita">
                        <input type="radio" name="jk" value="p"> Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Tinggal</label>
                <textarea name="alamat" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label for="no-telp">Nomor Telepon</label>
                <input type="number" name="no-telp" class="form-control" placeholder="Masukkan no Telepon">
            </div>
            <button type="submit" class="btn btn-primary mb-4">Registrasi</button>
            <button type="reset" class="btn btn-danger mb-4">Hapus</button>
        </form>
    </div>
    <div class="col"></div>
</div>
