<?php

include_once("Conexao.class.php");

//class Inserir_funcionario
class Inserir_funcionario extends Conexao
{
    private $id_usuario;
    private $nomeCompleto;
    private $email;
    private $senha;
    private $phone;
    private $id_tipo;
    private $cpf;
    private $salario;
    private $endereco;
    private $status_func;
    private $data_nasc;
    private $data_contr;

    //getters e setters

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;
        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function getStatus_func()
    {
        return $this->status_func;
    }

    public function setStatus_func($status_func)
    {
        $this->status_func = $status_func;
        return $this;
    }

    public function getData_nasc()
    {
        return $this->data_nasc;
    }

    public function setData_nasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
        return $this;
    }

    public function getData_contr()
    {
        return $this->data_contr;
    }

    public function setData_contr($data_contr)
    {
        $this->data_contr = $data_contr;
        return $this;
    }

    //Metodo inserir Autor
    public function inserirUsuario($nomeCompleto, $email, $senha, $phone, $id_tipo, $cpf, $salario, $endereco, $status_func,  $data_nasc, $data_contr)
    {
        // Setar os atributos
        $this->setNomeCompleto($nomeCompleto);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setPhone($phone);
        $this->setId_tipo($id_tipo);
        $this->setCpf($cpf);
        $this->setSalario($salario);
        $this->setEndereco($endereco);
        $this->setStatus_func($status_func);
        $this->setData_nasc(date('Y-m-d', strtotime($data_nasc)));
        $this->setData_contr(date('Y-m-d', strtotime($data_contr)));

        echo "<pre>";
        var_dump($this->getNomeCompleto(), $this->getEmail(), $this->getPhone(), $this->getId_tipo(), $this->getCpf(), $this->getSalario(), $this->getEndereco(), $this->getStatus_func(), $this->getData_nasc(), $this->getData_contr());
        echo "</pre>";

        // Conectar ao banco de dados
        $db = $this->conectar();



        //montar query

        $sql = "INSERT INTO tb_usuario (
            id_usuario,
            nomeCompleto, 
            email, 
            senha, 
            phone, 
            id_tipo, 
            cpf, 
            salario, 
            endereco, 
            status_func, 
            data_nasc, 
            data_contr
        ) VALUES (
            null,
            :nome_completo, 
            :email, 
            :senha, 
            :telefone, 
            :id_tipo, 
            :cpf, 
            :salario, 
            :endereco, 
            :status_func, 
            :data_nasc, 
            :data_contr
        )";

        //execultar query
        try {
            //conectar banco
            $db = $this->conectar();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //preparar o sql
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':nome_completo', $this->getNomeCompleto(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $this->getPhone(), PDO::PARAM_STR);
            $stmt->bindValue(':id_tipo', $this->getId_tipo(), PDO::PARAM_INT);
            $stmt->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $stmt->bindValue(':salario', $this->getSalario(), PDO::PARAM_STR);
            $stmt->bindValue(':endereco', $this->getEndereco(), PDO::PARAM_STR);
            $stmt->bindValue(':status_func', $this->getStatus_func(), PDO::PARAM_STR);
            $stmt->bindValue(':data_nasc', $this->getData_nasc(), PDO::PARAM_STR);
            $stmt->bindValue(':data_contr', $this->getData_contr(), PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "✅ Funcionário cadastrado com sucesso!";
            } else {
                var_dump($stmt->errorInfo());
            }
            return true;

        } catch (PDOException $e) {
            print "Erro ao inserir";
            return false;
        }
    }
}
