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
        $id_pegawai = $_POST['id_pegawai'];
        $id_jadwal = $_POST['id_jadwal'];

        $temp = mysqli_query($con, "SELECT COUNT(id_pegawai) FROM detail_jadwal WHERE id_pegawai = '$id_pegawai'")or die(mysqli_error($con));
        $count = mysqli_fetch_array($temp);
        $count[0]++;

        $temp1 = mysqli_query($con, "SELECT id_jabatan FROM pegawai WHERE id_pegawai = '$id_pegawai'")or die(mysqli_error($con));
        $user = mysqli_fetch_array($temp1);

        $dupliJadwal = mysqli_query($con, "SELECT id_pegawai, id_jadwal FROM detail_jadwal WHERE id_pegawai = '$id_pegawai' AND id_jadwal = '$id_jadwal'")or die(mysqli_error($con));

        if($count[0] > 6) {
            echo'<script>alert("Pegawai Melebihi Maks Shift"); window.location = "../page/addJadwalPegawaiPage.php"</script>';
        }else if(mysqli_num_rows($dupliJadwal) !=0 ){
            echo'<script>alert("Jadwal Pegawai Yang Dipilih Sudah Ada"); window.location = "../page/addJadwalPegawaiPage.php"</script>';
        }else if ($user[0] == 1) {
            echo'<script>alert("Manager tidak memiliki jadwal"); window.location = "../page/addJadwalPegawaiPage.php"</script>';
        }else if(($user[0]==2 && $id_jadwal>=1 && $id_jadwal<=12) || ($user[0]==3 && $id_jadwal>=12 && $id_jadwal<=24)) {
            // Melakukan insert ke databse dengan query dibawah ini
            $query = mysqli_query($con, "INSERT INTO detail_jadwal(id_pegawai, id_jadwal) VALUES ('$id_pegawai', '$id_jadwal')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query){
                echo
                    '<script>alert("Create Jadwal Success"); window.location = "../page/listJadwalPegawaiPage.php"</script>';
            }else{
                echo
                    '<script>alert("Create Jadwal Failed");</script>';
            }
        }else{
            echo'<script>alert("Jabatan Tidak Sesuai Dengan Jadwal"); window.location = "../page/addJadwalPegawaiPage.php"</script>';
        }

    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>