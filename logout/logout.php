<?php
if(!isset($_SESSION)){
    session_start();
}

unset($_SESSION['user']);
unset($_SESSION['nome']);
unset($_SESSION['tipo']);
sleep(3);
header('Location: '.'http://localhost/ponte/login');