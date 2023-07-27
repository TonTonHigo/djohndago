<?php
// Ici pour déco le mec on tue sa session avant de le redirigé
    session_start();
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();

?>