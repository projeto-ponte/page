<head>
    <link rel="stylesheet" href="estilo/estilo.css">
    <meta charset="UTF-8">
</head>
<div id="corpo">
    <h1>Editar Contato</h1>
    <?php
    $c = $_GET['cod'];
    require_once "../includes/banco.php";
    require_once "./class/contact-class.php";
    require_once "../includes/function.php";
    ?>
    <?php 
    
    ?>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <?php
    if(is_logado() == true){
    echo "<form action='edit-contact.php?cod=$c' method='post'>";
        $get = new Contato(null,null,$c);
        $q = $get->retornarDadosPegarEs();
        $busca = $banco->query($q);
        $reg = $busca->fetch_object();

        echo "<div class='row g-3'>
            <div class='col-sm-7'>";
        echo "<label for='numero' class='form-label'>Número</label>";
        echo "<input type='number' value='$reg->numero' class='form-control' name='numero' id='numero' required placeholder='insira o número'>";
        echo "</div>
           </div>";

        echo "<div class='row g-3'>
            <div class='col-sm-7'>";
        echo "<label for='descricao' class='form-label'>Descrição</label>";
        echo "<select id='descricao' name='descricao' class='form-select' aria-label='Default select example'>";
        if ($reg->descricao == 'trabalho') {
            echo "<option value='residencia'>Residência</option>
                <option value='trabalho' selected>Trabalho</option>";
        } else {
            echo "<option value='residencia' selected>Residência</option>
                <option value='trabalho' >Trabalho</option>";
        }
        echo "</select>";
        echo "</div>
        </div>
        <div style='margin-top: 10px;' class='d-grid gap-2 d-md-block'>
            <button type='submit' class='btn btn-success'>Salvar</button>
            <a href='index.php'><button type='button' class='btn btn-primary'>Voltar</button></a>
        </div>
    </form>";}
    else{
        echo '<div class="alert alert-danger" role="alert">
        Usuário não logado
      </div>';
    }
    ?>
</div>