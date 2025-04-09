<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// CleanTalk setup
require_once('/home/expressc/public_html/cleantalk/cleantalk.php');

// Log file setup
$logFile = 'form_processing.log';

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
$admin_email = "marce@publissoft.ca"; // Change this to the email where you want to receive the applications

function sendEmailNotification($data) {
    global $admin_email, $from;
    
    $to = $admin_email;
    $subject = "New Loan Application - Express Cash";
    
    $message = "A new loan application has been received:<br><br>";
    $message .= "<strong>Personal Information:</strong><br>";
    $message .= "Name: " . $data['firstName'] . " " . $data['lastName'] . "<br>";
    $message .= "Date of Birth: " . $data['dateOfBirth'] . "<br>";
    $message .= "Language: " . $data['language'] . "<br>";
    $message .= "Phone: " . $data['phone'] . "<br>";
    $message .= "Email: " . $data['email'] . "<br><br>";
    
    $message .= "<strong>Address Information:</strong><br>";
    $message .= "Address: " . $data['streetNumber'] . " " . $data['street'];
    if (!empty($data['apt'])) {
        $message .= " Apt " . $data['apt'];
    }
    $message .= "<br>";
    $message .= "City: " . $data['city'] . "<br>";
    $message .= "Province: " . $data['province'] . "<br>";
    $message .= "Postal Code: " . $data['postalCode'] . "<br>";
    $message .= "Move-in Date: " . $data['moveInDate'] . "<br><br>";
    
    $message .= "<strong>Financial Information:</strong><br>";
    $message .= "Residence Status: " . $data['residenceStatus'] . "<br>";
    $message .= "Gross Salary: $" . $data['grossSalary'] . "<br>";
    $message .= "Rent Cost: $" . $data['rentCost'] . "<br>";
    $message .= "Utilities Cost: $" . $data['utilitiesCost'] . "<br>";
    if (!empty($data['carLoan'])) {
        $message .= "Car Loan: $" . $data['carLoan'] . "<br>";
    }
    if (!empty($data['otherLoans'])) {
        $message .= "Other Loans: $" . $data['otherLoans'] . "<br>";
    }
    $message .= "<br>";
    
    $message .= "<strong>Employment Information:</strong><br>";
    $message .= "Occupation: " . $data['occupation'] . "<br>";
    $message .= "Company: " . $data['companyName'] . "<br>";
    $message .= "Supervisor: " . $data['supervisorName'] . "<br>";
    $message .= "Supervisor Phone: " . $data['supervisorPhone'];
    if (!empty($data['supervisorExtension'])) {
        $message .= " Ext. " . $data['supervisorExtension'];
    }
    $message .= "<br>";
    $message .= "Payroll Frequency: " . $data['payrollFrequency'] . "<br>";
    $message .= "Hire Date: " . $data['hireDate'] . "<br><br>";
    
    $message .= "<strong>Loan Details:</strong><br>";
    $message .= "Requested Amount: $" . $data['loanAmount'] . "<br>";
    $message .= "Previous Borrowing: " . $data['previousBorrowing'] . "<br>";
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: ' . "<" . $from . ">" . "\r\n";
    $headers .= 'Reply-To: ' . $data['email'] . "\r\n";
    
    return mail($to, $subject, $message, $headers);
}

// Validation functions
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePhone($phone) {
    // Remove any non-digit characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    // Check if the phone number has a valid length (10 digits for North America)
    return strlen($phone) === 10;
}

function validateDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function validatePostalCode($postalCode) {
    // Canadian postal code format: A1A 1A1
    return preg_match('/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/', $postalCode);
}

