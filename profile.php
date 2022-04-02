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
    <title>Home</title>
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
            font-size       : 20pt;
            background-color: #cad1ff;
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

        .profiles caption {
            margin     : 30px 0px;
            font-size  : 26pt;
            font-weight: bold;
        }

        .profiles table {
            font-size     : 16pt;
            border-spacing: 5px 1.3rem;
        }

        .profiles td{
            vertical-align : top;
        }

        .profiles td:nth-child(even) {
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <div class="title">Aplikasi Pengelolaan Keuangan</div>
            <div class="navbar">
                <a href="home.php">Home</a>
                <a href="" class="active">Profile</a>
                <a href="editProfile.php">Edit Profile</a>
            </div>

            <div class="logout"><a href="logout.php">Logout</a></div>
        </div>
        <div class="main">
           <div class="title"></div>
           <div class="profiles">
                <table>
                    <caption>Profil Pribadi</caption>
                    <tr>
                        <td>Nama Depan</td>
                        <td><?php echo "<b>".$_SESSION['nama_depan']."</b>" ?></td>
                        <td>Nama Tengah</td>
                        <td><?php echo "<b>".$_SESSION['nama_tengah']."</b>" ?></td>
                        <td>Nama Belakang</td>
                        <td><?php echo "<b>".$_SESSION['nama_belakang']."</b>" ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td><?php echo "<b>".$_SESSION['tempat_lahir']."</b>" ?></td>
                        <td>Tgl Lahir</td>
                        <td><?php echo "<b>".$_SESSION['tgl_lahir']."</b>" ?></td>
                        <td>NIK</td>
                        <td><?php echo "<b>".$_SESSION['nik']."</b>" ?></td>
                    </tr>
                    <tr>
                        <td>Warga Negara</td>
                        <td><?php echo "<b>".$_SESSION['warga_negara']."</b>" ?></td>
                        <td>Email</td>
                        <td><?php echo "<b>".$_SESSION['email']."</b>" ?></td>
                        <td>No HP</td>
                        <td><?php echo "<b>".$_SESSION['no_hp']."</b>" ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo "<b>".$_SESSION['alamat']."</b>" ?></td>
                        <td>Kode Pos</td>
                        <td><?php echo "<b>".$_SESSION['kode_pos']."</b>" ?></td>
                        <td>Foto Profil</td>
                        <td><?php echo "<img src='".$_SESSION['foto_profil']."' alt='' width='125' height='125'>"; ?></td>
                    </tr>
                </table>
           </div>
        </div>
    </div>
</body>
</html>