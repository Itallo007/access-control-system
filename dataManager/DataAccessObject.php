<?php         
    include_once("Usuario.php");
    include_once("UsuarioAcessoModulo.php");
    class DataAccessObject{

        private $connection;

        public function __construct(){   
            include_once("../database/DataBaseConnection.php");

            $this->connection = $conn;
        }

        //Parte do Módulo de Acesso do Usuário
        public function createUsuarioAcessoModulo($userModuleAccess){
            if($userModuleAccess) {
                			
                $sql = "INSERT INTO usuario_acesso_modulo (usuario_id, 
                                                           modulo_id, 
                                                           permissao_id) 
                        VALUES ('$userModuleAccess->usuario_id', 
                                '$userModuleAccess->modulo_id', 
                                '$userModuleAccess->permissao_id')";

                $ret = $this->connection->query($sql) === TRUE;
                if(!$ret){
                    echo "Erorr while updating record : ". $this->connection->error;
                }
                return $ret;

                //$connection->close();
            }
        }

        public function updateUsuarioAcessoModulo($userModuleAccess){

            if($userModuleAccess->usuario_id !== null) {
                $sql = "UPDATE usuario_acesso_modulo 
                        SET usuario_id = '$userModuleAccess->usuario_id', 
                            modulo_id = '$userModuleAccess->modulo_id', 
                            permissao_id = '$userModuleAccess->permissao_id'                         
                        WHERE usuario_id = {$userModuleAccess->usuario_id}";

                return $this->connection->query($sql) === TRUE;

                //$connection->close();
            }
        }

        public function removeUsuarioAcessoModulo($userModuleAccess){

            if($userModuleAccess->id) {
                $sql = "DELETE FROM usuario_acesso_modulo
                        WHERE usuario_id = $userModuleAccess->usuario_id";

                return $this->connection->query($sql) === TRUE;
            }
        }

        public function getUsuarioAcessoModulo($userId){

            $userModuleAccess = new UsuarioAcessoModulo();

            if($userId){
                $sql = "SELECT * FROM usuario_acesso_modulo WHERE usuario_id = $userId";
                    $result = $this->connection->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $userModuleAccess->usuario_id = $row['usuario_id'];
                        $userModuleAccess->modulo_id = $row['modulo_id'];
                        $userModuleAccess->permissao_id = $row['permissao_id'];

                        return $userModuleAccess;                       
                    }
                } 
            }

        }

        public function getListUsuarioAcessoModulo(){
            $userModuleAccessList = array();

            $sql = "SELECT * FROM usuario_acesso_modulo";
                $result = $this->connection->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $userModuleAccess = new UsuarioAcessoModulo();

                    $userModuleAccess->usuario_id = $row['usuario_id'];
                    $userModuleAccess->modulo_id = $row['modulo_id'];
                    $userModuleAccess->permissao_id = $row['permissao_id'];

                    array_push($userModuleAccessList, $userModuleAccess);                       
                }
            } 

            return $userModuleAccessList;
        }

        //Fim da parte do Módulo de Acesso do Usuário

        //Parte do Usuário 
        public function createUsuario($user){
            if($user) {
                $sql = "INSERT INTO usuario (login, senha, ultimo_acesso, criacao, email, 
                                            status, senha_assinatura) 
                        VALUES ('$user->login', '$user->senha', '$user->ultimo_acesso',
                                '$user->criacao', '$user->email', '$user->status', '$user->senha_assinatura')";

                return $this->connection->query($sql) === TRUE;

                //$connection->close();
            }
        }

        public function updateUsuario($user){

            if($user->id !== null) {
                $sql = "UPDATE usuario 
                        SET login = '$user->login', 
                            senha = '$user->senha', 
                            ultimo_acesso = '$user->ultimo_acesso', 
                            criacao = '$user->criacao', 
                            email = '$user->email',
                            status = '$user->status',
                            senha_assinatura = '$user->senha_assinatura' 
                        WHERE id = {$user->id}";

                return $this->connection->query($sql) === TRUE;

                //$connection->close();
            }
        }

        public function removeUsuario($user){

            if($user->id) {
                $sql = "UPDATE usuario SET status = 0 WHERE id = $user->id";

                return $this->connection->query($sql) === TRUE;
            }
        }

        public function getUsuario($id){

            $usuario = new Usuario();

            if($id){
                $sql = "SELECT * FROM usuario WHERE id = $id";
                    $result = $this->connection->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $usuario->id = $row['id'];
                        $usuario->login = $row['login'];
                        $usuario->senha = $row['senha'];
                        $usuario->ultimo_acesso = $row['ultimo_acesso'];
                        $usuario->criacao = $row['criacao'];
                        $usuario->email = $row['email'];
                        $usuario->status = $row['status'];
                        $usuario->email = $row['email'];
                        $usuario->senha_assinatura = $row['senha_assinatura'];

                        return $usuario;                       
                    }
                } 
            }

        }

        public function getListUsuarios(){
            $usuarios = array();

            $sql = "SELECT * FROM usuario";
                $result = $this->connection->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuario = new Usuario();

                    $usuario->id = $row['id'];
                    $usuario->login = $row['login'];
                    $usuario->senha = $row['senha'];
                    $usuario->ultimo_acesso = $row['ultimo_acesso'];
                    $usuario->criacao = $row['criacao'];
                    $usuario->email = $row['email'];
                    $usuario->status = $row['status'];
                    $usuario->email = $row['email'];
                    $usuario->senha_assinatura = $row['senha_assinatura'];

                    array_push($usuarios, $usuario);                       
                }
            } 

            return $usuarios;
        }
        //Fim da parte do Usuário

    }


?>