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
        echo("<br>Logged in");
        echo("<br> Id: " . $usuario->id);
        echo("<br> Login: " . $usuario->login);
        echo("<br> Senha: " . $usuario->senha);
        echo("<br> Último Acesso: " . $usuario->ultimo_acesso);
        echo("<br> Criação: " . $usuario->criacao);
        echo("<br> E-Mail: " . $usuario->email);
        echo("<br> Status: " . $usuario->status);
        echo("<br> Senha Assinatura: " .$usuario->senha_assinatura);
       
        //Usuario logado

        session_start();
        $_SESSION['user'] = $usuario;

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