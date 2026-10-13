<?php
/**
 * Contact Form Submission Handler with Gmail SMTP & Local Fallback
 * Aparna Chaurasia Portfolio
 */

header('Content-Type: application/json; charset=utf-8');

// Load configurations
$config = require __DIR__ . '/config.php';

// Helper function to return JSON response
function jsonResponse($success, $message, $extra = []) {
    echo json_encode(array_merge([
        'success' => $success,
        'message' => $message
    ], $extra));
    exit;
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Invalid request method. Only POST is allowed.');
}

// Honeypot check for spam bots
if (!empty($_POST['website_hp'])) {
    // Hidden honeypot field was filled
    jsonResponse(true, 'Message sent successfully!');
}

// Extract and sanitize input fields
$name    = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email   = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
$subject = isset($_POST['subject']) ? trim(strip_tags($_POST['subject'])) : 'Portfolio Contact Inquiry';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')) : '';

// Validation
if (empty($name) || strlen($name) < 2) {
    jsonResponse(false, 'Please provide your full name.');
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Please provide a valid email address.');
}

if (empty($message) || strlen($message) < 10) {
    jsonResponse(false, 'Please write a message with at least 10 characters.');
}

// 1. Always save a copy to data/messages.json so no HR/Client message is ever missed
$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    @mkdir($dataDir, 0755, true);
}

$messageRecord = [
    'id'        => uniqid('msg_', true),
    'timestamp' => date('Y-m-d H:i:s'),
    'name'      => $name,
    'email'     => $email,
    'subject'   => $subject,
    'message'   => $message,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
];

