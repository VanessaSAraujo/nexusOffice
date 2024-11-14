<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_logado'])) {
    die('Você precisa estar logado para acessar esta página.');
}

$id_advogado = $_SESSION['usuario_logado']; 

$query = "SELECT t.nome_tarefa AS title, t.data_tarefa AS start, f.nome AS usuario_responsavel 
          FROM tarefas t
          JOIN funcionarios f ON t.usuario_responsavel = f.id
          WHERE t.usuario_responsavel = ?"; 

$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $id_advogado);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'title' => $row['title'],
        'start' => $row['start'],
        'usuario_responsavel' => $row['usuario_responsavel'],
        'backgroundColor' => '#d3a542', 
        'borderColor' => '#d3a542'
    ];
}

header('Content-Type: application/json');
echo json_encode($events);
?>
