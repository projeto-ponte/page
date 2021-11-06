<?php 
    $banco = new mysqli("127.0.0.1:3309", "root", "root", "db_ponte");
	if($banco->connect_errno){
        echo "<p>Encontrei um erro $banco->errno-->$banco->connect_error</p>";
		die();
	}
	$banco->query("SET NAMES 'utf-8'");
	$banco->query("SET character_set_connection=utf-8");
	$banco->query("SET character_set_client=utf-8");
	$banco->query("SET character_set_results=utf-8");
	
	