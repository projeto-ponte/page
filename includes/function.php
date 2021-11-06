<?php 
if(!isset($_SESSION)){
    session_start();
}
function is_logado(){
    if(empty($_SESSION['user'])){
        return false;
    }
    else{
        return true;
    }
}
?>