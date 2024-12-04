<?php 

require_once __DIR__."/../../config/env.php";
require_once __DIR__."/../../config/database.php";
require_once __DIR__."/../../model/Filme.php";

$id = $_GET["id"];

if ($id == "") {
    return header(" Location : listar.php");

}

$filmeModel = new Filme();
$filme = $filmeModel->buscarPorId($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Detalhes filmes | </title>

    <link rel="stylesheet" href="/vitorg/catalogo-filmes/public/css/style.css">
</head>
<body>
    <section class="container">
        <h2>Detalhes do filmes</h2>

        <h3>Nome :<?php echo $filme->nome?> </h3>
        <p>Ano : <?php echo $filme->ano?></p>
        <p>Descrição : <?php echo $filme->descricao?></p>

        <img class="imgVisualizar" src="<?php echo $filme->url?>" alt="Foto do filme">
        <br>
        <a href="listar.php">
            <button>
                <span class="material-symbols-outlined">
                    keyboard_return
                </span>
            </button>
        </a>
    </section>
</body>
</html>