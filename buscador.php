<?php

require_once 'init.php'; //Requerimento do init.php

//verficar se foi feita consulta
if(isset($_GET['q'])){ 
	
	$q = $_GET['q'];
	
	$query = $es->search([
		'body' => [
			'query' =>[
				'bool' =>[
					'should'=>[
						['match' => ['title' => $q]],
						['match' => ['type' => $q]]
					]
				]
			]
		]
	]);
	
	/*echo '<pre>', print_r($query), '</pre>';
	
	die(); */
	
	if($query['hits']['total']>=1){
		$results = $query['hits']['hits'];
	}
	
}

?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Buscador </title>
		
	</head>
	<body bgcolor=#F0F0F0 text=#000000> <!Designer do Buscador>
		<h1 align="center"><font color="#00000" face="Slalom,Murphy Script,Arial">Buscador</font></h1>
		<form action="buscador.php" method="get">
		<center><br></br>
		
			<label> 		
				<input type="text" name="q">
			</label>
			
			<input type="submit" value="Buscar"><br></br><br></br>
		</form>
		
		
		<?php //Printar Resultados
		if(isset($results)){
			echo ("Resultados:"); 
			foreach($results as $r){
			?>
				
				<div class="result">
					<p></p><?php echo ('Titulo:');?>
					<b><u><?php echo $r['_source']['title'];?></b></u>
					<div><?php echo ('Tipo:');?>
					<?php echo $r['_source']['type'];?></div><p></p>
					
				</div>
			<?php
			}
		}
		?>
	</body>
</html>			
