<?php

require_once '../session/session_start.php';
require_once '../session/session_control.php';
require_once '../header.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
  
  <head>
    <link rel="stylesheet" href="../css/tabela-automatica-style.css">
    <script src="../tabela-automatica/scripts.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela automática</title>
  </head>
  <body>
    <div class="gerador-container">"
      <?php
        $contador = 0;
  
          $limite_colunas = 5;
  
          if(isset($_GET['linhas'])) {
            $linhas = $_GET['linhas'];
          } else {
            $linhas = '';
          }
  
          if(isset($_GET['colunas']) and $_GET['colunas'] != '') {
            $colunas = $_GET['colunas'];
          } else {
            $colunas = '';
          }
  
          if(isset($_GET['gerar_tabela'])) {
  
            $classe_esconde = 'esconder-class';
            $classe_aparece = 'aparecer-class';
            $centraliza_body = 'justify-content: center; display: flex; align-items: center;';
          } else {
  
            $classe_esconde = 'aparecer-class';
            $classe_aparece = 'esconder-class';
            $centraliza_body = '';
          }
  
        if(isset($_GET['colunas']) and $_GET['colunas'] > 5){
          $_GET['colunas'] = 5;
        }
  
      ?>
  
        <div class="form-linhas-colunas-div <?php echo $classe_esconde ?>">
          <form class="linhas-colunas-div" method="get">
            <input class="form-group" type="number" min="0" max="<?php echo $limite_colunas ?>" name="colunas" value="<?php echo $colunas ?>" placeholder="Digite um número de colunas (MAX <?php echo $limite_colunas ?>)">
            <input class="form-group" type="number" min="0" name="linhas" value="<?php echo $linhas ?>" placeholder="Digite um número de linhas">
            <input class="form-group" type="submit" value="Gerar">
          </form>
        </div>
  
        <div class="form-conteudo-div <?php echo $classe_esconde ?>" style="justify-content: center; display: flex; padding-bottom: 1em;">
          <form class="colunas" method="get">
  
            <?php if(isset($_GET['colunas']) and isset($_GET['linhas']) and $_GET['linhas'] != '' and $_GET['colunas'] != ''): ?>
              <?php for ($c = 0; $c < $_GET['colunas']; $c++): ?>
                <input class="form-group" type="text" name="cabecalho[]" placeholder="Cabeçalho da coluna">
              <?php endfor; ?>
            <?php endif; ?>
  
        </div>
  
        <div class="form-conteudo-div">
  
  
            <?php if(isset($_GET['colunas']) and isset($_GET['linhas']) and $_GET['linhas'] != '' and $_GET['colunas'] != ''): ?>
              <div class="<?php echo $classe_esconde ?>" style="display: flex; justify-content: center;">
                <div class="input-organizar">
  
                  <?php for ($l = 0; $l < $_GET['linhas']; $l++): ?>
  
                    <div class="colunas">
                      <?php for ($c = 0; $c < $_GET['colunas']; $c++): ?>
                        <input class="form-group" type="text" name="coluna_text[]" placeholder="Conteúdo da coluna">
                      <?php endfor; ?>
                    </div>
  
                  <?php endfor; ?>
  
                  <input type="hidden" name="linhas" value="<?php echo $_GET['linhas']?>">
                  <input type="hidden" name="colunas" value="<?php echo $_GET['colunas']?>">
                  <input class="form-group" type="submit" name="gerar_tabela" value="Gerar tabela">
                </div>
              </div>
            <?php endif; ?>
          </form>
  
            <div class="tabela-final-group">
              <table id="tabela-final-dados" class="table-striped table-condensed table <?php echo $classe_aparece ?>" style="display: flex; justify-content: center;">
  
                  <div class="table-organizar">
                    <?php if(isset($_GET['colunas']) and isset($_GET['linhas']) and $_GET['linhas'] != '' and $_GET['colunas'] != ''): ?>
  
                      <?php for($a = 0; $a < $_GET['colunas']; $a++): ?>
                        <th class="titulo-cabecalho">
                          <?php echo $_GET['cabecalho'][$a]?>
                        </th>
                      <?php endfor; ?>
  
                      <?php for($l = 0; $l < $_GET['linhas']; $l++): ?>
  
                        <tr>
                        <?php for($g = 0; $g < $_GET['colunas']; $g++): ?>
  
                            <td>
                              <?php
                                echo $_GET['coluna_text'][$contador];
                                $contador++;
                              ?>
                            </td>
  
                        <?php endfor; ?>
                        </tr>
  
                      <?php endfor; ?>
                    <?php endif; ?>
  
                  </div>
  
              </table>
            <div class="botoes-div <?php echo $classe_aparece ?>">
              <button class="btn btn-primary"><a href="/tabela-automatica">Gerar outra tabela</a></button>
              <button class="btn btn-danger" onclick="exportToExcel('<?= $_SESSION['username'] ?>')" id="download-excel">Baixar em excel (.xls)</button>
            </div>
          </div>
  
  
        </div>
    </div>
    
  </body>
</html>