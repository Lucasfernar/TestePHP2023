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

    <h1>Bem vindo(a)
        <?php echo $_SESSION['UserNome'] ?>
    </h1>
    <h2>Pesquisa</h2>
    <select name="tipo" id="escolha">
        <option value="1">Pesquisar nome</option>
        <option value="2">Pesquisar criador</option>
        <option value="3">Esta em destaque</option>
    </select>
    <script>
        $('#escolha').change(function () {
            var selectedValue = $(this).val();
            console.log(selectedValue);
            if (selectedValue === '1') {
                $("#pesquisa").html('<label for="Textopesquisa">Pesquisar por nome da empresa:</label> <input type="text" name="Textocriador" id="Textopesquisa"> <input type="submit" name="submit2" value="Pesquisar">')
            } else if (selectedValue === '2') {
                $("#pesquisa").html('<label for="Textopesquisa">Pesquisar por nome da empresa:</label> <input type="text" name="Textocriador" id="Textopesquisa"> <input type="submit" name="submit2" value="Pesquisar">')
            } else if (selectedValue === '3') {
                $("#pesquisa").html('<input type="submit" name="submit3" value="Pesquisar">')
            }
        });
    </script>
    <form method="post" action="" id="pesquisa">
        <label for="Textopesquisa">Pesquisar por nome do artigo:</label>
        <input type="text" name="Textopesquisa" id="Textopesquisa">
        <input type="submit" name="submit" value="Pesquisar">
    </form>

    <table>
        <div class="container">
            <?php
            if (isset($_POST['submit'])) {

                $nome_pesquisa = $_POST['Textopesquisa'];


                $resultados_pesquisa = get_produtos_pesquisa($nome_pesquisa);
            } else if (isset($_POST['submit2'])) {

                $nome_pesquisa = $_POST['Textocriador'];


                $resultados_pesquisa = get_donos_pesquisa($nome_pesquisa);
            } else if (isset($_POST['submit3'])) {

                $resultados_pesquisa = get_destaque();
            } else {
                $resultados_pesquisa = get_produtos_list();
            }


            ?>
            <?php if (isset($resultados_pesquisa)) ?>

            <h2>Resultados da Pesquisa:</h2>
            <table>

                <?php foreach ($resultados_pesquisa as $produto): ?>
                    <div class="container">
                        <div class="row" style="margin-top:20px;">
                            <div class="col-5">
                                <h3>
                                    <?php echo $produto['nome']; ?>
                                </h3>
                                <img src="<?php echo $produto['imgPath']; ?>">
                            </div>
                            <div class="col-7">
                                <h4>Stock:
                                    <?php echo $produto['stock']; ?>
                                </h4>
                                <h4>Preco:
                                    <?php echo $produto['preco']; ?>
                                </h4>
                                <h4>Descricao:
                                    <?php echo $produto['preco']; ?>
                                </h4>
                                <b><a class="button" href="detalhe.php?id=<?= $produto['id_artigo'] ?>">Detalhes</a></b>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>
            </table>
        </div>









</body>

</html>