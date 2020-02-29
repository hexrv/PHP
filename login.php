<?php
session_start();

if (!empty($_SESSION['id'])) {
    header("Location: index.php");
}

require('functions/functions.php');

$erroLogin = false;
$erroEmail = false;
$erroSenha = false;

if ($_POST) {

    if (empty($_POST['email-login'])) {
        $erroEmail = true;
    }

    if (strlen($_POST['senha-login']) < 6) {
        $erroSenha = true;
    }

    if (!$erroEmail && !$erroSenha) {

        $email = $_POST['email-login'];
        $senha = $_POST['senha-login'];

        $id = loginUser($email, $senha);

        if (!empty($id)) {
            $_SESSION['id'] = $id;
            header("Location: index.php");
        } else {
            $erroLogin = true;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="pt.br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="box">
        <h1>Login</h1>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post">
                    <div class="form-group">
                        <label for="email" class="pl-2"></label>
                        <input required type="email" class="form-control <?= ($erroEmail) ? "is-invalid" : ""; ?>"
                            name="email-login" id="email" placeholder="Digite seu email">
                        <div class="invalid-feedback pl-2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="pl-2"></label>
                        <input required type="password" class="form-control <?= ($erroSenha) ? "is-invalid" : ""; ?>"
                            name="senha-login" id="senha" placeholder="Digite seu senha">
                        <div class="invalid-feedback pl-2">
                        </div>
                    </div>
                    <div class="d-none alert alert-danger alert-dismissible fade show <?= ($erroLogin) ? "d-block" : "" ?>"
                        role="alert">
                    </div>
                        <input type="submit"></input>
                    <h5>Não tem cadastro ?<a class="pl-2" href="createUser.php">Cadastro</a></h5>
                </form>
            </div>
        </div>
    </div>
</body>

</html>