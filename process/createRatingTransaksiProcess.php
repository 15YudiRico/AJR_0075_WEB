<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'edit' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['add'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_transaksi = $_POST['id_transaksi'];
        $stats = $_POST['stats'];
        $rating_rental = $_POST['rating_rental'];
        $komentar_untuk_rental = $_POST['komentar_untuk_rental'];
        
        if($stats == 1){
            $id_driver = $_POST['id_driver'];
            $rating_driver = $_POST['rating_driver'];
            $komentar_untuk_driver = $_POST['komentar_untuk_driver'];
            
            $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET rating_driver='$rating_driver', komentar_untuk_driver='$komentar_untuk_driver', rating_rental='$rating_rental', komentar_untuk_rental='$komentar_untuk_rental' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            $query2 = mysqli_query($con, "UPDATE driver SET rerata_rating_driver= (SELECT AVG(rating_driver) FROM transaksi_penyewaan_mobil WHERE id_driver = '$id_driver') WHERE id_driver='$id_driver'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query && $query2){
                echo
                    '<script>alert("Rating & Penilaian Berhasil Ditambahkan"); window.location = "../page/listRiwayatTransaksiCustomerPage.php"</script>';
            }else{
                echo
                    '<script>alert("Rating & Penilaian Gagal Ditambahkan");</script>';
            }

        }else {
            $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET rating_rental='$rating_rental', komentar_untuk_rental='$komentar_untuk_rental' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query){
                echo
                    '<script>alert("Rating & Penilaian Berhasil Ditambahkan"); window.location = "../page/listRiwayatTransaksiCustomerPage.php"</script>';
            }else{
                echo
                    '<script>alert("Rating & Penilaian Gagal Ditambahkan");</script>';
            }
        }
       
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>