<?php
    include '../component/sidebarAdministrasi.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH PEGAWAI</h4>
        <hr>
        <form action="../process/createPegawaiProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Lengkap" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" name="id_jabatan" placeholder ="Pilih Jabatan" id="id_jabatan" requied>
                    <option value="" selected hidden>Pilih Jabatan</option>';
                    <option value="1">Manager</option>";
                    <option value="2">Administrasi</option>";
                    <option value="3">Customer Service</option>";
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat Lengkap</label>
                <input class="form-control" id="alamat_pegawai" name="alamat_pegawai" placeholder="Alamat" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir_pegawai" type="date" name="tanggal_lahir_pegawai" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                        <input type="radio" id="jenis_kelamin_pegawai" name="jenis_kelamin_pegawai" value= "1" required/> Pria &emsp;
                        <input type="radio" id="jenis_kelamin_pegawai" name="jenis_kelamin_pegawai" value= "0" required/> Wanita
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email_pegawai" name="email_pegawai" required placeholder="Email" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="no_telepon_pegawai" name="no_telepon_pegawai" required placeholder="Nomor Telepon" type="tel" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Foto Pegawai</label>
                <input class="form-control" id="foto_pegawai" name="foto_pegawai" placeholder="Link Foto" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="add">Tambah Pegawai</button>
                <a href="./listPegawaiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Tambah Pegawai</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>