<?php
session_start();
include 'conexao.php';

$user_id = $_SESSION['usuario_logado'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (isset($data['nova_tarefa']) && $data['nova_tarefa'] === false) {
        $_SESSION['nova_tarefa'] = false;
    }
}

$query = "SELECT nome_tarefa, data_tarefa FROM tarefas WHERE usuario_responsavel = ? AND data_tarefa = CURDATE()";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result_tarefa = $stmt->get_result();

$nova_tarefa = false;

if ($result_tarefa->num_rows > 0) {
    $nova_tarefa = true;
}

echo json_encode(['nova_tarefa' => $nova_tarefa]);
?>
