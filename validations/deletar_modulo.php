<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once('../dataManager/Modulo.php');

    $dao = new DataAccessObject();
    $modulo = $dao->getModulo($_GET['id']);

    if($dao->deleteModulo($modulo)){
        header('Location:../pages/listar_modulos.php');
    }else{
        echo('<script>alert("Usuario nao deletado");</script>');
        ?>
            <a href="../pages/deashboard.php">VOLTAR</a>
        <?php
    }
?>