<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'add' sudah di pencet atau belum
    // $_POST itu method di formnya
    //if(isset($_POST['add'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        session_start(); 

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_driver = $_GET['id_driver'];
        $id_mobil = $_GET['id_mobil'];
        $id_promo = $_GET['id_promo'];
        $id_transaksi = $_GET['id'];

        //mengambil data tgl mulai dan selesai sewa dari var global yang ada dari session pada 
        //addTransaksiWithDriverPage.php dan addTransaksiWithoutDriverPage.php;
        $tgl_waktu_mulai_sewa = $_SESSION['tgl_waktu_mulai_sewa'];
        $tgl_waktu_selesai_sewa = $_SESSION['tgl_waktu_selesai_sewa'];
            
        if($id_driver != NULL){
            if($id_promo != NULL){
                $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET id_mobil='$id_mobil', id_driver='$id_driver', id_promo='$id_promo', jenis_transaksi=1, tgl_waktu_mulai_sewa='$tgl_waktu_mulai_sewa', tgl_waktu_selesai_sewa='$tgl_waktu_selesai_sewa' WHERE id_transaksi ='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query){
                    echo
                        '<script>alert("Update Transaction Success"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Update Transaction Failed");</script>';
                }
            } else {
                $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET id_mobil='$id_mobil', id_driver='$id_driver', id_promo=NULL, jenis_transaksi=1, tgl_waktu_mulai_sewa='$tgl_waktu_mulai_sewa', tgl_waktu_selesai_sewa='$tgl_waktu_selesai_sewa' WHERE id_transaksi ='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query){
                    echo
                        '<script>alert("Update Transaction Success"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Update Transaction Failed");</script>';
                }
            }
            
        } else {
            if($id_promo != NULL) {
                $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET id_mobil='$id_mobil', id_driver=NULL, id_promo='$id_promo', jenis_transaksi=0, tgl_waktu_mulai_sewa='$tgl_waktu_mulai_sewa', tgl_waktu_selesai_sewa='$tgl_waktu_selesai_sewa' WHERE id_transaksi ='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query){
                    echo
                        '<script>alert("Update Transaction Success"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Update Transaction Failed");</script>';
                }
            } else {
                $query = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET id_mobil='$id_mobil', id_driver=NULL, id_promo=NULL, jenis_transaksi=0, tgl_waktu_mulai_sewa='$tgl_waktu_mulai_sewa', tgl_waktu_selesai_sewa='$tgl_waktu_selesai_sewa' WHERE id_transaksi ='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query){
                    echo
                        '<script>alert("Update Transaction Success"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Update Transaction Failed");</script>';
                }
            }
        }

?>