<?php

namespace QrGenerator;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

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
            ->setMargin($this->margin);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        
        return $result->getDataUri();
    }
} 