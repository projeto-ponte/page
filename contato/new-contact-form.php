<?php 
require_once "../includes/function.php";
if(is_logado()==true){
echo "<head>
    <link rel='stylesheet' href='estilo/estilo.css'>
    <meta charset='UTF-8'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</head>
<div id='corpo'>
    <h1>Novo Contato</h1>
    <form action='new-contact.php' method='post'>
        <div class='row g-3'>
            <div class='col-sm-7'>

                <label for='numero' class='form-label'>Número</label>
                <input type='number' class='form-control' name='numero' id='numero'  required placeholder='insira o número'>
            </div>
        </div>
        <div class='row g-3'>
            <div class='col-sm-7'>
                <label for='descricao' class='form-label'>Descricao</label>
                <select id='descricao' name='descricao' class='form-select' aria-label='Default select example'>
                    <option value='residencia'>Residência</option>
                    <option value='trabalho' selected>Trabalho</option>
                </select>
            </div>
        </div>
        <div style='margin-top: 10px;' class='d-grid gap-2 d-md-block'>
            <button type='submit' class='btn btn-success'>Salvar</button>
            <a href='index.php'><button type='button' class='btn btn-primary'>Voltar</button></a>
        </div>
    </form>
</div>";
}
else{
    echo '<div class="alert alert-danger" role="alert">
                   Usuário não logado
                  </div>
                  <a href="index.php"><button type="button" class="btn btn-primary">Voltar</button></a>';
}
