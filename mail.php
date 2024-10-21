<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefono = htmlspecialchars(trim($_POST['telefono'])); // Corregir el nombre del campo del teléfono
    $mensaje = htmlspecialchars(trim($_POST['comment']));

    // Validar que todos los campos estén llenos
    if(!empty($nombre) && !empty($email) && !empty($telefono) && !empty($mensaje)) {
        // Destinatario
        $to = "info@isosingenieria.com";
        
        // Asunto del correo
        $subject = "Nuevo mensaje desde la página web";

        // Cuerpo del correo
        $body = "Nombre o Razon Social: $nombre\n";
        $body .= "Correo: $email\n";
        $body .= "Teléfono: $telefono\n";
        $body .= "Mensaje: $mensaje\n";

        // Cabeceras del correo
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Enviar el correo
        if(mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado con éxito.";
        } else {
            echo "Error al enviar el mensaje. Por favor, inténtelo de nuevo.";
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
