<?php include "head_adv.php";?>
<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: index.php'); 
    exit();
}
?>
<body  class="custom-background">
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
     <?php include "aMenu.php";?>
    <div class="body-wrapper">
      <?php include "header.php"; ?>  
      <div class="container-fluid">
        <div class="row">
            <?php
                switch($_GET['a']){
                    case 'dashboard':
                        include "advogado.php";
                        break;
                    case "clientes":
                        include "clientes.php";
                        break;
                    case "processos":
                        include "processo.php";
                        break;
                    case "tarefas":
                        include "cadastro_tarefas_adv.php";
                        break;
                    case "agenda":
                        include "calendario_adv.php";
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