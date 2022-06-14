<?php
    include '../component/sidebarCustomer.php'
?>

<?php
        include '../db.php';
        $user = $_SESSION['user']; 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #40A798; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>PROFILE CUSTOMER</h4>
        <form>
            <div class="row mt-3 form-control">
                <div class="mb-3"><label class="labels">ID</label>
                    <input class="form-control" disabled value="<?php echo $user[1], $user[0]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Nama</label>
                    <input class="form-control" disabled value="<?php echo $user[2]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Alamat </label>
                    <input class="form-control" disabled value="<?php echo $user[3]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Tanggal Lahir </label>
                    <input class="form-control" disabled value="<?php echo $user[4]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Jenis Kelamin </label>
                    <input class="form-control" disabled value="<?php if($user[5]==0) {echo 'Wanita';}else{echo 'Pria';}?>">
                </div>
                <div class="mb-3"><label class="labels">Email </label>
                    <input class="form-control" disabled value="<?php echo $user[6]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Nomor Telepon</label>
                    <input class="form-control" disabled value="<?php echo $user[7]; ?>">
                </div>
                <div class="mb-3"><label class="labels">Nomor SIM </label>
                    <input class="form-control" disabled value="<?php if($user[8]!=NULL) {echo $user[8];}else{echo '-';}?>">
                </div>
                <div class="mb-3"><label class="labels">Tanda Pengenal (KTP/Kartu Pelajar) </label>
                    <input class="form-control" disabled value="<?php if($user[9]!=NULL) {echo $user[9];}else{echo '-';}?>">
                </div>
                <div class="mb-3"><label class="labels">Status Verifikasi </label>
                    <input class="form-control" disabled value="<?php if($user[11]!=0) {echo 'Sudah verifikasi';}else{echo 'Belum Diverifikasi';}?>">    
                </div>
            </div>
        </form>
    
        <div class="mt-4 text-center">
            <a href="./updateProfilCustomerPage.php" class="btn btn-primary" role="button" aria-disabled="true">Update Profile</a>
        </div>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>