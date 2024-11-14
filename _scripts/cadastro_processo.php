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

$queryClientes = "SELECT id, nome, cpf FROM clientes";
$resultClientes = $conexao->query($queryClientes);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $numero_processo = $_POST['numero_processo'];
    $vara = $_POST['vara'];
    $cliente_id = $_POST['cliente_id'];

    $queryProcesso = "INSERT INTO processos (data, horario, numero_processo, vara, cliente_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($queryProcesso);
    $stmt->bind_param("ssssi", $data, $horario, $numero_processo, $vara, $cliente_id);

    if ($stmt->execute()) {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "success",
                    text: "Processo cadastrado com sucesso!",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../aDashboard.php?a=processos';
                    }
                });
            </script>
        <?php
    } else {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "error",
                    text: "Não foi possível cadastrar o processo. Por favor, tente novamente.",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../sDashboard.php?r=tarefas';
                    }
                });
            </script>
        <?php
    }

    $stmt->close();
}
?>
</body>