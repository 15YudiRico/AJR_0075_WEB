<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_POST['edit'])){

        include('../db.php');

        $id_driver = $_POST['id_driver'];

        //untuk menegetahui semua data berdasarkan id_driver
        $temp=mysqli_query($con, "SELECT * FROM driver WHERE id_driver='$id_driver'") or die(mysql_error($con));
        $user = mysqli_fetch_array($temp);

        $temp2 = mysqli_query($con, "SELECT id FROM driver WHERE id_driver='$id_driver'") or die(mysql_error($con));
        $user2 = mysqli_fetch_array($temp2);
        $id = $user2[0];

        $nama_driver = $_POST['nama_driver'];
        $alamat_driver = $_POST['alamat_driver'];
        $tanggal_lahir_driver = $_POST['tanggal_lahir_driver'];
        $jenis_kelamin_driver = $_POST['jenis_kelamin_driver'];
        $email_driver = $_POST['email_driver'];
        $no_telp_driver = $_POST['no_telp_driver'];
        $bahasa = $_POST ['bahasa'];
        $foto_driver = $_POST['foto_driver'];
        $sim_driver = $_POST['sim_driver'];
        $surat_bebas_napza = $_POST['surat_bebas_napza'];
        $surat_kesehatan_jiwa = $_POST['surat_kesehatan_jiwa'];
        $surat_kesehatan_jasmani = $_POST['surat_kesehatan_jasmani'];
        $skck = $_POST['skck'];
        $harga_sewa_perhari = $_POST['harga_sewa_perhari'];
        $status_ketersediaan_driver = $_POST['status_ketersediaan_driver'];
        $pass_driver = password_hash($_POST['pass_driver'], PASSWORD_DEFAULT);
        
        //pengecekan email unique
        $query2 = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_driver'") or die(mysqli_error($con)); 
        $query3 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_driver'") or die(mysqli_error($con)); 
        $query4 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_driver'") or die(mysqli_error($con)); 

        if($email_driver == $user[6]){
            $query = mysqli_query($con, "UPDATE driver SET nama_driver='$nama_driver', alamat_driver='$alamat_driver', tanggal_lahir_driver='$tanggal_lahir_driver', email_driver='$email_driver', no_telp_driver='$no_telp_driver', jenis_kelamin_driver='$jenis_kelamin_driver', bahasa='$bahasa', foto_driver='$foto_driver', sim_driver='$sim_driver', surat_bebas_napza='$surat_bebas_napza', surat_kesehatan_jiwa='$surat_kesehatan_jiwa', surat_kesehatan_jasmani='$surat_kesehatan_jasmani', skck='$skck', harga_sewa_perhari='$harga_sewa_perhari', status_ketersediaan_driver='$status_ketersediaan_driver', pass_driver='$pass_driver' WHERE id_driver='$id_driver'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_driver', `email`='$email_driver', `password`='$pass_driver', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query && $queryMobile){
                echo
                    '<script>alert("Edit Driver Success"); window.location = "../page/listDriverAdministrasiPage.php"</script>';
            }else{
                echo
                    '<script>alert("Edit Driver Failed");</script>';
            }
        }else{
            if (mysqli_num_rows($query2) != 0 || mysqli_num_rows($query3) != 0 || mysqli_num_rows($query4) != 0){
                echo '<script>alert("Email Telah Digunakan"); window.location = "../page/editDriverPage.php?id='.$id_driver.'"</script>';
            }else {
                $query = mysqli_query($con, "UPDATE driver SET nama_driver='$nama_driver', alamat_driver='$alamat_driver', tanggal_lahir_driver='$tanggal_lahir_driver', email_driver='$email_driver', no_telp_driver='$no_telp_driver', jenis_kelamin_driver='$jenis_kelamin_driver', bahasa='$bahasa', foto_driver='$foto_driver', sim_driver='$sim_driver', surat_bebas_napza='$surat_bebas_napza', surat_kesehatan_jiwa='$surat_kesehatan_jiwa', surat_kesehatan_jasmani='$surat_kesehatan_jasmani', skck='$skck', harga_sewa_perhari='$harga_sewa_perhari', status_ketersediaan_driver='$status_ketersediaan_driver', pass_driver='$pass_driver' WHERE id_driver='$id_driver'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                $queryMobile = mysqli_query($con, "UPDATE users SET `name`='$nama_driver', `email`='$email_driver', `password`='$pass_driver', `updated_at`=now() WHERE id='$id'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                
                if($query && $queryMobile){
                    echo
                        '<script>alert("Edit Driver Success"); window.location = "../page/listDriverAdministrasiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Driver Failed");</script>';
                }
            }
        }
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>