<?php
  include_once("../dataManager/DataAccessObject.php");

  $dao = new DataAccessObject();
  $modulos = $dao->getListModulos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modulos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../controller/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../controller/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../controller/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<table class="table table-bordered">
  <thead style="font-weight: bold;">
    <td>Id</td>
    <td>Título</td>
    <td>Descrição</td>
    <td>Criado em</td>
    <td colspan="2" style="text-align: center;" >Opções</td>
  </thead>
  <tbody>
    <?php
      foreach($modulos as $m) {
        echo("
          <tr>
          <td>". $m->id ."</td>
          <td>". $m->titulo ."</td>
          <td>". $m->descricao ."</td>
          <td>". $m->data_criacao ."</td>
          <td><a href='../pages/editar_modulo.php?id=". $m->id ."'>Editar</a></td>
          <td><a href='../validations/deletar_modulo.php?id=". $m->id ."' >Deletar</a></td>
          </tr>
        ");
      }
    ?>
  </tbody>
</table>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>