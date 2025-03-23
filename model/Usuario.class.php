<?php
//incluir classe Conexao
include_once 'Conexao.class.php';

//classe Usuario
class Usuario extends Conexao
{
    //atributos
    private $id_usuario;
    private $email;
    private $senha;

    //getters e setters
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    //metodo validarlogin
    public function validarLogin($email, $senha)
    {
        //setar os dados
        $this->setEmail(email: $email);
        $this->setSenha($senha);

        //sql
        $sql = "SELECT COUNT(*) AS quantidade FROM tb_usuario where email= :email and senha= :senha";
 
        try {
            //conectar com o banco
            $bd = $this->conectar();
            //preparar o sql
            $query = $bd->prepare($sql);
            //blidagem dos dados
            $query->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
            //excutar a query
            $query->execute();
            //retorna o resultado
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            //verificar o resultado
            foreach ($resultado as $key => $valor) {
                $quantidade = $valor->quantidade;
            }
            //testar quantidade
            if ($quantidade == 1) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            //print "Erro ao consultar";
            return false;
        }
    }
}
