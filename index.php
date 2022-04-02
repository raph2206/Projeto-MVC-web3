<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/PessoaController.php';

switch($uri_parse)
{
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/processa':
        echo "vai pegar o que o usuário digitou <br />";
        echo $_POST['nome'];
        echo "<br />";
        var_dump($_POST);
    break;

}   

include 'Controller/ProdutoController.php';

switch($uri_parse)
{
    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/cadastro':
        ProdutoController::form();
    break;

    case '/produto/save':
        PessoaController::save();
    break;
}