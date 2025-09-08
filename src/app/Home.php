<?php
session_start();
require_once __DIR__."/../lib/functions.php";

// Carregar produtos
$produtos = carregarProdutos();



// Pesquisa
$q = isset($_GET['q']) ? strtolower($_GET['q']) : "";
$produtos_filtrados = $produtos;
if($q){
    $produtos_filtrados = array_filter($produtos, function($p) use ($q){
        return strpos(strtolower($p['nome']), $q) !== false;
    });
}

// Adicionar ao carrinho
if(isset($_GET['add'])){
    adicionarCarrinho($_GET['add']);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Remover do carrinho
if(isset($_GET['remove'])){
    removerCarrinho($_GET['remove']);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!-- CATÁLOGO -->
<section class="catalogo">
    <h2>Catálogo de Produtos</h2>
    <div class="grid">
        <?php 
        $count = 0;
        foreach($produtos_filtrados as $p):
            if($count++ >= 10) break; // Limita a 10 produtos
        ?>
        <div class="produto">
            <img width="300px" src="/src/public/assets/imagens/<?php echo $p['imagem']; ?>" alt="<?php echo $p['nome']; ?>">

            
            <h3><?php echo $p['nome']; ?></h3>
            <p><?php echo $p['descricao']; ?></p>
            <p class="preco">R$ <?php echo number_format($p['preco'],2,",","."); ?></p>
            
            <a href="?add=<?php echo $p['id']; ?>" class="btn">Adicionar</a>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CARRINHO -->
<section class="carrinho">
    <h2>Meu Carrinho</h2>
    <?php if(!empty($_SESSION['carrinho'])): ?>
        <ul>
        <?php 
        $total = 0;
        foreach($_SESSION['carrinho'] as $id => $qtd):
            if(!isset($produtos[$id])) continue;
            $produto = $produtos[$id];
            $subtotal = $produto['preco'] * $qtd;
            $total += $subtotal;
        ?>
            <li>
                <?php echo $produto['nome']; ?> x <?php echo $qtd; ?>
                = R$ <?php echo number_format($subtotal,2,",","."); ?>
                <a href="?remove=<?php echo $id; ?>">Remover</a>
            </li>
        <?php endforeach; ?>
        </ul>
        <p><strong>Total: R$ <?php echo number_format($total,2,",","."); ?></strong></p>
    <?php else: ?>
        <p>Seu carrinho está vazio.</p>
    <?php endif; ?>
</section>
