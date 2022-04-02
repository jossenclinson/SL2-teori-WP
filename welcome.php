<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
            background-color: #e5edeb;
            height          : 100%;
            border          : black 1px solid;
            box-shadow      : rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .title {
            margin-top   : 40px;
            margin-bottom: 100px;
        }

        .button {
            display        : flex;
            flex-direction : row;
            justify-content: space-between;
        }

        .login,
        .register {
            margin: 15px 40px;
        }

        .login a,
        .register a {
            text-decoration : none;
            color           : black;
            padding         : 15px 25px;
            background-color: #99d6ed;
        }

        .login a:hover,
        .register a:hover {
            opacity: 0.7;
        }

        .register a {
            background-color: #c6ed99;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="title">Aplikasi Pengelolaan Keuangan</div>
        <div class="welcome-title"><h3>Selamat Datang di Aplikasi Pengelolaan Keuangan</h3></div>
        <div class="button">
            <div class="login"><a href="login.php">Login</a></div>
            <div class="register"><a href="register.php">Register</a></div>
        </div>
    </div>
</body>
</html>