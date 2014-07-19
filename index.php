<!DOCTYPE html>

<html lang="es">
<head>
<?php 
    require 'CantidadNormaliza.php';    
	if(isset($_POST['cantidad'])){
		$valor = $_POST['cantidad'];		
		$obj = new CantidadNormaliza($valor);
		$signoPesos=1;
		$coma=1;
		$r=  $obj->normalizar($signoPesos,$coma);
	}
?>

	<meta charset="UTF-8">
	<title>Pruebas</title>
</head>
<body>
	<section>
		<h2>Escribe una cifra aquí</h2>
		<form action="" method="POST">
			<input type="text" value="<?php echo $r;?>" name="cantidad">
			<input type="submit" value="aceptar">
		</form>
	</section>
</body>
</html>