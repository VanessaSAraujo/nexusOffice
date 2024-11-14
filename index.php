<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Nexus Advocacia</title>
    <link rel="shortcut icon" href="assets/img/logos/seodashlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <section class="background-ad overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <img class="my-5 img-fluid display-5" src="assets/img/logo.png"
                        style="max-width: 100%; height: auto;" alt="">
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form action="_scripts/login.php" method="post">
                                <h3>Login</h3>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control" required />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="senha" id="form3Example4" class="form-control" required />
                                    <label class="form-label" for="form3Example4">Senha</label>
                                </div>
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn color-gold btn-block mb-4">
                                    Acessar
                                </button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn color-back btn-block mb-4 float-end btn-custom">
                                    <a href="cadastro.php">Cadastrar</a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cosmogicofficial/quantumalert@latest/minfile/quantumalert.js" charset="utf-8"></script>

</body>

</html>