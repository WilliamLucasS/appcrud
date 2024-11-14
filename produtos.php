<?php
include 'produtos_controller.php';

//Pega todos os usuários para preencher os dados da tabela
$users = getUsers();

//Variável que guarda o ID do usuário que será editado
$userToEdit = null;

// Verifica se existe o parâmetro edit pelo método GET
// e sé há um ID para edição de usuário
if (isset($_GET['edit'])) {
    $userToEdit = getUser($_GET['edit']);
}
?>
<?php include 'header.php'; ?>

<body>
   <script src = "js/main.js"></script>
   <h2>Cadastro de Produtos</h2>
    <form method="POST" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $userToEdit['id'] ?? ''; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $userToEdit['nome'] ?? ''; ?>" required><br><br>
        
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo $userToEdit['descricao'] ?? ''; ?>" required><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $userToEdit['marca'] ?? ''; ?>" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $userToEdit['modelo'] ?? ''; ?>" required><br><br>

        <label for="valorunitario">Valor:</label>
        <input type="numeric" id="valorunitario" name="valorunitario" value="<?php echo $userToEdit['valorunitario'] ?? ''; ?>" required><br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $userToEdit['categoria'] ?? ''; ?>" required><br><br>
        
        <label for="ativo">Ativo:</label>
        <input type="text" id="ativo" name="ativo" value="<?php echo $userToEdit['ativo'] ?? ''; ?>" required><br><br>

        <button type="submit" name="save">Salvar</button>
        <button type="submit" name="update">Atualizar</button>
        <button type="button" onclick="clearForm()">Novo</button>
    </form>
    <h2>Produtos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Marca</th>
            <th>Modelo</th>
        </tr>
        <th>Nome</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Ativo</th>
            <th>Ações</th>
        <!--Faz um loop FOR no resultset de usuários e preenche a tabela-->
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['descricao'] ?? ''; ?></td>
                <td><?php echo $user['marca'] ?? ''; ?></td>
                <td><?php echo $user['modelo'] ?? ''; ?></td>
                <td><?php echo $user['valorunitario'] ?? ''; ?>" required></td>
                <td><?php echo $user['categoria'] ?? ''; ?>" required></td>
                <td>:<?php echo $user['ativo'] ?? ''; ?>" required></td>

                <td>
                    <a href="?edit=<?php echo $user['id']; ?>">Editar</a>
                    <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php include 'footer.php'; ?>
    </table>
</body>
</html>