<?php
session_start();

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
