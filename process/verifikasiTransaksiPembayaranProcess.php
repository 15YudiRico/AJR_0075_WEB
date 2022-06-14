<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');

        $id_transaksi= $_GET['id'];

        $query = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_transaksi = '$id_transaksi'") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query);
        
        if($data[3] != NULL){
            $id_driver = $data[3];
            $id_mobil = $data[5];

            //update status transaksi
            $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET status_transaksi='TRANSAKSI SELESAI' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

            //update status driver
            $queryUpdate2 = mysqli_query($con, "UPDATE driver SET status_ketersedian_driver=1 WHERE id_driver='$id_driver'") or die(mysqli_error($con));

            //update status mobil
            $queryUpdate3 = mysqli_query($con, "UPDATE aset_mobil SET status_ketersediaan_mobil=1 WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
            
            if($queryUpdate){
                echo
                '<script>
                alert("Transaksi Pembayaran Customer Berhasil Diverifikasi"); window.location = "../page/verifikasiTransaksiPembayaranPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Transaksi Pembayaran Customer Gagal Diverifikasi"); window.location = "../page/verifikasiTransaksiPembayaranPage.php"
                </script>';
            }
        } else {
            $id_mobil = $data[5];

            $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET status_transaksi='TRANSAKSI SELESAI' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

            //update status mobil
            $queryUpdate3 = mysqli_query($con, "UPDATE aset_mobil SET status_ketersediaan_mobil=1 WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));

            if($queryUpdate){
                echo
                '<script>
                alert("Transaksi Pembayaran Customer Berhasil Diverifikasi"); window.location = "../page/verifikasiTransaksiPembayaranPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Transaksi Pembayaran Customer Gagal Diverifikasi"); window.location = "../page/verifikasiTransaksiPembayaranPage.php"
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