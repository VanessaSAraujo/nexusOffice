<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: url(../assets/img/slider-image.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
<body>
<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $nacionalidade = $_POST['nacionalidade'];
    $estadoCivil = $_POST['estadoCivil'];
    $profissao = $_POST['profissao'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numeroCasa = $_POST['numeroCasa'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $telefoneFixo = $_POST['telefoneFixo'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];

    $checkCPFQuery = "SELECT cpf FROM clientes WHERE cpf = ?";
    $stmt = $conexao->prepare($checkCPFQuery);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $checkCPFResult = $stmt->get_result();

    if ($checkCPFResult->num_rows > 0) {
        ?>
            <script language='javascript'>
                swal.fire({
                    icon: "warning",
                    title: "Atenção!",
                    text: "Este CPF já está cadastrado!",
                });
            </script>
        <?php
    } else {
        $anexos = [];
        if (isset($_FILES['anexos']) && count($_FILES['anexos']['name']) > 0) {
            $fileCount = count($_FILES['anexos']['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $fileTmpPath = $_FILES['anexos']['tmp_name'][$i];
                $fileName = $_FILES['anexos']['name'][$i];
                $uploadDir = 'uploads/';
                $uploadPath = $uploadDir . basename($fileName);
                
                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    $anexos[] = $uploadPath;
                }
            }
        }

        $anexosStr = implode(",", $anexos);

        $query = "INSERT INTO clientes (nome, cpf, data_nascimento, nacionalidade, estado_civil, profissao, cep, logradouro, numero_da_casa, bairro, estado, cidade, telefone_fixo, celular, email, anexos) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("sssssssssssssss", $nome, $cpf, $dataNascimento, $nacionalidade, $estadoCivil, $profissao, $cep, $logradouro, $numeroCasa, $bairro, $estado, $cidade, $telefoneFixo, $celular, $email, $anexosStr);

        try {
            if ($stmt->execute()) {
                ?>
                    <script language='javascript'>
                        swal.fire({
                            icon: "success",
                            text: "Cliente cadastrado com sucesso!",
                        }).then((okay) => {
                            if (okay) {
                                window.location.href = '../sDashboard.php?r=clientes';
                            }
                        });
                    </script>
                <?php
            } 
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                ?>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        iconColor: 'orange',
                        title: 'Atenção!',
                        text: 'O CPF já está cadastrado.'
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        iconColor: 'orange',
                        title: 'Erro',
                        text: 'Ocorreu um erro ao cadastrar o cliente. Por favor, tente novamente.'
                    });
                </script>
                <?php
            }
        }
    }
    $stmt->close();
    $conexao->close();
}
?>
</body>
</html>
