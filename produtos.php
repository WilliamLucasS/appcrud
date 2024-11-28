<?php
include 'produtos_controller.php';

//Pega todos os usuários para preencher os dados da tabela
$produtos = getProdutos();

//Variável que guarda o ID do usuário que será editado
$produtoToEdit = null;

// Verifica se existe o parâmetro edit pelo método GET
// e sé há um ID para edição de usuário
if (isset($_GET['edit'])) {
    $produtoToEdit = getProduto($_GET['edit']);
}
?>
<?php include 'header.php'; ?>

<body>
   <script src = "js/main.js"></script>
   <h2>Cadastro de Produtos</h2>
    <form method="POST" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $produtoToEdit['id'] ?? ''; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $produtoToEdit['nome'] ?? ''; ?>" required><br><br>
        
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo $produtoToEdit['descricao'] ?? ''; ?>" required><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $produtoToEdit['marca'] ?? ''; ?>" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $produtoToEdit['modelo'] ?? ''; ?>" required><br><br>

        <label for="valorunitario">Valor:</label>
        <input type="number" step="0.01" id="valorunitario" name="valorunitario" value="<?php echo $produtoToEdit['valorunitario'] ?? ''; ?>" required><br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $produtoToEdit['categoria'] ?? ''; ?>" required><br><br>
        
        <label for="url_img">Imagem:</label>
        <input type="text" class="form-control" id="url_img" name="url_img" value="<?php echo $produtoToEdit['url_img'] ?? ''; ?>" required><br><br>

        <label for="ativo">Ativo:</label>
        <input type="checkbox" id="ativo" name="ativo" value="<?php echo $produtoToEdit['ativo'] ?? ''; ?>" required><br><br>

        <button type="submit" name="save" class="btn btn-primary my-2">Salvar</button>
        <button type="submit" name="update" class="btn btn-success my-2">Atualizar</button>
        <button type="button" onclick="clearForm()" class="btn btn-warning my-2">Novo</button>
    </form>
    <h2>Produtos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Marca</th>
            <th>Modelo</th>
        <!--Faz um loop FOR no resultset de usuários e preenche a tabela-->
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['descricao'] ?? ''; ?></td>
                <td><?php echo $produto['marca'] ?? ''; ?></td>
                <td><?php echo $produto['modelo'] ?? ''; ?></td>
                <tr>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Imagem</th>
            <th>Ativo</th>
            <th>Ações</th>
            <tr>
                <td><?php echo number_format($produto['valorunitario'], 2, ',', '.'); ?></td>
                <td><?php echo $produto['categoria'] ?? ''; ?></td>
                <td><img src="<?php echo $produto['url_img']; ?> "alt="Imagem do Produto" style="width: 90px;"></td>
                <td><?php echo $produto['ativo'] ? 'Ativo' : 'Inativo'; ?></td>

                <td>
                <a href="?edit=<?php echo $produto['id']; ?>" class="btn btn-primary my-2">Editar</a>
                <a href="?delete=<?php echo $produto['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');" class="btn btn-danger my-2">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php include 'footer.php'; ?>
    </table>
</body>
</html>