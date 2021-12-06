<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

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
<?php
    include('../dataManager/Usuario.php');
    include('../dataManager/DataAccessObject.php');

    if(isset($_SESSION)){
        $dao = new DataAccessObject();
        $usuario = new Usuario();

        $usuario = $_SESSION['user'];

        $usuario_acesso_modulo = $dao->getUsuarioAcessoModulo($usuario->id);
        $permissao = $dao->getPermissao($usuario_acesso_modulo->permissao_id);
        $modulo = $dao->getModulo($usuario_acesso_modulo->modulo_id);
       
    
        if($permissao->selecionar){ 
            $listaUsuarios = $dao->getListUsuarios();
            ?>
            <ul>
                <li>TODOS OS USUÁRIOS</li>
            <?php
                foreach($listaUsuarios as $user){
                    if($user->status){
            ?>
                            <li>
                            <span class="fas fa-user"></span>
                        <?php
                            echo($user->login);
                            if($permissao->deletar && $user->id != $usuario->id){?>
                                <button class="btn btn-default" onclick="window.location.href='<?php echo('../validations/deletar_usuario.php?id='.$user->id);?>'">    
                                    <span class="fas fa-trash-alt"></span>
                                </button>    
                                
                                <?php
                            }
                            if($permissao->atualizar){?>
                                <button class="btn btn-default" onclick="window.location.href='<?php echo('../validations/editar_usuario.php?id='.$user->id);?>'">    
                                    <span class="fas fa-edit"></span>
                                </button>     
                                <?php
                            }
                                ?>
                            </li>
                        <?php
                    }
                }
            ?>
            </ul>
            <?php

            if($permissao->inserir){?>
                <h1>
                    Inserir novo usuário
                </h1>
            <?php

                include('components/usuario_cadastro.html');
            }
            
        }
        
        

    }else{
        header('Location:../index.html');
    }
    
?>
</body>