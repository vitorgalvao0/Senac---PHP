<?php

require_once __DIR__."\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Filmes |</title>

    <link rel="stylesheet" href="/vitorg/catalogo-filmes/public/css/style.css">
</head>
<body>
    <section class="container">

        <h2>Filmes</h2>

        <div class="acao">
            <a href="cadastro.php">
                <button>
                    <span>Novo</span>
                    <span class="material-symbols-outlined">
                        add
                    </span>
                </button>
            </a>
        </div>

        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Descricao</th>
                <th>Imagem</th>
                <th>Ação</th>  
            </thead>
            <tbody>
            <?php foreach ($filmes as $filme){  ?>
                <tr>
                    <td> <?php echo $filme->id?> </td> 
                    <td> <?php echo $filme->nome?> </td>
                    <td> <?php echo $filme->ano?> </td>
                    <td> <?php echo $filme->descricao?> </td>
                    <td> <img class="img" src="<?php echo $filme->url ?>" alt="Foto do filme"></td>
                    <td>
                        <form action="visualizar.php" method="GET">
                            <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button>
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                        </form>

                        <form action="cadastro.php" method="GET">
                                <button>
                                <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                        </form>

                        <form action="excluir.php" method="POST">
                            <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir o filme?')">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                        </form>

                    </td>
                    </tr>         
                <?php } ?>
            </tbody>
        </table>
    </section>
<script > src = "vitorg/catalogo-filmes/public/js/main.js" </script>
</body>
</html>