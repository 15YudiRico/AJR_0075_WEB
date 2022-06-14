<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
    if(isset($_GET['id'])) {
        include '../db.php';
        
        $id_mobil=$_GET['id'];

        $query = mysqli_query($con, "SELECT * FROM aset_mobil WHERE id_mobil=$id_mobil") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query); 
    }
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT ASET MOBIL</h4>
        <hr>
        <form action="../process/editAsetMobilProcess.php" method="post">
        <input type="hidden" name="id_mobil"  value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Nama Mobil" value="<?php echo $data[3]; ?>" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                <input class="form-control" id="tipe_mobil" name="tipe_mobil" placeholder="Tipe Mobil" value="<?php echo $data[4]; ?>" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Warna Mobil</label>
                <input class="form-control" id="warna_mobil" name="warna_mobil" required placeholder="Warna Mobil" value="<?php echo $data[8]; ?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Plat Nomor Mobil</label>
                <input class="form-control" id="no_plat_mobil" name="no_plat_mobil" placeholder="Plat Nomor Mobil" value="<?php echo $data[2]; ?>" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor STNK Mobil</label>
                <input class="form-control" id="no_stnk_mobil" name="no_stnk_mobil" required value="<?php echo $data[14]; ?>" placeholder="Nomor STNK Mobil" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                <input class="form-control" id="jenis_transmisi" name="jenis_transmisi" value="<?php echo $data[5]; ?>" required placeholder="Jenis Transmisi" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                <input class="form-control" id="jenis_bahan_bakar" name="jenis_bahan_bakar" value="<?php echo $data[6]; ?>" required placeholder="Jenis Bahan Bakar" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                <input class="form-control" id="volume_bahan_bakar" name="volume_bahan_bakar" type="number" value="<?php echo $data[7]; ?>" required placeholder="Volume Bahan Bakar" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                <input class="form-control" id="volume_bagasi" name="volume_bagasi" type="number" value="<?php echo $data[17]; ?>" required placeholder="Volume Bagasi" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kapasitas Penumpang</label>
                <input class="form-control" id="kapasitas_penumpang" name="kapasitas_penumpang" type="number" value="<?php echo $data[9]; ?>" required placeholder="Kapasitas Penumpang" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fasilitas Mobil</label>
                <input class="form-control" id="fasilitas" name="fasilitas" required value="<?php echo $data[10]; ?>" placeholder="Fasilitas Mobil" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Terakhir Service</label>
                <input class="form-control" id="tgl_service_terakhir" type="date" name="tgl_service_terakhir" value="<?php echo $data[13]; ?>" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Gambar Mobil</label>
                <input class="form-control" id="foto_mobil" name="foto_mobil" placeholder="Link Gambar Mobil" value="<?php echo $data[19]; ?>" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <input class="form-control" id="harga_sewa_perhari" name="harga_sewa_perhari" value="<?php echo $data[16]; ?>" placeholder="Harga Sewa Perhari" required type="number" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Ketersediaan Mobil</label>
                    <div class="mb-3">
                        <input type="radio" id="status_ketersediaan_mobil" name="status_ketersediaan_mobil" value= "1" required 
                            <?php if($data[18] == 1){echo 'checked';}?> /> Tersedia &emsp;
                        <input type="radio" id="status_ketersediaan_ mobil" name="status_ketersediaan_mobil" value= "0" required
                            <?php if($data[18] == 0){echo 'checked';}?> /> Tidak Tersedia
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kategori Aset Mobil</label>
                    <div class="mb-3">
                        <input <?php if($data[15] == 1){echo 'checked';}?> onclick="document.getElementById('id_pemilik').hidden = false; document.getElementById('periode_kontrak_mulai').hidden = false; document.getElementById('periode_kontrak_selesai').hidden = false; document.getElementById('id_pemilik').required = true; document.getElementById('periode_kontrak_mulai').required = true; document.getElementById('periode_kontrak_selesai').required = true; document.getElementById('pemilik_aset').hidden = false; document.getElementById('periode_mulai').hidden = false; document.getElementById('periode_selesai').hidden = false;" type="radio" id="kategori_aset" name="kategori_aset" value= "1" required/> Aset Pemilik Mitra &emsp;
                        
                        <input <?php if($data[15] == 0){echo 'checked';}?> onclick="document.getElementById('id_pemilik').hidden = true; document.getElementById('periode_kontrak_mulai').hidden = true; document.getElementById('periode_kontrak_selesai').hidden = true; document.getElementById('id_pemilik').required = false; document.getElementById('periode_kontrak_mulai').required = false; document.getElementById('periode_kontrak_selesai').required = false; document.getElementById('pemilik_aset').hidden = true; document.getElementById('periode_mulai').hidden = true; document.getElementById('periode_selesai').hidden = true;" type="radio" id="kategori_aset" name="kategori_aset" value= "0" required/> Aset Perusahaan
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" id="pemilik_aset" <?php if($data[15] == 0){echo 'hidden';}?> >Pemilik Aset</label>
                <select class="form-select" aria-label="Default select example" name="id_pemilik" id="id_pemilik" <?php if($data[15] == 0){echo 'hidden';}?>>
                    <?php
                        include('../db.php');
                        //menampilkan data pemilik Aset
                        $query = mysqli_query($con, "SELECT * FROM data_pemilik") or die(mysqli_error($con));

                        $query2 = mysqli_query($con, "SELECT * FROM aset_mobil JOIN data_pemilik USING (id_pemilik) WHERE id_mobil = $id_mobil") or die(mysqli_error($con));
                        $data3 = mysqli_fetch_array($query2);

                        echo'<option value="'.$data3[0].'" selected hidden>'.$data3[0].". ".$data3[21]." - ".$data3[23].'</option>';

                        while($data2 = mysqli_fetch_array($query)){
                            echo"<option value=".$data2[0].">".$data2[0].". ".$data2[2]." - ".$data2[4]."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" id="periode_mulai" <?php if($data[15] == 0){echo 'hidden';}?> >Periode Mulai Kontrak</label>
                <input class="form-control" id="periode_kontrak_mulai" name="periode_kontrak_mulai" type="date" value="<?php echo $data[11]; ?>" <?php if($data[15] == 0){echo 'hidden';}?> aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" id="periode_selesai" <?php if($data[15] == 0){echo 'hidden';}?> >Periode Selesai Kontrak</label>
                <input class="form-control" id="periode_kontrak_selesai" name="periode_kontrak_selesai" type="date" value="<?php echo $data[12]; ?>" <?php if($data[15] == 0){echo 'hidden';}?> aria-describedby="emailHelp">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="edit" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Data Aset Mobil Ini?')">Edit Aset Mobil</button>
                <a href="./listAsetMobilAdministrasiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Edit Aset Mobil</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>