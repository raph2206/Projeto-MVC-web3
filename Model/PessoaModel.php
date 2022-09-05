<?php

namespace Model;
use DAO\PessoaDAO;

class PessoaModel
{
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;

    public $rows;

    public function save()
    {

        $dao = new PessoaDAO();

        if(empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows(){
        $dao = new PessoaDAO();

        $this->rows = $dao->getAllRows();
    }

    public function getById(int $id){

        $dao = new PessoaDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PessoaModel();
    }

    public function delete(int $id)
    {

        $dao = new PessoaDAO();
        $dao->delete($id);
    }
}