<?php
require_once __DIR__."\..\..\model\Filme.php";

$filmeModel = new Filme();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];

    $sucesso = false;
    
    if(empty($id)){
            //fluxo para editar

            $nome = $_POST["nome"];
            $ano = $_POST["ano"];
            $descricao = $_POST["descricao"];

            $sucesso = $filmeModel->editar($id,$nome,$ano,$descricao);
    } else {

    
            $nome = $_POST["nome"];
            $ano = $_POST["ano"];
            $descricao = $_POST["descricao"];

            $sucesso = $filmeModel->inserir($nome, $ano, $descricao);
    }
    
    if($sucesso){
        return header("Location: listar.php?mensagem=sucesso");
    } else{
        return header("Location: listar.php?mensagem=erro");
    }
}else if($_SERVER["REQUEST_METHOD"] === "GET"){


    $filme = null;

    if(!empty($_GET['id'])){
       $filme = $filmeModel->buscarPorId($_GET['id']);
    }else{
        $filme = new Filme();
    }

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Cadastro |</title>
    <link rel="stylesheet" href="/vitorg/catalogo-filmes/public/css/style.css">

</head>
<body>
    <section class="containerCad">
        <form action="cadastro.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $filme->id ?>">

            <div class="input">
                <label for="nome">Nome</label>
                <input class="inputcx" type="text" name="nome" value="<?php echo $filme->nome ?>">
            </div>

            <div class="input">
                <label for="ano">Ano</label>
                <input class="inputcx" type="text" name="ano" value="<?php echo $filme->ano ?>">
            </div>

            <div class="input">
                <label for="descricao">Descricao</label>
                <input class="inputcx" type="text" name="descricao" value="<?php echo $filme->descricao ?>">
            </div>

            <div class="input">
                <label for="url">Link da imagem</label>
                <input class="inputcx" type="text" name="url" value="<?php echo $filme->url ?>">
            </div>

            <button>Salvar</button>
        </form>
        <br>
        <a href="home.php">
            <button>
                <span class="material-symbols-outlined">
                    keyboard_return
                </span>
            </button>
        </a>
    </section>
</body>
</html>