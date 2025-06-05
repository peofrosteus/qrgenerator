<?php

require_once __DIR__ . '/../vendor/autoload.php';

use QrGenerator\QrGenerator;

$qrCode = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    try {
        $generator = new QrGenerator();
        $qrCode = $generator->generate($_POST['text']);
    } catch (Exception $e) {
        $error = 'Error generating QR code: ' . htmlspecialchars($e->getMessage());
    }
}

require_once __DIR__ . '/../templates/index.html'; 