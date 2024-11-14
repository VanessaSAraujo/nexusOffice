<?php
include 'conexao.php';

if (isset($_SESSION['usuario_logado'])) {
    $id_advogado = $_SESSION['usuario_logado'];
} else {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM tarefas WHERE usuario_responsavel = '$id_advogado' ORDER BY data_tarefa DESC LIMIT 5";
$result = $conexao->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['nome_tarefa'] . " - " . $row['data_tarefa'] . "</p>";
    }
} else {
    echo "<p>Não há tarefas recentes para você.</p>";
}
?>