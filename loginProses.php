<?php
    include('config.php');
    $isTrue = false;

    if(isset($_POST['submit'])){
        $statement = $connection->prepare("SELECT * FROM users WHERE username = ?;");
        $statement->bind_param("s", $_POST['username']);
        $statement->execute();
        
        $get_result = $statement->get_result();
        $result = $get_result->fetch_assoc();
        if($result['username']){
            $username = $result['username'];
            $password = base64_decode($result['password']);
            
            if($_POST['username'] == $username && $_POST['password'] == $password){
                session_start();
                $_SESSION['nama_depan'] = $result['nama_depan'];
                $_SESSION['nama_tengah'] = $result['nama_tengah'];
                $_SESSION['nama_belakang'] = $result['nama_belakang'];
                $_SESSION['tempat_lahir'] = $result['tempat_lahir'];
                $_SESSION['tgl_lahir'] = $result['tgl_lahir'];
                $_SESSION['nik'] = $result['nik'];
                $_SESSION['warga_negara'] = $result['warga_negara'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['no_hp'] = $result['no_hp'];
                $_SESSION['alamat'] = $result['alamat'];
                $_SESSION['kode_pos'] = $result['kode_pos'];
                $_SESSION['foto_profil'] = $result['foto_profil'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['password'] = $result['password'];

                $comment = "Success Login";
                $isTrue = true;
            }
            else if(($_POST['username'] == "") || ($_POST['password'] == "")){
                $comment = "Username dan Password tidak boleh kosong";
            }
            else{
                $comment = "Maaf Anda gagal Login, pastikan Username dan Password sesuai";
            }
        }
        else{
            $comment = "Maaf Anda gagal Login, pastikan Username dan Password telah teregister dalam aplikasi kami";
        }

        if($isTrue){
            echo "<script>";
                echo "alert('".$comment."')";
            echo "</script>";
    
            echo "<script>";
                echo "window.location = 'home.php'";
            echo "</script>";
        }
        else{
            echo "<script>";
                echo "alert('".$comment."')";
            echo "</script>";
    
            echo "<script>";
                echo "window.location = 'login.php'";
            echo "</script>";
        }
        
        $statement->close();
    }

?>