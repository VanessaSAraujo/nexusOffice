<?php
include('conexao.php');

$query = "SELECT YEAR(data_tarefa) AS ano, MONTH(data_tarefa) AS mes, COUNT(*) AS total
          FROM tarefas
          GROUP BY YEAR(data_tarefa), MONTH(data_tarefa)
          ORDER BY ano, mes";

$result = $conexao->query($query);

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = str_pad($row['mes'], 2, '0', STR_PAD_LEFT) . '/' . $row['ano'];
    $data[] = $row['total'];
}
?>
