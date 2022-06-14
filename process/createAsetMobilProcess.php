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

        //jika kategori adalah milik mitra maka akan ada atribut input tambahan.
        if($kategori_aset == 1) {
            $id_pemilik = $_POST['id_pemilik'];
            $periode_kontrak_mulai = $_POST['periode_kontrak_mulai'];
            $periode_kontrak_selesai = $_POST['periode_kontrak_selesai'];
        }

        //pengecekan STNK or Plat unique
        $query = mysqli_query($con, "SELECT no_plat_mobil FROM aset_mobil WHERE no_plat_mobil = '$no_plat_mobil'") or die(mysqli_error($con));
        $query2 = mysqli_query($con, "SELECT no_stnk_mobil FROM aset_mobil WHERE no_stnk_mobil = '$no_stnk_mobil'") or die(mysqli_error($con));

        if(mysqli_num_rows($query) != 0) {
            echo
                '<script>alert("Plat Nomor Telah Digunakan!"); window.location = "../page/addAsetMobilPage.php"</script>';
        } else if (mysqli_num_rows($query2) != 0){
            echo
                '<script>alert("STNK Mobil Telah Digunakan!"); window.location = "../page/addAsetMobilPage.php"</script>';
        }else {
            if($kategori_aset == 1) {
                // Melakukan insert ke databse dengan query dibawah ini
                $query3 = mysqli_query($con, "INSERT INTO aset_mobil (nama_mobil, tipe_mobil, warna_mobil, no_plat_mobil, no_stnk_mobil, jenis_transmisi, jenis_bahan_bakar, volume_bahan_bakar, volume_bagasi, kapasitas_penumpang, fasilitas, tgl_service_terakhir, foto_mobil, harga_sewa_perhari, kategori_aset, id_pemilik, periode_kontrak_mulai, periode_kontrak_selesai, status_ketersediaan_mobil) VALUES ('$nama_mobil', '$tipe_mobil', '$warna_mobil', '$no_plat_mobil', '$no_stnk_mobil', '$jenis_transmisi', '$jenis_bahan_bakar', '$volume_bahan_bakar', '$volume_bagasi', '$kapasitas_penumpang', '$fasilitas', '$tgl_service_terakhir', '$foto_mobil', '$harga_sewa_perhari', '$kategori_aset', '$id_pemilik', '$periode_kontrak_mulai', '$periode_kontrak_selesai', 1)") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query3){
                    echo
                        '<script>alert("Create Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Create Aset Mobil Failed");</script>';
                }
            } else {
                // Melakukan insert ke databse dengan query dibawah ini
                $query3 = mysqli_query($con, "INSERT INTO aset_mobil (nama_mobil, tipe_mobil, warna_mobil, no_plat_mobil, no_stnk_mobil, jenis_transmisi, jenis_bahan_bakar, volume_bahan_bakar, volume_bagasi, kapasitas_penumpang, fasilitas, tgl_service_terakhir, foto_mobil, harga_sewa_perhari, kategori_aset, status_ketersediaan_mobil) VALUES ('$nama_mobil', '$tipe_mobil', '$warna_mobil', '$no_plat_mobil', '$no_stnk_mobil', '$jenis_transmisi', '$jenis_bahan_bakar', '$volume_bahan_bakar', '$volume_bagasi', '$kapasitas_penumpang', '$fasilitas', '$tgl_service_terakhir', '$foto_mobil', '$harga_sewa_perhari', '$kategori_aset', 1)") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

                if($query3){
                    echo
                        '<script>alert("Create Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Create Aset Mobil Failed");</script>';
                }
            } 
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>