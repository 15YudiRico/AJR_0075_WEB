<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
    if(isset($_GET['id'])) {
        include '../db.php';
        
        $id_driver=$_GET['id'];

        $query = mysqli_query($con, "SELECT * FROM driver WHERE id_driver=$id_driver") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query); 
    }
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT DRIVER</h4>
        <hr>
        <form action="../process/editDriverProcess.php" method="post">
        <input type="hidden" name="id_driver"  value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input class="form-control" id="nama_driver" name="nama_driver" value="<?php echo $data[2]; ?>" placeholder="Nama Lengkap" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat Lengkap</label>
                <input class="form-control" id="alamat_driver" name="alamat_driver" value="<?php echo $data[3]; ?>" placeholder="Alamat" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir_driver" type="date" name="tanggal_lahir_driver" value="<?php echo $data[4]; ?>" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                        <input type="radio" id="jenis_kelamin_driver" name="jenis_kelamin_driver" value= "1" required <?php if($data[5] == 1){echo 'checked';}?>/> Pria &emsp;
                        <input type="radio" id="jenis_kelamin_driver" name="jenis_kelamin_driver" value= "0" required <?php if($data[5] == 0){echo 'checked';}?>/> Wanita
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email_driver" name="email_driver" value="<?php echo $data[6]; ?>" required placeholder="Email" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="no_telp_driver" name="no_telp_driver" value="<?php echo $data[7]; ?>" required placeholder="Nomor Telepon" type="tel" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bahasa</label>
                    <div class="mb-3">
                        <input type="radio" id="bahasa" name="bahasa" value= "1" required <?php if($data[5] == 1){echo 'checked';}?>/> Bahasa Indonesia & Bahasa Inggris &emsp;
                        <input type="radio" id="bahasa" name="bahasa" value= "0" required <?php if($data[5] == 0){echo 'checked';}?>/> Bahasa Indonesia
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <input class="form-control" id="harga_sewa_perhari" name="harga_sewa_perhari" value="<?php echo $data[16]; ?>" placeholder="Harga Sewa Perhari" required type="number" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Foto Pegawai</label>
                <input class="form-control" id="foto_driver" name="foto_driver" value="<?php echo $data[18]; ?>" placeholder="Link Foto" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link SIM Driver</label>
                <input class="form-control" id="sim_driver" name="sim_driver" value="<?php echo $data[9]; ?>" placeholder="Link Foto SIM Driver" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Surat Bebas Napza</label>
                <input class="form-control" id="surat_bebas_napza" name="surat_bebas_napza" value="<?php echo $data[10]; ?>" placeholder="Link Foto Surat Bebas Napza" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Surat Kesehatan Jiwa</label>
                <input class="form-control" id="surat_kesehatan_jiwa" name="surat_kesehatan_jiwa" value="<?php echo $data[11]; ?>" placeholder="Link Foto Kesehatan Jiwa" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Surat Kesehatan Jasmani</label>
                <input class="form-control" id="surat_kesehatan_jasmani" name="surat_kesehatan_jasmani" value="<?php echo $data[12]; ?>" placeholder="Link Foto Kesehatan Jasmani" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link SKCK</label>
                <input class="form-control" id="skck" name="skck" value="<?php echo $data[13]; ?>" placeholder="Link Foto SKCK" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Ketersediaan Driver</label>
                    <div class="mb-3">
                        <input type="radio" id="status_ketersediaan_driver" name="status_ketersediaan_driver" value= "1" required 
                            <?php if($data[14] == 1){echo 'checked';}?>/> Tersedia &emsp;
                        <input type="radio" id="status_ketersediaan_driver" name="status_ketersediaan_driver" value= "0" required
                            <?php if($data[14] == 0){echo 'checked';}?>/> Tidak Tersedia
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input class="form-control" id="pass_driver" name="pass_driver" value="" placeholder="Password" required type="password" aria-describedby="emailHelp">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="edit" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Driver Ini?')">Edit Driver</button>
                <a href="./listDriverAdministrasiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Edit Driver</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>