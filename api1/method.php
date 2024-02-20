<?php
require "config/Conexion.php";


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers: Content-Type");



  //print_r($_SERVER['REQUEST_METHOD']);
  switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      // Consulta SQL para seleccionar datos de la tabla
$sql = "SELECT id_maestro,nombre, apodo, tel,correo, foto FROM maestro";

$query = $conexion->query($sql);

if ($query->num_rows > 0) {
    $data = array();
    while ($row = $query->fetch_assoc()) {
        $data[] = $row;
    }
    // Devolver los resultados en formato JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "No se encontraron registros en la tabla.";
}

$conexion->close();
      break;


    case 'POST':
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $nombre_usuario = $data['nombre'];
        $apodo_usuario = $data['apodo'];
        $correo_usuario = $data['correo'];
        $tel_usuario = $data['tel'];
        $foto_usuario = $data['foto'];

        // Prepara la consulta SQL
        $stmt = $conexion->prepare("INSERT INTO maestro (nombre, apodo, correo, tel, foto) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre_usuario, $apodo_usuario, $correo_usuario, $tel_usuario, $foto_usuario);

        if ($stmt->execute()) {
            echo "Datos insertados con éxito.";
        } else {
            echo "Error al insertar datos: " . $stmt->error;
        }
        $stmt->close();
        /*
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        header('Content-Type: application/json');
        // Recibir los datos del formulario HTML
        $nombre = $_POST['nombre'];
        $apodo = $_POST['apodo'];
        $tel = $_POST['tel'];
        $correo = $_POST['correo'];
        $foto = $_POST['foto'];
     
    
        // Insertar los datos en la tabla
        $sql = "INSERT INTO maestro (nombre, apodo, tel,correo, foto ) VALUES ('$nombre', '$apodo','$tel','$correo', '$foto')"; // Reemplaza con el nombre de tu tabla
    
        if ($conexion->query($sql) === TRUE) {
            echo "Datos insertados con éxito.";
        } else {
            echo "Error al insertar datos: " . $conexion->error;
        }
        } else {
            echo "Esta API solo admite solicitudes POST.";
        }

        $conexion->close();
        */
      break;

      case 'PATCH':
        if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
          parse_str(file_get_contents("php://input"), $datos);
      
          $id_maestro = $datos['id_maestro'];
          $apodo = $datos['apodo'];
          $foto = $datos['foto'];
          $tel = $datos['tel'];
      
          if ($_SERVER['REQUEST_METHOD'] === 'PATCH') { // Método PATCH
              $actualizaciones = array();
              if (!empty($apodo)) {
                  $actualizaciones[] = "apodo = '$apodo'";
              }
              if (!empty($foto)) {
                  $actualizaciones[] = "foto = '$foto'";
              }
              if (!empty($tel)) {
                  $actualizaciones[] = "tel = '$tel'";
              }
      
              $actualizaciones_str = implode(', ', $actualizaciones);
              $sql = "UPDATE maestro SET $actualizaciones_str WHERE id_maestro = $id_maestro";
          }
      
          if ($conexion->query($sql) === TRUE) {
              echo "Registro actualizado con éxito.";
          } else {
              echo "Error al actualizar registro: " . $conexion->error;
          }
      } else {
          echo "Método de solicitud no válido.";
      }
      
      $conexion->close();
       break;

    case 'PUT':
        $input = json_decode(file_get_contents("php://input"), true);

        // Asegúrate de que los datos necesarios estén presentes
        if (isset($input['nombre']) && isset($input['apodo']) && isset($input['tel']) && isset($input['foto'])) {
            $nombre = $input['nombre'];
            $apodo = $input['apodo'];
            $tel = $input['tel'];
            $foto = $input['foto'];

            $sql = "INSERT INTO maestro (nombre, apodo, tel, foto) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            // Enlaza los parámetros y sus tipos
            $stmt->bind_param("sssi", $nombre, $apodo, $tel, $foto);

            if ($stmt->execute()) {
                $response = array("message" => "Registro insertado con éxito.");
                echo json_encode($response);
            } else {
                $response = array("error" => "Error al insertar registro: " . $stmt->error);
                echo json_encode($response);
            }

            $stmt->close();
        } else {
            $response = array("error" => "Faltan datos obligatorios en la solicitud.");
            echo json_encode($response);
        }
      break;
  
      
    case 'DELETE':
        // Obtener el contenido del cuerpo de la solicitud
        $json = file_get_contents('php://input');
        
        // Decodificar el JSON en un array asociativo
        $data = json_decode($json, true);
        
        // Verificar si la solicitud es DELETE
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            // Verificar si se proporciona el parámetro id_maestro en el JSON
            if (isset($data['id_maestro'])) {
                // Procesar solicitud DELETE
                $id_maestro = $data['id_maestro'];
                $sql = "DELETE FROM maestro WHERE id_maestro = $id_maestro";
        
                // Realizar la consulta DELETE
                if ($conexion->query($sql) === TRUE) {
                    echo "Registro eliminado con éxito.";
                } else {
                    echo "Error al eliminar registro: " . $conexion->error;
                }
            } else {
                echo "El parámetro id_maestro no se proporcionó en el JSON.";
            }
        } else {
            echo "Método de solicitud no válido.";
        }
        
        // Cerrar la conexión a la base de datos
        $conexion->close();
      break;


     default:
       echo 'undefined request type!';
  }
?>