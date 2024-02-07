<?php

if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['UserID'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
if ($_SESSION['UserID'] != $_GET['id']) {
    header("Location: index.php");
    exit;
}

include_once './database.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="./css/home.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="" width="60" height="64">
            </a>
            <form class="d-flex">
                <a href="contactos.php">
                    <button type="submit">Contactos</button>
                </a>
                <a href="login.php"><img src="img/user.png" alt="user" width="60" style="margin-left: 20px;"></a>
            </form>
        </div>
    </nav>
    <h1>Bem vindo(a)</h1>
    <h2>Criar artigo</h2>
    <form action="artigonovoempresa.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <h4>Nome</h4>
            <input type="text" name="nome" maxlength="10" id="txtUser" placeholder="Nome">
            <h4>Descricao</h4>
            <textarea id="mensagem" name="descricao" rows="4" cols="50" id="txtUser" placeholder="descricao"></textarea>
            <h4>Quantidade em stock</h4>
            <input type="number" name="stock" id="txtPassword" placeholder="Stock">
            <h1>Sistema de UPload</h1>


            <label for="ficheiro">Arquivo</label>
            <input type="file" id="ficheiro" name="ficheiro" />

            <h4>Preco</h4>
            <!-- Encontrei na net-->
            <input type="number" id="numeroDecimal" name="preco" step="0.01" pattern="\d+(\.\d{1,2})?"
                title="Insira um número com até duas casas decimais"></br>
            <input type="submit" value="Criar">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

        </fieldset>


    </form>
    <h2>Seus artigos</h2>


    <table border="25" class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Id do dono</th>
                <th>Imagem</th>
                <th>Eliminar ou Adicionar galeria</th>
            </tr>
        </thead>
        <?php

        $get_produtos_list = get_produtos_empresa($_GET['id']);
        ?>
        <tbody>
            <?php foreach ($get_produtos_list as $p): ?>
                <tr>
                    <td>
                        <?php echo $p['id_artigo'] ?>
                    </td>
                    <td>
                        <?php echo $p['nome'] ?>
                    </td>
                    <td>
                        <?php echo $p['descricao'] ?>
                    </td>
                    <td>
                        <?php echo $p['id_usuario'] ?>
                    </td>
                    <td style="text-align:center; justify-content:center"><img width="50px" src='<?= $p['imgPath'] ?>' />
                    </td>
                    <td>
                        <form method="post" action="" id="pesquisa">
                            <input type="hidden" name="id_artigo" value="<?= $p['id_artigo'] ?>">
                            <input type="submit" name="submit" value="Deletar">

                        </form>
                        <form action="artigonovoimage.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_artigo" value="<?= $p['id_artigo'] ?>">
                            <label for="ficheiro">Adicionar a galeria</label>
                            <input type="file" id="ficheiro" name="ficheiro" />
                            <input type="submit" name="submit" value="Confirmar">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <?php
        if (isset($_POST['submit'])) {
            $deletado = $_POST['id_artigo'];
            deleteproduto($deletado);
        }


        ?>
    </table>
</body>

</html>