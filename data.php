<?php
// creamos la conexion con la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "pruebatecnica";

$conn = new mysqli($host, $user, $password, $database);

// Verificar que se haga la conexion 
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    $nameValue = $_POST['name'];
    $emailValue = $_POST['email'];
    $textareaValue = $_POST['comentario'];

    // verificamos que los campos no esten vacios
    if(empty($nameValue) || empty($emailValue) || empty($textareaValue)){
        echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; border: 1px solid #808080; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; font-family: \"Times New Roman\", Times, serif; font-size: 20px !important;'>";
        echo "<p style='margin-bottom: 20px;'>Ingrese todos los datos</p>";
        echo "<a href='index.html' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;'>Volver</a>";
        echo "</div>";
    }else{
        // verificamos que ingrese un correo valido
        if (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)){
            echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; border: 1px solid #808080; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; font-family: \"Times New Roman\", Times, serif; font-size: 20px !important;'>";
            echo "<p style='margin-bottom: 20px;'>La dirección de correo $nameValue NO es válida</p>";
            echo "<a href='index.html' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;'>Volver</a>";
            echo "</div>";
        }else{
            // insertamos los datos en la base de datos
            $sql = "INSERT INTO usuario (nombre, email, comentarios) VALUES ('$nameValue', '$emailValue', '$textareaValue')";

            if ($conn->query($sql) === TRUE) {
                echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; border: 1px solid #808080; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; font-family: \"Times New Roman\", Times, serif; font-size: 20px !important;'>";
                echo "<p style='margin-bottom: 20px;'>Datos guardados correctamente</p>";
                
                // mostramos los datos guardados
                echo "<p style='margin-bottom: 20px;'>Nombre: $nameValue</p>";
                echo "<p style='margin-bottom: 20px;'>Correo Electrónico: $emailValue</p>";
                echo "<p style='margin-bottom: 20px;'>Comentario: $textareaValue</p>";
                
                echo "<a href='index.html' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;'>Volver</a>";
                echo "</div>";
            }else{
                echo "<div style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; border: 1px solid #808080; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; font-family: \"Times New Roman\", Times, serif; font-size: 20px !important;'>";
                echo "<p style='margin-bottom: 20px; color: #721c24;'>Error al guardar los datos: " . $conn->error . "</p>";
                echo "<a href='index.html' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;'>Volver</a>";
                echo "</div>";
            }
        }
        
    }
}
?>
