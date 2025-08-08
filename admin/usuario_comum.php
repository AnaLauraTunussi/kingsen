<?php

if (!isset($_SESSION)) {
    session_start();

}

if(!$_SESSION['USER'])
{
  $_SESSION['nAutorizada'] = 'Apenas usuários cadastrados podem acessar essa área!';
  header('Location: ../index.php');
}

?>