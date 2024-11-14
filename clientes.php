<div class="card-body">
  <div class="card">
    <div class="card-body">
      <form method="POST" action="_scripts/cadastrar_cliente.php">
        <div class="row">
                    <h5 class="card-title fw-semibold mb-4">Cadastro de Clientes</h5>
                    <div class="col-md-6 mb-3">
                      <label for="inputNome" class="form-label">Nome Completo</label>
                      <input type="text" class="form-control" id="inputNome" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" name="nome" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="inputCpf" class="form-label">CPF</label>
                      <input type="text" class="form-control" id="inputCpf" name="cpf" required>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="inputDataNascimento" class="form-label">Data de Nascimento</label>
                      <input type="date" class="form-control" id="inputDataNascimento" name="dataNascimento" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="inputNacionalidade" class="form-label">Nacionalidade</label>
                      <input type="text" class="form-control"  oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"  id="inputNacionalidade" name="nacionalidade" required>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="inputEstadoCivil" class="form-label">Estado Civil</label>
                      <select id="inputEstadoCivil" name="estadoCivil" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viúvo">Viúvo</option>
                      </select>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="inputProfissao" class="form-label">Profissão</label>
                      <input type="text" class="form-control" id="inputProfissao" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" name="profissao" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="inputCep" class="form-label">CEP</label>
                      <input type="text" class="form-control" id="inputCep" name="cep" required onblur="fetchAddress()">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="inputLogradouro" class="form-label">Logradouro</label>
                      <input type="text" class="form-control" id="inputLogradouro" name="logradouro" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 mb-3">
                      <label for="inputNumeroCasa" class="form-label">Número</label>
                      <input type="number" class="form-control" id="inputNumeroCasa" name="numeroCasa">
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="inputBairro" class="form-label">Bairro</label>
                      <input type="text" class="form-control" id="inputBairro" name="bairro" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label for="inputEstado" class="form-label">Estado</label>
                      <input type="text" class="form-control" id="inputEstado" name="estado" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="inputCidade" class="form-label">Cidade</label>
                      <input type="text" class="form-control" id="inputCidade" name="cidade" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="inputTelefoneFixo" class="form-label">Telefone Fixo</label>
                      <input type="text" class="form-control" id="inputTelefoneFixo" name="telefoneFixo">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="inputCelular" class="form-label">Celular</label>
                      <input type="text" class="form-control" id="inputCelular" name="celular" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="inputAnexos" class="form-label">Anexos</label>
                    <input type="file" class="form-control" id="inputAnexos" name="anexos[]" multiple>
                  </div>

                  <button style="color: white; background: #cfaa5c" type="submit" class="btn mt-5">Cadastrar</button>
      </form>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <button style="color: white; background: #cfaa5c" type="button" class="btn mt-4 mb-5" data-bs-toggle="modal" data-bs-target="#clientesModal">
      Ver Clientes Cadastrados
    </button>
  </div>
</div>

<?php include("_scripts/visualizar_clientes.php");?>
  
<div class="modal fade" id="clientesModal" tabindex="-1" aria-labelledby="clientesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clientesModalLabel">Clientes Cadastrados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Pesquisar por Nome, CPF ou ID" onkeyup="searchClientes()">

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">Nacionalidade</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Profissão</th>
                <th scope="col">Telefone</th>
                <th scope="col">Telefone Fixo</th>
                <th scope="col">Endereço</th>
              </tr>
            </thead>
            <tbody id="clientesTableBody">
              <?php foreach ($clientes as $cliente): ?>
              <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['cpf']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td><?php echo $cliente['data_nascimento']; ?></td>
                <td><?php echo $cliente['nacionalidade']; ?></td>
                <td><?php echo $cliente['estado_civil']; ?></td>
                <td><?php echo $cliente['profissao']; ?></td>
                <td><?php echo $cliente['celular']; ?></td>
                <td><?php echo $cliente['telefone_fixo']; ?></td>
                <td><?php echo $cliente['logradouro'] . ' - ' . $cliente['bairro'] . ', ' . $cliente['cidade'] . ' - ' . $cliente['estado']; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
