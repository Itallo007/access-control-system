<?php
  include_once('../dataManager/DataAccessObject.php');
  include_once('../dataManager/Modulo.php');
  
  $dao = new DataAccessObject();

  extract($_POST);

  $modulo = new Modulo();
  $modulo->titulo = $titulo;
  $modulo->descricao = $descricao;
  $modulo->status = 1;
  
  date_default_timezone_set('America/Sao_Paulo');
  $modulo->criacao = date('Y/m/d H:i:s');

  if($dao->createModulo($modulo)){
      header('Location:../pages/deashboard.php');
      exit;
  }else{
      echo('<script>alert("Módulo nao inserido");</script>');
      ?>
          <a href="../pages/deashboard.php">VOLTAR</a>
      <?php
  }
?>