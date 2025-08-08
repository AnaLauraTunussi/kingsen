<?php

if (!isset($_SESSION)) {
    session_start();

}

if($_SESSION['TYPE'] != '1')
{
    $_SESSION['naoAdm'] = "Apenas Administradore podem acessar";
    header('Location: ../admin.php');
}


?>