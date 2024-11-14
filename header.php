<?php
include('_scripts/notificacao.php');
?>

<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="bellIcon" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="mingcute:bell-ringing-fill" id="bellIconColor" style="color: #cfaa5c"></iconify-icon>
                        <div class="notification bg-primary rounded-circle" id="notificationDot" style="display: <?php echo isset($_SESSION['nova_tarefa']) && $_SESSION['nova_tarefa'] ? 'block' : 'none'; ?>"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bellIcon" style="min-width: 250px;">
                        <?php if ($nova_tarefa) { ?>
                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="marcarComoVisualizada()">Nova tarefa adicionada para o dia <?php echo $data_tarefa; ?></a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="#">Nenhuma nova tarefa.</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>