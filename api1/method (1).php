<?php
require "config/Conexion.php";

  //print_r($_SERVER['REQUEST_METHOD']);
  switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      // Consulta SQL para seleccionar datos de la tabla
$sql = "SELECT curso, metricula, correo, edad FROM alumno";

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
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recibir los datos del formulario HTML
        $curso = $_POST['curso'];
        $metricula = $_POST['metricula'];
        $correo = $_POST['correo'];
        $edad = $_POST['edad'];
     
    
        // Insertar los datos en la tabla
        $sql = "INSERT INTO alumno (curso, metricula, correo, edad ) VALUES ('$curso', '$metricula','$correo', '$edad')"; // Reemplaza con el curso de tu tabla
    
        if ($conexion->query($sql) === TRUE) {
            echo "Datos insertados con éxito.";
        } else {
            echo "Error al insertar datos: " . $conexion->error;
        }
    } else {
        echo "Esta API solo admite solicitudes POST.";
    }
    
    $conexion->close();
      break;

      case 'PATCH':
        if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
          parse_str(file_get_contents("php://input"), $datos);
      
          $id_alumno = $datos['id_alumno'];
          $metricula = $datos['metricula'];
          $edad = $datos['edad'];
          $correo = $datos['correo'];
      
          if ($_SERVER['REQUEST_METHOD'] === 'PATCH') { // Método PATCH
              $actualizaciones = array();
              if (!empty($metricula)) {
                  $actualizaciones[] = "metricula = '$metricula'";
              }
              if (!empty($edad)) {
                  $actualizaciones[] = "edad = '$edad'";
              }
              if (!empty($correo)) {
                  $actualizaciones[] = "correo = '$correo'";
              }
      
              $actualizaciones_str = implode(', ', $actualizaciones);
              $sql = "UPDATE alumno SET $actualizaciones_str WHERE id_alumno = $id_alumno";
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
        if (isset($input['curso']) && isset($input['metricula']) && isset($input['correo']) && isset($input['edad'])) {
            $curso = $input['curso'];
            $metricula = $input['metricula'];
            $correo = $input['correo'];
            $edad = $input['edad'];

            $sql = "INSERT INTO alumno (curso, metricula, correo, edad) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            // Enlaza los parámetros y sus tipos
            $stmt->bind_param("sssi", $curso, $metricula, $correo, $edad);

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
            // Verificar si se proporciona el parámetro id_alumno en el JSON
            if (isset($data['id_alumno'])) {
                // Procesar solicitud DELETE
                $id_alumno = $data['id_alumno'];
                $sql = "DELETE FROM alumno WHERE id_alumno = $id_alumno";
        
                // Realizar la consulta DELETE
                if ($conexion->query($sql) === TRUE) {
                    echo "Registro eliminado con éxito.";
                } else {
                    echo "Error al eliminar registro: " . $conexion->error;
                }
            } else {
                echo "El parámetro id_alumno no se proporcionó en el JSON.";
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