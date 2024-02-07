<?php

if (isset($_GET['id']))
    if (empty($_GET['id'])) {
        header("Location: index.php");
        exit;
    }


include_once './database.php';
$produto = get_produtos_detalhe($_GET['id']);
$detalhe = get_dono($_GET['id']);
$galeria = get_imagens($_GET['id']);
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

    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="<?php echo $produto['imgPath'] ?>" alt="" width="50%">
            </div>
            <div class="col-6">
                <h2>
                    <?php echo $produto['nome'] ?>
                </h2>
                <p>
                    <?php echo $produto['descricao'] ?>
                </p>
                <button>Comprar</button>
            </div>
        </div>
        <hr>
        <h2>Feito por:</h2>
        <h4>
            <?php echo $detalhe['nome'] ?>
        </h4>
        <h6>
            <?php echo $detalhe['idade'] ?>
        </h6>
    </div>


    <footer>
        <div><b>Copyright Lucas &copy;Fernandes</b></div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>