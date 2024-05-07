<?php

require_once '../session/session_start.php';
require_once '../session/session_control.php';
require_once '../header.php';

require_once '../services/Utilidades.php';
require_once '../services/LoginService.php';

$usuarios = LoginService::getUsers();
$usuario_atual = $usuarios[$_SESSION['username']];

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <link rel="stylesheet" href="../css/my-account-style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha conta</title>
  </head>
  <body>

    <?php
      $data_nascimento = date_create($usuario_atual['data_nascimento']);
      $data_nascimento = date_format($data_nascimento,"d/m/Y");
    ?>
    <div class="content-container">
      <div class="informations-container">

        <label class="information-label" for="nome">Nome</label>
        <input class="information-field" type="text" id="nome" name="nome" value="<?= $usuario_atual['nome'] ?>" disabled>
        <label class="information-label" for="data_nascimento">Data de nascimento</label>
        <input class="information-field" type="datetime" id="data_nascimento" name="data_nascimento" value="<?= $data_nascimento ?>" disabled>
        <label class="information-label" for="cargo">Cargo</label>
        <input class="information-field" type="text" id="cargo" name="cargo" value="<?= $usuario_atual['cargo'] ?>" disabled>
        <label class="information-label" for="email">E-mail</label>
        <input class="information-field" type="email" id="email" name="email" value="<?= $usuario_atual['email'] ?>" disabled>
        <label class="information-label" for="telefone">Telefone</label>
        <input class="information-field" type="tel" id="telefone" name="telefone" value="<?= Utilidades::formatarCelular($usuario_atual['telefone']) ?>" disabled>
        <label class="information-label" for="password">Senha</label>
        <div>
          <input class="information-field" type="password" id="password" name="password" value="<?= $usuario_atual['password'] ?>" disabled>
          <span class="ver-senha" onclick="mostraSenha()">👁️</span>
        <div>
      </div>
    </div>
  </body>

  <script>
    function mostraSenha() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>