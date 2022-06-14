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
        $id_pegawai = $_POST['id_pegawai'];
        $id_jadwal = $_POST['id_jadwal'];
        $old_idJadwal = $_POST ['old_idJadwal'];

        $temp1 = mysqli_query($con, "SELECT id_jabatan FROM pegawai WHERE id_pegawai = '$id_pegawai'")or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp1);

        $temp2 = mysqli_query($con, "SELECT id_pegawai, id_jadwal FROM detail_jadwal WHERE id_pegawai = '$id_pegawai' AND id_jadwal = '$id_jadwal'")or die(mysqli_error($con));

        if($id_jadwal == $old_idJadwal ){
            $query = mysqli_query($con, "UPDATE detail_jadwal SET id_jadwal='$id_jadwal' WHERE id_pegawai='$id_pegawai' AND id_jadwal='$old_idJadwal'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){
                echo
                    '<script>alert("Edit Jadwal Success"); window.location = "../page/listJadwalPegawaiPage.php"</script>';
            }else{
                echo
                    '<script>alert("Edit Jadwal Failed");</script>';
            }
        }else {
            if(mysqli_num_rows($temp2) !=0){
                echo'<script> alert("Jadwal Pegawai Duplikat"); window.location = "../page/editJadwalPegawaiPage.php?id_jadwal='.$old_idJadwal.'&id_pegawai='.$id_pegawai.'"</script>';
            }else if(($user[0]==2 && $id_jadwal>=1 && $id_jadwal<=12) || ($user[0]==3 && $id_jadwal>=12 && $id_jadwal<=24)) {
                // Melakukan insert ke databse dengan query dibawah ini
                $query = mysqli_query($con, "UPDATE detail_jadwal SET id_jadwal='$id_jadwal' WHERE id_pegawai='$id_pegawai' AND id_jadwal='$old_idJadwal'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    
                if($query){
                    echo
                        '<script>alert("Edit Jadwal Success"); window.location = "../page/listJadwalPegawaiPage.php"</script>';
                }else{
                    echo
                        '<script>alert("Edit Jadwal Failed");</script>';
                }
            }else{
                echo'<script>alert("Jabatan Tidak Sesuai Dengan Jadwal"); window.location = "../page/editJadwalPegawaiPage.php?id_jadwal='.$old_idJadwal.'&id_pegawai='.$id_pegawai.'"</script>';
            }
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>