<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_mobil= $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
        
        if(mysqli_num_rows($query)!=0){
            $queryUpdate = mysqli_query($con, "UPDATE aset_mobil SET status_mobil = 0 WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
            if($queryUpdate){
                echo
                '<script>
                alert("Success Disabled Aset Mobil"); window.location = "../page/listAsetMobilAdministrasiPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Failed Disabled Aset Mobil "); window.location = "../page/listAsetMobilAdministrasiPage.php"
                </script>';
            }

        }else{
            $queryDelete = mysqli_query($con, "DELETE FROM aset_mobil WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
            if($queryDelete){
                echo
                '<script>
                alert("Delete Aset Mobil Success"); window.location = "../page/listAsetMobilAdministrasiPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Delete Aset Mobil Failed"); window.location = "../page/listAsetMobilAdministrasiPage.php"
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