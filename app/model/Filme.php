<?php

require_once __DIR__ . "\..\config\database.php";



//classe que representa a tabela filme no projeto
class Filme {

    private $tabela = "filme";
    private $pdo;
    
    // colunas da tabela
    public $id;
    public $nome;
    public $ano;
    public $descricao;
    public $url;

    //metodos
    public function __construct(){
        global $pdo;
        $this->pdo = $pdo;

    }
    
    // Metodo para buscar os filmes
    public function buscarTodos(){
        $query = "SELECT * FROM $this->tabela ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetchAll();        
        
    }


    public function buscarPorId($id){
        $query = "SELECT * FROM $this->tabela WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $stmt->fetch();

    }


    public function excluir($id){
        $query = "DELETE FROM $this->tabela WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function inserir($nome, $ano, $descricao){
        $query = "INSERT INTO $this->tabela (nome,ano,descricao)
            VALUES (:nome, :ano, :descricao)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function editar($id, $nome, $ano, $descricao){
        $query = "UPDATE $this->tabela 
            SET nome=:nome, ano=:ano, descricao=:descricao
            WHERE id=:id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->execute();

        return $stmt->rowCount() > 0;        
    }
}