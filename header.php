<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-info d-flex align-items-center" style="height: 3cm;">
        <div class="container text-center">
            <h1>Pizzagama</h1>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg p-0 navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="principal.php">Home</a>
            <a class="navbar-brand" href="usuarios_cadastro.php">Usuários</a>
            <a class="navbar-brand" href="produtos.php">Produtos</a>
            <div class="collapse navbar-collapse">
            <a href="shopcart.php" class="bi bi-cart-fill">Pedidos</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form method="POST" action="">
                            <button class="btn btn-link nav-link text-white" name="logout" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>