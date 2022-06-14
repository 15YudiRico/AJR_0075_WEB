<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_pegawai= $_GET['id'];
        $id_login = $_GET['id_login'];

        $query = mysqli_query($con, "SELECT * FROM detail_jadwal WHERE id_pegawai = '$id_pegawai'") or die(mysqli_error($con));
        $query2 = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_pegawai = '$id_pegawai'") or die(mysqli_error($con));

        $temp2 = mysqli_query($con, "SELECT id FROM pegawai WHERE id_pegawai='$id_pegawai'") or die(mysql_error($con));
        $user2 = mysqli_fetch_array($temp2);
        $id = $user2[0];

        if($id_pegawai == $id_login){
            echo
                '<script>
                alert("Session Pegawai Sedang Login!"); window.location = "../page/listPegawaiPage.php"
                </script>';
        }else if (mysqli_num_rows($query)!=0){
            echo
                '<script>
                alert("Jadwal Pegawai Masih Ada!"); window.location = "../page/listPegawaiPage.php"
                </script>';
        }else if(mysqli_num_rows($query2)!=0){
            $queryUpdate = mysqli_query($con, "UPDATE pegawai SET status_pegawai = 0 WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con));

            $queryUpdateMobile = mysqli_query($con, "UPDATE users SET created_up=NULL WHERE id='$id'") or die(mysqli_error($con));

            if($queryUpdate && $queryUpdateMobile){
                echo
                '<script>
                alert("Success Disabled Pegawai"); window.location = "../page/listPegawaiPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Failed Disabled Pegawai"); window.location = "../page/listPegawaiPage.php"
                </script>';
            } 
        }else{
            $queryDelete = mysqli_query($con, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con));

            $queryDeleteMobile = mysqli_query($con, "DELETE FROM users WHERE id='$id'") or die(mysqli_error($con));

            if($queryDelete && $queryDeleteMobile){
                echo
                '<script>
                alert("Delete Pegawai Success"); window.location = "../page/listPegawaiPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Delete Pegawai Failed"); window.location = "../page/listPegawaiPage.php"
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