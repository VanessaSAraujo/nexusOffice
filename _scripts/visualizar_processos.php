<?php
include 'conexao.php';

$sql = "SELECT p.id, p.numero_processo, p.data, p.horario, p.vara, c.nome AS cliente
        FROM processos p
        JOIN clientes c ON p.cliente_id = c.id";


$result = $conexao->query($sql);

$processos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $processos[] = $row;
    }
} else {
    echo "Nenhum processo encontrado";
}
?>
