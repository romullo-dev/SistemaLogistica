<?php 

class Controller{

    //atributos

    //métodos

    //redirecionar pagina
    public function redirecionar($pagina)
    {
        //iniciar sessao
        session_start();
        //incluir menu
        $menu = $this->menu();
        //incluir a view
        require_once 'view/' . $pagina . '.php';
    }

    //validar login
    public function validar($email, $senha)
    {
        //instanciar a classe Usuário 
        $objUsuario = new Usuario();
        //validar usuario
        if ($objUsuario->validarLogin($email, $senha) == true) {
            //iniciar sessao
            session_start();
            //iniciar variaves de sessao
            $_SESSION['email'] = $email;
            //menu
            $menu = $this->menu();
            //incluir a view
            include_once 'view/principal.php';
        } else {
            include_once 'login.php';
            $this->mostrarMensagem("Login ou senha inválidos!");
        }
    }

    //inserir funcionario
    public function Inserir_funcionario ($nomeCompleto, $email, $senha, $phone, $id_tipo, $cpf, $salario, $endereco, $status_func,  $data_nasc, $data_contr)
    {
        //instaciar a classe Inserir_funcionario
        $objInserir_funcionario = new Inserir_funcionario();
        
        //invocar o método
        if ($objInserir_funcionario->inserirUsuario($nomeCompleto, $email, $senha, $phone, $id_tipo, $cpf, $salario, $endereco, $status_func,  $data_nasc, $data_contr)== true)
        {

            print "AAAAAAAAA Funcionário cadastrado!";
            /*//iniciar sessao
            session_start();
            //inserir menu
            $menu = $this->menu();
            include_once 'view/inserirFuncionario.php.php';
             //mostrar mensagem
             $this->mostrarMensagem("Autor inserido com sucesso!");*/
        } else {
            print "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";
             /*//iniciar sessao
             session_start();
             //inserir menu
             $menu = $this->menu();
             //incluir a view
             include_once 'view/consultar.php';
             //mostrar mensagem
             $this->mostrarMensagem("Erro ao inserir autor!");*/
        }

    } 
    //mostrar menu
     public function menu()
     {
        print '<nav class="navbar navbar-expand-lg navbar-light  container">';
        print '            <a class="navbar-brand" href="#">';
        print '              DNA';
        print '      </a>';
        print '   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">';
        print '<span class="navbar-toggler-icon"></span>';
        print '</button>';
        print '<div class="collapse navbar-collapse" id="navbarNav">';
        print '<ul class="navbar-nav ms-auto text-center">';
        print '<li class="nav-item"><a class="nav-link" href="rastreio.html">Rastreio</a></li>';
        print ' <li class="nav-item dropdown">';
        print '       <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Operacional</a>';
        print ' <ul class="dropdown-menu">';
        print ' <li><a class="dropdown-item" href="rotas.html">Rotas</a></li>';
        print ' <li><a class="dropdown-item" href="#">Processos de Ocorrências</a></li>';
        print ' </ul>';
        print ' </li>';
        print '   <li class="nav-item dropdown">';
        print ' <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Cadastros</a>';
        print ' <ul class="dropdown-menu">';
        print ' <li><a class="dropdown-item" href="Cadastro/cadastro_veiculo.html">Cadastro de Veículo</a></li>';
        print ' <li><a class="dropdown-item" href="Cadastro/cadastro_motorista.html">Cadastro de Motorista</a></li>';
        print ' <li><a class="dropdown-item" href="index.php?inserirFuncionario">Cadastro de Funcionário</a></li>';
        print ' </ul>';
        print ' </li>';
        print ' <li class="nav-item"><a class="nav-link" href="aereos.html">Tracking Aéreo</a></li>';
        print ' <li class="nav-item dropdown">';
        print ' <a class="nav-link dropdown-toggle btn btn-primary" href="#" data-bs-toggle="dropdown">'.$_SESSION['email'];
        print ' </a>';
        print ' <ul class="dropdown-menu">';
        print ' <li><a class="dropdown-item" href="../index.html">Sair</a></li>';
        print ' </ul>';
        print ' </li>';
        print ' </ul>';
        print '</div>';
        print '</nav>';
     }
 
     public function mostrarMensagem($mensagem)
     {
         //<!-- Modal -->
         print '<div class="modal fade" id="mensagem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
         print '  <div class="modal-dialog">';
         print '    <div class="modal-content">';
         print '      <div class="modal-header">';
         print '        <h5 class="modal-title" id="exampleModalLabel">Informação</h5>';
         print '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
         print '      </div>';
         print '      <div class="modal-body">';
         print '        <div class="alert alert-warning" role="alert">';
         print $mensagem;
         print '        </div>';
         print '      </div>';
         print '      <div class="modal-footer">';
         print '        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>';
         print '      </div>';
         print '    </div>';
         print '  </div>';
         print '</div>';
 
         //JS
         print '<script>';
         print '    document.addEventListener("DOMContentLoaded", function() {';
         print '    var myModal = new bootstrap.Modal(document.getElementById("mensagem"));';
         print '    myModal.show();});';
         print '</script>';
 
     }



}

    
    

    






