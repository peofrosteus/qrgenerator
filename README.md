# QR Code Generator

A simple web-based QR code generator built with PHP and HTML.

## Features

- Generate QR codes from text or URLs
- Clean and responsive user interface
- Instant QR code generation
- Display QR codes directly in the browser

## Requirements

- PHP 7.4 or higher
- Composer (PHP package manager)

## Installation

1. Clone this repository
2. Install dependencies using Composer:
   ```bash
   composer install
   ```
3. Make sure your web server (Apache/Nginx) is configured to serve PHP files
4. Access the application through your web browser

## Usage

1. Open the application in your web browser
2. Enter the text or URL you want to convert to a QR code
3. Click "Generate QR Code"
4. The QR code will be displayed on the page
5. You can scan the QR code with any QR code reader app on your mobile device

## Security

- All user input is properly escaped to prevent XSS attacks
- The application uses HTTPS-compatible QR code generation
