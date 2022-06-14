<?php
    include '../component/sidebarCustomer.php'
?>

<?php
        include '../db.php';
        $id_mobil = $_GET['id_mobil'];
        $stats = $_GET['stats'];
        $selisih_waktu_sewa = $_GET['selisih_waktu_sewa'];

        $temp = mysqli_query($con, "SELECT nama_mobil, tipe_mobil, jenis_transmisi, jenis_bahan_bakar, volume_bahan_bakar, warna_mobil, kapasitas_penumpang, fasilitas, tgl_service_terakhir, harga_sewa_perhari, volume_bagasi, foto_mobil FROM aset_mobil WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp);
        
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
<h4>SHOW DATA LENGKAP MOBIL</h4>
<hr>
    <form>
        <div class="form-control mb-3">
                <div class="mb-3">
                    <label class="labels">Nama Mobil :</label>
                    <input class="form-control" disabled value="<?php echo $user[0]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Tipe Mobil :</label>
                    <input class="form-control" disabled value="<?php echo $user[1]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Jenis Transmisi :</label>
                    <input class="form-control" disabled value="<?php echo $user[2]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Jenis Bahan Bakar :</label>
                    <input class="form-control" disabled value="<?php echo $user[3]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Volume Bahan Bakar :</label>
                    <input class="form-control" disabled value="<?php echo $user[4]; ?> liter">
                </div>
                <div class="mb-3">
                    <label class="labels">Warna Mobil:</label>
                    <input class="form-control" disabled value="<?php echo $user[5]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Kapasitas Penumpang :</label>
                    <input class="form-control" disabled value="<?php echo $user[6]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Fasilitas :</label>
                    <input class="form-control" disabled value="<?php echo $user[7]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Tanggal Service Terakhir :</label>
                    <input class="form-control" disabled value="<?php echo $user[8]; ?>">
                </div> 
                <div class="mb-3">
                    <label class="labels">Harga Sewa :</label>
                    <input class="form-control" disabled value="<?php echo 'Rp', $user[9], ',00/Hari';?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Volume Bagasi :</label>
                    <input class="form-control" disabled value="<?php echo $user[10];?> mm">
                </div>
                <div class="mb-3">
                    <label class="labels">Link Foto Mobil :</label>
                    <input class="form-control" disabled value="<?php if($user[11]==0){echo '-';}else{ echo $user[11];}?>"> 
                </div>
        </div> 
            <div class="mt-4 text-center">
                <a href="./listAsetMobilCustomerPage.php?stats=<?php echo $stats; ?>&selisih_waktu_sewa=<?php echo $selisih_waktu_sewa; ?>" class="btn btn-primary" role="button" aria-disabled="true">Back</a>
            </div>
    </form>
</div>
</aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>