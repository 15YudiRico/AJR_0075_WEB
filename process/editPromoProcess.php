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
        $id_promo = $_POST['id_promo'];
        $kode_promo = $_POST['kode_promo'];
        $jenis_promo = $_POST['jenis_promo'];
        $keterangan_promo = $_POST['keterangan_promo'];
        $persenan_promo = $_POST['persenan_promo'];
        $status_promo = $_POST['status_promo'];

        //Mendapatkan Kode Promo untuk menjadi pembanding apakah sudah ada atau tidak.
        $tempKode = mysqli_query($con, "SELECT * FROM promo WHERE kode_promo='$kode_promo'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        $fetchKode = mysqli_fetch_array($tempKode);

        //Mendapatkan kode promo berdasarkan id untuk dicek jika kode promo yg mau di update sama bisa melakukan update.
        $tempID= mysqli_query($con, "SELECT * FROM promo WHERE id_promo='$id_promo'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        $temp = mysqli_fetch_array($tempID);

        if($kode_promo == $temp[1]){
            $query = mysqli_query($con, "UPDATE promo SET kode_promo='$kode_promo', jenis_promo='$jenis_promo', keterangan_promo='$keterangan_promo', persenan_promo='$persenan_promo', status_promo='$status_promo' WHERE id_promo='$id_promo'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){
                echo
                    '<script>alert("Edit Promo Success"); window.location = "../page/listPromoManagerPage.php"</script>';
            }else{
                echo
                    '<script>alert("Edit Promo Failed");</script>';
            }
        }else {
            if(mysqli_num_rows($tempKode) !=0) {
                echo '<script>alert("Kode Promo Telah Digunakan!"); window.location = "../page/editPromoPage.php?id='.$id_promo.'"</script>';
            } else {
                // Melakukan insert ke databse dengan query dibawah ini
                $query = mysqli_query($con, "UPDATE promo SET kode_promo='$kode_promo', jenis_promo='$jenis_promo', keterangan_promo='$keterangan_promo', persenan_promo='$persenan_promo', status_promo='$status_promo' WHERE id_promo='$id_promo'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                if($query){
                    echo
                        '<script>alert("Edit Promo Success"); window.location = "../page/listPromoManagerPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Promo Failed");</script>';
                }
            }
        }
       
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>