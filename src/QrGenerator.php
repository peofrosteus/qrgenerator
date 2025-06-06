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
        $qrCode = QrCode::create($text)
            ->setSize($this->size)
            ->setMargin($this->margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255))
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());

        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        
        return $result->getDataUri();
    }
} 