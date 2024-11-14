document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        events: '/_scripts/buscar_tarefas.php',
        eventContent: function(arg) {
            let tarefaNome = arg.event.title;
            let usuarioResponsavel = arg.event.extendedProps.usuario_responsavel;
            return { html: `<b>${tarefaNome}</b><br><i>${usuarioResponsavel}</i>` };
        }
    });

    calendar.render();
});
