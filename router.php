<?php
//pegar a url
$url = explode('?', $_SERVER['REQUEST_URI']);
//escolher na variável $url do link desejado
$pagina = $url[1];

#ROTAS DE REDIRECIONAMENTO
//redirecionar para pagina informada
if (isset($pagina)) {
    $objController = new Controller();
    $objController->redirecionar($pagina);
}

#ROTAS DE ACAO
//verificar o botao login foi acionado
if (isset($_POST['login'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    //invocar o método de validar
    $objController->validar($email, $senha);
}

//Inserir auto
if (isset($_POST['cadastrarFuncionario'])) {
    //instaciar contralador
    $objController  = new Controller();

    //dados
    $nomeCompleto = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $phone = htmlspecialchars($_POST['phone']);
    $id_tipo = htmlspecialchars($_POST['tipo']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $salario = floatval($_POST['salario']);
    $endereco = htmlspecialchars($_POST['endereco']);
    $status_func = htmlspecialchars($_POST['status']);
    $data_nasc = htmlspecialchars($_POST['dataNascimento']);
    $data_contr = htmlspecialchars($_POST['dataContratacao']);
    $salario = floatval($_POST['salario']);

    // Exibir os dados recebidos do formulário
    echo "<pre>";
    var_dump($_POST);  // Verificando todos os dados enviados via POST
    echo "</pre>";
    $objController->Inserir_funcionario($nomeCompleto, $email, $senha, $phone, $id_tipo, $cpf, $salario, $endereco, $status_func, $data_nasc, $data_contr);
}