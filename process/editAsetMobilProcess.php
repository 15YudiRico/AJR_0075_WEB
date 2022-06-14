<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'add' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['edit'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        $id_mobil = $_POST['id_mobil'];

        $temp=mysqli_query($con, "SELECT no_plat_mobil, no_stnk_mobil  FROM aset_mobil WHERE id_mobil='$id_mobil'") or die(mysql_error($con));
        $user = mysqli_fetch_array($temp);

        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama_mobil = $_POST['nama_mobil'];
        $tipe_mobil = $_POST['tipe_mobil'];
        $warna_mobil = $_POST['warna_mobil'];
        $no_plat_mobil = $_POST['no_plat_mobil'];
        $no_stnk_mobil = $_POST['no_stnk_mobil'];
        $jenis_transmisi = $_POST['jenis_transmisi'];
        $jenis_bahan_bakar = $_POST['jenis_bahan_bakar'];
        $volume_bahan_bakar = $_POST['volume_bahan_bakar'];
        $volume_bagasi = $_POST['volume_bagasi'];
        $kapasitas_penumpang = $_POST['kapasitas_penumpang'];
        $fasilitas = $_POST['fasilitas'];
        $tgl_service_terakhir = $_POST['tgl_service_terakhir'];
        $foto_mobil = $_POST['foto_mobil'];
        $harga_sewa_perhari = $_POST['harga_sewa_perhari'];
        $kategori_aset = $_POST['kategori_aset'];
        $status_ketersediaan_mobil = $_POST['status_ketersediaan_mobil'];

        //jika kategori adalah milik mitra maka akan ada atribut input tambahan.
        if($kategori_aset == 1) {
            $id_pemilik = $_POST['id_pemilik'];
            $periode_kontrak_mulai = $_POST['periode_kontrak_mulai'];
            $periode_kontrak_selesai = $_POST['periode_kontrak_selesai'];
        }

        //pengecekan STNK or Plat unique
        $query = mysqli_query($con, "SELECT no_plat_mobil FROM aset_mobil WHERE no_plat_mobil = '$no_plat_mobil'") or die(mysqli_error($con));
        $query2 = mysqli_query($con, "SELECT no_stnk_mobil FROM aset_mobil WHERE no_stnk_mobil = '$no_stnk_mobil'") or die(mysqli_error($con));

        if($no_plat_mobil == $user[0] || $no_stnk_mobil == $user[1]){

            if($no_plat_mobil == $user[0]){

                if($no_stnk_mobil == $user[1]) {
                    if($kategori_aset == 1) {
                        // Melakukan insert ke databse dengan query dibawah ini
                        $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik='$id_pemilik', periode_kontrak_mulai='$periode_kontrak_mulai', periode_kontrak_selesai= '$periode_kontrak_selesai', status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
                        if($query3){
                            echo
                                '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                        }else{
                            echo
                                '<script>alert("Edit Aset Mobil Failed");</script>';
                        }
                    }else {
                        // Melakukan insert ke databse dengan query dibawah ini
                        $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik=NULL, periode_kontrak_mulai=NULL, periode_kontrak_selesai=NULL, status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
                        if($query3){
                            echo
                                '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                        }else{
                            echo
                                '<script>alert("Edit Aset Mobil Failed");</script>';
                        }
                    }
                } else if(mysqli_num_rows($query2) != 0){
                    echo
                        '<script>alert("STNK Mobil Telah Digunakan!"); window.location = "../page/editAsetMobilPage.php?id='.$id_mobil.'"</script>'; 
                } else {
                    if($kategori_aset == 1) {
                        // Melakukan insert ke databse dengan query dibawah ini
                        $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik='$id_pemilik', periode_kontrak_mulai='$periode_kontrak_mulai', periode_kontrak_selesai= '$periode_kontrak_selesai', status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
                        if($query3){
                            echo
                                '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                        }else{
                            echo
                                '<script>alert("Edit Aset Mobil Failed");</script>';
                        }
                    }else {
                        // Melakukan insert ke databse dengan query dibawah ini
                        $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik=NULL, periode_kontrak_mulai=NULL, periode_kontrak_selesai=NULL, status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
                        if($query3){
                            echo
                                '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                        }else{
                            echo
                                '<script>alert("Edit Aset Mobil Failed");</script>';
                        }
                    }
                }
                
            } else if($no_stnk_mobil == $user[1]) {
                if(mysqli_num_rows($query) != 0) {
                    echo
                        '<script>alert("Plat Nomor Telah Digunakan!"); window.location = "../page/editAsetMobilPage.php?id='.$id_mobil.'"</script>';
                } else{
                    if($kategori_aset == 1) {
                        // Melakukan insert ke databse dengan query dibawah ini
                        $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik='$id_pemilik', periode_kontrak_mulai='$periode_kontrak_mulai', periode_kontrak_selesai= '$periode_kontrak_selesai', status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
                        if($query3){
                            echo
                                '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                        }else{
                            echo
                                '<script>alert("Edit Aset Mobil Failed");</script>';
                        }
                    }else {
                        // Melakukan insert ke databse dengan query dibawah ini
                        $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik=NULL, periode_kontrak_mulai=NULL, periode_kontrak_selesai=NULL, status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        
                        if($query3){
                            echo
                                '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                        }else{
                            echo
                                '<script>alert("Edit Aset Mobil Failed");</script>';
                        }
                    }
                }
            } 

        }else if (mysqli_num_rows($query) != 0){
            echo
                '<script>alert("Plat Nomor Telah Digunakan!"); window.location = "../page/editAsetMobilPage.php?id='.$id_mobil.'"</script>';
        } else if (mysqli_num_rows($query2) != 0) {
            echo
                '<script>alert("STNK Mobil Telah Digunakan!"); window.location = "../page/editAsetMobilPage.php?id='.$id_mobil.'"</script>'; 
        }else {
            if($kategori_aset == 1) {
                // Melakukan insert ke databse dengan query dibawah ini
                $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik='$id_pemilik', periode_kontrak_mulai='$periode_kontrak_mulai', periode_kontrak_selesai= '$periode_kontrak_selesai', status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query3){
                    echo
                        '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Aset Mobil Failed");</script>';
                }
            }else {
                // Melakukan insert ke databse dengan query dibawah ini
                $query3 = mysqli_query($con, "UPDATE aset_mobil SET nama_mobil='$nama_mobil', tipe_mobil = '$tipe_mobil', warna_mobil='$warna_mobil', no_plat_mobil='$no_plat_mobil', no_stnk_mobil='$no_stnk_mobil', jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', volume_bagasi='$volume_bagasi', kapasitas_penumpang='$kapasitas_penumpang', fasilitas='$fasilitas', tgl_service_terakhir='$tgl_service_terakhir', foto_mobil='$foto_mobil', harga_sewa_perhari='$harga_sewa_perhari', kategori_aset='$kategori_aset', id_pemilik=NULL, periode_kontrak_mulai=NULL, periode_kontrak_selesai=NULL, status_ketersediaan_mobil='$status_ketersediaan_mobil' WHERE id_mobil ='$id_mobil'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query3){
                    echo
                        '<script>alert("Edit Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Aset Mobil Failed");</script>';
                }
            } 
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>