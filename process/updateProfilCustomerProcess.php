<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_POST['edit'])){

        include('../db.php');

        $id_customer = $_POST['id_customer'];

        $temp = mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$id_customer'") or die(mysql_error($con));
        $user = mysqli_fetch_array($temp);

        $temp2 = mysqli_query($con, "SELECT id FROM customer WHERE id_customer='$id_customer'") or die(mysql_error($con));
        $user2 = mysqli_fetch_array($temp2);
        $id = $user2[0];
        
        $nama_customer = $_POST['nama_customer'];
        $alamat_customer = $_POST['alamat_customer'];
        $tanggal_lahir_customer = $_POST['tanggal_lahir_customer'];
        $jenis_kelamin_customer = $_POST['jenis_kelamin_customer'];
        $email_customer = $_POST['email_customer'];
        $no_telepon_customer = $_POST['no_telepon_customer'];
        $pass_customer = password_hash($_POST['pass_customer'], PASSWORD_DEFAULT);
        $tanda_pengenal = $_POST['tanda_pengenal'];
        $no_sim = $_POST['no_sim'];

        //pengecekan email unique
        $query2 = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_customer'") or die(mysqli_error($con)); 
        $query3 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_customer'") or die(mysqli_error($con)); 
        $query4 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_customer'") or die(mysqli_error($con)); 

        if($email_customer == $user[6]){
            if($user[2] != $nama_customer || $user[3] != $alamat_customer || $user[4] != $tanggal_lahir_customer || $user[5] != $jenis_kelamin_customer || $user[6] != $email_customer || $user[7] != $no_telepon_customer   || $user[9] != $tanda_pengenal || $user[8] != $no_sim) {
                $query = mysqli_query($con, "UPDATE customer SET nama_customer='$nama_customer', alamat_customer='$alamat_customer', tanggal_lahir_customer='$tanggal_lahir_customer', jenis_kelamin_customer='$jenis_kelamin_customer', email_customer='$email_customer', no_telepon_customer='$no_telepon_customer', no_sim='$no_sim', tanda_pengenal='$tanda_pengenal', pass_customer='$pass_customer', verif_customer=0 WHERE id_customer='$id_customer'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_customer', `email`='$email_customer', `password`='$pass_customer', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit New Data Success, Mohon Login Kembali"); window.location = "./logoutProcess.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit New Data Failed");</script>';
                }
    
            }else {
                $query = mysqli_query($con, "UPDATE customer SET pass_customer='$pass_customer' WHERE id_customer='$id_customer'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `password`='$pass_customer', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit New Pass Success, Mohon Login Kembali"); window.location = "./logoutProcess.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Data Failed");</script>';
                }
            }

        }else{
            if (mysqli_num_rows($query2) != 0 || mysqli_num_rows($query3) != 0 || mysqli_num_rows($query4) != 0){
                echo '<script>alert("Email Telah Digunakan"); window.location = "../page/updateProfilCustomerPage.php"</script>';
            } else {
                $query = mysqli_query($con, "UPDATE customer SET nama_customer='$nama_customer', alamat_customer='$alamat_customer', tanggal_lahir_customer='$tanggal_lahir_customer', jenis_kelamin_customer='$jenis_kelamin_customer', email_customer='$email_customer', no_telepon_customer='$no_telepon_customer', no_sim='$no_sim', tanda_pengenal='$tanda_pengenal', pass_customer='$pass_customer', verif_customer=0 WHERE id_customer='$id_customer'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_customer', `email`='$email_customer', `password`='$pass_customer', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit Data Success, Mohon Login Kembali"); window.location = "./logoutProcess.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Data Failed");</script>';
                }
            }
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>