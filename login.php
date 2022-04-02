<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background-color: #fbfdac;
            height          : 100%;
            border          : black 1px solid;
            box-shadow      : rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .title {
            margin: 40px 0px;
        }

        .forms {
            display         : flex;
            flex-direction  : column;
            align-items     : center;
            background-color: #ace6fd;
            padding         : 30px 0px;
            width           : 70%;
        }

        .forms table {
            font-size     : 20pt;
            border-spacing: 20px 1.5rem;
        }

        .forms input {
            font-size: 18pt;
        }

        .loginCancel {
            width          : 52%;
            display        : flex;
            flex-direction : row;
            justify-content: right;
            margin         : 5px 0px 30px 0px;
        }

        .loginCancel a {
            text-decoration : none;
            color           : black;
            background-color: #fdd7ac;
        }

        .loginCancel input {
            background-color: #adf59f;
        }

        .loginCancel a,
        .loginCancel input {
            font-size: 16pt;
            border   : none;
            margin   : 0px 20px;
            padding  : 5px 30px;
        }

        .loginCancel a:hover,
        .loginCancel input:hover {
            opacity: 0.7;
            cursor : pointer;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="title">Login</div>
        <form action="loginProses.php" method="post" class="forms">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <div class="loginCancel">
                <input type="submit" name="submit" value="Login">
                <a href="welcome.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>