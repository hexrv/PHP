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
<link rel="stylesheet" href="css/ver.css">
<div class="container mb-5">

  
  <h1>Usuarios</h1>
  <div class="ml-2 mr-2">
        <table class="table">
            <thead>
          <th>Nome</th>
          <th>Email</th>
      
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>

          <tr>
            <td class="nome"><?= $user['nome'] ?></td>
            <td class="email"><?= $user['email'] ?></td>
            <td>
              <div class="btns">
                <div class="editar">
              <a href="editUser.php?id=<?= base64_encode($user['id']) ?>" class="btn-editar">Editar</a>
              </div>
              <div class="excluir">
              <a href="deleteUser.php?id=<?= $user['id'] ?>" class="btn-excluir">Excluir</a>
              </div>
              </div>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="table-resposive mt-3 conteudoTable d-none <?= ($filtroValor == 2) ? "d-block" : ""; ?>">

    
      </tbody>
    </table>

  </div>

</div>

</body>

</html>