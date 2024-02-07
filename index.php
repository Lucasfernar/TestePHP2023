<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once './database.php';

$destaque = get_destaque();
$produto = get_produtos_list();
$imagens = get_imagens();
?>
<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/css.css">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
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
    <footer>
        <div><b>Destaque</b></div>
    </footer>

    <main class="produtos">
        <?php

        foreach ($destaque as $d):
            ?>
            <article>
                <img src="<?php echo $d['imgPath'] ?>" alt="" title="Bad Bunny">
                <h2>
                    <?php echo $d['nome'] ?>
                </h2>
                <p>
                    <?php echo $d['preco'] ?>$
                </p>
                <b><a class="button" href="detalhe.php?id=<?= $d['id_artigo'] ?>">Detalhes</a></b>
            </article>
            <?php
        endforeach;
        ?>
    </main>
    <footer>
        <div><b>Total</b></div>
    </footer>
    <main class="produtos">
    
        <?php

        foreach ($produto as $p):
            ?>
            <article>
                <img src="<?php echo $p['imgPath'] ?>" alt="" title="Bad Bunny">
                <h2>
                    <?php echo $p['nome'] ?>
                </h2>
                <p>
                    <?php echo $p['preco'] ?>$
                </p>
                <b><a class="button" href="detalhe.php?id=<?= $p['id_artigo'] ?>">Detalhes</a></b>
            </article>
            <?php
        endforeach;
        ?>
    </main>
    <footer>
        <div><b>Imagens promocionais</b></div>
    </footer>
    <main class="produtos">
        <?php

        foreach ($imagens as $i):
            ?>
            <article>
                <img src="<?php echo $i['imgPath'] ?>" alt="alt_img" title="Bad Bunny">
                <b><a class="button" href="detalhe.php?id=<?= $i['id_artigo'] ?>">Ver produto</a></b>
            </article>
            <?php
        endforeach;
        ?>
    </main>
    <footer>
        <div><b>Copyright Lucas &copy;Fernandes</b></div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>