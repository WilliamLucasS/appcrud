<?php
include 'db.php';

function saveUser($nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $ativo) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, marca, modelo, valorunitario, categoria, ativo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $ativo);
    return $stmt->execute();
}

function getUsers() {
    global $conn;
    $result = $conn->query("SELECT * FROM produtos");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getUser($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateUser($id, $nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $ativo) {
    global $conn;
    $stmt = $conn->prepare("UPDATE produtos SET nome = ?, descricao = ?, marca = ?, modelo = ?, valorunitario = ?, categoria = ?, ativo = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nome, $descricao, $marca, $modelo, $valorunitario, $categoria, $ativo, $id);
    return $stmt->execute();
}

function deleteUser($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save'])) {
        saveUser($_POST['nome'], $_POST['descricao'], $_POST['marca'], $_POST['modelo'], $_POST['valorunitario'], $_POST['categoria'], $_POST['ativo']);
    } elseif (isset($_POST['update'])) {
        updateUser($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['marca'], $_POST['modelo'], $_POST['valorunitario'], $_POST['categoria'], $_POST['ativo']);
    }
}

// Processamento da exclusão
if (isset($_GET['delete'])) {
    deleteUser($_GET['delete']);
}
?>