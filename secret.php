<div class="row">
  <div class="align-items-center" >
  <div class="col-lg-12 text-center">
    <img src="assets/img/bemv.svg" alt="" style="width: 80%;">
  </div>
</div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tarefas Cadastradas por mês</h5>
        <?php include '_scripts/tarefa_grafico.php' ?>
        <canvas id="tarefasChart" width="400" height="200"></canvas>
        <script>
        // Passando os dados do PHP para o JavaScript
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($data); ?>;

        var ctx = document.getElementById('tarefasChart').getContext('2d');
        var tarefasChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico (linha)
            data: {
                labels: labels, // Meses/anos
                datasets: [{
                    label: 'Número de Tarefas',
                    data: data, // Quantidade de tarefas por mês
                    backgroundColor: 'rgba(211, 165, 66, 0.5)',
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                          stepSize: 1, // Define o intervalo de incremento como 1
                          precision: 0  // Garante que os números serão inteiros
                        }
                    }
                }
            }
        });
        </script>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tarefas Recentes</h5>
        <?php include '_scripts/tarefas_recentes.php'; ?>
      </div>
    </div>
  </div>
</div>