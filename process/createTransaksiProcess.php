<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'add' sudah di pencet atau belum
    // $_POST itu method di formnya
    //if(isset($_POST['add'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        session_start();
        //menangkap data session;
        $user = $_SESSION['user']; 

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_customer = $user[0];
        $id_driver = $_GET['id_driver'];
        $id_mobil = $_GET['id_mobil'];
        $id_driver = $_GET['id_driver'];
        $id_promo = $_GET['id_promo'];

        //mengambil data tgl mulai dan selesai sewa dari var global yang ada dari session pada 
        //addTransaksiWithDriverPage.php dan addTransaksiWithoutDriverPage.php;
        $tgl_waktu_mulai_sewa = $_SESSION['tgl_waktu_mulai_sewa'];
        $tgl_waktu_selesai_sewa = $_SESSION['tgl_waktu_selesai_sewa'];

        $query2 = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_customer = '$id_customer' AND status_transaksi !='TRANSAKSI SELESAI' AND status_transaksi !='DITOLAK'"); 

        // Melakukan insert ke databse dengan query dibawah ini
        if(mysqli_num_rows($query2) != 0){
            echo'<script>alert("Tidak Dapat Membuat Transaksi Baru, Karena Masih Ada Transaksi Yang Sedang Berjalan!"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
        }else {
            
            if($id_driver != NULL){
                if($id_promo != NULL){
                    $query = mysqli_query($con, "INSERT INTO transaksi_penyewaan_mobil(format_id_transaksi, id_customer, id_mobil, id_driver, id_promo, id_pegawai, tgl_transaksi, jenis_transaksi, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) VALUES (CONCAT('TRN', CURRENT_DATE, '-', '01', '-'), '$id_customer', '$id_mobil', '$id_driver', '$id_promo', 0, CURRENT_TIMESTAMP, 1, '$tgl_waktu_mulai_sewa', '$tgl_waktu_selesai_sewa')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                    if($query){
                        echo
                            '<script>alert("Create Transaction Success, Please Wait for Customer Service Verification"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                    }else{
                        echo
                            '<script>alert("Create Transaction Failed");</script>';
                    }
                } else {
                    $query = mysqli_query($con, "INSERT INTO transaksi_penyewaan_mobil(format_id_transaksi, id_customer, id_mobil, id_driver, id_pegawai, tgl_transaksi, jenis_transaksi, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) VALUES (CONCAT('TRN', CURRENT_DATE, '-', '01', '-'), '$id_customer', '$id_mobil', '$id_driver', 0, CURRENT_TIMESTAMP, 1, '$tgl_waktu_mulai_sewa', '$tgl_waktu_selesai_sewa')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                    if($query){
                        echo
                            '<script>alert("Create Transaction Success, Please Wait for Customer Service Verification"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                    }else{
                        echo
                            '<script>alert("Create Transaction Failed");</script>';
                    }
                }
                
            } else {
                if($id_promo != NULL) {
                    $query = mysqli_query($con, "INSERT INTO transaksi_penyewaan_mobil(format_id_transaksi, id_customer, id_mobil, id_promo, id_pegawai, tgl_transaksi, jenis_transaksi, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) VALUES (CONCAT('TRN', CURRENT_DATE, '-', '00', '-'), '$id_customer', '$id_mobil', '$id_promo', 0, CURRENT_TIMESTAMP, 0, '$tgl_waktu_mulai_sewa', '$tgl_waktu_selesai_sewa')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                    if($query){
                        echo
                            '<script>alert("Create Transaction Success, Please Wait for Customer Service Verification"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                    }else{
                        echo
                            '<script>alert("Create Transaction Failed");</script>';
                    }
                } else {
                    $query = mysqli_query($con, "INSERT INTO transaksi_penyewaan_mobil(format_id_transaksi, id_customer, id_mobil, id_pegawai, tgl_transaksi, jenis_transaksi, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa) VALUES (CONCAT('TRN', CURRENT_DATE, '-', '00', '-'), '$id_customer', '$id_mobil', 0, CURRENT_TIMESTAMP, 0, '$tgl_waktu_mulai_sewa', '$tgl_waktu_selesai_sewa')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                    if($query){
                        echo
                            '<script>alert("Create Transaction Success, Please Wait for Customer Service Verification"); window.location = "../page/showTransaksiBerjalanPage.php"</script>';
                    }else{
                        echo
                            '<script>alert("Create Transaction Failed");</script>';
                    }
                }
            }

        }

    // }else{
    //     echo
    //         '<script>window.history.back()</script>';
    // }
?>