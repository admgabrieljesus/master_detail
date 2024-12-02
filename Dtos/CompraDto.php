<?php

namespace App\Dtos;

class CompraDto
{
    public $id;
    public $nome;
    public $data;
    public $valor_total;
    public $itens;

    public function __construct($id, $nome, $data, $valor_total, $itens = [])
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->data = $data;
        $this->valor_total = $valor_total;
        $this->itens = $itens;
    }
}
