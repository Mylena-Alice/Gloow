<?php
define("DATA_FILE", __DIR__."/../dados/produtos.json");


function carregarProdutos(){
    if(file_exists(DATA_FILE)){
        $produtos = json_decode(file_get_contents(DATA_FILE), true);
        $produtos_por_id = [];
        foreach($produtos as $p){
            $produtos_por_id[$p['id']] = $p; // indexar pelo ID
        }
        return $produtos_por_id;
    }
    return [];
}

function adicionarCarrinho($id){
    if(isset($_SESSION['carrinho'][$id])){
        $_SESSION['carrinho'][$id]++;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }
}

function removerCarrinho($id){
    if(isset($_SESSION['carrinho'][$id])){
        $_SESSION['carrinho'][$id]--;
        if($_SESSION['carrinho'][$id] <= 0){
            unset($_SESSION['carrinho'][$id]);
        }
    }
}
