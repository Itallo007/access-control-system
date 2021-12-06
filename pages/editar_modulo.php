<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once("../dataManager/Modulo.php");

    $modulo = new Modulo();
    $dao = new DataAccessObject();
    $modulo = $dao->getModulo($_GET['id']);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDITAR USUÁRIO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../controller/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../controller/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../controller/dist/css/adminlte.min.css">
</head>
<body class="hold-transition">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Módulo</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php 
            echo($_GET["message"]);
        ?>
        <form action="../validations/editar_modulo.php" method="post">
            <div class="card-body">
                <div style="display:none;">
                    <label>Id</label>
                    <input type="text" 
                           class="form-control"
                           name="id"
                           value="<?php echo($modulo->id);?>">
                           
                </div>
                <div class="form-group">
                    <label>Título</label>
                    <input 
                        type="text" 
                        class="form-control"
                        name="titulo"
                        value="<?php echo($modulo->titulo);?>"
                        required     
                    >

                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input 
                        type="text" 
                        class="form-control"
                        name="descricao"
                        value="<?php echo($modulo->descricao);?>"
                        required
                    >
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
        <div class="card-footer">
            <a
               class="btn btn-danger"
               href="../pages/deashboard.php">Cancelar</a>
        </div>
    </div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

