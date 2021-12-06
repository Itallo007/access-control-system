<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once('../dataManager/Usuario.php');

    $dao = new DataAccessObject();

    $usuario = new Usuario();
    $usuario = $dao->getUsuario($_GET['id']);

    echo('user'.$usuario->login);
    //fazer a logica pra editar o usuario
?>