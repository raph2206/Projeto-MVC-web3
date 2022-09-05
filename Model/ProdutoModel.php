<?php

namespace Model;
use DAO\ProdutoDAO;

class ProdutoModel
{
    public $id, $nome, $valor, $descricao, $data_adicionado, $id_categoria;

    public $rows;

    public function save()
    {

        $dao = new ProdutoDAO();

        if($this->id == null) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows(){

        $dao = new ProdutoDAO();

        $this->rows = $dao->getAllRows();
    }

    public function getById(int $id){


        $dao = new ProdutoDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ProdutoModel();
    }

    public function delete(int $id)
    {

        $dao = new ProdutoDAO();
        $dao->delete($id);
    }
}