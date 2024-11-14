<?php
include 'conexao.php';

$id_advogado = $_SESSION['usuario_logado'];

$query = "SELECT YEAR(data_tarefa) AS ano, MONTH(data_tarefa) AS mes, COUNT(*) AS quantidade
          FROM tarefas 
          WHERE usuario_responsavel = '$id_advogado' 
          GROUP BY YEAR(data_tarefa), MONTH(data_tarefa)
          ORDER BY ano DESC, mes DESC";
$result = $conexao->query($query);

$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['mes'] . '/' . $row['ano'];
        $data[] = $row['quantidade']; 
    }
}
?>
