<?php
include 'conexao.php';

$query = "SELECT t.nome_tarefa AS title, t.data_tarefa AS start, f.nome AS usuario_responsavel 
          FROM tarefas t
          JOIN funcionarios f ON t.usuario_responsavel = f.id";

$result = $conexao->query($query);

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
