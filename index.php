<?php
require_once 'session/session_start.php';
require_once 'session/session_control.php';
require_once 'header.php';

require_once 'services/LoginService.php';

$usuarios = LoginService::getUsers();
$usuario_atual = $usuarios[$_SESSION['username']];
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <link rel="stylesheet" href="../css/home-page-style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
  </head>
  <body>
    
     <div class="content-container">
       <div class="content">
         <h1 style="text-align: center">Bem vindo(a) <?= $usuario_atual['nome'] ?></h1>
       <div>
     </div>

  </body>