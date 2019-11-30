<?php
    require 'init.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuário - ULTIMATE PHP</title>
    </head>
    <body>
        <h1>Sistema de Cadastro - ULTIMATE PHP</h1>

        <h2>Cadastro de Usuário</h2>

        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">

            <br><br>

            <label for="email">Email: </label>
            <br>

            <input type="text" name="email" id="email">

            <br><br>

            Gênero: <br>
            <input type="radio" name="gender" id="gender_m" value="m">
                <labe for="gender_m">Masculino</labe>
            <input type="radio" name="gender" id="gender_f" value="f">
                <labe for="gender_f">Feminino</labe>
            
            
            <br><br>

            <label for="birthdate">Data de Nascimento: </label>
            <br>
            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YY">

            <br><br>

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
