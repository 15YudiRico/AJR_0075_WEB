<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama_customer = $_POST['nama_customer'];
        $alamat_customer = $_POST['alamat_customer'];
        $tanggal_lahir_customer = $_POST['tanggal_lahir_customer'];
        $jenis_kelamin_customer = $_POST['jenis_kelamin_customer'];
        $email_customer = $_POST['email_customer'];
        $no_telepon_customer = $_POST['no_telepon_customer'];
        $pass_customer = password_hash($_POST['tanggal_lahir_customer'], PASSWORD_DEFAULT);
        $tanda_pengenal = $_POST['tanda_pengenal'];

        //pengecekan umur <17
        $date1 = new DateTime($tanggal_lahir_customer);
        
        $dateNow = mysqli_query($con, "SELECT now()") or die(mysqli_error($con));
        $dataNow = mysqli_fetch_array($dateNow);
        $date2 = new DateTime($dataNow[0]);
        
        $umurCustomer = $date1->diff($date2);

        if($umurCustomer->y<17) {
            echo '<script>alert("Umur Customer Belum Memenuhi 17 Tahun!"); window.location = "../page/registerCustomerPage.php"</script>';
        } else{
            //pengecekan email unique
            $query2 = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_customer'") or die(mysqli_error($con)); 
            $query3 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_customer'") or die(mysqli_error($con)); 
            $query4 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_customer'") or die(mysqli_error($con)); 

            if(mysqli_num_rows($query2) != 0 || mysqli_num_rows($query3) != 0 || mysqli_num_rows($query4) != 0){
                echo '<script>alert("Email Telah Digunakan"); window.location = "../page/registerCustomerPage.php"</script>';   
            }else {
                // Melakukan insert ke databse dengan query dibawah ini
                $query5 = mysqli_query($con, "INSERT INTO users(`name`, `email`, `password`, `created_at`) VALUES ('$nama_customer', '$email_customer', '$pass_customer', now())") or die(mysqli_error($con));

                $query6 = mysqli_query($con, "SELECT id FROM users WHERE email='$email_customer'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($query6);
                $id = $data[0]; 

                $query = mysqli_query($con, "INSERT INTO customer(format_id, nama_customer, alamat_customer, tanggal_lahir_customer, jenis_kelamin_customer, email_customer, no_telepon_customer, pass_customer, tanda_pengenal, id) VALUES (CONCAT('CUS', CURRENT_DATE, '-'), '$nama_customer', '$alamat_customer', '$tanggal_lahir_customer', '$jenis_kelamin_customer', '$email_customer', '$no_telepon_customer','$pass_customer', '$tanda_pengenal', '$id')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query && $query5){
                    echo
                        '<script>alert("Register Success"); window.location = "../index.php"</script>';
                }else{
                    echo
                        '<script>alert("Register Failed");</script>';
                }
            }
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>