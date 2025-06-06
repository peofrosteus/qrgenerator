<?php

namespace QrGenerator;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

class QrGenerator
{
    private $size;
    private $margin;

    public function __construct(int $size = 300, int $margin = 10)
    {
        $this->size = $size;
        $this->margin = $margin;
    }

    public function generate(string $text): string
    {
        $qrCode = new QrCode($text);
        $qrCode->setSize($this->size);
        $qrCode->setMargin($this->margin);
        $qrCode->setForegroundColor(new Color(0, 0, 0));
        $qrCode->setBackgroundColor(new Color(255, 255, 255));
        $qrCode->setEncoding(new Encoding('UTF-8'));
        $qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());

        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        
        return $result->getDataUri();
    }
} 