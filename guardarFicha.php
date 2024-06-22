<?php
include_once("conexion.php");
$host = 'localhost';
$db = 'bd_fichas';
$user = 'root';
$pass = '';

try {
    // Conectarse a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Establecer el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener los datos enviados por POST y decodificar el JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar que los datos no estén vacíos y contengan las claves necesarias
    if (!empty($data) && isset($data['specialty'], $data['doctor'], $data['day'], $data['consultorio'], $data['direccion'], $data['turno'], $data['horaPresentacion'], $data['nroficha'])) {
        
        // Preparar la consulta SQL de inserción
        $sql = "INSERT INTO fichas (patientCI, specialty, doctor, day, consultorio, direccion, turno, horaPresentacion, nroficha) 
                VALUES (:patientCI, :specialty, :doctor, :day, :consultorio, :direccion, :turno, :horaPresentacion, :nroficha)";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta con los datos enviados
        $stmt->execute([
            ':patientCI' => $data['patientCI'],
            ':specialty' => $data['specialty'],
            ':doctor' => $data['doctor'],
            ':day' => $data['day'],
            ':consultorio' => $data['consultorio'],
            ':direccion' => $data['direccion'],
            ':turno' => $data['turno'],
            ':horaPresentacion' => $data['horaPresentacion'],
            ':nroficha' => $data['nroficha']
        ]);

        // Responder con un mensaje de éxito
        echo json_encode(['status' => 'success', 'message' => 'Ficha guardada exitosamente']);
    } else {
        // Responder con un mensaje de error si los datos están incompletos
        echo json_encode(['status' => 'error', 'message' => 'Datos incompletos o no válidos']);
    }
} catch (PDOException $e) {
    // Manejar errores de la base de datos y devolver una respuesta JSON
    echo json_encode(['status' => 'error', 'message' => 'Error al guardar la ficha: ' . $e->getMessage()]);
} catch (Exception $e) {
    // Manejar cualquier otro error y devolver una respuesta JSON
    echo json_encode(['status' => 'error', 'message' => 'Error inesperado: ' . $e->getMessage()]);
}
?>
