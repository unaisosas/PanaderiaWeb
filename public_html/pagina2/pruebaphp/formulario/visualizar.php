<html>
<head>
<tittle>Tabla de pedidos</tittle>
</head>
<body>
    <?php
$username = unai;
$password = admin1234;
$servername = localhost;
$database = panaderia;
$table = pan;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexión con la base de datos $database del servidor $servername reali.<br/>";
    
    $sql = "SELECT * FROM ".$table." ORDER BY codpedido";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result_array = $stmt->fetchAll();
    print "<table border='1px solid grey'>";
    print "<tr>";
    print "<th>";print "codpedido";print "</th>";
    print "<th>";print "nombre";print "</th>";
    print "<th>";print "cantidad";print "</th>";
    print "<th>";print "fecha";print "</th>";
    print "<th>";print "telefono";print "</th>";
    print "</tr>";
    foreach ( $result_array as $linea ) {
        print "<tr>";
        print "<td>";print $linea['codpedido'];print "</td>";
        print "<td>";print $linea['nombre'];print "</td>";
        print "<td>";print $linea['pan'];print "</td>";
        print "<td>";print $linea['dia'];print "</td>";
        print "<td>";print $linea['numero'];print "</td>";
        print "</tr>";
    }
    print "</table>";
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
<form action="http://www.unai.pagina1.eus/html">
    <input type="submit" value="Ir a la pagina principal" />
</form>
</body>
</html>
