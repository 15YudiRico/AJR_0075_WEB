<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    if(isset($_GET['id'])){
        include ('../db.php');

        $id_driver= $_GET['id'];
        $query= mysqli_query($con, "SELECT * FROM transaksi_penyewaan_mobil WHERE id_driver='$id_driver'") or die(mysqli_error($con));

        $temp2 = mysqli_query($con, "SELECT id FROM driver WHERE id_driver='$id_driver'") or die(mysql_error($con));
        $user2 = mysqli_fetch_array($temp2);
        $id = $user2[0];

        if(mysqli_num_rows($query) !=0 ){
            $queryUpdate = mysqli_query($con, "UPDATE driver SET status_driver= 0 WHERE id_driver='$id_driver'") or die(mysqli_error($con));

            $queryUpdateMobile = mysqli_query($con, "UPDATE users SET created_up=NULL WHERE id='$id'") or die(mysqli_error($con));

            if($queryUpdate && $queryUpdateMobile){
                echo
                '<script>
                alert("Success Disabled Driver"); window.location = "../page/listDriverAdministrasiPage.php"
                </script>';
    
            }else{
                echo
                '<script>
                alert("Failed Disabled Driver"); window.location = "../page/listDriverAdministrasiPage.php"
                </script>';
            }

        }else{
            $queryDelete = mysqli_query($con, "DELETE FROM driver WHERE id_driver='$id_driver'") or die(mysqli_error($con));
            
            $queryDeleteMobile = mysqli_query($con, "DELETE FROM users WHERE id='$id'") or die(mysqli_error($con));

            if($queryDelete && $queryDeleteMobile){
                echo
                '<script>
                alert("Delete Driver Success"); window.location = "../page/listDriverAdministrasiPage.php"
                </script>';

            }else{
                echo
                '<script>
                alert("Delete Driver Failed"); window.location = "../page/listDriverAdministrasiPage.php"
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