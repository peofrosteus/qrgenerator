<?php

require_once __DIR__ . '/../vendor/autoload.php';

use QrGenerator\QrGenerator;

$qrCode = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    try {
        $generator = new QrGenerator();
        $qrCode = $generator->generate($_POST['text']);
        
        // Debug output
        error_log("QR Code generated: " . substr($qrCode, 0, 50) . "...");
        
        if (empty($qrCode)) {
            throw new Exception("QR code generation returned empty result");
        }
    } catch (Exception $e) {
        error_log("Error in QR code generation: " . $e->getMessage());
        $error = 'Error generating QR code: ' . htmlspecialchars($e->getMessage());
    }
}

// Debug output
error_log("POST data: " . print_r($_POST, true));
error_log("QR Code variable: " . (isset($qrCode) ? "set" : "not set"));

require_once __DIR__ . '/../templates/index.html'; 