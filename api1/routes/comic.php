<?php
require "../config/Conexion.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $sql = "SELECT comic_id, titulo, descripcion, fecha_publicacion, genero, portada FROM Comic";
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
    
        $camposRequeridos = ['titulo', 'descripcion', 'fecha_publicacion', 'genero', 'portada'];
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
    
        $titulo = $data['titulo'];
        $descripcion = $data['descripcion'];
        $fecha_publicacion = $data['fecha_publicacion'];
        $genero = $data['genero'];
        $portada = $data['portada'];
    
        $stmt = $conexion->prepare("INSERT INTO Comic (titulo, descripcion, fecha_publicacion, genero, portada) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $titulo, $descripcion, $fecha_publicacion, $genero, $portada);
    
        if ($stmt->execute()) {
            echo "Datos insertados con éxito.";
        } else {
            echo "Error al insertar datos: " . $stmt->error;
        }
        $stmt->close();
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents("php://input"), true);

        if (isset($input['comic_id']) && isset($input['titulo']) && isset($input['descripcion']) && isset($input['fecha_publicacion']) && isset($input['genero']) && isset($input['portada'])) {
            $comic_id = $input['comic_id'];
            $titulo = $input['titulo'];
            $descripcion = $input['descripcion'];
            $fecha_publicacion = $input['fecha_publicacion'];
            $genero = $input['genero'];
            $portada = $input['portada'];

            $stmt = $conexion->prepare("UPDATE Comic SET titulo = ?, descripcion = ?, fecha_publicacion = ?, genero = ?, portada = ? WHERE comic_id = ?");
            $stmt->bind_param("ssissi", $titulo, $descripcion, $fecha_publicacion, $genero, $portada, $comic_id);

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

        $comic_id = isset($_GET['comic_id']) ? $_GET['comic_id'] : (isset($data['comic_id']) ? $data['comic_id'] : null);
        if ($comic_id !== null) {
            $sql = "DELETE FROM Comic WHERE comic_id = $comic_id";

            if ($conexion->query($sql) === TRUE) {
                echo "Registro eliminado con éxito.";
            } else {
                echo "Error al eliminar registro: " . $conexion->error;
            }
        } else {
            echo "Falta el ID del cómic.";
        }
        $conexion->close();
        break;

    default:
        echo '¡Tipo de solicitud no definido!';
}
?>
