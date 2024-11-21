<?php
include 'usuarios_controller.php';

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
   <h2>Cadastro de Usuários</h2>
    <form method="POST" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $userToEdit['id'] ?? ''; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $userToEdit['nome'] ?? ''; ?>" required><br><br>
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $userToEdit['telefone'] ?? ''; ?>" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userToEdit['email'] ?? ''; ?>" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <button type="submit" name="save" class="btn btn-primary my-2">Salvar</button>
        <button type="submit" name="update" class="btn btn-success my-2">Atualizar</button>
        <button type="button" onclick="clearForm()" class="btn btn-warning my-2">Novo</button>
    </form>
    <h2>Usuários Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <!--Faz um loop FOR no resultset de usuários e preenche a tabela-->
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['telefone']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="?edit=<?php echo $user['id']; ?>" class="btn btn-primary my-2">Editar</a>
                    <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');" class="btn btn-danger my-2">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php include 'footer.php'; ?>
    </table>
</body>
</html>