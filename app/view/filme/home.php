<?php

require_once __DIR__."/../../config/env.php";
require_once __DIR__."/../../config/database.php";
require_once __DIR__."\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="/vitorg/catalogo-filmes/public/css/style.css">

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/vitorg/catalogo-filmes/app/view/filme/home.php">Home</a></li>
                <li><a href="/vitorg/catalogo-filmes/app/view/filme/cadastro.php">Cadastro</a></li>
                <li><a href="/vitorg/catalogo-filmes/app/view/filme/listar.php">Listagem</a></li>
            </ul>
        </nav>
    </header>

    <?php foreach ($filmes as $filme){  ?>
        <form action="visualizar.php">
            <input type="hidden" name="id" value="<?= $filme->id ?>">
                <section class="containerCard">
                        <div class="cards">
                            <img class="img" src="<?php echo $filme->url ?>" alt="Foto do filme">
                            <h3  class="titulo"><?php echo $filme->nome ?></h3>
                            <span class="descricao"><?php echo $filme->descricao ?></span>
                        </div>
                </section>
        </form>
    <?php } ?>
</body>
</html>