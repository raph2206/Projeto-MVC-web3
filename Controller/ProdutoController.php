<?php

// A classe produto controller vai processar as requisições do úsuario
// Vai devolver views(Como na linha 10 e 15) e acessar models(Como na linha 20) através do Include

class ProdutoController
{
    public static function index()
    {

        // O método index vai devolver a view "ProdutoListar" através do Include 

        include 'View/modules/Produto/ProdutoListar.php';
    }

    public static function cadastro()
    {
        
        // O método cadastro vai devolver a view "ProdutoCadastro"
        // que é um formulário para cadastrar produtos, isso através do Include

        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save()
    {
        include 'Model/ProdutoModel.php';

        // O método save vai acessar e preencher as propriedades abaixo com os dados informados
        // pelo úsuario no form do cadastro de produtos

        $produto = new ProdutoModel();
        $produto->nome = $_POST['nome'];
        $produto->preco = $_POST['preco'];
        $produto->data_fabricacao = $_POST['data_fabricacao'];
        $produto->data_validade = $_POST['data_validade'];

        $produto->save(); // Chama o save do ProdutoModel.php

        header("Location: /produto"); // Redirediciona o úsuario para outra rota
                                     //o /produto que é o "ProdutoListar"
    }
}