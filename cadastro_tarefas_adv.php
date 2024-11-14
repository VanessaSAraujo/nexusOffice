<?php
  include '_scripts/conexao.php'; 

  $query = "SELECT id, nome, sobrenome FROM funcionarios WHERE perfil = 'advogado'";
  $result = $conexao->query($query);

  $dataTarefa = isset($_GET['data_tarefa']) ? $_GET['data_tarefa'] : '';
?>
<div class="card-body">
  <div class="card" style="padding-bottom: 5em;">
    <div class="card-body" style="margin: 3em 0em;">
      <form method="POST" action="_scripts/cadastrar_tarefa_adv.php">
        <div class="row">
          <h5 class="card-title fw-semibold mb-4" >Cadastro de Tarefas</h5>
          <div class="col-md-6 mb-3" style="margin-top: 3em;">
            <label for="inputNomeTarefa" class="form-label">Nome da Tarefa</label>
            <input type="text" class="form-control" id="inputNomeTarefa" name="nome_tarefa" required>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="inputDataTarefa" class="form-label">Data da Tarefa</label>
          <input type="date" class="form-control" id="inputDataTarefa" name="data_tarefa" value="<?= $dataTarefa ?>" required>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="inputDescricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="inputDescricao" name="descricao" rows="3" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="inputMensagemAlerta" class="form-label">Mensagem de Alerta</label>
            <input type="text" class="form-control" id="inputMensagemAlerta" name="mensagem_alerta">
          </div>
        </div>
        <button style="color: white; background: #cfaa5c; margin-top: 2em;" type="submit" class="btn">Cadastrar Tarefas</button>
      </form>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <button style="color: white; background: #cfaa5c" type="button" class="btn mt-4 mb-5" >
      <a href="aDashboard.php?a=agenda" style="color: white;">Ir para Agenda</a> 
    </button>
  </div>
</div>
