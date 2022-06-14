<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'edit' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['edit'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_transaksi = $_POST['id_transaksi'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $bukti_pembayaran = $_POST['bukti_pembayaran'];
        
        $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET metode_pembayaran='$metode_pembayaran', bukti_pembayaran='$bukti_pembayaran', status_transaksi='Menunggu Verifikasi Pembayaran Dari Customer Service' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($query){
            echo
                '<script>alert("Silahkan Melakukan Pembayaran Dan Menunggu Verifikasi Pembayaran Dari Customer Service"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
        }else{
            echo
                '<script>alert("Checkout Failed");</script>';
        }
       
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>