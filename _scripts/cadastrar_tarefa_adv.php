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
session_start();
include 'conexao.php';

$id_advogado = $_SESSION['usuario_logado']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_tarefa = $_POST['nome_tarefa'];
    $data_tarefa = $_POST['data_tarefa'];
    $descricao = $_POST['descricao'];
    $mensagem_alerta = $_POST['mensagem_alerta'];

    $query = "INSERT INTO tarefas (nome_tarefa, data_tarefa, descricao, mensagem_alerta, usuario_responsavel) 
              VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conexao->prepare($query)) {
        $stmt->bind_param("ssssi", $nome_tarefa, $data_tarefa, $descricao, $mensagem_alerta, $id_advogado);
        if ($stmt->execute()) {
            ?>
            <script language='javascript'>
                swal.fire({
                    icon: "success",
                    text: "Tarefa cadastrada com sucesso!",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../aDashboard.php?a=tarefas'; // Redireciona para a página de dashboard
                    }
                });
            </script>
            <?php
        } else {
            echo "<script>alert('Erro ao cadastrar a tarefa. Tente novamente.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Erro na preparação da consulta.');</script>";
    }
}
?>
</body>
