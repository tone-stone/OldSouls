<?php
// Reemplaza con tu dirección de correo electrónico real
$receiving_email_address = 'oldsoulsrestaurante@gmail.com';

// Verifica si el método de la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));
    $people = htmlspecialchars(trim($_POST['people']));
    $message = htmlspecialchars(trim($_POST['message']));

    $subject = "Reservacion de Mesa desde la Pagina WEB OldSoulsRestaurante";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Date: $date\n";
    $body .= "Time: $time\n";
    $body .= "# of people: $people\n\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($receiving_email_address, $subject, $body, $headers)) {
        echo "Su solicitud de reservacion fue enviada. Le devolveremos la llamada o le
              enviaremos un correo electrónico para confirmar su
              reservacion. ¡Gracias!!";
    } else {
        echo "Hubo error al enviar la peticion, por favor intente de nuevo.";
    }
} else {
    echo "Hubo un error con tu registro, por favor intentar de nuevo.";
}
?>
