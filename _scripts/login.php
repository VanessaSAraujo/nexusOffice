<?php
session_start();?>
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

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM funcionarios WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_logado'] = $user['id'];
        $_SESSION['perfil'] = $user['perfil'];
        
        $query = "SELECT nome_tarefa, data_tarefa FROM tarefas WHERE usuario_responsavel = ? AND data_tarefa = CURDATE()";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("i", $user['id']);
        $stmt->execute();
        $result_tarefa = $stmt->get_result();

        $nova_tarefa = false;
        $data_tarefa = null;

        if ($result_tarefa->num_rows > 0) {
            $nova_tarefa = true;
            $tarefa = $result_tarefa->fetch_assoc();
            $data_tarefa = $tarefa['data_tarefa'];
        }

        $_SESSION['nova_tarefa'] = $nova_tarefa;
        $_SESSION['data_tarefa'] = $data_tarefa;

        if ($user['perfil'] == 'secretária') {
            header("Location: ../sDashboard.php?r=dashboard");
        } elseif ($user['perfil'] == 'advogado') {
            header("Location: ../aDashboard.php?a=dashboard");
        }
        exit();
    } else {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "error",
                    text: "Oh não!', 'Senha incorreta ou Usuário incorreto.",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../index.php';
                    }
                });
            </script>
        <?php
    }
} else {
    ?>
            <script language='javascript'>
                
                swal.fire({
                    icon: "error",
                    text: "Oh não!', 'Usuário não encontrado.",
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../index.php';
                    }
                });
            </script>
        <?php
}
?>
