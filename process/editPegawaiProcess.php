<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_POST['edit'])){

        include('../db.php');

        $id_login = $_POST['id_login'];
        $id_pegawai = $_POST['id_pegawai'];

        //untuk menegetahui semua data berdasarkan id_pegawai
        $temp=mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'") or die(mysql_error($con));
        $user = mysqli_fetch_array($temp);

        //untuk mengetahui siapa yg sedang login
        $temp2=mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai='$id_login'") or die(mysql_error($con));
        $user2 = mysqli_fetch_array($temp2);

        //untuk mengetahui apakah yang login memiliki jadwal
        $temp3=mysqli_query($con, "SELECT * FROM detail_jadwal WHERE id_pegawai='$id_pegawai'") or die(mysql_error($con));

        $temp4 = mysqli_query($con, "SELECT id FROM pegawai WHERE id_pegawai='$id_pegawai'") or die(mysql_error($con));
        $user4 = mysqli_fetch_array($temp4);
        $id = $user4[0];
        
        $id_jabatan = $_POST['id_jabatan'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $alamat_pegawai = $_POST['alamat_pegawai'];
        $tanggal_lahir_pegawai = $_POST['tanggal_lahir_pegawai'];
        $email_pegawai = $_POST['email_pegawai'];
        $no_telepon_pegawai = $_POST['no_telepon_pegawai'];
        $jenis_kelamin_pegawai = $_POST['jenis_kelamin_pegawai'];
        $foto_pegawai = $_POST['foto_pegawai'];
        $pass_pegawai = password_hash($_POST['pass_pegawai'], PASSWORD_DEFAULT);
        

        //pengecekan email unique
        $query2 = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_pegawai'") or die(mysqli_error($con)); 
        $query3 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_pegawai'") or die(mysqli_error($con)); 
        $query4 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_pegawai'") or die(mysqli_error($con)); 


        if(mysqli_num_rows($temp3) != 0 && $id_jabatan != $user[1]) {
            echo
            '<script>
            alert("Pegawai Tidak Dapat Mengubah Jabatan, Pegawai Memiliki jadwal Pada Jabatan Lama!"); window.location = "../page/editPegawaiPage.php?id='.$id_pegawai.'&id_login='.$id_login.'"
            </script>';
        }else if($email_pegawai == $user[5]){
            if($id_login == $id_pegawai) {
                $query = mysqli_query($con, "UPDATE pegawai SET id_jabatan='$id_jabatan', nama_pegawai='$nama_pegawai', alamat_pegawai='$alamat_pegawai', tanggal_lahir_pegawai='$tanggal_lahir_pegawai', email_pegawai='$email_pegawai', no_telepon_pegawai='$no_telepon_pegawai', jenis_kelamin_pegawai='$jenis_kelamin_pegawai', foto_pegawai='$foto_pegawai', pass_pegawai='$pass_pegawai' WHERE id_pegawai='$id_login'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_pegawai', `email`='$email_pegawai', `password`='$pass_pegawai', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit Pegawai Success, Mohon Login Kembali"); window.location = "./logoutProcess.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Pegawai Failed");</script>';
                }
    
            }else {
                $query = mysqli_query($con, "UPDATE pegawai SET id_jabatan='$id_jabatan', nama_pegawai='$nama_pegawai', alamat_pegawai='$alamat_pegawai', tanggal_lahir_pegawai='$tanggal_lahir_pegawai', email_pegawai='$email_pegawai', no_telepon_pegawai='$no_telepon_pegawai', jenis_kelamin_pegawai='$jenis_kelamin_pegawai', foto_pegawai='$foto_pegawai', pass_pegawai='$pass_pegawai' WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_pegawai', `email`='$email_pegawai', `password`='$pass_pegawai', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit Pegawai Success"); window.location = "../page/listPegawaiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Data Failed");</script>';
                }
            }

        }else{
            if (mysqli_num_rows($query2) != 0 || mysqli_num_rows($query3) != 0 || mysqli_num_rows($query4) != 0){
                echo '<script>alert("Email Telah Digunakan"); window.location = "../page/editPegawaiPage.php?id='.$id_pegawai.'&id_login='.$id_login.'"</script>';
            } else if ($id_pegawai == $id_login){
                $query = mysqli_query($con, "UPDATE pegawai SET id_jabatan='$id_jabatan', nama_pegawai='$nama_pegawai', alamat_pegawai='$alamat_pegawai', tanggal_lahir_pegawai='$tanggal_lahir_pegawai', email_pegawai='$email_pegawai', no_telepon_pegawai='$no_telepon_pegawai', jenis_kelamin_pegawai='$jenis_kelamin_pegawai', foto_pegawai='$foto_pegawai', pass_pegawai='$pass_pegawai' WHERE id_pegawai='$id_login'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_pegawai', `email`='$email_pegawai', `password`='$pass_pegawai', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit Pegawai Success, Mohon Login Kembali"); window.location = "./logoutProcess.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Pegawai Failed");</script>';
                }
            } else {
                $query = mysqli_query($con, "UPDATE pegawai SET id_jabatan='$id_jabatan', nama_pegawai='$nama_pegawai', alamat_pegawai='$alamat_pegawai', tanggal_lahir_pegawai='$tanggal_lahir_pegawai', email_pegawai='$email_pegawai', no_telepon_pegawai='$no_telepon_pegawai', jenis_kelamin_pegawai='$jenis_kelamin_pegawai', foto_pegawai='$foto_pegawai', pass_pegawai='$pass_pegawai' WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_pegawai', `email`='$email_pegawai', `password`='$pass_pegawai', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit Pegawai Success"); window.location = "../page/listPegawaiPage.php"</script>';
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