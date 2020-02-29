<?php

session_start();
require("functions/functions.php");

$id = $_GET['id'];
$users = loadUsers();
$products = loadProducts();

if (!$_SESSION['id']) {
  header("Location: login.php");
}

$filtroValor = 1;

if (!empty($_GET['filtro'])) {
  $filtroValor = $_GET['filtro'];
}


require("header/header.php");
?>

<style>
  .conteudoTable {
    max-height: 600px;
    overflow: auto;
  }
</style>

<div class="container"> 
 <div class="container mb-5">
<div class="ml-2 mr-2">
      <table class="table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
        </tr>
        <h1>Produto</h1>
      </thead>
      <tbody>

        <?php foreach ($products as $product) : ?>
        <?php if ($product['id']==$id) : ?>
          <tr>
            <td class="nome"><?= $product['nome'] ?></td>
            <td class="descricao"><?= $product['descricao'] ?></td>
            <td class="preco">R$ <?= $product['preco'] ?></td>
            
            <td>

            </td>
         
          </tr>
          <td class="pt-4 pt-md-2"><img src="img/<?= $product['imagem'] ?>" height="100"></td>
          <?php endif ?>
        <?php endforeach ?>

      </tbody>
    </table>

  </div>

</div>

</body>

</html>