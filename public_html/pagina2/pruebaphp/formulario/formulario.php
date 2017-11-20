<html>
	<head>
		<title>Formulario</title>
	<script type="text/javascript" src="../../../pagina1/JS/reloj.js"></script>
	<link rel="stylesheet" href="../../../pagina1/Css/reloj.css" type="text/css">
	</head>
	<?php
if ( !isset($_POST['codpedido']) ) {
?>  
	<body onload="startTime()">
		<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">
			 <p>Nombre: <input type="text" name="nombre" /></p>
			 <p>Cantidad pan: <input type="int" maxlength="100" name="pan" /></p>
			 <p>Fecha de pedido:<input type="text" name="dia" /></p>
			 <p>Numero de telefono: <input type="text" name="numero" /></p>
			 <p>Codigo de pedido: <input type="text" name="codpedido" /></p>
			 <p><input type="submit" name="env" value="ENVIAR"/></p>
		</form>
		<?php
}
else{
    $username = unai;
    $password = admin1234;
    $servername = localhost;
    $database = panaderia;
    $table = pan; 
try {
    //Conexión con una base de datos del servidor
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión con la base de datos '".$database."' del servidor '".$servername."' realizada.<br/>";
    echo "Nombre: ".$_POST['nombre']."<br/>";
    echo "Cantidad: ".$_POST['pan']."<br/>";
    echo "Fecha: ".$_POST['dia']."<br/>";
    echo "Telefono: ".$_POST['numero']."<br/>";   
    echo "Codigo de pedido: ".$_POST['codpedido']."<br/>";  
    
    $sql = "INSERT INTO ".$table." VALUES ('".$_POST['nombre']."','".$_POST['pan']."','".$_POST['dia']."',".$_POST['numero'].",".$_POST['codpedido'].")";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Pedido realizado.<br/>";
    }
catch(PDOException $e) {
    if ($e->getCode() == "23000")
        echo "Imposible insertar el registro."."<br/>";
    else
        echo $e->getMessage();
}
}  
 //print "<br/><br/><br/>sql: ".$sql;
?>
		<form action="http://www.unai.pagina1.eus/html">
    <input type="submit" value="Ir a la pagina principal" />
</form>
		<div id="clockdate">
 	 <div class="clockdate-wrapper">
    <div id="clock"></div>
    <div id="date"></div>
 	 </div>
		</div>

	</body>
</html>


