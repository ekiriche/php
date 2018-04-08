<?php
    session_start();
    unset($_SESSION["logged_on_user"]);
    system("rm ./data/bucket")
    header("Location: /");
?>