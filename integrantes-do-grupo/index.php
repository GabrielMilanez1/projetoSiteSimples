<?php
require_once '../session/session_start.php';
require_once '../session/session_control.php';
require_once '../header.php';

require_once '../services/LoginService.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <link rel="stylesheet" href="../css/integrantes-grupo-style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrantes do Grupo</title>
  </head>
  <body>
    <div class="tabela-ra-container">
      <table class="tabela-ra table table-striped table-condensed">
        <tr>
          <th class="nome-integrante">
            Nome
          </th>
          <th class="ra-integrante">
            RA
          </th>
        </tr>
      <?php foreach (LoginService::getIntegrantesGrupoByUsername($_SESSION['username']) as $integrante): ?>
        <tr>
          <td class="nome-integrante">
             <?= $integrante['nome'] ?>
          </td>
          <td class="ra-integrante">
             <?= $integrante['RA'] ?>
          </td>
        </tr> 
      <?php endforeach; ?>
      </table>
    </div>
  </body>