<?php
function testarHash($senha, $hash){
    $ok = password_verify($senha, $hash);
    return $ok;
    }
    function gerarHash($senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }
    ?>