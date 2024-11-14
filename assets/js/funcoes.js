$(document).ready(function(){
    $('#inputCpf').mask('000.000.000-00', {reverse: true});
    $('#inputCep').mask('00000-000');
    $('#inputTelefoneFixo').mask('(00) 0000-0000');
    $('#inputCelular').mask('(00) 00000-0000');
});

function fetchAddress() {
    const cep = document.getElementById("inputCep").value.replace(/\D/g, ''); 
  
    if (cep.length === 8) { 
      const url = `https://viacep.com.br/ws/${cep}/json/`;
  
      fetch(url)
        .then(response => response.json())
        .then(data => {
          if (!data.erro) { 
            document.getElementById("inputLogradouro").value = data.logradouro || '';
            document.getElementById("inputBairro").value = data.bairro || '';
            document.getElementById("inputCidade").value = data.localidade || '';
            document.getElementById("inputEstado").value = data.uf || '';
          } else {
            alert('CEP não encontrado.');
          }
        })
        .catch(error => {
          console.error('Erro ao buscar o CEP:', error);
          alert('Erro ao buscar o CEP. Tente novamente.');
        });
    } else {
      alert('CEP inválido. Por favor, insira um CEP válido.');
    }
  }


function searchClientes() {
  const query = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.querySelectorAll('#clientesTableBody tr');

  rows.forEach(row => {
      const cells = row.getElementsByTagName('td');
      const nome = cells[1].textContent.toLowerCase();
      const cpf = cells[2].textContent.toLowerCase();
      const id = cells[0].textContent.toLowerCase();
      
      if (nome.includes(query) || cpf.includes(query) || id.includes(query)) {
          row.style.display = '';
      } else {
          row.style.display = 'none';
      }
  });
}

function carregarAdvogados() {
  var select = document.getElementById('inputUsuarioResponsavel');

  fetch('_scripts/listar_advogados.php')
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
        data.forEach(advogado => {
          var option = document.createElement('option');
          option.value = advogado.id;
          option.textContent = advogado.nome + ' ' + advogado.sobrenome;
          select.appendChild(option);
        });
      } else {
        var option = document.createElement('option');
        option.value = '';
        option.textContent = 'Nenhum advogado encontrado';
        select.appendChild(option);
      }
    })
    .catch(error => console.error('Erro ao carregar advogados:', error));
}

window.onload = carregarAdvogados;
function toggleDropdown() {
  const dropdown = document.getElementById("notificationDropdown");
  const notificationDot = document.getElementById("notificationDot");

  dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';

  if (notificationDot.style.display === 'block') {
      notificationDot.style.display = 'none';
  }
}

function marcarComoVisualizada() {
  document.getElementById("notificationDot").style.display = 'none';
  document.querySelector(".dropdown-item").style.display = 'none';

  fetch('check_tarefas.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ nova_tarefa: false }) 
  }).then(response => response.json())
    .then(data => {
      console.log('Status de nova tarefa: ', data.nova_tarefa);
    })
    .catch(error => console.error('Erro ao atualizar notificação:', error));

  window.location.href = "sDashboard.php?r=agenda";
}


function verificarNovaTarefa() {
  fetch('check_tarefas.php')
    .then(response => response.json())
    .then(data => {
      if (data.nova_tarefa) {
        document.getElementById("notificationDot").style.display = 'block';
      } else {
        document.getElementById("notificationDot").style.display = 'none';
      }
    })
    .catch(error => console.log(error));
}

setInterval(verificarNovaTarefa, 30000);

function searchProcessos() {
  const input = document.getElementById('searchInput').value.toLowerCase();
  const table = document.getElementById('processosTableBody');
  const rows = table.getElementsByTagName('tr');

  for (let i = 0; i < rows.length; i++) {
    let visible = false;
    const cells = rows[i].getElementsByTagName('td');
    for (let j = 0; j < cells.length; j++) {
      if (cells[j].innerText.toLowerCase().includes(input)) {
        visible = true;
        break;
      }
    }
    rows[i].style.display = visible ? '' : 'none';
  }
}
