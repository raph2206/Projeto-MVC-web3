<?php

class ProdutoDAO
{
    private $conexao;

    // Método Construtor criado já que a classe será solicitada
    function __construct() 
    {

        // DSN para localizar o servidor 
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Cria a conexão para armazenar nas propriedades
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    // Método que recebe os dados da model para preencher as propriedades
    function insert(ProdutoModel $model) 
    {

        // Código SQL onde os "?" serão substituídos futuramente
        $sql = "INSERT INTO pessoa 
                (nome, preco, data_fabricacao, data_validade) 
                VALUES (?, ?, ?, ?)";
        
        // O prepare vai receber a string sql que tem os marcadores "?"
        $stmt = $this->conexao->prepare($sql);

        // Finalmente recebendo os dados da model 
        // onde o 1 receberá o primeiro "?", o 2 receberá o segundo e assim por diante

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->data_fabricacao);
        $stmt->bindValue(4, $model->data_validade);
        
        $stmt->execute();  //Executa a consulta    
    }
}