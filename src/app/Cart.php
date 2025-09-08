<?php
require_once __DIR__."/../lib/session.php";
require_once __DIR__."/../lib/functions.php";

$produtos = carregarProdutos();


// adicionar item
if(isset($_GET['add'])){
    adicionarCarrinho($_GET['add']);
}

// remover item
if(isset($_GET['remove'])){
    removerCarrinho($_GET['remove']);
}
?>

<section class="carrinho">
    <h2>Meu Carrinho</h2>
    <?php if(!empty($_SESSION['carrinho'])): ?>
        <ul>
        <?php $total = 0; ?>
        <?php foreach($_SESSION['carrinho'] as $id => $qtd): 
            $produto = $produtos[$id];
            $subtotal = $produto['preco'] * $qtd;
            $total += $subtotal;
        ?>
            <li>
                <?php echo $produto['nome']; ?> x <?php echo $qtd; ?>
                = R$ <?php echo number_format($subtotal, 2, ",", "."); ?>
                <a  href="index.php?page=cart&remove=<?php echo $id; ?>">Remover</a>
            </li>
        <?php endforeach; ?>
        </ul>
        <p><strong>Total: R$ <?php echo number_format($total, 2, ",", "."); ?></strong></p>
    <?php else: ?>
        <p>Seu carrinho está vazio.</p>
    <?php endif; ?>
</section>