$messagesFile = $dataDir . '/messages.json';
$allMessages = [];
if (file_exists($messagesFile)) {
    $existing = @file_get_contents($messagesFile);
    $decoded = json_decode($existing, true);
    if (is_array($decoded)) {
        $allMessages = $decoded;
    }
}
array_unshift($allMessages, $messageRecord);
@file_put_contents($messagesFile, json_encode($allMessages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// 2. Send via SMTP if configured
$smtpConfig = $config['smtp'] ?? [];
$isConfigured = !empty($smtpConfig['username']) && 
                !empty($smtpConfig['password']) && 
                $smtpConfig['password'] !== 'YOUR_16_DIGIT_APP_PASSWORD';

if ($isConfigured && !empty($smtpConfig['enabled'])) {
    $mailSent = sendGmailSmtp(
        $smtpConfig,
        $smtpConfig['to_email'] ?? 'aparna2112003@gmail.com',
        "New Portfolio Inquiry: " . $subject,
        buildEmailHtml($name, $email, $subject, $message),
        $name,
        $email
    );

    if ($mailSent['success']) {
        jsonResponse(true, "Thank you, {$name}! Your message has been sent directly to Aparna's inbox. She will get back to you shortly.");
    } else {
        // Fallback: Message was safely logged locally, inform user gently
        jsonResponse(true, "Thank you, {$name}! Your inquiry was recorded successfully. Aparna will reach out to you soon.");
    }
} else {
    // When SMTP password hasn't been replaced yet, confirm receipt gracefully
    jsonResponse(true, "Thank you, {$name}! Your message was successfully received and saved. Aparna will connect with you soon!");
}

/**
 * Clean Built-in Socket SMTP Client for Gmail (No Composer or dependencies required!)
 */
function sendGmailSmtp($config, $to, $subject, $bodyHtml, $fromName, $replyToEmail) {
    $host = $config['host'] ?? 'smtp.gmail.com';
    $port = $config['port'] ?? 465;
    $username = $config['username'];
    $password = str_replace(' ', '', $config['password']); // Strip spaces if 16-digit password has them
    $from = $config['username'];

    $transport = ($port == 465) ? "ssl://{$host}" : "tcp://{$host}";
    $socket = @fsockopen($transport, $port, $errno, $errstr, 15);

    if (!$socket) {
        return ['success' => false, 'error' => "Could not connect to SMTP server: $errstr ($errno)"];
    }

    $read = function() use ($socket) {
        $server_response = '';
        while (substr($server_response, 3, 1) != ' ') {
            if (!($server_response = fgets($socket, 512))) {
                break;
            }
        }
        return $server_response;
    };

    $send = function($cmd) use ($socket, $read) {
        fputs($socket, $cmd . "\r\n");
        return $read();
    };

    $read(); // Initial connection banner

    $send("EHLO " . gethostname());

    if ($port == 587) {
        $send("STARTTLS");
        stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        $send("EHLO " . gethostname());
    }

    $send("AUTH LOGIN");
    $send(base64_encode($username));
    $authResp = $send(base64_encode($password));

    if (strpos($authResp, '235') === false) {
        fclose($socket);
        return ['success' => false, 'error' => "SMTP Authentication failed: {$authResp}"];
    }

    $send("MAIL FROM: <{$from}>");
    $send("RCPT TO: <{$to}>");
    $send("DATA");

    $boundary = md5(time());
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "From: \"{$config['from_name']}\" <{$from}>\r\n";
    $headers .= "To: <{$to}>\r\n";
    $headers .= "Reply-To: \"{$fromName}\" <{$replyToEmail}>\r\n";
    $headers .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $messageContent = $headers . "\r\n" . $bodyHtml . "\r\n.\r\n";
    fputs($socket, $messageContent);
    $dataResp = $read();

    $send("QUIT");
    fclose($socket);

    if (strpos($dataResp, '250') !== false) {
        return ['success' => true];
    }

    return ['success' => false, 'error' => $dataResp];
}

/**
 * Clean HTML Email Template for Inquiries
 */
function buildEmailHtml($name, $email, $subject, $message) {
    $date = date('F j, Y, g:i a');
    return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Portfolio Message</title>
</head>
<body style="margin: 0; padding: 24px; background-color: #0b0f19; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #f1f5f9;">
    <div style="max-width: 600px; margin: 0 auto; background: #131b2e; border: 1px solid #1e293b; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.4);">
        <div style="background: linear-gradient(135deg, #6366f1, #06b6d4); padding: 24px 30px; text-align: left;">
            <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 700; letter-spacing: -0.5px;">New Portfolio Inquiry</h1>
            <p style="margin: 6px 0 0; color: #e0e7ff; font-size: 14px;">Received on {$date}</p>
        </div>
        <div style="padding: 30px;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 24px;">
                <tr>
                    <td style="padding: 8px 0; color: #94a3b8; font-size: 14px; width: 100px;"><strong>Sender:</strong></td>
                    <td style="padding: 8px 0; color: #f8fafc; font-size: 15px; font-weight: 600;">{$name}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #94a3b8; font-size: 14px;"><strong>Email:</strong></td>
                    <td style="padding: 8px 0; color: #38bdf8; font-size: 15px;"><a href="mailto:{$email}" style="color: #38bdf8; text-decoration: none;">{$email}</a></td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #94a3b8; font-size: 14px;"><strong>Subject:</strong></td>
                    <td style="padding: 8px 0; color: #f8fafc; font-size: 15px;">{$subject}</td>
                </tr>
            </table>
            
            <div style="background: #0a0f1d; border: 1px solid #1e293b; border-radius: 10px; padding: 20px;">
                <p style="margin: 0 0 8px; color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Message:</p>
                <div style="color: #e2e8f0; font-size: 15px; line-height: 1.6; white-space: pre-wrap;">{$message}</div>
            </div>

            <div style="margin-top: 28px; text-align: center;">
                <a href="mailto:{$email}?subject=Re: {$subject}" style="display: inline-block; background: #6366f1; color: #ffffff; text-decoration: none; padding: 12px 28px; border-radius: 8px; font-weight: 600; font-size: 14px; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);">
                    Reply to {$name}
                </a>
            </div>
        </div>
        <div style="background: #0a0f1d; padding: 16px; text-align: center; border-top: 1px solid #1e293b; font-size: 12px; color: #64748b;">
            Aparna Chaurasia Portfolio • Full Stack Developer
        </div>
    </div>
</body>
</html>
HTML;
}
