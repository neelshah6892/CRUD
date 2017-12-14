<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// checar se é uma imagem 
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Arquivo não é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Arquivo não é uma imagem";
        $uploadOk = 0;
    }
}

// checar se o arquivo existe
if (file_exists($target_file)) {
    echo "O arquivo não existe";
    $uploadOk = 0;
}

//checar tamanho do arquivo
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Arquivo muito grande";
    $uploadOk = 0;
}


?>