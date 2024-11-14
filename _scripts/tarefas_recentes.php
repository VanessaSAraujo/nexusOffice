<?php
include 'conexao.php';

$data_atual = date('Y-m-d');

$sql = "SELECT nome_tarefa, data_tarefa, descricao, usuario_responsavel, DATEDIFF(data_tarefa, '$data_atual') AS prazo 
        FROM tarefas 
        WHERE data_tarefa >= '$data_atual' 
        ORDER BY prazo ASC"; 
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while ($tarefa = $resultado->fetch_assoc()) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $tarefa['nome_tarefa'] . "</h5>";
        echo "<p class='card-text'>" . $tarefa['descricao'] . "</p>";
        echo "<p class='card-text'>Responsável: " . $tarefa['usuario_responsavel'] . "</p>";
        echo "<p class='card-text'><small class='text-muted'>Prazo: " . $tarefa['prazo'] . " dias</small></p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Não há tarefas próximas.</p>";
}

?>
