<link rel="icon" href="../resource/A.png" type="image/ico">
<title>Atma Jogja Rental</title>
<?php
    // ini buat ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['login'])){

        include('../db.php'); // untuk mengoneksikan dengan database dengan memanggil file db.php
        //tampung nilai yang ada di from ke variable
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email= $_POST['email'];
        $password = $_POST['password'];

        // Melakukan insert ke databse dengan query dibawah ini
        //Query untuk dapat data customer
        $query = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email'") or die(mysqli_error($con));
        //Query untuk dapat data pegawai
        $query2 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email'") or die(mysqli_error($con));
        //query untuk dapat data driver
        $query3 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email'") or die(mysqli_error($con));

        // ini buat ngecek kalo misalnya hasil dari querynya == 0 atau ga ketemu -> usernamenya tdk ditemukan
        if(mysqli_num_rows($query) == 0 && mysqli_num_rows($query2) == 0 && mysqli_num_rows($query3) == 0){
            echo
                '<script>alert("Email not found!"); window.location = "../page/loginPage.php"</script>';
        }else if (mysqli_num_rows($query) != 0){
            $user = mysqli_fetch_array($query);
            if(password_verify($password, $user[10])){
                // session adalah variabel global sementara yang disimpen di server
                // buat mulai sessionnya pake session_start()
                session_start();
                //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                $_SESSION['isLoginCustomer'] = true;
                $_SESSION['user'] = $user;
                echo
                    '<script>alert("Login Success as Customer"); window.location = "../page/dashboardCustomerPage.php"</script>';
            }else {
                echo
                    '<script>alert("Email or Password Invalid"); window.location = "../page/loginPage.php"</script>';
            }
        }else if (mysqli_num_rows($query2) != 0){
            $user = mysqli_fetch_array($query2);
            
            if($user[10] == 0){
                echo
                    '<script>alert("Status Pegawai disable"); window.location = "../page/loginPage.php"</script>';
            }else if(password_verify($password, $user[9])){
                $getIdJabatanPegawai = mysqli_query($con, "SELECT id_jabatan FROM pegawai WHERE email_pegawai = '$email'") or die(mysqli_error($con));
                $idJabatan = mysqli_fetch_array($getIdJabatanPegawai);
                if ($idJabatan[0] == 1){
                    session_start();
                    $_SESSION['isLoginManager'] = true;
                    $_SESSION['user'] = $user;
                    echo
                    '<script>alert("Login Success as Managaer"); window.location = "../page/dashboardManagerPage.php"</script>';
                } else if ($idJabatan[0] == 2) {
                    session_start();
                    $_SESSION['isLoginAdministrasi'] = true;
                    $_SESSION['user'] = $user;
                    echo
                    '<script>alert("Login Success as Administrasi"); window.location = "../page/dashboardAdministrasiPage.php"</script>';
                } else {
                    session_start();
                    $_SESSION['isLoginCustomerService'] = true;
                    $_SESSION['user'] = $user;
                    echo
                    '<script>alert("Login Success as CS"); window.location = "../page/dashboardCustomerServicePage.php"</script>';
                }
            }else {
                echo
                    '<script>alert("Email or Password Invalid"); window.location = "../page/loginPage.php"</script>';
            }
        }else if (mysqli_num_rows($query3) != 0){
            echo
            '<script>alert("Driver Tidak Memiliki Akses!"); window.location = "../page/loginPage.php"</script>';
        }
    }else{
        echo
            '<script>window.history.back()</script>';
    }
?>