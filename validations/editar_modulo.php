<?php
  require_once "../dataManager/DataAccessObject.php";
  require_once "../dataManager/Modulo.php";

  extract($_POST);

  $modulo = new Modulo();
  $dao = new DataAccessObject();

  $modulo->id = $id;
  $modulo->titulo = $titulo;
  $modulo->descricao = $descricao;

  if($dao->updateModulo($modulo)) {
    header("Location: http://localhost/access-control-system/pages/listar_modulos.php?message=Atualizado+Com+Sucesso");
  }else {
    echo("Deu ruim");
  }
?>