<?php
include 'conexao.php';

$sql = "SELECT id, nome, cpf, email, telefone_fixo, data_nascimento, nacionalidade, estado_civil, profissao, celular, logradouro, bairro, cidade, estado FROM clientes";
$result = $conexao->query($sql);

$clientes = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
} else {
    echo "Nenhum cliente encontrado";
}
?>
