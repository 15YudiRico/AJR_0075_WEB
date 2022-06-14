<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'add' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['add'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $kode_promo = $_POST['kode_promo'];
        $jenis_promo = $_POST['jenis_promo'];
        $keterangan_promo = $_POST['keterangan_promo'];
        $persenan_promo = $_POST['persenan_promo'];
        $status_promo = $_POST['status_promo'];


        $query2 = mysqli_query($con, "SELECT * FROM promo WHERE kode_promo='kode_promo'") or die(mysqli_error($con)); 
        if(mysqli_num_rows($query2) != 0){
            echo'<script>alert("Kode Promo Sudah Ada"); window.location = "../page/addPromoPage.php"</script>';
        }else {
            // Melakukan insert ke databse dengan query dibawah ini
            $query = mysqli_query($con, "INSERT INTO promo(kode_promo, jenis_promo, keterangan_promo, persenan_promo, status_promo) VALUES ('$kode_promo', '$jenis_promo', '$keterangan_promo', '$persenan_promo', '$status_promo')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query){
                echo
                    '<script>alert("Create Promo Success"); window.location = "../page/listPromoManagerPage.php"</script>';
            }else{
                echo
                    '<script>alert("Create Promo Failed");</script>';
            }
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>