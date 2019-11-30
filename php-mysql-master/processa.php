<?php

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=phpbanco", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    switch($_POST['opcao']){

        case 1 : { //Inserir
            $select = $conn->prepare('INSERT INTO aluno (nome, ra) VALUES (:nome, :ra)');
            $select->bindValue(':nome',$_POST['nome']);
            $select->bindValue(':ra', $_POST['ra']);

            break;
        }
        case 2 : { //Editar
            $select = $conn->prepare('UPDATE aluno SET nome = :nome, ra = :ra WHERE id = :id');
            $select->bindValue(':nome', $_POST['nome']);
            $select->bindValue(':ra', $_POST['ra']);
            $select->bindValue(':id', $_POST['id']);

            break;
        }
        case 3 : { //Deletar
            $select = $conn->prepare('DELETE FROM aluno WHERE id = :id');
            $select->bindValue(':id', $_POST['id']);

            break;
        }
    }

    $select->execute();
    header('Location: http://localhost/phpbanco');
?>