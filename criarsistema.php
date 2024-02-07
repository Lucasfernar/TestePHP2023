<?php
if (!empty($_POST) && empty($_POST['user']) || empty($_POST['password']) || empty($_POST['idade'])) {
    header("Location: index.php");
    exit;
}

$connection = mysqli_connect('localhost', 'root', '', 'testeal2022025') or trigger_error(mysqli_error);

$user = mysqli_real_escape_string($connection, $_POST['user']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$idade = mysqli_real_escape_string($connection, $_POST['idade']);
$passhash = sha1($password);
$tipo = mysqli_real_escape_string($connection, $_POST['tipo']);
$sql = "SELECT `nome` FROM `usuario` WHERE `nome` = '$user'";
$query = mysqli_query($connection, $sql);

if (mysqli_num_rows($query) != 0) {
    echo "Login inválido.";
    header("Location: index.php");
    exit;
} else {
    $sql = "INSERT INTO `usuario` (`nome`, `palavra_passe`, `idade`, `tipo`,`ativo`,`img_user`) VALUES ('$user', '" . sha1($password) . "', '$idade', '$tipo','1','./imguser/po.png')";
    $insert_result = mysqli_query($connection, $sql);

    if ($insert_result) {
        header("Location: login.php");
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($connection);
    }
}

mysqli_close($connection);

?>