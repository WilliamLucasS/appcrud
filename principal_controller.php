<?php
//Prepara pa gerenciar a sessão
session_start();

// Verifica se o usuário está registrado na sessão (logado)
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Armazena informações do usuário
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];

function getProdutos() {
    global $conn;
    $result = $conn->query("SELECT * FROM produtos");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function adicionarAoCarrinho($id_produto) {
    global $conn;
    
    // Verifica se o produto jÃ¡ estÃ¡ no carrinho
    if (isset($_SESSION['carrinho'][$id_produto])) {
        // Se jÃ¡ existe, aumenta a quantidade
        $_SESSION['carrinho'][$id_produto]['quantidade']++;
        $_SESSION['carrinho'][$id_produto]['subtotal'] = $_SESSION['carrinho'][$id_produto]['quantidade'] * $_SESSION['carrinho'][$id_produto]['preco'];
    } else {
        // Se nÃ£o existe, adiciona o item ao carrinho
        $produto = getProdutoPorId($id_produto);
        $_SESSION['carrinho'][$id_produto] = [
            'id_produto'   => $produto['id'],
            'nome_produto' => $produto['nome'],
            'quantidade'   => 1,
            'preco'        => $produto['valorunitario'],
            'subtotal'     => $produto['valorunitario']
        ];
    }
    header("Location: shopcart.php");
    exit();
}

function getProdutoPorId($id_produto) {
    global $conn;
    $result = $conn->query("SELECT * FROM produtos WHERE id = $id_produto");
    return $result->fetch_assoc();
}

// Função para lidar com o logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

if (isset($_POST['adicionar_produto'])) {
    $id_produto = (int)$_POST['id_produto'];
    adicionarAoCarrinho($id_produto);
    header("Location: principal.php");
    exit();
}
?>
