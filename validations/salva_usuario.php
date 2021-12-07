<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once('../dataManager/Usuario.php');
    include_once('../dataManager/Permissao.php');
    include_once('../dataManager/UsuarioAcessoModulo.php');
    
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

    $dao->createUsuario($usuario);

    $permissao = new Permissao();

    if(isset($inserir)){
        $permissao->inserir = true;
    }else{
        $permissao->inserir = false;
    }

    if(isset($atualizar)){
        $permissao->atualizar = true;
    }else{
        $permissao->atualizar = false;
    }

    if(isset($selecionar)){
        $permissao->selecionar = true;
    }else{
        $permissao->selecionar = false;
    }

    if(isset($deletar)){
        $permissao->deletar = true;
    }else{
        $permissao->deletar  = false;
    }

    $listaUser = $dao->getListUsuarios();
    $usuario = $listaUser[count($listaUser)];

    $listaPer = $dao->getListPermissoes();
    $permissao = $listaPer[count($listaPer)];

    $dao->createPermissao($permissao);

    $moduloAcesso = new UsuarioAcessoModulo();

    $moduloAcesso->usuario_id = $usuario->id;
    $moduloAcesso->modulo_id = $moduloId;
    $permissaoId = $permissao->id;


    header('Location:../pages/deashboard.php');

?>