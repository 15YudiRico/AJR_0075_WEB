<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');

        $id_transaksi= $_GET['id'];

        //mendapatkan data berdasarkan id_driver dalam transaksi
        $query = mysqli_query($con, "SELECT id_driver FROM transaksi_penyewaan_mobil WHERE id_transaksi= '$id_transaksi'") or die(mysqli_error($con));
        $data = mysqli_fetch_array($query);
        $id_driver = $data[0];

        //mendapatkan data berdasarkan id_promo dalam transaksi
        $query2 = mysqli_query($con, "SELECT id_promo FROM transaksi_penyewaan_mobil WHERE id_transaksi= '$id_transaksi'") or die(mysqli_error($con));
        $data2 = mysqli_fetch_array($query2);
        $id_promo = $data2[0];

        $query3 = mysqli_query($con, "SELECT id_mobil FROM transaksi_penyewaan_mobil WHERE id_transaksi= '$id_transaksi'") or die(mysqli_error($con));
        $data3 = mysqli_fetch_array($query3);
        $id_mobil = $data3[0];

        $query4 = mysqli_query($con, "SELECT TIMESTAMPDIFF(HOUR, NOW(), tgl_waktu_selesai_sewa) FROM transaksi_penyewaan_mobil WHERE id_transaksi= '$id_transaksi'") or die(mysqli_error($con));
        $data4 = mysqli_fetch_array($query4);
        $data4[0]+=3;

        $query5 = mysqli_query($con, "SELECT TIMESTAMPDIFF(HOUR, tgl_waktu_selesai_sewa, NOW()) FROM transaksi_penyewaan_mobil WHERE id_transaksi= '$id_transaksi'") or die(mysqli_error($con));
        $data5 = mysqli_fetch_array($query5);

        if($data4[0] < 0){
            $temp = 1;

            while($data5[0] >= 27){
                $temp++;
                $data5[0] -= 24;
            }

            if($data[0] == NULL){
                if($data2[0] == NULL){

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa), 
                    total_promo = 0,
                    biaya_ekstensi= (SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * $temp,
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
    
                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';
                }else{

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa), 
                    total_promo = (((SELECT persenan_promo FROM promo WHERE id_promo = '$id_promo')/100) * sub_total),
                    biaya_ekstensi= (SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * $temp,
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';
                }
            }else{
                if($data2[0] == NULL){

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (((SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa)) + ((SELECT harga_sewa_perhari FROM driver WHERE id_driver = '$id_driver') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa))), 
                    total_promo = 0,
                    biaya_ekstensi= (((SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * $temp) + ((SELECT harga_sewa_perhari FROM driver WHERE id_driver = '$id_driver') * $temp)),
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
    
                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';

                }else{

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (((SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa)) + ((SELECT harga_sewa_perhari FROM driver WHERE id_driver = '$id_driver') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa))), 
                    total_promo = (((SELECT persenan_promo FROM promo WHERE id_promo = '$id_promo')/100) * sub_total),
                    biaya_ekstensi= (((SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * $temp) + ((SELECT harga_sewa_perhari FROM driver WHERE id_driver = '$id_driver') * $temp)),
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
    
                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';

                }
    
            }
            
        }else {
            if($data[0] == NULL){
                if($data2[0] == NULL){

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa), 
                    total_promo = 0,
                    biaya_ekstensi= 0,
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
    
                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';
                }else{

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa), 
                    total_promo = (((SELECT persenan_promo FROM promo WHERE id_promo = '$id_promo')/100) * sub_total),
                    biaya_ekstensi= 0,
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';
                }
            }else{
                if($data2[0] == NULL){

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (((SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa)) + ((SELECT harga_sewa_perhari FROM driver WHERE id_driver = '$id_driver') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa))), 
                    total_promo = 0,
                    biaya_ekstensi= 0,
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
    
                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';

                }else{

                    $queryUpdate = mysqli_query($con, "UPDATE transaksi_penyewaan_mobil SET tgl_waktu_pengembalian_sewa= NOW(), 
                    sub_total = (((SELECT harga_sewa_perhari FROM aset_mobil WHERE id_mobil = '$id_mobil') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa)) + ((SELECT harga_sewa_perhari FROM driver WHERE id_driver = '$id_driver') * TIMESTAMPDIFF(DAY, tgl_waktu_mulai_sewa, tgl_waktu_selesai_sewa))), 
                    total_promo = (((SELECT persenan_promo FROM promo WHERE id_promo = '$id_promo')/100) * sub_total),
                    biaya_ekstensi= 0,
                    total_pembayaran = (sub_total - total_promo) + biaya_ekstensi
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
    
                    echo
                    '<script>
                        window.location = "../page/showTransaksiPembayaranCustomerPage.php?id='.$id_transaksi.'"
                    </script>';

                }
    
            }

        }

    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>