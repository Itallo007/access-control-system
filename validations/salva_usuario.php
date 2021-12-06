<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once('../dataManager/Usuario.php');
    
    $dao = new DataAccessObject();

    extract($_POST);

    $usuario = new Usuario();
    $usuario->login = $login;
    $usuario->senha = $senha;
    $usuario->email = $email;
    $usuario->senha_assinatura = $senha_assinatura;

    $usuario->status = true;
    
    date_default_timezone_set('America/Sao_Paulo');
    $usuario->criacao = date('Y/m/d H:i:s');

    if($dao->createUsuario($usuario)){
        header('Location:../pages/deashboard.php');
    }else{
        echo('<script>alert("Usuario nao inserido");</script>');
        ?>
            <a href="../pages/deashboard.php">VOLTAR</a>
        <?php
    }




?>