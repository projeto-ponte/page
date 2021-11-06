<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Título da página</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<?php 
session_start();
?>
<body>
    <?php
    require_once "../includes/function.php";
    if(is_logado()==true){
            require_once "../../ponte/includes/menuComponent.php";
        }
    require_once "../includes/banco.php";
    require_once "./class/contact-class.php";
    require_once "../includes/function.php";
    ?>
    <div id="corpo">

        <?php
        if (is_logado() == true) {
            // require_once "../logout/logout-ht.php";
            echo "<h1>Contato</h1>";
            $user = $_SESSION['user'];
            $get = new Contato(null,null,null,$user);
            $q = $get->retornarDadosPegar();
            $busca = $banco->query($q);
            if ($busca == null) {
                echo "<div class='alert alert-warning' role='alert'>
                        Você não possui contatos
                      </div>";
            } else {

                while ($reg = $busca->fetch_object()) {
                    echo "<div class='card'>
                <div class='card-body'>
                <div class='row'>
                    <div class='col'>
                        <h3>Número:</h3>
                        <h4>$reg->numero</h3>
                    </div>
                    <div class='col'>
                        <h3>Descrição:</h3>
                        <h4> $reg->descricao</h3>
                    </div>
                </div>

                <a href='delete-contact.php?cod=$reg->idContato'><button type='button' class='btn btn-danger'>Deletar</button></a>
                <a href='edit-contact-form.php?cod=$reg->idContato'><button type='button' class='btn btn-primary'>Editar</button></a>   
                </div>
                </div>";
                }
                echo "<a href='new-contact-form.php'><button style='margin-top: 8px;' type='button' class='btn btn-primary'>Novo Contato</button></a>";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                   Usuário não logado
                  </div>';
        }
        ?>
        <!-- <a href="edit-contact-form.php">Editar</a>
        <a href="delete-contact.php">Deletar</a> -->

        <br>
    </div>
</body>

</html>