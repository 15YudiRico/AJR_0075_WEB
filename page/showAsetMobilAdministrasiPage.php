<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
        include '../db.php';
        $id_mobil = $_GET['id']; 

        $cekAset = mysqli_query($con, "SELECT kategori_aset FROM aset_mobil WHERE id_mobil = $id_mobil") or die(mysqli_error($con));
        $fetchCekAset = mysqli_fetch_array($cekAset);

        if($fetchCekAset[0] == 0) {
            //kategori Aset = 0 adalah aset milik perusahaan
            $temp = mysqli_query($con, "SELECT * FROM aset_mobil WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con));
            $user = mysqli_fetch_array($temp);
        }else {
            //kategori Aset = 0 adalah aset milik mitra
            $temp = mysqli_query($con, "SELECT id_mobil, id_pemilik, no_plat_mobil, nama_mobil, tipe_mobil, jenis_transmisi, jenis_bahan_bakar, volume_bahan_bakar, warna_mobil, kapasitas_penumpang, fasilitas, periode_kontrak_mulai, periode_kontrak_selesai, tgl_service_terakhir, no_stnk_mobil, kategori_aset, harga_sewa_perhari, volume_bagasi, status_ketersediaan_mobil, foto_mobil, nama_pemilik, no_telepon_pemilik FROM aset_mobil JOIN data_pemilik USING (id_pemilik) WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con));
            $user = mysqli_fetch_array($temp);
        }
        
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
<h4>SHOW ASET MOBIL</h4>
<hr>
    <form>
        <div class="form-control mb-3">
                <div class="mb-3">
                    <label class="labels">ID Mobil :</label>&nbsp;
                    <input class="form-control" disabled value="<?php echo $user[0]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Nama Mobil :</label>
                    <input class="form-control" disabled value="<?php echo $user[3]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Tipe Mobil :</label>
                    <input class="form-control" disabled value="<?php echo $user[4]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Plat Nomor Mobil :</label>
                    <input class="form-control" disabled value="<?php echo $user[2]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Jenis Transmisi :</label>
                    <input class="form-control" disabled value="<?php echo $user[5]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Jenis Bahan Bakar :</label>
                    <input class="form-control" disabled value="<?php echo $user[6]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Volume Bahan Bakar :</label>
                    <input class="form-control" disabled value="<?php echo $user[7]; ?> liter">
                </div>
                <div class="mb-3">
                    <label class="labels">Warna Mobil:</label>
                    <input class="form-control" disabled value="<?php echo $user[8]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Kapasitas Penumpang :</label>
                    <input class="form-control" disabled value="<?php echo $user[9]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Fasilitas :</label>
                    <input class="form-control" disabled value="<?php echo $user[10]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Tanggal Service Terakhir :</label>
                    <input class="form-control" disabled value="<?php echo $user[13]; ?>">
                </div> 
                <div class="mb-3">
                    <label class="labels">Nomor STNK Mobil :</label>
                    <input class="form-control" disabled value="<?php echo $user[14]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Kategori Aset :</label>
                    <input class="form-control" disabled value="<?php if($user[15]==0) {echo 'Aset Perusahaan';} else{ echo 'Aset Pemilik Mitra';}?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Harga Sewa :</label>
                    <input class="form-control" disabled value="<?php echo 'Rp', $user[16], ',00/Hari';?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Volume Bagasi :</label>
                    <input class="form-control" disabled value="<?php echo $user[17];?> mm">
                </div>
                <div class="mb-3">
                    <label class="labels">Status Ketersedian Mobil :</label>
                    <input class="form-control" disabled value=" <?php if($user[18]==0){echo 'Tidak Tersedia';} else{ echo 'Tersedia';}?>"> 
                </div>
                <div class="mb-3">
                    <label class="labels">Link Foto Mobil :</label>
                    <input class="form-control" disabled value="<?php if($user[19]==0){echo '-';}else{ echo $user[19];}?>"> 
                </div>
                <?php 
                    if($fetchCekAset[0] == 1) {
                        echo 
                            '<div class="mb-3">
                                <label class="labels">Tanggal Mulai Kontrak:&nbsp;</label>
                                <input class="form-control" disabled value="'.$user[11].'">
                            </div>';
                        echo 
                            '<div class="mb-3">
                                <label class="labels">Tanggal Selesai Kontrak:&nbsp;</label>
                                <input class="form-control" disabled value="'.$user[12].'">
                            </div>';
                        echo 
                            '<div class="mb-3">
                                <label class="labels">Nama Pemilik Aset:&nbsp;</label>
                                <input class="form-control" disabled value="'.$user[20].'">
                            </div>';
                        echo 
                            '<div class="mb-3">
                                <label class="labels">Nomor Telepon Pemilik Aset:&nbsp;</label>
                                <input class="form-control" disabled value="'.$user[21].'">
                            </div>';
                    }
                ?>
        </div> 
            <div class="mt-4 text-center">
                <a href="./listAsetMobilAdministrasiPage.php" class="btn btn-primary" role="button" aria-disabled="true">Back</a>
            </div>
    </form>
</div>
</aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>