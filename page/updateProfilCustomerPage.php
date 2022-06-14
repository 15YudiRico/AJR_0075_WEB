<?php
    include '../component/sidebarCustomer.php'
?>

<?php
        include '../db.php';
        $user = $_SESSION['user']; 
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Update Profile</h4>
                </div>  
                <form action="../process/updateProfilCustomerProcess.php" method="post">
                    <input type="hidden" name="id_customer" value="<?php echo $user[0]; ?>">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Nama</label><input type="text" class="form-control" required name="nama_customer" placeholder="Nama" value="<?php echo $user[2] ?>"></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control" required name="alamat_customer" value="<?php echo $user[3] ?>" placeholder="Alamat"></div>
                        <div class="col-md-12"><label class="labels">Tanggal Lahir</label><input type="date" class="form-control" required name="tanggal_lahir_customer" placeholder="Tanggal Lahir" value="<?php echo $user[4] ?>"></div>
                        <div class="col-md-12"><label class="labels">Jenis Kelamin</label>
                            <div class="mb-3">
                                <input type="radio" required name="jenis_kelamin_customer" value= "1" 
                                    <?php if($user[5] == 1){echo 'checked';}?>/> Pria <br>
                                <input type="radio" required name="jenis_kelamin_customer" value= "0"
                                    <?php if($user[5] == 0){echo 'checked';}?>/> Wanita
                            </div>
                        </div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" required name="email_customer" placeholder="Email" value="<?php echo $user[6] ?>"></div>
                        <div class="col-md-12"><label class="labels">Nomor Telepon</label><input type="tel" class="form-control" required name="no_telepon_customer"placeholder="Nomor Telepon" value="<?php echo $user[7] ?>"></div>
                        <div class="col-md-12"><label class="labels">Link Nomor SIM</label><input type="text" class="form-control" name="no_sim" placeholder="Nomor SIM" value="<?php echo $user[8] ?>"></div>
                        <div class="col-md-12"><label class="labels">Link Tanda Pengenal</label><input type="text" class="form-control" required name="tanda_pengenal"placeholder="KTP or Kartu Pelajar" value="<?php echo $user[9] ?>"></div>
                        <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" required name="pass_customer" placeholder="Password" value=""></div>
                    </div>

                    <div class="mt-4 text-center">  
                        <a href="./profilCustomerPage.php" class="btn btn-warning" role="button" aria-disabled="true">Batal Simpan</a>
                        <button class="btn btn-success profile-button" name="edit" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Profile Ini?')">Simpan Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>