<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
    if(isset($_GET['id']) && isset($_GET['id_login'])) {
        include '../db.php';
        
        $id_pegawai=$_GET['id'];
        $id_login=$_GET['id_login'];

        $query = mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai=$id_pegawai") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query); 
    }
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT PEGAWAI</h4>
        <hr>
        <form action="../process/editPegawaiProcess.php" method="post">
        <input type="hidden" name="id_login"  value="<?php echo $id_login; ?>">
        <input type="hidden" name="id_pegawai"  value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Lengkap" required aria-describedby="emailHelp" value="<?php echo $data[2]; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" name="id_jabatan" placeholder ="Pilih Jabatan" id="id_jabatan" requied>
                    <option value="" disabled hidden <?php if($data[1] == NULL) {echo 'selected';} ?> >Pilih Jabatan</option>';
                    <option value="1" <?php if($data[1] == 1) {echo 'selected';} ?> >Manager</option>";
                    <option value="2" <?php if($data[1] == 2) {echo 'selected';} ?>>Administrasi</option>";
                    <option value="3" <?php if($data[1] == 3) {echo 'selected';} ?>>Customer Service</option>";
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat Lengkap</label>
                <input class="form-control" id="alamat_pegawai" name="alamat_pegawai" value="<?php echo $data[3]; ?>" placeholder="Alamat" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir_pegawai" type="date" name="tanggal_lahir_pegawai" value="<?php echo $data[4]; ?>" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                        <input type="radio" id="jenis_kelamin_pegawai" name="jenis_kelamin_pegawai" value= "1" required <?php if($data[7] == 1){echo 'checked';}?>/> Pria &emsp;
                        <input type="radio" id="jenis_kelamin_pegawai" name="jenis_kelamin_pegawai" value= "0" required <?php if($data[7] == 0){echo 'checked';}?>/> Wanita
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="no_telepon_pegawai" name="no_telepon_pegawai" required value="<?php echo $data[6]; ?>"placeholder="Nomor Telepon" type="tel" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Foto Pegawai</label>
                <input class="form-control" id="foto_pegawai" name="foto_pegawai" value="<?php echo $data[8]; ?>" placeholder="Link Foto" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email_pegawai" name="email_pegawai" required value="<?php echo $data[5]; ?>" placeholder="Email" aria-describedby="emailHelp">
            </div>

            <div class="col-md-12">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" required name="pass_pegawai" placeholder="Password" value="">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="edit" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Pegawai Ini?')">Edit Pegawai</button>
                <a href="./listPegawaiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Edit Pegawai</a>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>