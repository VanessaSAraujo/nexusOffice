<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nexus Office</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/logos/seodashlogo.png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/0.2.0/css/themify-icons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.js"></script>
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        buttonText: {
            today: 'Hoje'
        },
        events: '_scripts/buscar_tarefas_adv.php', 
        eventContent: function(arg) {
            let tarefaNome = arg.event.title;
            let usuarioResponsavel = arg.event.extendedProps.usuario_responsavel;
            return { html: `<b>${tarefaNome}</b><br><i>${usuarioResponsavel}</i>` };
        },
        dateClick: function(info) {
      var dataSelecionada = info.dateStr;
      
      window.location.href = `sDashboard.php?r=tarefas&data_tarefa=${dataSelecionada}`;
        }
    });

    calendar.render();
});

    </script>
</head>