<?php
    session_start();
    session_destroy();

    echo "<script>";
        echo "alert('Success Logout Account')";
    echo "</script>";

    echo "<script>";
        echo "window.location = 'welcome.php'";
    echo "</script>";
?>