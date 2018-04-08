<?php
    session_start();
    foreach ($_POST as $el)
        if ($el !== "")
            $_SESSION["category"] = $el;
    header("Location: ../");
?>