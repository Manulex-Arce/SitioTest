<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log file setup
$logFile = 'form_processing_fr.log';

function logMessage($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Set headers
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Log request
logMessage("New request received: " . $_SERVER['REQUEST_METHOD']);

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    logMessage("Handling OPTIONS request");
    http_response_code(200);
    exit();
}

// Verify POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    logMessage("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}

// Email Configuration
$from = "siteweb@expresscash.ca";
$admin_email = "marce@publissoft.ca";

function sendEmailNotification($data) {
    global $admin_email, $from;
    
    $to = $admin_email;
    $subject = "Nouvelle demande de prêt - Express Cash";
    
    $message = "Une nouvelle demande de prêt a été reçue:<br><br>";
    $message .= "<strong>Informations personnelles:</strong><br>";
    $message .= "Nom: " . $data['firstName'] . " " . $data['lastName'] . "<br>";
    $message .= "Date de naissance: " . $data['dateOfBirth'] . "<br>";
    $message .= "Langue: " . $data['language'] . "<br>";
    $message .= "Téléphone: " . $data['phone'] . "<br>";
    $message .= "Courriel: " . $data['email'] . "<br><br>";
    
    $message .= "<strong>Informations d'adresse:</strong><br>";
    $message .= "Adresse: " . $data['streetNumber'] . " " . $data['street'];
    if (!empty($data['apt'])) {
        $message .= " Apt " . $data['apt'];
    }
    $message .= "<br>";
    $message .= "Ville: " . $data['city'] . "<br>";
    $message .= "Province: " . $data['province'] . "<br>";
    $message .= "Code postal: " . $data['postalCode'] . "<br>";
    $message .= "Date d'emménagement: " . $data['moveInDate'] . "<br><br>";
    
    $message .= "<strong>Informations financières:</strong><br>";
    $message .= "Statut de résidence: " . $data['residenceStatus'] . "<br>";
    $message .= "Salaire brut: $" . $data['grossSalary'] . "<br>";
    $message .= "Coût du loyer: $" . $data['rentCost'] . "<br>";
    $message .= "Coût des services publics: $" . $data['utilitiesCost'] . "<br>";
    if (!empty($data['carLoan'])) {
        $message .= "Prêt auto: $" . $data['carLoan'] . "<br>";
    }
    if (!empty($data['otherLoans'])) {
        $message .= "Autres prêts: $" . $data['otherLoans'] . "<br>";
    }
    $message .= "<br>";
    
    $message .= "<strong>Informations d'emploi:</strong><br>";
    $message .= "Profession: " . $data['occupation'] . "<br>";
    $message .= "Entreprise: " . $data['companyName'] . "<br>";
    $message .= "Superviseur: " . $data['supervisorName'] . "<br>";
    $message .= "Téléphone du superviseur: " . $data['supervisorPhone'];
    if (!empty($data['supervisorExtension'])) {
        $message .= " Poste " . $data['supervisorExtension'];
    }
    $message .= "<br>";
    $message .= "Fréquence de paie: " . $data['payrollFrequency'] . "<br>";
    $message .= "Date d'embauche: " . $data['hireDate'] . "<br><br>";
    
    $message .= "<strong>Détails du prêt:</strong><br>";
    $message .= "Montant demandé: $" . $data['loanAmount'] . "<br>";
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: ' . "<" . $from . ">" . "\r\n";
    $headers .= 'Reply-To: ' . $data['email'] . "\r\n";
    
    return mail($to, $subject, $message, $headers);
}

try {
    // Log received data
    logMessage("Received data: " . json_encode($_POST));

    // Initialize response array
    $response = array(
        'success' => true,
        'message' => '',
        'missing_fields' => array()
    );

    // Required fields
    $required_fields = array(
        'socialEmail',
        'firstName',
        'lastName',
        'dateOfBirth',
        'language',
        'phone',
        'email',
        'loanAmount',
        'streetNumber',
        'street',
        'city',
        'province',
        'postalCode',
        'moveInDate',
        'residenceStatus',
        'grossSalary',
        'rentCost',
        'utilitiesCost',
        'occupation',
        'companyName',
        'supervisorName',
        'supervisorPhone',
        'payrollFrequency',
        'hireDate'
    );

    // Check for missing required fields
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $response['success'] = false;
            $response['missing_fields'][] = $field;
        }
    }

    if (!$response['success']) {
        $response['message'] = 'Champs obligatoires manquants';
        echo json_encode($response);
        exit;
    }

    // Send email notification
    $email_sent = sendEmailNotification($_POST);

    if ($email_sent) {
        logMessage("Email sent successfully");
        // If everything is successful, redirect to thank you page
        header('Location: merci-fr.php');
        exit;
    } else {
        logMessage("Failed to send email");
        $response['message'] = 'Erreur lors de l\'envoi de la notification par courriel';
        echo json_encode($response);
    }
} catch (Exception $e) {
    logMessage("Error: " . $e->getMessage());
    http_response_code(500);
    $response['message'] = 'Une erreur est survenue lors du traitement de votre demande';
    echo json_encode($response);
}
?> 