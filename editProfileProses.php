<?php
    session_start();
    $isTrue = false;

    if(isset($_POST['submit'])){
        if($_POST['nama_depan'] != "" && $_POST['nama_tengah'] != "" && $_POST['nama_belakang'] != "" && $_POST['tempat_lahir'] != "" && $_POST['tgl_lahir'] != "" && $_POST['nik'] != "" && $_POST['warga_negara'] != "" && $_POST['email'] != "" && $_POST['alamat'] != "" && $_POST['kode_pos'] != "" && $_FILES['foto_profil']['name'] != "" && $_POST['username'] != "" && $_POST['password1'] != "" && $_POST['password2'] != ""){
            if(!is_dir('fotoProfil'))
                mkdir('fotoProfil');

            $nama_depan = $_POST['nama_depan'];
            $nama_tengah = $_POST['nama_tengah'];
            $nama_belakang = $_POST['nama_belakang'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $check_tgl_lahir = DateTime::createFromFormat("Y-m-d", $_POST['tgl_lahir']);
            $nik = $_POST['nik'];
            $warga_negara = $_POST['warga_negara'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];
            $kode_pos = $_POST['kode_pos'];
            $dir_tujuan = "fotoProfil/";
            $foto_profil = $_FILES['foto_profil']['name'];
            $foto_temp = $_FILES['foto_profil']['tmp_name'];
            $username = $_POST['username'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            
            if(strlen($nama_depan) < 3 || strlen($nama_tengah) < 3 || strlen($nama_belakang) < 3){
                $comment = "Jumlah karakter Nama Depan / Tengah / Belakang tidak boleh dibawah 3 karakter";
            }
            else if(strlen($tempat_lahir) < 3){
                $comment = "Jumlah karakter Tempat Lahir tidak boleh dibawah 3 karakter";
            }
            else if((2022 - $check_tgl_lahir->format("Y")) < 17){
                $comment = "Umur tidak boleh dibawah 17 tahun";
            }
            else if(!is_numeric($nik) || strlen($nik) != 16){
                $comment = "Panjang NIK harus 16 digit dan berupa number only";
            }
            else if(strlen($warga_negara) < 2){
                $comment = "Jumlah karakter Warga Negara tidak boleh dibawah 2 karakter";
            }
            else if(!is_numeric($no_hp) || (strlen($no_hp) != 12 && strlen($no_hp) != 13)){
                $comment = "Panjang No HP harus 12 atau 13 digit dan berupa number only";
            }
            else if(strlen($alamat) < 6){
                $comment = "Jumlah karakter Alamat tidak boleh dibawah 6 karakter";
            }
            else if(!is_numeric($kode_pos) || strlen($kode_pos) != 5){
                $comment = "Panjang Kode Pos harus 5 digit dan berupa number only";
            }
            else if(strlen($username) < 6){
                $comment = "Jumlah karakter Username tidak boleh dibawah 6 karakter";
            }
            else if($password1 != $password2){
                $comment = "Password 1 dengan Password 2 tidak sesuai";
            }
            else{
                $encode_password = base64_encode($password1);
                $path_file = $dir_tujuan.$foto_profil;
                move_uploaded_file($foto_temp, $path_file);
                
                include('config.php');
                $statement = $connection->prepare(
                    "UPDATE users SET 
                        nama_depan = ?, nama_tengah = ?, nama_belakang = ?,
                        tempat_lahir = ?, tgl_lahir = ?, nik = ?,
                        warga_negara = ?, email = ?, no_hp = ?,
                        alamat = ?, kode_pos = ?, foto_profil = ?, password = ?
                    WHERE username = ?;"
                );
                $statement->bind_param(
                    "ssssssssssssss", 
                    $nama_depan, $nama_tengah, $nama_belakang, 
                    $tempat_lahir, $tgl_lahir, $nik, $warga_negara, 
                    $email, $no_hp, $alamat, $kode_pos, $path_file, 
                    $encode_password, $username
                );
                $statement->execute();
                    
                $_SESSION['nama_depan'] = $nama_depan;
                $_SESSION['nama_tengah'] = $nama_tengah;
                $_SESSION['nama_belakang'] = $nama_belakang;
                $_SESSION['tempat_lahir'] = $tempat_lahir;
                $_SESSION['tgl_lahir'] = $tgl_lahir;
                $_SESSION['nik'] = $nik;
                $_SESSION['warga_negara'] = $warga_negara;
                $_SESSION['email'] = $email;
                $_SESSION['no_hp'] = $no_hp;
                $_SESSION['alamat'] = $alamat;
                $_SESSION['kode_pos'] = $kode_pos;
                $_SESSION['foto_profil'] = $dir_tujuan.$_FILES['foto_profil']['name'];
                $_SESSION['password'] = $password1;

                $comment = "Success Edit Profile";
                $isTrue = true;
            }
        }
        else{
            $comment = "Seluruh Field tidak boleh kosong";
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
                echo "window.location = 'editProfile.php'";
            echo "</script>";
        }
    }
?>