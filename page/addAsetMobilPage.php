<?php
    include '../component/sidebarAdministrasi.php'
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH ASET MOBIL</h4>
        <hr>
        <form action="../process/createAsetMobilProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Nama Mobil" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                <input class="form-control" id="tipe_mobil" name="tipe_mobil" placeholder="Tipe Mobil" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Warna Mobil</label>
                <input class="form-control" id="warna_mobil" name="warna_mobil" required placeholder="Warna Mobil" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Plat Nomor Mobil</label>
                <input class="form-control" id="no_plat_mobil" name="no_plat_mobil" placeholder="Plat Nomor Mobil" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor STNK Mobil</label>
                <input class="form-control" id="no_stnk_mobil" name="no_stnk_mobil" required placeholder="Nomor STNK Mobil" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                <input class="form-control" id="jenis_transmisi" name="jenis_transmisi" required placeholder="Jenis Transmisi" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                <input class="form-control" id="jenis_bahan_bakar" name="jenis_bahan_bakar" required placeholder="Jenis Bahan Bakar" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                <input class="form-control" id="volume_bahan_bakar" name="volume_bahan_bakar" type="number" required placeholder="Volume Bahan Bakar" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                <input class="form-control" id="volume_bagasi" name="volume_bagasi" type="number" required placeholder="Volume Bagasi" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kapasitas Penumpang</label>
                <input class="form-control" id="kapasitas_penumpang" name="kapasitas_penumpang" type="number" required placeholder="Kapasitas Penumpang" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fasilitas Mobil</label>
                <input class="form-control" id="fasilitas" name="fasilitas" required placeholder="Fasilitas Mobil" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Terakhir Service</label>
                <input class="form-control" id="tgl_service_terakhir" type="date" name="tgl_service_terakhir" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Gambar Mobil</label>
                <input class="form-control" id="foto_mobil" name="foto_mobil" placeholder="Link Gambar Mobil" type="url" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <input class="form-control" id="harga_sewa_perhari" name="harga_sewa_perhari" placeholder="Harga Sewa Perhari" required type="number" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kategori Aset Mobil</label>
                    <div class="mb-3">
                        <input onclick="document.getElementById('id_pemilik').hidden = false; document.getElementById('periode_kontrak_mulai').hidden = false; document.getElementById('periode_kontrak_selesai').hidden = false; document.getElementById('id_pemilik').required = true; document.getElementById('periode_kontrak_mulai').required = true; document.getElementById('periode_kontrak_selesai').required = true; document.getElementById('pemilik_aset').hidden = false; document.getElementById('periode_mulai').hidden = false; document.getElementById('periode_selesai').hidden = false;" type="radio" id="kategori_aset" name="kategori_aset" value= "1" required/> Aset Pemilik Mitra &emsp;
                        
                        <input checked onclick="document.getElementById('id_pemilik').hidden = true; document.getElementById('periode_kontrak_mulai').hidden = true; document.getElementById('periode_kontrak_selesai').hidden = true; document.getElementById('id_pemilik').required = false; document.getElementById('periode_kontrak_mulai').required = false; document.getElementById('periode_kontrak_selesai').required = false; document.getElementById('pemilik_aset').hidden = true; document.getElementById('periode_mulai').hidden = true; document.getElementById('periode_selesai').hidden = true;" type="radio" id="kategori_aset" name="kategori_aset" value= "0" required/> Aset Perusahaan
                    </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" id="pemilik_aset" hidden>Pemilik Aset</label>
                <select class="form-select" aria-label="Default select example" name="id_pemilik" id="id_pemilik" hidden>
                    <?php
                        include('../db.php');
                        $query = mysqli_query($con, "SELECT * FROM data_pemilik") or die(mysqli_error($con));
                        echo'<option value="" selected hidden>Pilik Data Mitra</option>';
                        while($query2 = mysqli_fetch_array($query)){
                            echo"<option value=".$query2[0].">".$query2[0].". ".$query2[2]." - ".$query2[4]."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" id="periode_mulai" hidden>Periode Mulai Kontrak</label>
                <input class="form-control" id="periode_kontrak_mulai" name="periode_kontrak_mulai" type="date" hidden aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" id="periode_selesai" hidden>Periode Selesai Kontrak</label>
                <input class="form-control" id="periode_kontrak_selesai" name="periode_kontrak_selesai" type="date" hidden aria-describedby="emailHelp">
            </div>

            <div class="mt-5 gap-2 text-center">
                <button type="submit" class="btn btn-success" name="add">Tambah Aset Mobil</button>
                <a href="./listAsetMobilAdministrasiPage.php" class="btn btn-danger" role="button" aria-disabled="true">Batal Tambah Aset Mobil</a>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>