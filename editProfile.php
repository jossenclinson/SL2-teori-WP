<?php
    session_start();
    if(isset($_SESSION['username']) == ""){
        echo "<script>";
            echo "window.location = 'login.php'";
        echo "</script>";
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            position: absolute;
            top     : 12%;
            left    : 7.5%;
            height  : 550px;
            width   : 85%;
        }

        .content {
            display         : flex;
            flex-direction  : column;
            align-items     : center;
            background-color: #c2f0f7;
            height          : 100%;
            border          : black 1px solid;
            box-shadow      : rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .header {
            width           : 100%;
            height          : 60px;
            display         : flex;
            flex-direction  : row;
            align-items     : center;
            justify-content : space-between;
            font-size       : 20pt;
            background-color: #f9ffca;
        }

        .title {
            margin-left: 20px;
        }

        .navbar a {
            text-decoration: none;
            margin         : 0px 20px;
            color          : black;
        }

        .navbar .active {
            text-decoration: underline;
        }

        .logout {
            margin-right: 20px;
        }

        .logout a{
            text-decoration: none;
            color          : black;
        }

        .forms {
            display         : flex;
            flex-direction  : column;
            align-items     : center;
        }

        .forms caption {
            margin   : 25px 0px 5px 0px; 
            font-size: 26pt;
        }

        .forms table {
            font-size     : 16pt;
            border-spacing: 20px 1.5rem;
        }

        .forms td {
            vertical-align: top;
        }

        .submitCancel {
            width          : 80%;
            display        : flex;
            flex-direction : row;
            justify-content: right;
        }

        .submitCancel a {
            text-decoration : none;
            color           : black;
            background-color: #fdd7ac;
        }

        .submitCancel input {
            background-color: #adf59f;
        }

        .submitCancel a,
        .submitCancel input {
            font-size : 16pt;
            border    : black 2px solid;
            margin    : 10px 20px;
            padding   : 5px 40px;
            box-shadow: rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .submitCancel a:hover,
        .submitCancel input:hover {
            opacity: 0.7;
            cursor : pointer;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <div class="title">Aplikasi Pengelolaan Keuangan</div>
            <div class="navbar">
                <a href="home.php">Home</a>
                <a href="profile.php">Profile</a>
                <a href="" class="active">Edit Profile</a>
            </div>

            <div class="logout"><a href="logout.php">Logout</a></div>
        </div>
        <form action="editProfileProses.php" method="post" class="forms" enctype="multipart/form-data">
            <table>
                <caption>Edit Profile</caption>
                <tr>
                    <td>Nama Depan</td>
                    <td><input type="text" name="nama_depan" value="<?php echo $_SESSION['nama_depan']; ?>"></td>
                    <td>Nama Tengah</td>
                    <td><input type="text" name="nama_tengah" value="<?php echo $_SESSION['nama_tengah']; ?>"></td>
                    <td>Nama Belakang</td>
                    <td><input type="text" name="nama_belakang" value="<?php echo $_SESSION['nama_belakang']; ?>"></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td><input type="text" name="tempat_lahir" value="<?php echo $_SESSION['tempat_lahir']; ?>"></td>
                    <td>Tgl Lahir</td>
                    <td><input type="date" name="tgl_lahir" value="<?php echo $_SESSION['tgl_lahir']; ?>"></td>
                    <td>NIK</td>
                    <td><input type="text" name="nik" value="<?php echo $_SESSION['nik']; ?>"></td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td><input type="text" name="warga_negara" value="<?php echo $_SESSION['warga_negara']; ?>"></td>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
                    <td>No HP</td>
                    <td><input type="text" name="no_hp" value="<?php echo $_SESSION['no_hp']; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="alamat" rows="5"><?php echo $_SESSION['alamat']; ?></textarea></td>
                    <td>Kode Pos</td>
                    <td><input type="text" name="kode_pos" value="<?php echo $_SESSION['kode_pos']; ?>"></td>
                    <td>Foto Profil</td>
                    <td><input type="file" name="foto_profil" value="<?php echo $_SESSION['foto_profil']; ?>" accept="image/*"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" readonly></td>
                    <td>Password 1</td>
                    <td><input type="password" name="password1" value="<?php echo base64_decode($_SESSION['password']); ?>"></td>
                    <td>Password 2</td>
                    <td><input type="password" name="password2" value="<?php echo base64_decode($_SESSION['password']); ?>"></td>
                </tr>
            </table>
            <div class="submitCancel">
                <a href="home.php">Kembali</a>
                <input type="submit" name="submit" value="Edit">
            </div>
        </form>
    </div>
</body>
</html>