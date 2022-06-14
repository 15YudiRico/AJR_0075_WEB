<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id']) && isset($_GET['stats'])){
        include ('../db.php');

        session_start();
        $user= $_SESSION['user'];

        $id_pegawai= $user[0];
        $id_transaksi= $_GET['id'];
        $stats= $_GET['stats'];

        $query = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_transaksi = '$id_transaksi'") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query);
        
        if($data[3] != NULL){
            $id_driver = $data[3];
        }
        $id_mobil = $data[5];

        if($stats == 1){

            if($data[3] != NULL){
                $queryStatusDriver = mysqli_query($con, "UPDATE driver SET status_ketersediaan_driver=0 WHERE id_driver='$id_driver'") or die(mysqli_error($con));
            }

            $queryStatusMobil= mysqli_query($con, "UPDATE aset_mobil SET status_ketersediaan_mobil=0 WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));

            $verifikasiTransaksi = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET id_pegawai='$id_pegawai', status_transaksi='PENYEWAAN BERJALAN' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

            if($verifikasiTransaksi && $queryStatusMobil){
                echo
                '<script>
                alert("Rent Transaction Successfully Verified"); window.location = "../page/verifikasiTransaksiPenyewaanPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Rent Transaction Failed Verified"); window.location = "../page/verifikasiTransaksiPenyewaanPage.php"
                </script>';
            }
        }else{
            $verifikasiTransaksi = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET id_pegawai='$id_pegawai', status_transaksi='DITOLAK' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

            if($verifikasiTransaksi){
                echo
                '<script>
                alert("Rent Transaction Rejected Successfully"); window.location = "../page/verifikasiTransaksiPenyewaanPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Rent Transaction Failed rejected"); window.location = "../page/verifikasiTransaksiPenyewaanPage.php"
                </script>';
            }
        }

    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>