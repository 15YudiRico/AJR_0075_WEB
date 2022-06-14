<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>

<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['add'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama_driver = $_POST['nama_driver'];
        $alamat_driver = $_POST['alamat_driver'];
        $tanggal_lahir_driver = $_POST['tanggal_lahir_driver'];
        $jenis_kelamin_driver = $_POST['jenis_kelamin_driver'];
        $email_driver = $_POST['email_driver'];
        $no_telp_driver = $_POST['no_telp_driver'];
        $bahasa = $_POST ['bahasa'];
        $foto_driver = $_POST['foto_driver'];
        $harga_sewa_perhari = $_POST['harga_sewa_perhari'];
        $pass_driver = password_hash($_POST['tanggal_lahir_driver'], PASSWORD_DEFAULT);
        

        //pengecekan email unique
        $query = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_driver'") or die(mysqli_error($con));
        $query2 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_driver'") or die(mysqli_error($con));
        $query3 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_driver'") or die(mysqli_error($con));

        if(mysqli_num_rows($query) != 0 || mysqli_num_rows($query2) != 0 || mysqli_num_rows($query3) != 0) {
            echo
                '<script>alert("Email telah digunakan!"); window.location = "../page/addDriverPage.php"</script>';
        }else {
            // Melakukan insert ke databse dengan query dibawah ini
            $query5 = mysqli_query($con, "INSERT INTO users(`name`, `email`, `password`, `created_at`) VALUES ('$nama_driver', '$email_driver', '$pass_driver', now())") or die(mysqli_error($con));

            $query6 = mysqli_query($con, "SELECT id FROM users WHERE email='$email_driver'") or die(mysqli_error($con));
            $data = mysqli_fetch_array($query6);
            $id = $data[0]; 

            $query4 = mysqli_query($con, "INSERT INTO driver (format_id_driver, nama_driver, tanggal_lahir_driver, jenis_kelamin_driver, alamat_driver, no_telp_driver, pass_driver, email_driver, foto_driver, bahasa, harga_sewa_perhari, status_ketersediaan_driver, id) VALUES (CONCAT('DRV-', CURRENT_DATE, '-'), '$nama_driver', '$tanggal_lahir_driver', '$jenis_kelamin_driver', '$alamat_driver', '$no_telp_driver', '$pass_driver', '$email_driver', '$foto_driver', '$bahasa', '$harga_sewa_perhari', 1, '$id')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query4 && $query6){
                echo
                    '<script>alert("Create Driver Success"); window.location = "../page/listDriverAdministrasiPage.php"</script>';
            }else{
                echo
                    '<script>alert("Create Driver Failed");</script>';
            }
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>