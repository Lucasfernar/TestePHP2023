<?php
$connection = mysqli_connect('localhost', 'root', '', 'testeal2022025') or trigger_error(mysqli_error);
$nome = mysqli_real_escape_string($connection, $_POST['Textopesquisa']);
if ($nome != null) {

} else {

}
$nome = mysqli_real_escape_string($connection, $_POST['nome']);
$descricao = mysqli_real_escape_string($connection, $_POST['descricao']);
$stock = mysqli_real_escape_string($connection, $_POST['stock']);
$file = mysqli_real_escape_string($connection, $_POST['file']);
$preco = mysqli_real_escape_string($connection, $_POST['preco']);
$id = mysqli_real_escape_string($connection, $_POST['id']);
$sql = "SELECT `nome` FROM `usuario` WHERE `nome` = '$user'";
$query = mysqli_query($connection, $sql);
$sql = "INSERT INTO `artigos` (`nome`, `descricao`, `stock`, `imgPath`,`id_usuario`,`preco`) VALUES ('$nome', '$descricao', '$stock', '$file','$id','$preco')";
$insert_result = mysqli_query($connection, $sql);

if ($insert_result) {
    header("Location: login.php");
} else {
    echo "Erro ao inserir registro: " . mysqli_error($connection);
}
?>