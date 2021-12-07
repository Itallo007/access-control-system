<!DOCTYPE html>
<html lang="pt-br">

    <form action="../validations/salva_usuario.php" method="post"> 
        <label for="log">Login</label>
        <input id="log" type="text" class="form-control" name="login"><br>
        <label for="sen">Senha</label>
        <input id="sen" type="password" class="form-control" name="senha"><br>
        <label for="ema">Email</label>
        <input id="ema" type="email" class="form-control" name="email"><br>
        <label for="senA">Senha Assinatura</label>
        <input id="senA" type="password" class="form-control" name="senha_assinatura"><br>

        <label for="inserir">Inserir</label>
        <input id="inserir" type="checkbox" name="inserir"></input>
        <label for="atualizar">Atualizar</label>
        <input id="atualizar" type="checkbox" name="atualizar"></input>
        <label for="selecionar">Selecionar</label>
        <input id="selecionar" type="checkbox" name="selecionar"></input>
        <label for="deletar">Deletar</label>
        <input id="deletar" type="checkbox" name="deletar"></input>

        <br>
        <label for="modulo">Modulo</label>
        <?php
            $list = $dao->getListModulos();

            ?><select id="modulo" name="moduloId"><?php
            foreach($list as $item){
                ?>
                    <option value=<?php echo($item->id);?>><?php echo($item->titulo)?></option>
                <?php
            }
            ?></select>
        

        <br>
        <input type="submit" value="Enviar">
    </form>

</html>