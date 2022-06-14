<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // untuk ngecek tombol yang namenya 'edit' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['edit'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        $id_pemilik = $_POST['id_pemilik'];

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_pemilik = $_POST['id_pemilik'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $no_ktp_pemilik = $_POST['no_ktp_pemilik'];
        $alamat_pemilik = $_POST['alamat_pemilik'];
        $no_telepon_pemilik = $_POST['no_telepon_pemilik'];

        //Mendapatkan no_ktp berdasarkan id untuk dicek jika no_ktp yg mau di update sama bisa melakukan update.
        $tempID= mysqli_query($con, "SELECT * FROM data_pemilik WHERE id_pemilik='$id_pemilik'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        $temp = mysqli_fetch_array($tempID);
        
        //Mendapatkan no_ktp_pemilik untuk menjadi pembanding apakah sudah ada atau tidak.
        $tempKtp= mysqli_query($con, "SELECT * FROM data_pemilik WHERE no_ktp_pemilik='$no_ktp_pemilik'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($no_ktp_pemilik == $temp[1]){
            $query = mysqli_query($con, "UPDATE data_pemilik SET nama_pemilik='$nama_pemilik', no_ktp_pemilik='$no_ktp_pemilik', alamat_pemilik='$alamat_pemilik', no_telepon_pemilik='$no_telepon_pemilik' WHERE id_pemilik='$id_pemilik'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){
                echo
                    '<script>alert("Edit Pemilik Aset Success"); window.location = "../page/listPemilikAsetPage.php"</script>';
            }else{
                echo
                    '<script>alert("Edit Pemilik Aset Failed");</script>';
            }
        }else {
            if(mysqli_num_rows($tempKtp) !=0) {
                echo '<script>alert("No KTP Telah Terdaftar!"); window.location = "../page/editPemilikAsetPage.php?id='.$id_pemilik.'"</script>';
            } else {
                // Melakukan insert ke databse dengan query dibawah ini
                $query = mysqli_query($con, "UPDATE data_pemilik SET nama_pemilik='$nama_pemilik', no_ktp_pemilik='$no_ktp_pemilik', alamat_pemilik='$alamat_pemilik', no_telepon_pemilik='$no_telepon_pemilik' WHERE id_pemilik='$id_pemilik'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                if($query){
                    echo
                        '<script>alert("Edit Pemilik Aset Success"); window.location = "../page/listPemilikAsetPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Pemilik Aset Failed");</script>';
                }
            }
        }
       
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>