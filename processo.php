<?php
include '_scripts/conexao.php';

$queryClientes = "SELECT id, nome, cpf FROM clientes";
$resultClientes = $conexao->query($queryClientes);
?>
<div class="card-body">
  <div class="card">
    <div class="card-body">
    <form method="POST" action="_scripts/cadastro_processo.php">
        <h5 class="card-title fw-semibold mb-4">Cadastro de Processos</h5>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="data" required>
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="time" class="form-control" id="horario" name="horario" required>
        </div>
        <div class="mb-3">
            <label for="numero_processo" class="form-label">Número do Processo</label>
            <input type="text" class="form-control" id="numero_processo" name="numero_processo" required>
        </div>
        <div class="mb-3">
            <label for="vara" class="form-label">Vara</label>
            <input type="text" class="form-control" id="vara" name="vara" required>
        </div>
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select class="form-select" id="cliente_id" name="cliente_id" required>
                <option value="">Selecione o cliente</option>
                <?php
                if ($resultClientes->num_rows > 0) {
                while ($cliente = $resultClientes->fetch_assoc()) {
                    echo "<option value='{$cliente['id']}'>{$cliente['nome']} - CPF: {$cliente['cpf']}</option>";
                }
                } else {
                    echo "<option value=''>Nenhum cliente encontrado</option>";
                }
                ?>
            </select>
        </div>
        <button style="color: white; background: #cfaa5c" type="submit" class="btn mt-5">Cadastrar Processo</button>
    </form>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <button style="color: white; background: #cfaa5c" type="button" class="btn mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#processosModal">
      Pesquisar Processos
    </button>
  </div>
</div>

<?php include "_scripts/visualizar_processos.php";?>

<div class="modal fade" id="processosModal" tabindex="-1" aria-labelledby="processosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="processosModalLabel">Processos Cadastrados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Pesquisar por Número, Data ou Cliente" onkeyup="searchProcessos()">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Número do Processo</th>
                <th scope="col">Data</th>
                <th scope="col">Horário</th>
                <th scope="col">Vara</th>
                <th scope="col">Cliente</th>
              </tr>
            </thead>
            <tbody id="processosTableBody">
              <?php foreach ($processos as $processo): ?>
              <tr>
                <td><?php echo $processo['id']; ?></td>
                <td><?php echo $processo['numero_processo']; ?></td>
                <td><?php echo $processo['data']; ?></td>
                <td><?php echo $processo['horario']; ?></td>
                <td><?php echo $processo['vara']; ?></td>
                <td><?php echo $processo['cliente']; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
