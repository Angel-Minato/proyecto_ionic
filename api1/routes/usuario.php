<?php
require "../config/Conexion.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $sql = "SELECT id, nombre, correo,contrasena FROM usuario";
        $query = $conexion->query($sql);

        if ($query->num_rows > 0) {
            $data = array();
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo "No se encontraron registros en la tabla.";
        }
        $conexion->close();
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
    
        $camposRequeridos = ['nombre', 'correo', 'contrasena'];
        $camposFaltantes = [];
    
        foreach ($camposRequeridos as $campo) {
            if (!isset($data[$campo])) {
                $camposFaltantes[] = $campo;
            }
        }
    
        if (!empty($camposFaltantes)) {
            echo "Faltan los siguientes datos en la solicitud: " . implode(', ', $camposFaltantes);
            exit;
        }
    
        $nombre = $data['nombre'];
        $correo = $data['correo'];
        $contraseña = $data['contrasena'];
    
        $stmt = $conexion->prepare("INSERT INTO usuario (nombre, correo, contrasena) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $contraseña);
    
        if ($stmt->execute()) {
            echo "Datos insertados con éxito.";
        } else {
            echo "Error al insertar datos: " . $stmt->error;
        }
        $stmt->close();
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents("php://input"), true);

        if (isset($input['id']) && isset($input['nombre']) && isset($input['correo']) && isset($input['contraseña'])) {
            $id = $input['id'];
            $nombre = $input['nombre'];
            $correo = $input['correo'];
            $contraseña = $input['contraseña'];

            $stmt = $conexion->prepare("UPDATE usuario SET nombre = ?, correo = ?, contraseña = ? WHERE id = ?");
            $stmt->bind_param("sssi", $nombre, $correo, $contraseña, $id);

            if ($stmt->execute()) {
                echo "Datos actualizados con éxito.";
            } else {
                echo "Error al actualizar datos: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Faltan datos necesarios.";
        }
        break;

    case 'DELETE':
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);

        $id = isset($_GET['id']) ? $_GET['id'] : (isset($data['id']) ? $data['id'] : null);
        if ($id !== null) {
            $sql = "DELETE FROM usuario WHERE id = $id";

            if ($conexion->query($sql) === TRUE) {
                echo "Registro eliminado con éxito.";
            } else {
                echo "Error al eliminar registro: " . $conexion->error;
            }
        } else {
            echo "Falta el ID del usuario.";
        }
        $conexion->close();
        break;

    default:
        echo '¡Tipo de solicitud no definido!';
}
?>
