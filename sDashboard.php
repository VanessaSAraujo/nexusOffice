<?php include "head.php";?>
<?php
session_start(); 

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: index.php');
    exit();
}
?>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
     <?php include "sMenu.php";?>
    <div class="body-wrapper">
      <?php include "header.php"; ?>  
      <div class="container-fluid">
        <div class="row">
            <?php
                switch($_GET['r']){
                    case 'dashboard':
                        include "secret.php";
                        break;
                    case "clientes":
                        include "clientes.php";
                        break;
                    case "tarefas":
                        include "cadastro_tarefas.php";
                        break;
                    case "agenda":
                        include "calendario.php";
                        break;
                    case "funcionarios":
                        include "";
                        break;
                    default:
                        include "";
                        break;
                }
            ?>
        </div>
        <?php include "footer.php"; ?>
        
      </div>
    </div>
    <?php include "js.php";?>
    
</body>

</html>