<?php

class ProdutoModel
{
    public $id, $nome, $preco, $data_fabricacao, $data_validade;

    // Propriedades declaradas de acordo com os campos da tabela do Banco de Dados

    public function save()
    {

        // Declaração do método save que chama o DAO pra salvar no Banco de Dados o Model preenchido,
        // que antes foi acessado pelo ProdutoController

        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        if($this->id == null) 
        {

            // Se o Id for nulo, é um novo registro 
            // então o código irá inserir o próprio model (por isso "Insert($this)")
            $dao->insert($this);
        } else {
            // Caso o contrário é um update porque já existe um registro
        }
    }
}