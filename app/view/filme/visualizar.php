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
        <div class="cardCadastro">
            <h2>Detalhes do filmes</h2>
                <h3>Nome :<?php echo $filme->nome?> </h3>
                <p>Ano : <?php echo $filme->ano?></p>
                <p>Descrição : <?php echo $filme->descricao?></p>
        </div>
        <div class="imgVisualizar" >
            <img src="<?php echo $filme->url?>" alt="Foto do filme">
        </div>
            <br>
                <div class="buttonreturn">
                    <a href="home.php">
                        <button>
                            <span class="material-symbols-outlined">
                                keyboard_return
                            </span>
                        </button>
                    </a>
                </div>
</body>
</html>