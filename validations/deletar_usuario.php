<?php
    include_once('../dataManager/DataAccessObject.php');
    include_once('../dataManager/Usuario.php');
    echo('deletar usuario<br>');

    $dao = new DataAccessObject();

    session_start();
    $user = $dao->getUsuario($_GET['id']);

    if($dao->removeUsuario($user)){
        header('Location:../pages/deashboard.php');
    }else{
        echo('<script>alert("Usuario nao deletado");</script>');
        ?>
            <a href="../pages/deashboard.php">VOLTAR</a>
        <?php
    }

    //Ai qualquer coisa que vc nao entender vc me diz que eu te explico o que é
    //pronto

?>