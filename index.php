<?php

session_start();

require("functions/functions.php");

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

<div class="container mb-5">




  <div class="container mb-5">



    <div class="ml-2 mr-2">
      <table class="table">
        <table class="table">
          <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            </tr>
          </thead>
          <tbody>
            <h1>Produtos</h1>
            <?php foreach ($products as $product) : ?>
            <tr>
              <td class="nome"><?= $product['nome'] ?></td>
              <td class="descricao"><?= $product['descricao'] ?></td>
              <td class="preco">R$ <?= $product['preco'] ?></td>

              <td>
                <div class="btns">
                  <div class="ver">
                    <a href="showProduto.php?id=<?= $product['id'] ?>" class="btn-ver">Ver</a>
                  </div>
                  <div class="editar">
                    <a href="editProduct.php?id=<?=base64_encode($product['id'])?>" class="btn-editar">Editar</a>
                  </div>
                  <div class="excluir">
                    <a href="deleteProduct.php?id=<?= $product['id'] ?>" class="btn-excluir">Excluir</a>
                  </div>
                </div>
              </td>
            </tr>

            <?php endforeach ?>

          </tbody>
        </table>

    </div>

  </div>

  </body>

  </html>