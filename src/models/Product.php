<?php
class Product {
    public $id;
    public $nome;
    public $preco;
    public $imagem;

    public function __construct($id, $nome, $preco, $imagem){
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }
}
