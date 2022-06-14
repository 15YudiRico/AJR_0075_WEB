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
        $nama_pemilik = $_POST['nama_pemilik'];
        $no_ktp_pemilik = $_POST['no_ktp_pemilik'];
        $alamat_pemilik = $_POST['alamat_pemilik'];
        $no_telepon_pemilik = $_POST['no_telepon_pemilik'];

        //pengecekan email unique
        $query = mysqli_query($con, "SELECT * FROM data_pemilik WHERE no_ktp_pemilik = '$no_ktp_pemilik'") or die(mysqli_error($con));
        
        if(mysqli_num_rows($query) != 0 ) {
            echo
                '<script>alert("No KTP telah Terdaftar!"); window.location = "../page/addPemilikAsetPage.php"</script>';
        }else {
            // Melakukan insert ke databse dengan query dibawah ini
            $query2 = mysqli_query($con, "INSERT INTO data_pemilik (nama_pemilik, no_ktp_pemilik, alamat_pemilik, no_telepon_pemilik) VALUES ('$nama_pemilik', '$no_ktp_pemilik', '$alamat_pemilik', '$no_telepon_pemilik')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query2){
                echo
                    '<script>alert("Create Pemilik Aset Success"); window.location = "../page/listPemilikAsetPage.php"</script>';
            }else{
                echo
                    '<script>alert("Create Pemilik Aset Failed");</script>';
            }
        }
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>