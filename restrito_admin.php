<?php

if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['UserID'])) {
    session_destroy();
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
    <?php
    $user = $_SESSION['UserNome']
        ?>
    <h3>Página restrita:
        <br />
        <?php echo "Sessão ativa: " . $user;

        echo "<br/><a href=logout.php>Terminar sessão</a>"; ?>
    </h3>

    <?php

    $get_produtos_list = get_produtos_list();
    ?>

    <table border="25" class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Id do dono</th>
                <th>Imagem</th>

                <th>Edição</th>


            </tr>
        </thead>
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
                            <input type="submit" name="submit2" value="Destaque">
                        </form>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php
    if (isset($_POST['submit'])) {
        $deletado = $_POST['id_artigo'];
        deleteproduto($deletado);
    } else if (isset($_POST['submit2'])) {
        $destaque = $_POST['id_artigo'];
        destaqueproduto($destaque);
    }


    ?>

    <table border=" 25" class="tabela" style="margin-top:3rem">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Tipo</th>
                <th>Ativo</th>
                <th>Ban e Desban</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $lista_de_usuarios = get_users_list();
            ?>
            <?php foreach ($lista_de_usuarios as $u): ?>
                <tr>
                    <td>
                        <?php echo $u['id_usuario'] ?>
                    </td>
                    <td>
                        <?php echo $u['nome'] ?>
                    </td>
                    <td>
                        <?php echo $u['idade'] ?>
                    </td>
                    <td>
                        <?php echo $u['tipo'] ?>
                    </td>
                    <td>
                        <?php echo $u['ativo'] ?>
                    </td>
                    <td>
                        <form method="post" action="" id="pesquisa">
                            <input type="hidden" name="id_user" value="<?= $u['id_usuario'] ?>">
                            <input type="submit" name="submit3" value="0">
                            <input type="submit" name="submit4" value="1">
                        </form>
                    </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php
    if (isset($_POST['submit3'])) {
        $user = $_POST['id_user'];
        $deletado = $_POST['submit3'];
        banir($deletado, $user);
    } else if (isset($_POST['submit4'])) {
        $destaque = $_POST['submit4'];
        $user = $_POST['id_user'];
        banir($destaque, $user);
    }


    ?>
    <?php
    $ficheiro = './acesso/acesso.txt';
    if (file_exists($ficheiro)) {
        $handle = fopen($ficheiro, "r");
        $conteudo = fread($handle, filesize($ficheiro));
        fclose($handle);
        echo "<h2>Número de usuários foram a pagina contacto: $conteudo</h2>";
    } else {
        echo "O arquivo não existe.";
    }
    ?>
    <?php
    $ficheiro = './acesso/contactos.txt';
    if (file_exists($ficheiro)) {
        $handle = fopen($ficheiro, "r");
        $conteudo = fread($handle, filesize($ficheiro));
        fclose($handle);
        echo "<h2>Contactos enviados: $conteudo</h2>";
    } else {
        echo "O arquivo não existe.";
    }
    ?>
</body>

</html>