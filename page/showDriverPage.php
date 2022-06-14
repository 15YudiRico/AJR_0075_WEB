<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
        include '../db.php';
        $id_driver = $_GET['id']; 
        $temp = mysqli_query($con, "SELECT * FROM driver WHERE id_driver ='$id_driver'") or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp);
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
<h4>SHOW DRIVER</h4>
<hr>
    <form>
        <div class="form-control mb-3">
            <div class="mb-3">
                <label class="labels">ID Driver :</label>
                <input class="form-control" disabled value="<?php echo $user[1], $user[0]; ?>">
            </div>
            <div class="mb-3">
                <label class="labels">Nama Lengkap :</label>
                <input class="form-control" disabled value="<?php echo $user[2]; ?>">
            </div>
            <div class="mb-3">
                <label class="labels">Alamat :</label>
                <input class="form-control" disabled value="<?php echo $user[3]; ?>">
            </div>
            <div class="mb-3">
                <label class="labels">Tanggal Lahir :</label>
                <input class="form-control" disabled value="<?php echo $user[4]; ?>">
            </div>
            <div class="mb-3">
                <label class="labels">Jenis Kelamin :</label>
                <input class="form-control" disabled value="<?php if($user[5]==0) {echo 'Wanita';}else{echo 'Pria';}?>">
            </div>
            <div class="mb-3"><label class="labels">Email :</label>
            <input class="form-control" disabled value="<?php echo $user[6]; ?>">
            </div>
            <div class="mb-3">
                <label class="labels">Nomor Telepon:</label>
                <input class="form-control" disabled value="<?php echo $user[7]; ?>">
            </div>
            <div class="mb-3">
                <label class="labels">Bahasa :</label>
                <input class="form-control" disabled value="<?php if($user[8]==0) {echo 'Bahasa Indonesia';}else{echo 'Bahasa Indonesia + Bahasa Inggris';}?>">
            </div>
            <div class="mb-3">
                <label class="labels">Link Foto Driver :</label>
                <input class="form-control" disabled value="<?php if($user[18]!=NULL) {echo $user[18];}else{echo '-';}?>"> 
            </div>
            <div class="mb-3">
                <label class="labels">Link Sim Driver :</label>
                <input class="form-control" disabled value="<?php if($user[9]!=NULL) {echo $user[9];}else{echo '-';}?>">
            </div>
            <div class="mb-3">
                <label class="labels">Link Surat Bebas Napza :</label>
                <input class="form-control" disabled value="<?php if($user[10]!=NULL) {echo $user[10];}else{echo '-';}?>">
            </div> 
            <div class="mb-3">
                <label class="labels">Link Surat Kesehatan Jiwa :</label>
                <input class="form-control" disabled value="<?php if($user[11]!=NULL) {echo $user[11];}else{echo '-';}?>">
            </div> 
            <div class="mb-3">
                <label class="labels">Link Surat Kesehatan Jasmani :</label>
                <input class="form-control" disabled value="<?php if($user[12]!=NULL) {echo $user[12];}else{echo '-';}?>">
            </div> 
            <div class="mb-3">
                <label class="labels">Link Surat SKCK :</label>
                <input class="form-control" disabled value="<?php if($user[13]!=NULL) {echo $user[13];}else{echo '-';}?>">
            </div>
            <div class="mb-3">
                <label class="labels">Harga Sewa Perhari :</label>
                <input class="form-control" disabled value="<?php if($user[16]==0) {echo 'Rp-';}else{echo 'Rp', $user[16], ',00';}?>">
            </div>
            <div class="mb-3">
                <label class="labels">Status Ketersediaan :</label>
                <input class="form-control" disabled value="<?php if($user[14]==0) {echo 'Tidak Tersedia';}else{echo 'Tersedia';}?>">  
            </div>
            <div class="mb-3">
                <label class="labels">Rerata Rating :</label>
                <input class="form-control" disabled value="<?php if($user[17]==0) {echo '0';}else{echo $user[17];}?>">
            </div>
        </div>
            <div class="mt-4 text-center">
                <a href="./listDriverAdministrasiPage.php" class="btn btn-primary" role="button" aria-disabled="true">Back</a>
            </div>
    </form>
</div>
</aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>