function validateAmount($amount) {
    return is_numeric($amount) && $amount > 0 && $amount <= 1500;
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    // Log received data
    logMessage("Received data: " . json_encode($_POST));

    // Initialize errors array
    $errors = [];

    // Sanitize and validate each field
    $sanitizedData = [];

    // Personal Information validation
    if (!empty($_POST['firstName'])) {
        $sanitizedData['firstName'] = sanitizeInput($_POST['firstName']);
        if (strlen($sanitizedData['firstName']) < 2) {
            $errors['firstName'] = 'First name must be at least 2 characters long';
        }
    }

    if (!empty($_POST['lastName'])) {
        $sanitizedData['lastName'] = sanitizeInput($_POST['lastName']);
        if (strlen($sanitizedData['lastName']) < 2) {
            $errors['lastName'] = 'Last name must be at least 2 characters long';
        }
    }

    if (!empty($_POST['email'])) {
        $sanitizedData['email'] = sanitizeInput($_POST['email']);
        if (!validateEmail($sanitizedData['email'])) {
            $errors['email'] = 'Invalid email format';
        }
    }

    if (!empty($_POST['phone'])) {
        $sanitizedData['phone'] = sanitizeInput($_POST['phone']);
        if (!validatePhone($sanitizedData['phone'])) {
            $errors['phone'] = 'Invalid phone number format';
        }
    }

    if (!empty($_POST['dateOfBirth'])) {
        if (!validateDate($_POST['dateOfBirth'])) {
            $errors['dateOfBirth'] = 'Invalid date format';
        } else {
            $dob = new DateTime($_POST['dateOfBirth']);
            $today = new DateTime();
            $age = $dob->diff($today)->y;
            if ($age < 18) {
                $errors['dateOfBirth'] = 'You must be at least 18 years old';
            }
            $sanitizedData['dateOfBirth'] = $_POST['dateOfBirth'];
        }
    }

    // Address validation
    if (!empty($_POST['postalCode'])) {
        $sanitizedData['postalCode'] = strtoupper(sanitizeInput($_POST['postalCode']));
        if (!validatePostalCode($sanitizedData['postalCode'])) {
            $errors['postalCode'] = 'Invalid postal code format';
        }
    }

    // Financial Information validation
    if (!empty($_POST['grossSalary'])) {
        $sanitizedData['grossSalary'] = filter_var($_POST['grossSalary'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!is_numeric($sanitizedData['grossSalary']) || $sanitizedData['grossSalary'] <= 0) {
            $errors['grossSalary'] = 'Invalid salary amount';
        }
    }

    if (!empty($_POST['loanAmount'])) {
        $sanitizedData['loanAmount'] = filter_var($_POST['loanAmount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (!validateAmount($sanitizedData['loanAmount'])) {
            $errors['loanAmount'] = 'Invalid loan amount';
        }
    }

    // Required fields validation
    $required_fields = [
        'firstName', 'lastName', 'dateOfBirth', 'language', 'phone', 'email',
        'streetNumber', 'street', 'city', 'province', 'postalCode', 'moveInDate',
        'residenceStatus', 'grossSalary', 'rentCost', 'utilitiesCost',
        'occupation', 'companyName', 'supervisorName', 'supervisorPhone',
        'payrollFrequency', 'hireDate', 'loanAmount', 'previousBorrowing'
    ];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = "Field $field is required";
        } else if (!isset($sanitizedData[$field])) {
            // If not already sanitized above, apply basic sanitization
            $sanitizedData[$field] = sanitizeInput($_POST[$field]);
        }
    }

    // If there are validation errors, return them
    if (!empty($errors)) {
        logMessage("Validation errors: " . json_encode($errors));
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $errors
        ]);
        exit();
    }

    // Send email notification with sanitized data
    $email_sent = sendEmailNotification($sanitizedData);

    if ($email_sent) {
        logMessage("Email sent successfully");
        echo json_encode([
            'success' => true,
            'message' => 'Application submitted successfully'
        ]);
    } else {
        logMessage("Failed to send email");
        echo json_encode([
            'success' => false,
            'message' => 'Error sending email notification'
        ]);
    }
} catch (Exception $e) {
    logMessage("Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while processing your request'
    ]);
}
?> 