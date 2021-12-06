<?php
    extract($_POST);
    include_once("../dataManager/DataAccessObject.php");

    $dao = new DataAccessObject();

    $usuarios = $dao->getListUsuarios();

    $usuario = null;
    //Fazendo a verificacao do login
    foreach($usuarios as $u){
        if($u->email === $login || $u->login === $login && $u->status){
            if($u->senha === $pass){
                $usuario = $u;
                break;
            }
        }
    }

    if($usuario !== null){
        //Usuario logado

        session_start();
        $_SESSION['user'] = serialize($usuario);

        date_default_timezone_set('America/Sao_Paulo');
        $usuario->ultimo_acesso = date('Y/m/d H:i:s');

        if($dao->updateUsuario($usuario)){
            echo("<script>console.log('usuario atualuzado')</script>");
        }else{
            echo("<script>console.log('usuario nao atualuzado')</script>");
        }

        echo('usuario logado com sucesso!');
        header('Location:../pages/deashboard.php');

    }else{
        echo("<br>Not logged in");
        header('location:../index.html');
    }
    
    echo("<br><a href='../index.html'>Voltar</a>");
?>