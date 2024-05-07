<?php
require_once '../session/session_start.php';
require_once '../session/session_control.php';
require_once '../header.php';

require_once '../services/CepService.php';

$cep = isset($_GET['cep']) ? $_GET['cep'] : '';

$infos_cep = CepService::consultaCep($cep);

$consulta_cep_erro = !isset($infos_cep->cep);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <link rel="stylesheet" href="../css/consulta-cep-style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta por CEP</title>
  </head>

  <body>

    <div class="titulo">
      <h4>Busca reversa por CEP</h4>
    </div>
    
    <div class="form-container">
            
      <form method="get">
        <input type="number" name="cep" placeholder="Digite aqui o CEP" value="<?= $cep ?>">
        <input class="btn btn-primary" type="submit" value="Buscar">
      </form>
        
    </div>

    <div class="result-container">
      
      <?php if (! $consulta_cep_erro): ?>
  
        <div class="fields-container">
          <h4>Resultados para o CEP: <?= $cep ?></h4>
          <label class="information-label" for="logradouro">Logradouro</label>
          <input class="information-field" type="text" id="logradouro" name="logradouro" value="<?= $infos_cep->logradouro ?>" disabled>
          <label class="information-label" for="complemento">Complemento</label>
          <input class="information-field" type="text" id="complemento" name="complemento" value="<?= $infos_cep->complemento ?>" disabled>
          <label class="information-label" for="bairro">Bairro</label>
          <input class="information-field" type="text" id="bairro" name="bairro" value="<?= $infos_cep->bairro ?>" disabled>
          <label class="information-label" for="estado">Estado</label>
          <input class="information-field" type="text" id="estado" name="estado" value="<?= $infos_cep->uf ?>" disabled>
          <label class="information-label" for="cidade">Cidade</label>
          <input class="information-field" type="text" id="cidade" name="cidade" value="<?= $infos_cep->localidade ?>" disabled>
          <label class="information-label" for="ddd">DDD</label>
          <input class="information-field" type="text" id="ddd" name="ddd" value="<?= $infos_cep->ddd ?>" disabled>
        </div>
  
      <?php else: ?>
  
        <?php if (isset($_GET['cep']) && $_GET['cep'] != ""): ?>
          <h4>Sem resultados para o CEP informado</h4>
        <?php endif; ?>
  
      <?php endif; ?>
      
    </div>
      
  </body>