<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once('../dataManager/Usuario.php');

    $dao = new DataAccessObject();
    $usuario = new Usuario();
    
    $usuario = $dao->getUsuario($_GET['id']);

    if($_POST){
        extract($_POST);

        $usuario->id = $id;
        $usuario->login = $login;
        $usuario->senha = $senha;
        $usuario->email = $email;
        $usuario->senha_assinatura = $senha_assinatura;

        $dao->updateUsuario($usuario);
    }


    
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
            <h3 class="card-title">Editar Usuário</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post">
            <div class="card-body">
                <div style="display:none;">
                    <label>Id</label>
                    <input type="text" 
                           class="form-control"
                           name="id"
                           value="<?php echo($usuario->id);?>">
                           
                </div>
                <div class="form-group">
                    <label>Login</label>
                    <input type="text" 
                           class="form-control"
                           name="login"
                           value="<?php echo($usuario->login);?>">

                </div>
                <div class="form-group">
                    <label>Nova Senha</label>
                    <input type="password" 
                           class="form-control"
                           name="senha"
                           value="<?php echo($usuario->senha);?>">
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" 
                           class="form-control"
                           name="email"
                           value="<?php echo($usuario->email);?>">
                </div>
                <div class="form-group">
                    <label>Senha Assinatura</label>
                    <input type="password" 
                           class="form-control"
                           name="senha_assinatura"
                           value="<?php echo($usuario->senha_assinatura);?>">
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
