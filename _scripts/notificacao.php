<?php
include'conexao.php';

$query = "SELECT nome_tarefa, data_tarefa FROM tarefas WHERE data_tarefa = CURDATE()";
$result = $conexao->query($query);

$nova_tarefa = false;
$data_tarefa = null;

if ($result->num_rows > 0) {
    $nova_tarefa = true;
    $tarefa = $result->fetch_assoc();
    $data_tarefa = $tarefa['data_tarefa'];
} else {
    $nova_tarefa = false;
    $data_tarefa = "Nenhuma tarefa nova hoje";
}
?>
