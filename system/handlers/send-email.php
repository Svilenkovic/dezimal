<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$config = include '../config/site-config.php';
$input = $_POST;

$required_fields = ['name', 'email', 'message'];
foreach ($required_fields as $field) {
    if (empty($input[$field])) {
        http_response_code(400);
        echo json_encode(['error' => "Missing required field: $field"]);
        exit;
    }
}

if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email address']);
    exit;
}

$name = htmlspecialchars(trim($input['name']));
$email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
$company = htmlspecialchars(trim($input['company'] ?? ''));
$message = htmlspecialchars(trim($input['message']));

$to = 'info@dezimal.rs';
$subject = 'New Contact Form Submission - Dezimal Consulting';

$email_body = "
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Company:</strong> " . ($company ?: 'Not provided') . "</p>
    <p><strong>Message:</strong></p>
    <p>" . nl2br($message) . "</p>
    <hr>
    <p><small>This message was sent from the Dezimal.rs contact form.</small></p>
</body>
</html>
";

try {
    $mail_sent = sendEmailSimple($to, $subject, $email_body, $email, $name);
    
    if ($mail_sent) {
        echo json_encode([
            'success' => true,
            'message' => 'Thank you for your message! I will contact you soon.'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'error' => 'Failed to send email. Please try again later or contact us directly at info@dezimal.rs'
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'An error occurred while sending the email. Please try again later or contact us directly at info@dezimal.rs'
    ]);
}

function sendEmailSimple($to, $subject, $message, $reply_email, $reply_name) {
    if (function_exists('mail')) {
        $headers = [
            'From: info@dezimal.rs',
            'Reply-To: ' . $reply_email,
            'Content-Type: text/html; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
            'MIME-Version: 1.0'
        ];
        
        return mail($to, $subject, $message, implode("\r\n", $headers));
    }
    
    return false;
}
?>
