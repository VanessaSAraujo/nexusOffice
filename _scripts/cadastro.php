<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: url(../assets/img/slider-image.jpg);
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
<body>
    <?php
    include 'conexao.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $perfil = $_POST['perfil'];
        $numero_oab = ($perfil == 'advogado' && isset($_POST['numero_oab']) && !empty($_POST['numero_oab'])) ? $_POST['numero_oab'] : null;

        if (empty($nome) || empty($sobrenome) || empty($telefone) || empty($email) || empty($senha) || empty($perfil)) {
    ?>
            <script>
                Qual.error('Oh no!', 'Preencha todos os campos obrigatórios.');
            </script>
        <?php
            echo "<script>setTimeout(function(){ window.location.href = 'cadastro.php'; }, 2000);</script>";
            exit();
        }

        $sql_check_email = "SELECT * FROM funcionarios WHERE email = ?";
        $stmt_check_email = $conexao->prepare($sql_check_email);
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 0) {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "error",
                    text: "Oh não! O e-mail já está cadastrado.",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../cadastro.php';
                    }
                });
            </script>
        <?php
            exit();
        }

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO funcionarios (nome, sobrenome, telefone, email, senha, perfil, numero_oab) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssssss", $nome, $sobrenome, $telefone, $email, $senha_hash, $perfil, $numero_oab);

        if ($stmt->execute()) {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "success",
                    text: "Sucesso. Cadastro realizado!",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../index.php';
                    }
                });
            </script>
        <?php
        } else {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "error",
                    text: "Erro ao cadastrar. Tente novamente :/",
                }).then(okay => {
                    if (okay) {
                        window.location.href = '../cadastro.php';
                    }
                });
            </script>
        <?php
        }
    }
    ?>