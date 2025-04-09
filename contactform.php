<?php
//Cleantalk setup
require_once('/home/expressc/public_html/cleantalk/cleantalk.php');

// Definir mensajes en diferentes idiomas
$messages = [
    'fr' => [
        'success' => 'Merci de nous avoir contactés!',
        'error' => 'Désolé! Une erreur s\'est produite.',
        'subject' => 'Contactez-nous expresscash.ca',
        'name_label' => 'Nom',
        'email_label' => 'E-mail',
        'message_label' => 'Message'
    ],
    'en' => [
        'success' => 'Thank you for contacting us!',
        'error' => 'Oops! Something went wrong.',
        'subject' => 'Contact us expresscash.ca',
        'name_label' => 'Name',
        'email_label' => 'Email',
        'message_label' => 'Message'
    ]
];

// Determinar el idioma basado en la página de origen
$language = 'en'; // Default a inglés
$referer = $_SERVER['HTTP_REFERER'] ?? '';
if (strpos($referer, 'contact-fr') !== false) {
    $language = 'fr';
}

// Configuración del email
$from = "siteweb@expresscash.ca";
$mail = "info@expresscash.ca";
$name = $_POST['Name'] ?? '';
$email = $_POST['Email'] ?? '';
$message = $_POST['Message'] ?? '';

// Construir el mensaje del email
$email_message = $messages[$language]['name_label'] . ": " . $name . "<br>";
$email_message .= $messages[$language]['email_label'] . ": " . $email . "<br>";
$email_message .= $messages[$language]['message_label'] . ": " . $message . "\n\n";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ' . "<" . $from . ">" . "\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";

$subject = $messages[$language]['subject'];

// Validar y enviar
if (!empty($name) && !empty($email) && !empty($message)) {
    if (mail($mail, $subject, $email_message, $headers)) {
        // Redirigir según el idioma
        $redirect_url = $language === 'fr' ? 'https://www.expresscash.ca/merci-fr.php' : 'https://www.expresscash.ca/thank-you.php';
        header("Location: " . $redirect_url);
        exit();
    }
}

// Si hay error, redirigir de vuelta al formulario
$error_url = $language === 'fr' ? 'https://www.expresscash.ca/contact-fr' : 'https://www.expresscash.ca/contact';
header("Location: " . $error_url);
exit();

// Cleantalk bottom code
if (ob_get_contents()) {
    ob_end_flush();
}
?>