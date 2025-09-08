<?php
require_once __DIR__."/../lib/functions.php";

$q = isset($_GET['q']) ? strtolower($_GET['q']) : "";
$produtos = carregarProdutos();

if($q){
    $produtos = array_filter($produtos, function($p) use ($q){
        return strpos(strtolower($p['nome']), $q) !== false;
    });
}
?>

<section class="catalogo">
    <h2>Catálogo de Produtos</h2>
    <div class="grid">
        <?php foreach($produtos as $p): ?>
        <div class="produto">
            <img  width="400px"src="/src/public/assets/imagens/<?php echo $p['imagem']; ?>" alt="<?php echo $p['nome']; ?>">
            <h3><?php echo $p['nome']; ?></h3>
            <p>R$ <?php echo number_format($p['preco'], 2, ",", "."); ?></p>
            <a href="index.php?page=cart&add=<?php echo $p['id']; ?>" class="btn">Adicionar</a>
        </div>
        <?php endforeach; ?>
    </div>
    
</section>
