<?php
    include '../component/sidebarAdministrasi.php'
?>

<?php
        include '../db.php';
        $id_pegawai = $_GET['id']; 
        $temp = mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai ='$id_pegawai'") or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp);
?>
        <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #FEA82F; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>SHOW PEGAWAI</h4>
        <hr>
        <form>
            <div class="row mt-3 form-control">
                <div class="mb-3"><label class="labels">ID Pegawai :</label>
                    <input class="form-control" disabled value="<?php echo $user[0]; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jabatan :</label>
                    <input class="form-control" disabled value="<?php if($user[1]==1) {echo 'Manager';}else if($user[1] == 2){echo 'Administrasi';}else{echo 'Customer Service';}?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Nama Pegawai</label>
                    <input class="form-control" disabled value="<?php echo $user[2]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Alamat</label>
                    <input class="form-control" disabled value="<?php echo $user[3]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Tanggal Lahir :</label>
                    <input class="form-control" disabled value="<?php echo $user[4]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Jenis Kelamin :</label>
                    <input class="form-control" disabled value="<?php if($user[7]==0) {echo 'Wanita';}else{echo 'Pria';}?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Email :</label>
                    <input class="form-control" disabled value="<?php echo $user[5]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Nomor Telepon:</label>
                    <input class="form-control" disabled value="<?php echo $user[6]; ?>">
                </div>
                <div class="mb-3">
                    <label class="labels">Link Foto Pegawai :</label>
                    <input class="form-control" disabled value="<?php if($user[8]!=NULL) {echo $user[8];}else{echo '-';}?>">
                </div>  
            </div>
            <div class="mt-5 gap-2 text-center">
                <a href="./listPegawaiPage.php" class="btn btn-primary" role="button" aria-disabled="true">Back</a>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>