<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api Soft - Book</title>

    <!-- Bootstrap links CDN-->
    <link rel= "stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
    <link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" >
    <link rel= "stylesheet" href= "assets/css/custom.css" >
</head>
<body class="main-bg">
<div id="spinner">
    <i class="fa-solid fa-8x fa-rotate fa-spin"></i>
</div>

<div style="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6 mt-5">
                <div class="card shadow login">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="" id="formLogin" name="formLogin" method="post">
                            <div class="mb-4 textLeft">
                                <label for="username" class="form-label">E-Mail</label>
                                <input type="text" class="form-control" id="username" name="username" />
                            </div>
                            <div class="mb-4 textLeft">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn text-light main-bg">Login</button>
                            </div>
                            <div class="d-grid mt-5">
                                <a style="cursor: pointer;" class="link text-dark text-center cad">Cadastro</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card shadow cadastro" style="display:none;">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Cadastro</h2>
                    </div>
                    <div class="card-body">
                        <form action="" id="formCadastro" name="formLogin" method="post">
                            <div class="mb-4 textLeft">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                            <div class="mb-4 textLeft">
                                <label for="username" class="form-label">E-Mail</label>
                                <input type="text" class="form-control" id="username" name="username" />
                            </div>
                            <div class="mb-4 textLeft">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn text-light main-bg">Cadastrar</button>
                            </div>
                            <div class="d-grid mt-5">
                                <a style="cursor: pointer;" class="link text-dark text-center log">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal erro cadastro-->
<div class="modal" id="modalError" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBook"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Falha ao realizar o cadastro</h2>
                <p id="msg"></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="identify" name="identify" />
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!--modal erro cadastro-->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>