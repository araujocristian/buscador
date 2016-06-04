<?php

require_once 'init.php';

//verificar entradas
if(!empty($_POST)){ 
	if(isset($_POST['title'], $_POST['type'])){
		$title = $_POST['title'];
		$type = $_POST['type'];
		
		$indexed = $es->index([
			'index' => 'buscador',
			'type' => 'entradas',
			'body' =>[
				'title' => $title,
				'type' => $type				
			]
		]);
		/*if($indexed){
			print_r($indexed);
		} */
	}
}

?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Indexador </title>
		
	</head>
	<body bgcolor=#F0F0F0 text=#000000> <!Dsigner do Indexador>
		<h1 align="center"><font color="#00000" face="Slalom,Murphy Script,Arial">Indexador</font></h1>
		<form action="buscador.php" method="get">
		<center><br></br>
	
		<form action="indexar.php" method="post">
			<label> 
				Titulo:
				<input type="text" name="title"><br></br>
				Tipo:
				<input type="text" name="type"><br></br>
			</label>
			
			<input type="submit" value="Indexar">
		</form>
	</body>
</html>
			