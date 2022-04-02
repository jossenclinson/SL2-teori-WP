<?php
    include('config.php');
    session_start();

    if(isset($_SESSION['username'])){
        $statement = $connection->prepare("SELECT username FROM users WHERE username = ?;");
        $statement->bind_param("s", $_SESSION['username']);
        $statement->execute();
        
        $get_result = $statement->get_result();
        $check_username = $get_result->fetch_assoc();

        if($check_username['username']){
            header("location:home.php");
        }
        else{
            session_destroy();
            header("location:welcome.php");
        }

        $statement->close();
    }
?>