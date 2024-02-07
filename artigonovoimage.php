<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $connection = mysqli_connect('localhost', 'root', '', 'testeal2022025') or trigger_error(mysqli_error);
    $id = mysqli_real_escape_string($connection, $_POST['id_artigo']);

    if (isset($_FILES['ficheiro'])) {
        $arquivo = $_FILES['ficheiro'];
        echo "Upload: " . $arquivo["name"] . "<br />";
        echo "Tipo: " . $arquivo["type"] . "<br />";
        echo "Tamanho: " . $arquivo["size"] . "<br />";
        echo "Path: " . $arquivo["tmp_name"] . "<br />";

        if (
            $arquivo['type'] == "image/jpeg" ||
            $arquivo['type'] == "image/pjeg" ||
            $arquivo['type'] == "image/jpg" ||
            $arquivo['type'] == "image/png" ||
            $arquivo['type'] == "image/gif"
        ) {

            if ($arquivo['size'] > 16000000) {
                echo 'tam max permitido é 16Mb o seu tem ' . round($arquivo['size'] / 1024, 3) . ' kb';
                exit;
            }


            $novoNome = md5(mt_rand(1, 10000) . $arquivo['name']) . '.jpg';

            $dir = "imgfoto/";
            if (!file_exists($dir)) {

                mkdir($dir, 0755);
            }


            $caminho = $dir . $arquivo['name'];

            move_uploaded_file($_FILES['ficheiro']["tmp_name"], $caminho);
            echo '<script type="text/javascript">alert("Arquivo enviado com sucesso!!!");</script>';
            echo '<meta http-equiv="refresh" content="1; url=index.php" />';
            $sql = "INSERT INTO `galeria` (`imgPath`, `alt_img`, `id_artigo`) VALUES ( '$caminho','$id','$id')";
            $insert_result = mysqli_query($connection, $sql);

        } else {
            echo "Tipo inválido, apenas aceito (jpg, png e gif)";
        }


    } else {
        echo "Erro: O campo 'ficheiro' não está definido.";
    }
} else {
    echo "Erro: Formulário não enviado.";
}
?>