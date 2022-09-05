<?php

namespace DAO;
use Model\CategoriaModel;
use \PDO;

class CategoriaDAO
{
    private $conexao;

    function __construct() 
    { 
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database']; 
        $user = $_ENV['db']['user']; 
        $pass = $_ENV['db']['pass']; 
        
        $this->conexao = new PDO($dsn, $user, $pass); 
    }

    function insert(CategoriaModel $model) 
    {
        $sql = "INSERT INTO categorias 
                (nome) VALUES (?)"; 
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome); 
                                           
        $stmt->execute(); 
    }

    
    function getAllRows() 
    {
        $sql = "SELECT * FROM categorias"; 

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); 

        return $stmt->fetchAll(); 
    }

    
    public function selectById(int $id) 
    {

        $sql = "SELECT * FROM categorias WHERE id = ?"; 

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id); 
        $stmt->execute(); 

        return $stmt->fetchObject("App\Model\CategoriaModel"); 
    }

    public function update(CategoriaModel $model) 
    {
        $sql = "UPDATE categorias SET nome=? WHERE id=? "; 

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome); 
        $stmt->bindValue(2, $model->id); 
        $stmt->execute(); 
    }
    
    public function delete(int $id) 
    {
        $sql = "DELETE FROM categorias WHERE id = ? "; 

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id); 
        $stmt->execute(); 
    }
}