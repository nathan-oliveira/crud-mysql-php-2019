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

    $select = $conn->prepare('SELECT id, nome, ra FROM aluno');
    $select->execute();

    $dados = $select->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- HMTL -->

<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP Com Banco</title>

        <!-- CSS B4 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            fieldset {
                border: 1px groove #ddd !important;
                /*padding: 0 1.4em 1.4em 1.4em !important;*/
                margin: 0 0 1.5em 0 !important;
                /*-webkit-box-shadow:  0px 0px 0px 0px #000;*/
                /*box-shadow:  0px 0px 0px 0px #000;*/
            }
            legend {
                font-size: 1.2em !important;
                font-weight: bold !important;
                text-align: left !important;
                width:auto;
                padding:0 10px;
                border-bottom:none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand text-white" href="#">PHP & MySQL</a>
        </nav>
        <br>
        <div class="container">
            <div class="alert alert-secondary text-center" role="alert">
                <b>Cadastro de Aluno</b>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <fieldset class="col-sm-12">
                        <legend>Inserir Aluno</legend>
                        <form method="POST" action="processa.php">
                            <div class="col-sm-12" style="float: left;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Opção</label>
                                    </div>
                                    <select onchange="seleciona(this.value)" class="custom-select" id="inputGroupSelect01" name="opcao">
                                        <option disabled="" hidden selected>Selecione ...</option>
                                        <option value="1">Inserir</option>
                                        <option value="2">Editar</option>
                                        <option value="3">Apagar</option>
                                    </select>
                                </div>
                            </div>
                            <div id="campo"></div>
                            <div class="col-sm-12">
                                <input type="submit" class="col-sm-2 btn btn-dark" value="Inserir" style="float: right; margin-bottom: 10px;">
                            </div>

                        </form>
                    </fieldset>
                </div>
            </div>
            <hr><br>
            <div class="alert alert-secondary text-center" role="alert">
                <b>Alunos Cadastrados</b>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <fieldset class="col-sm-12">
                        <legend>Formulario de Cadastro</legend>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ra</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados as $linha) {?>
                                    <tr>
                                        <th scope="row"><?php echo $linha['id']; ?></th>
                                        <td><?php echo $linha['nome']; ?></td>
                                        <td><?php echo $linha['ra']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>

        <!-- Script B4 -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

<script>
    function seleciona(op) {
        switch (op) {
            case '1' : {
                $('#campo').html('<div class="col-sm-6"  style="float: left;">\n' +
                '                                <div class="input-group mb-3">\n' +
                '                                    <div class="input-group-prepend">\n' +
                '                                        <span class="input-group-text" id="basic-addon1">Nome</span>\n' +
                '                                    </div>\n' +
                '                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="nome">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-sm-6"  style="float: left;">\n' +
                '                                <div class="input-group mb-3">\n' +
                '                                    <div class="input-group-prepend">\n' +
                '                                        <span class="input-group-text" id="basic-addon1">RA</span>\n' +
                '                                    </div>\n' +
                '                                    <input type="text" class="form-control" placeholder="RA" aria-label="Username" aria-describedby="basic-addon1" name="ra">\n' +
                '                                </div>\n' +
                '                            </div>');

                break;
            }

            case '2' : {
                $('#campo').html('<div class="col-sm-12"  style="float: left;">\n' +
                    '                                <div class="input-group mb-3">\n' +
                    '                                    <div class="input-group-prepend">\n' +
                    '                                        <span class="input-group-text" id="basic-addon1">ID</span>\n' +
                    '                                    </div>\n' +
                    '                                    <input type="text" class="form-control" placeholder="ID" aria-label="Username" aria-describedby="basic-addon1" name="id">\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-sm-6"  style="float: left;">\n' +
                    '                                <div class="input-group mb-3">\n' +
                    '                                    <div class="input-group-prepend">\n' +
                    '                                        <span class="input-group-text" id="basic-addon1">Nome</span>\n' +
                    '                                    </div>\n' +
                    '                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="nome">\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-sm-6"  style="float: left;">\n' +
                    '                                <div class="input-group mb-3">\n' +
                    '                                    <div class="input-group-prepend">\n' +
                    '                                        <span class="input-group-text" id="basic-addon1">RA</span>\n' +
                    '                                    </div>\n' +
                    '                                    <input type="text" class="form-control" placeholder="RA" aria-label="Username" aria-describedby="basic-addon1" name="ra">\n' +
                    '                                </div>\n' +
                    '                            </div>');

                break;
            }

            case '3' : {
                $('#campo').html('<div class="col-sm-12"  style="float: left;">\n' +
                    '                                <div class="input-group mb-3">\n' +
                    '                                    <div class="input-group-prepend">\n' +
                    '                                        <span class="input-group-text" id="basic-addon1">ID</span>\n' +
                    '                                    </div>\n' +
                    '                                    <input type="text" class="form-control" placeholder="ID" aria-label="Username" aria-describedby="basic-addon1" name="id">\n' +
                    '                                </div>\n' +
                    '                            </div>');

                break;
            }
            
        }
    }
</script>