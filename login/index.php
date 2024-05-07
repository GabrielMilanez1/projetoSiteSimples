<?php

require_once '../session/session_start.php';
require_once '../services/LoginService.php';


$_SESSION = [];

$falha_login = false;

if ($_POST) {

  if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $correspondencia = LoginService::login($_POST['username'], $_POST['password']);
    
    if($correspondencia) {
      
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['data_login'] = date("d/m/Y - H:i:s");
      session_write_close();
      
      header('location: /');
      exit();
      
    } else {
      $falha_login = true;
    }
    
  }
    
}

?>

  <?php if(!$falha_login): ?>
    <style>
      .erro-login {
        display: none;
        visibility: hidden;
      }
    </style>
  <?php endif; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

  <link rel="stylesheet" href="../css/login-style.css">
  <meta charset="UTF-8">
  
  <title>Login</title>

  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">

</head>
<body>

<div class="container">
    <h2>Realize o login</h2>
  
    <div class="erro-login">
      <h4 style="text-align: center; color:red">Usuário ou senha inválidos!</h4>
      <h5 style="text-align: center; color:red">Tente novamente</h4>
    </div>
  
    <form method="post">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="submit" value="Logar">
        <a style="display: flex; justify-content: center; padding-top: 1em;" href="../contas.json">Clique aqui pra ver os logins de teste</a>
    </form>
</div>

</body>
</html>
