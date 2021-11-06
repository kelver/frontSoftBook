<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CDN</title>

    <!-- Bootstrap links CDN-->
    <link rel= "stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
    <link rel= "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" >
    <link rel= "stylesheet" href= "assets/css/custom.css" >
</head>
<body class="main-bg" onload="findBooks()">
<div >
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="color: #FFF;">ApiSoftBook</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mx-5 mb-lg-0 w-25">
                        <i class="fa-solid fa-temperature-half fa-xl" style="color:#FFF;"></i>
                        <span id="temp" style="margin-left: 2%; font-size: large; font-weight: bold; color:#FFF;"></span>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <div class="d-grid gap-2 col-3 mx-auto">
                        <button class="btn btn-outline-light text-nowrap bg-transparent" data-bs-toggle="modal" data-bs-target="#modalInserir">Novo Livro</button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle bg-transparent" type="button" id="dropProfile" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><button class="dropdown-item" type="button">Sair</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row justify-content-center mt-5" id="listBooks"></div>
    </div>
</div>

<!--modal detalhe-->
<div class="modal fade" id="modalDetalhe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBook"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1612385764381-87816a4b2208?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=436&q=80" class="img-fluid rounded-start" alt="Imagem de um livro">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text" id="descriptionBook"></p>
                                    <p class="card-text"><small class="text-muted" id="authorBook"></small></p>
                                    <p class="card-text"><small class="text-muted" id="pagesBook"></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal detalhe-->


<!--modal editar-->
<div class="modal fade" id="modalInserir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBook">Cadastro de Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título do Livro">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="pages" class="form-label">Páginas</label>
                        <input type="number" class="form-control" id="pages" name="pages" placeholder="0">
                    </div>
                    <div class="col">
                        <label for="author" class="form-label">Autor do Livro</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Autor do Livro">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="sendInsert" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal editar-->

<!--modal editar-->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBook"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título do Livro">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="pages" class="form-label">Páginas</label>
                        <input type="number" class="form-control" id="pages" name="pages" placeholder="0">
                    </div>
                    <div class="col">
                        <label for="author" class="form-label">Autor do Livro</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Autor do Livro">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="identify" name="identify" />
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="sendEdit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal editar-->

<!--modal exclusão-->
<div class="modal" id="modalDelete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBook"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir o livro?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="identify" name="identify" />
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmDelete">Sim</button>
            </div>
        </div>
    </div>
</div>
<!--modal exclusão-->


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>

<script src="assets/js/main.js"></script>
</body>
</html>