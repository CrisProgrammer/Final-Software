<?php
include_once("conexion.php");
$patientCI = $_GET['ci'];
if($_GET['tipousuario'] == "1"){
    $sql = "SELECT * FROM fichas WHERE patientCI LIKE $patientCI";
}if($_GET['tipousuario'] == "2"){
    session_start();
    $carnet=$_SESSION['carnet'];
    $query = "SELECT * FROM usuarios WHERE carnet LIKE $patientCI";
    $result = $con->query($query);
    if($row = $result->fetch_assoc()){
        $sql = "SELECT * FROM fichas WHERE doctor LIKE '".$row['nombre']."'";
    }
}
$res = $con->query($sql);
echo "<style>
td{
border:1px solid black
}
</style>
<table >
    <tr>
        <td>Especialidad</td>
        <td>Doctor</td>
        <td>Dia</td>
        <td>Hora</td>
        <td>Consultorio</td>
        <td>Direccion</td>
        <td>Turno</td>
        <td>Nro.</td>
    </tr>";
while($row = $res->fetch_assoc()){
    $specialty = $row["specialty"];
    $doctor = $row["doctor"];
    $day = $row["day"];
    $consultorio = $row["consultorio"]; // Example: You can retrieve this from the server if needed
    $direccion = $row["direccion"]; // Example: You can retrieve this from the server if needed
    $turno = $row["turno"]; // Example: You can retrieve this from the server if needed
    $horaPresentacion = $row["horaPresentacion"];
    $nroFicha = $row["nroFicha"];
    echo "<tr>
        <td>$specialty</td>
        <td>$doctor</td>
        <td>$day</td>
        <td>$horaPresentacion</td>
        <td>$consultorio</td>
        <td>$direccion</td>
        <td>$turno</td>
        <td>$nroFicha</td>
    </tr>";
}echo "</table><br><button href='gestionEspecialidad.php'>Volver</button>
      <button type='button' onclick='goToIndex()'>Salir</button>
      <script>
        function goToIndex() {
            window.location.href = 'index.html';
        }
      </script>";
?>