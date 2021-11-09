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
<body class="main-bg">
<div id="spinner">
    <i class="fa-solid fa-8x fa-rotate fa-spin"></i>
</div>

<div style="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6 mt-5">
                <div class="card shadow">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>