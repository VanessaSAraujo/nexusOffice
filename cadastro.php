<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Nexus Advocacia</title>
    <link rel="shortcut icon" href="assets/img/logos/seodashlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css">
    <link rel="stylesheet" href="assets/css/cadastro.css">
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
                            <form action="_scripts/cadastro.php" method="POST">
                                <h3>Cadastro</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" name="nome" id="form3Example1" class="form-control" required />
                                            <label class="form-label" for="form3Example1">Nome</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" name="sobrenome" id="form3Example2" class="form-control" required />
                                            <label class="form-label" for="form3Example2">Sobrenome</label>
                                        </div>
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="tel" name="telefone" id="phoneNumber" class="form-control" />
                                    <label class="form-label" for="phoneNumber">Telefone</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email"  name="email" id="form3Example3" class="form-control" required />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="senha" id="form3Example4" class="form-control" required />
                                    <label class="form-label" for="form3Example4">Senha</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <select class="form-select" name="perfil" id="perfil" required>
                                                <option value="" disabled selected>Escolha um perfil</option>
                                                <option value="secretária">Secretária</option>
                                                <option value="advogado">Advogado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline bord-none">
                                            <input type="text" name="numero_oab" id="numeroOAB" class="form-control" required />
                                            <label class="form-label" for="numeroOAB" style="color: transparent;">Número
                                                da OAB</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2 color-gold" type="checkbox" value="" id="termos"
                                        checked />
                                    <label class="form-check-label" for="termos">
                                        <a href="#">Termos e Condições</a>
                                    </label>
                                </div>

                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn color-gold btn-block mb-4">
                                    Cadastrar
                                </button>

                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn color-back btn-block mb-4 float-end btn-custom">
                                    <a href="index.php">Voltar</a>
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
    <script src="assets/js/cadastro.js"></script>

</body>

</html>